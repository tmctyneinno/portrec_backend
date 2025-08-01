<?php

namespace App\Http\Controllers\Recruiters;

use App\Http\Controllers\Base\BaseController;
use App\Http\Controllers\NotificationsController;
use App\Http\Controllers\Recruiters\Trait\RecruiterTrait;
use App\Http\Requests\JobOpeningRequest;
use App\Models\JobApplication;
use App\Models\JobOpening;
use App\Models\JobOpeningQuestion;
use App\Models\RecruiterProfile;
use App\Models\Skill;
use App\Models\User;
use App\Notifications\JobApplicationStatusUpdateNotification;
use App\Notifications\JobApplicationViewedNotification;
use Carbon\Carbon;
use Illuminate\Http\Request;

class JobController extends BaseController
{

    use RecruiterTrait;
    public function showJobs(Request $request)
    {
        $id = $this->RecruiterID()->id;
        $profile = RecruiterProfile::where('recruiter_id', $id)->first();
        $query = JobOpening::with(["recruiter:id,name,email,phone", "company", "jobType", "industry", "questions", "currency"]);
        $search = $request->get("search");
        $start_date = $request->get("start_date") ?? Carbon::now()->toDateString();
        $end_date = $request->get("end_date") ??  Carbon::now()->addDays(30)->toDateString();

        $startOfDay = Carbon::parse($start_date)->startOfDay();
        $endOfDay = Carbon::parse($end_date)->endOfDay();
        $query->whereBetween('created_at', [$startOfDay, $endOfDay]);
        if ($profile)
            $query->where('company_id', $profile->company_id);
        if ($search)
            $query->where("title", "like", "%" .  $search . "%");
        $allJobs = $query->paginate($request->rowsPerPage);
        return $this->successMessage($allJobs);
    }

    public function showJobsAll(Request $request)
    {
        $id = $this->RecruiterID()->id;
        $profile = RecruiterProfile::where('recruiter_id', $id)->first();
        $query = JobOpening::select('*', 'title AS label')->with(["recruiter:id,name,email,phone", "company", "jobType", "industry", "questions", "currency"]);
        $query->where('company_id', $profile->company_id);
        return $this->successMessage($query->get());
    }



    public function postJobOpening(JobOpeningRequest $request)
    {
        $validatedData = $request->validated();
        $jobOpening = JobOpening::create(array_merge($validatedData, ['recruiter_id' => $this->RecruiterID()->id]));

        if ($request->questions) {
            $questions = json_decode($request->questions);
            foreach ($questions as $question) {
                JobOpeningQuestion::create(array_merge((array)$question, [
                    'recruiter_id' => $this->RecruiterID()->id,
                    'job_opening_id' => $jobOpening->id,
                ]));
            }
        }

        return response()->json($jobOpening, 201);
    }


    public function updateJobOpening(JobOpeningRequest $request, $id)
    {
        $validatedData = $request->validated();
        $jobOpening = JobOpening::find($id);
        $jobOpening->update($validatedData);
        JobOpeningQuestion::where('job_opening_id', $id)->delete();
        if ($request->questions) {
            $questions = json_decode($request->questions);
            foreach ($questions as $question) {
                JobOpeningQuestion::create(array_merge((array)$question, [
                    'recruiter_id' => $this->RecruiterID()->id,
                    'job_opening_id' => $jobOpening->id,
                ]));
            }
        }
        return response()->json($jobOpening, 201);
    }

    public function deleteJobOpening($id)
    {
        $jobOpening = JobOpening::find($id);
        JobOpeningQuestion::where('job_opening_id', $id)->delete();
        JobApplication::where('job_opening_id', $id)->delete(); //with relationship
        $jobOpening->delete();
        return response()->json($jobOpening, 200);
    }


    public function jobsSelect()
    {
        $id = $this->RecruiterID()->id;
        $profile = RecruiterProfile::where('recruiter_id', $id)->first();
        $query = JobOpening::select(["id", "title AS label"])->where('company_id', $profile->company_id)->get();
        return response()->json($query, 200);
    }


    public function jobApplicationsList(Request $request)
    {
        $id = $this->RecruiterID()->id;
        $jobOpeningIdFilter = $request->job_opening_id;
        $search = $request->search;
        $recruiter = RecruiterProfile::where('recruiter_id', $id)->first();
        $jobOpeningIds = JobOpening::where('company_id', $recruiter->company_id)->pluck('id');
        $query = JobApplication::with(['user',  'job'])->whereNotNull('status');

        if (!$jobOpeningIdFilter)
            $query->whereIn('job_opening_id', $jobOpeningIds);
        else
            $query->where('job_opening_id', $jobOpeningIdFilter);
        if ($search) {
            $query->whereHas('user', function ($query) use ($search) {
                $query->where('name', 'like', "%{$search}%");
            });
        }
        $applicants = $query->paginate($request->rowsPerPage);
        return $this->successMessage($applicants);
    }


    function jobApplicationDetails($jobApplicationId)
    {
        $jobApplication = JobApplication::with(['answers', 'cover_letter', 'resume',])->find($jobApplicationId);
        if ($jobApplication->is_viewed == 0) {
            try {
                $user = User::find($jobApplication->user_id);
                $user->notify(new JobApplicationViewedNotification([
                    'job_title' => $jobApplication->job->title,
                    'name' => $user->name,
                    'status' => $jobApplication->status,
                    'company' => $jobApplication->job->company->name,
                ]));
            } catch (\Throwable $th) {
            }
        }
        $jobApplication->update(['is_viewed' => 1]);
        $user = User::with(["experience",  "education", "profile", "portfolios"])
            ->find($jobApplication->user_id);
        $user['skills'] = $user->skill->each(function ($data) {
            $data["name"] = Skill::find($data['skill_id'])->name;
        });

        $job = JobOpening::with(["company", "jobType", "industry", "questions"])
            ->find($jobApplication->job_opening_id);

        $jobApplication->user = $user;
        $jobApplication->job = $job;

        return response()->json($jobApplication, 200);
    }


    public function jobApplicationStatusUpdate(Request $request)
    {
        $JobApplication = JobApplication::with('job')->find($request->job_application_id);
        $JobApplication->status = $request->status;
        $JobApplication->save();

        // save Notification
        NotificationsController::save(null, $JobApplication->user_id, 'JOB', 'Job Application Status', 'There is an update on your job application', $request->job_application_id);

        // Send Email
        try {
            $user = User::find($JobApplication->user_id);
            $user->notify(new JobApplicationStatusUpdateNotification([
                'job_title' => $JobApplication->job->title,
                'name' => $user->name,
                'status' => $JobApplication->status,
                'company' => $JobApplication->job->company->name,
            ]));
        } catch (\Throwable $th) {
            // throw $th;   
        }
        return response()->json($JobApplication, 200);
    }


    public function toggleJobStatus($id)
    {
        $jobOpening = JobOpening::find($id);
        $jobOpening->status = $jobOpening->status == '1' ? '0' : '1';
        $jobOpening->save();
        return response()->json($jobOpening, 200);
    }
}

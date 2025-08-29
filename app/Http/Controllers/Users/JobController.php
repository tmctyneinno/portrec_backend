<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Base\BaseController;
use App\Models\CountryCurrency;
use App\Models\Industry;
use App\Models\JobApplication;
use App\Models\JobFunction;
use App\Models\JobLevel;
use App\Models\JobOpening;
use App\Models\JobType;
use App\Models\FileUploadPath;
use App\Models\JobMode;
use App\Models\Qualification;
use App\Models\Skill;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class JobController extends BaseController
{
    public $jc = "jobs as total_jobs";

    private function filter($query, $table, $delimeter, $pointer = "id"): void
    {
        if ($delimeter)
            $query->whereHas($table, function ($query) use ($delimeter, $pointer) {
                // $query->whereIn($pointer, [$delimeter]);
                $query->whereIn($pointer, explode(',', $delimeter));
            });
    }


    public function showJobs(Request $request, $type = null, $id = null)
    {
        $query = JobOpening::with(["recruiter:id,name,email,phone", "company", "jobType", "industry", "level", "currency"]);

        if (!$type) {
            $jobType = $request->get("type_id");
            // $jobMode = $request->get("mode_id");
            $industry = $request->get("industry_id");
            $level = $request->get("level_id");
            $min = $request->get("min_salary");
            $max = $request->get("max_salary");

            if ($min & $max) {
                $query->where("min_salary", ">=", [$min])->where("max_salary", "<=", [$max]);
            }

            $this->filter($query, "jobType", $jobType);
            // $this->filter($query, "jobMode", $jobMode);
            $this->filter($query, "industry", $industry);
            $this->filter($query, "level", $level);

            // only Active Jobs
            $query->where('status', '0');


            $allJobs = $query->paginate(10);

            $allJobs->getCollection()->transform(function ($job) {
                $avatar = FileUploadPath::find($job?->company?->image);
                $job->image = $avatar?->url ?? $job->company->image;
                return $job;
            });


            // for development purpose only
            // $allJobs->getCollection()->transform(function ($data) {
            //     $category = Industry::where("id", $data->industry_id)->first(['name', 'id']);
            //     $data->category = $category;
            //     $data->company->country = Str::random(8);
            //     $data->company->city = Str::random(8);
            //     return $data;
            // });


            return $this->successMessage($allJobs);
        }

        if ($type === "similar" && $id) {
            $this->filter($query, "industry", $id);
            $similarJobs =  $query->inRandomOrder()->take(8)->get();

            // for devlopmwnt purpose only
            $similarJobs->each(function ($data) {
                $category = Industry::where("id", $data->industry_id)->first(['name', 'id']);
                $data->category = $category;
                $data->company->country = Str::random(8);
                $data->company->city = Str::random(8);
                return $data;
            });

            return $this->successMessage($similarJobs);
        }

        if ($type === "latest") {
            $latestJobs = $query->take(8)->latest()->get();

            $latestJobs->transform(function ($job) {
                $avatar = FileUploadPath::find($job?->company?->image);
                $job->image = $avatar?->url ?? $job->company->image;
                return $job;
            });

            // // this line is for development purpose only
            // $latestJobs->each(function ($data) {
            //     $category = Industry::where("id", $data->industry_id)->first(['name', 'id']);
            //     $data->category = $category;
            //     $data->company->country = Str::random(8);
            //     $data->company->city = Str::random(8);
            //     return $data;
            // });
            return $this->successMessage($latestJobs);
        }
    }

    public function jobIndustries($id = null)
    {
        if (!$id) {
            $categories = Industry::withCount('jobs as total_jobs')->get();
            return $this->successMessage($categories);
        }
        $categories = Industry::findorfail($id);
        $jobs = $categories->jobs()->paginate(10);
        return $this->successMessage([
            "category" => $categories,
            "jobs" => $jobs
        ]);
    }

    public function jobSkills($id = null)
    {
        if (!$id) {
            $skills = Skill::all();
            return $this->successMessage($skills);
        }
        $skills = Skill::findorfail($id);
        $jobs = $skills->jobs()->paginate(10);
        return $this->successMessage([
            "skills" => $skills,
            "jobs" => $jobs
        ]);
    }

    public function jobQualifications($id = null)
    {
        // return 'ddddd';
        if (!$id) {
            $data = Qualification::select('id', 'name', 'status')->get();
            return $this->successMessage($data);
        }
        $data = Qualification::findorfail($id);
        $jobs = $data->jobs()->paginate(10);
        return $this->successMessage([
            "qualifications" => $data,
            "jobs" => $jobs
        ]);
    }

    public function jobTypes($id = null)
    {
        if (!$id) {
            $jobTypes = JobType::withCount($this->jc)->get();
            return $this->successMessage($jobTypes);
        }
        $jobTypes = JobType::findorfail($id);
        $jobs = $jobTypes->jobs()->paginate(10);
        return $this->successMessage([
            "type" => $jobTypes,
            "jobs" => $jobs
        ]);
    }

    public function jobModes($id = null)
    {
        if (!$id) {
            $jobModes = JobMode::withCount($this->jc)->get();
            return $this->successMessage($jobModes);
        }
        $jobModes = JobMode::findorfail($id);
        $jobs = $jobModes->jobs()->paginate(10);
        return $this->successMessage([
            "modes" => $jobModes,
            "jobs" => $jobs
        ]);
    }

    public function jobFunctions($id = null)
    {
        if (!$id) {
            $jobFunc = JobFunction::withCount($this->jc)->get();
            return $this->successMessage($jobFunc);
        }

        $jobs = JobFunction::findorfail($id);
        $subJob = $jobs->jobs()->paginate(5);
        return  $this->successMessage([
            "sub_category" => $jobs,
            "jobs" => $subJob
        ]);
    }

    public function jobDetails(Request $request, $id)
    {
        // return $this->successMessage(AUTH::id());
        $job = JobOpening::where("id", $id)->with(["questions", "industry", "jobType", "company", "currency"])->first();
        $job->applications = JobApplication::where('job_opening_id', $id)->pluck('user_id');

        $avatar = FileUploadPath::find($job?->company?->image);
        $job->image = $avatar?->url ?? $job->company->image;

        // $category = Industry::where("id", $job->sub_category->id)->first(['name', 'id']);
        // $job->category = $category;
        // $job->company->city = Str::random(8);
        // $job->company->country = Str::random(8);
        return $this->successMessage($job);
    }

    public function jobSalaryRansge($from, $to)
    {
        if ($from > $to) return $this->errorMessage("min value cannot be greater than max value");
        $allJobs = JobOpening::with(["recruiter:id,name,email,phone", "company", "jobType", "industry"])->where("min_salary", "<", $from)->where("max_salary", ">", $to)->get();
        return $this->successMessage($allJobs);
    }

    public function jobLevels($id = null)
    {
        if (!$id) {
            $joblevel = JobLevel::withCount($this->jc)->get();
            return $this->successMessage($joblevel);
        }
        $joblevel = JobLevel::findorfail($id);
        $jobs = $joblevel->jobs()->paginate(10);
        return $this->successMessage([
            "type" => $joblevel,
            "jobs" => $jobs
        ]);
    }

    public function jobSearch(Request $request)
    {
        $title = $request->get("title");
        $location = $request->get("location");
        $query = JobOpening::with(["recruiter:id,name,email,phone", "company", "jobType", "industry", "currency"]);

        if ($title)
            $query->where("title", "like", "%" .  $title . "%");
        if ($location)
            $query->where("location",  "like",  "%" . $location . "%");

        $search = $query->paginate(10);


        $search->getCollection()->transform(function ($job) {
            $avatar = FileUploadPath::find($job?->company?->image);
            $job->image = $avatar?->url ?? $job->company->image;
            return $job;
        });

        return $this->successMessage($search);
    }


    public function getCountryCurrencies()
    {
        $currencies = CountryCurrency::all();
        return $this->successMessage($currencies);
    }
}

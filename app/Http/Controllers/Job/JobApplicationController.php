<?php

namespace App\Http\Controllers\Job;

use App\Dtos\CoverLetterUploadDto;
use App\Dtos\JobApplicationAnswerDto;
use App\Dtos\JobApplicationDto;
use App\Http\Controllers\Base\BaseController;
use App\Http\Requests\CoverLetterRequest;
use App\Http\Requests\JobApplicationAnswerRequest;
use App\Http\Requests\JobApplicationRequest;
use App\Http\Resources\JobApplicationResource;
use App\Interfaces\CoverLetterServiceInterface;
use App\Interfaces\JobApplicationAnswerServiceInterface;
use App\Interfaces\JobApplicationServiceInterface;
use Symfony\Component\HttpFoundation\Response;

class JobApplicationController extends BaseController
{
    public function __construct(
        public readonly JobApplicationServiceInterface $jobApplicationService,
        public readonly CoverLetterServiceInterface $coverLetterService,
        public readonly JobApplicationAnswerServiceInterface $jobApplicationAnswerService,
    ) {
    }

    public function apply(JobApplicationRequest $request)
    {
        $jobApplicationData = JobApplicationDto::fromRequest($request->validated());

        $jobApplication = $this->jobApplicationService->saveJobApplication($jobApplicationData);

        if (!$jobApplication) {
            return $this->errorMessage('We ran into an error while trying to handle your request, please try again', Response::HTTP_SERVICE_UNAVAILABLE);
        }

        return $this->successMessage(new JobApplicationResource($jobApplication));
    }

    public function uploadCoverLetter(CoverLetterRequest $request)
    {
        $coverLetterdata = CoverLetterUploadDto::fromRequest($request->validated());

        $coverLetter = $this->coverLetterService->saveCoverLetter($coverLetterdata);

        if (!$coverLetter) {
            return $this->errorMessage('We ran into an error while trying to handle your request, please try again', Response::HTTP_SERVICE_UNAVAILABLE);
        }

        $jobApplication = $this->jobApplicationService->findJobApplication($coverLetterdata->job_application_id);
        return $this->successMessage(new JobApplicationResource($jobApplication->load(['user'])));
    }

    public function uploadJobApplicationAnswers(JobApplicationAnswerRequest $request)
    {
        $jobApplicationAnswerData = JobApplicationAnswerDto::fromRequest($request->validated());

        $jobApplicationAnswers = $this->jobApplicationAnswerService->saveAnswers($jobApplicationAnswerData);

        if (!$jobApplicationAnswers) {
            return $this->errorMessage('We ran into an error while trying to handle your request, please try again', Response::HTTP_SERVICE_UNAVAILABLE);
        }

        $jobApplication = $this->jobApplicationService->findJobApplication($jobApplicationAnswerData->job_application_id);

        return $this->successMessage(
            new JobApplicationResource($jobApplication->load(['user', 'answers']))
        );
    }

    public function guestApply(JobApplicationRequest $request)
    {
        return $this->apply($request);
    }

    public function guestUploadCoverLetter(CoverLetterRequest $request)
    {
        return $this->uploadCoverLetter($request);
    }

    public function guestUploadJobApplicationAnswers(JobApplicationAnswerRequest $request)
    {
        return $this->uploadJobApplicationAnswers($request);
    }
}

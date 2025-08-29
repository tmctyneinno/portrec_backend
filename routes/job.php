<?php

use App\Http\Controllers\Users\Job\JobApplicationController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Users\JobController;

Route::middleware(['auth:sanctum'])->prefix('job')->group(function () {
    Route::post("apply", [JobApplicationController::class, 'apply']);
    Route::post("apply/cover-letter", [JobApplicationController::class, 'uploadCoverLetter']);
    Route::post("apply/answers", [JobApplicationController::class, 'uploadJobApplicationAnswers']);
    Route::post("user/applications", [JobApplicationController::class, 'myApplications']);
});

Route::controller(JobApplicationController::class)->prefix('job')->group(function () {
    Route::post('apply/guest', 'guestApply');
    Route::post('apply/cover-letter/guest', 'guestUploadCoverLetter');
    Route::post('apply/answers/guest', 'guestUploadJobApplicationAnswers');
});


Route::controller(JobController::class)->prefix('job')->group(function () {
    Route::get("all/{type?}/{id?}", "showJobs");
    Route::get("industries/{id?}",  "jobIndustries");
    Route::get("skills/{id?}",  "jobSkills");
    Route::get("types/{id?}",  "jobTypes");
    Route::get("modes/{id?}",  "jobModes");
    Route::get("levels/{id?}", "jobLevels");
    Route::get("functions/{id?}",  "jobFunctions");
    Route::get("currencies",  "getCountryCurrencies");
    Route::get("qualifications/{id?}", "jobQualifications");
    Route::get("salary/{from}/{to}", "jobSalaryRansge");
    Route::get("search", "jobSearch");
    Route::get("/{id}",  "jobDetails");
});

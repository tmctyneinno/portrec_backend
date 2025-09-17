<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RecruiterAuthController;
use App\Http\Controllers\Recruiters\DashboardController;
use App\Http\Controllers\NotificationsController;
use App\Http\Controllers\Recruiters\{
    JobController,
    ProfileController,
    CompanyController,
    ScheduleInterview,
    UserController
};

Route::prefix("recruiter")->group(function () {
    Route::post("signup", [RecruiterAuthController::class, "signup"]);
    Route::post("login", [RecruiterAuthController::class, "signin"]);
    Route::post("login-google", [RecruiterAuthController::class, "signinWithGoogle"])->name('signinWithGoogle');

    Route::middleware(['auth:sanctum'])->group(function () {
        Route::get("profile", [ProfileController::class, "myProfile"]);
        Route::post("password", [ProfileController::class, "updatePassword"]);
        Route::post("profile/update", [ProfileController::class, "updateProfile"]);
        Route::post("profile/picture", [ProfileController::class, "uploadProfileImage"]);
        // Jobs
        Route::post("job/list", [JobController::class, "showJobs"]);
        Route::get("job/listAll", [JobController::class, "showJobsAll"]);
        Route::get("jobs/select", [JobController::class, "jobsSelect"]);
        Route::post("job/post", [JobController::class, "postJobOpening"]);
        Route::post("job/update/{id}", [JobController::class, "updateJobOpening"]);
        Route::delete("job/delete/{id}", [JobController::class, "deleteJobOpening"]);
        Route::post("job/applications", [JobController::class, "jobApplicationsList"]);
        Route::get("job/application/{id}", [JobController::class, "jobApplicationDetails"]);
        Route::post("job/application/status/update", [JobController::class, "jobApplicationStatusUpdate"]);
        Route::get("job/toggle-status/{id}", [JobController::class, "toggleJobStatus"]);


        Route::get("company/info", [CompanyController::class, "companyInformation"]);
        // Route::post("company/create", [CompanyController::class, "createCompany"]);
        Route::post("company/update", [CompanyController::class, "updateCompany"]);
        Route::post("company/image", [CompanyController::class, "uploadImage"]);
        Route::get("company/resources", [CompanyController::class, "companyResourses"]);
        Route::get("notifications/recruiter", [NotificationsController::class, "unread"]);

        Route::get("dashboard/recruiter/info", [DashboardController::class, "recruiterInfo"]);
        Route::get("get/user/profile/{id}", [UserController::class, 'getUserProfile']);
    });
});


// Route::get("profile", function () {
// 	return "hello";
// })->middleware(["auth:recruiter", "recruiter.auth"]);

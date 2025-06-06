<?php

namespace App\routes;

use App\Http\Controllers\Auth\UserAuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Users\ProfileController;
use App\Http\Controllers\Users\CoverLetterController;
use App\Http\Controllers\Users\DashboardController as UsersDashboardController;
use App\Http\Controllers\Users\EducationController;
use App\Http\Controllers\Users\InterviewProcess;
use App\Http\Controllers\Users\PortolioController;
use App\Http\Controllers\Users\ResumeController;
use App\Http\Controllers\Users\SkillController;
use App\Http\Controllers\Users\WorkExperienceController;
use Illuminate\Support\Facades\Route;


Route::prefix("user")->group(function () {
    Route::post("signup", [UserAuthController::class, "signup"]);
    Route::post("login", [UserAuthController::class, "signin"])->name('login');
    Route::post("login-google", [UserAuthController::class, "signinWithGoogle"])->name('signinWithGoogle');
    Route::middleware(["auth:sanctum", "login",])->group(function () {

        Route::controller(ProfileController::class)->group(function () {
            Route::get("profile",  "myProfile");
            Route::post("profile/update",  "updateProfile");
            Route::post("profile/picture", "uploadProfileImage");
            Route::post("profile/picture/{id}", "uploadProfileImage");
            Route::put("password", "updatePassword");
        });

        Route::controller(SkillController::class)->group(function () {
            Route::post("skill", "skill");
            Route::delete("skill/{id}",  "deleteSkill");
            Route::get("skill", "getSkills");
        });

        Route::controller(EducationController::class)->group(function () {
            Route::post("education",  "education");
            Route::put("education/{id}",  "updateEducation");
            Route::delete("education/{id}", "deleteEducation");
        });


        Route::prefix('resume')->controller(ResumeController::class)->group(function () {
            Route::post("/", "uploadResume");
            Route::patch('/{id}', 'setDefaultResume');
            Route::delete("/{id}", "deleteResume");
        });

        Route::prefix('cover-letter')->controller(CoverLetterController::class)->group(function () {
            Route::post("/", "writeCoverLetter");
            Route::put("/{id}", "updateCoverLetter");
            Route::patch("/{id}", "setDefaultCoverLetter");
            Route::delete("/{id}", "deleteCoverLetter");
            Route::post("/upload", "uploadCoverLetter");
        });

        Route::controller(WorkExperienceController::class)->group(function () {
            Route::post("experience",  "workExperience");
            Route::put("experience/{id}", "updateExperience");
            Route::delete("experience/{id}",  "deleteExperience");
        });
        Route::get("dashboard/info", [UsersDashboardController::class, "userInfo"]);

        Route::controller(PortolioController::class)->group(function () {
            Route::post("add/portfolio",  "Addportfolio");
            Route::get("get/user/portfolio",  "getUserPortfolio");
            Route::get("portfolio/details/{id}",  "getPortfolio");
            Route::post("portfolio/update/{id}",  "updatePortfolio");
            Route::post("portfolio/delete/{id}", "deletePortfolio");
            Route::post("portfolio/add/image", "AddPortfolioImage");
            Route::post("portfolio/delete/image/{id}",  "deletePortfolioImage");
        });

        Route::controller(InterviewProcess::class)->group(function () {
            Route::get('get/interviews', 'getUserInterview');
        });
    });
});

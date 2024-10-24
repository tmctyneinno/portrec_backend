<?php

use App\Http\Controllers\Auth\RecruiterAuthController;
use App\Http\Controllers\Auth\UserAuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\NotificationsController;
use App\Http\Controllers\Users\{
    CvBuilderController,
    FuncsController,
    JobController,
    MessageController,
    SkillController,
    CoverLetterController,
    EducationController,
    JobApplicationController,
    ResumeController,
    WorkExperienceController,
    PortolioController,
    ProfileController,
    UserProfileController,
    CompanyController
};

use Illuminate\Support\Facades\Route;



/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::prefix("user")->group(function () {
    Route::post("signup", [UserAuthController::class, "signup"]);
    Route::post("login", [UserAuthController::class, "signin"])->name('login');
    Route::middleware(["auth:sanctum", "login",])->group(function () {
        Route::get("profile", [ProfileController::class, "myProfile"]);
        Route::post("profile/update", [ProfileController::class, "updateProfile"]);
        Route::post("profile/picture", [ProfileController::class, "uploadProfileImage"]);
        Route::post("profile/picture/{id}", [ProfileController::class, "uploadProfileImage"]);
        Route::put("password", [ProfileController::class, "updatePassword"]);

        Route::post("skill", [SkillController::class, "skill"]);
        Route::delete("skill/{id}", [SkillController::class, "deleteSkill"]);
        Route::get("skill", [SkillController::class, "getSkills"]);

        Route::post("education", [EducationController::class, "education"]);
        Route::put("education/{id}", [EducationController::class, "updateEducation"]);
        Route::delete("education/{id}", [EducationController::class, "deleteEducation"]);

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

        Route::post("experience", [WorkExperienceController::class, "workExperience"]);
        Route::put("experience/{id}", [WorkExperienceController::class, "updateExperience"]);
        Route::delete("experience/{id}", [WorkExperienceController::class, "deleteExperience"]);

        Route::post("portfolio", [PortolioController::class, "portfolio"]);
        Route::get("portfolio", [PortolioController::class, "getPortfolio"]);
        Route::put("portfolio/{id}", [PortolioController::class, "updatePortfolio"]);
        Route::delete("portfolio/{id}", [PortolioController::class, "deletePortfolio"]);
        Route::post("portfolio/image", [PortolioController::class, "uploadProjectImage"]);
        Route::delete("portfolio/image/{id}", [PortolioController::class, "deletePortfolioImage"]);

        // Route::get("jobs/{id?}", [JobApplicationController::class, "myApplication"]);
    });
});

Route::middleware(['auth:sanctum'])->group(function () {
    Route::prefix('messages')->controller(MessageController::class)->group(function () {
        Route::post('/', 'store');
        Route::get('/', 'index');
        Route::get('/count', 'messagesCount');
        Route::put('/{conversationId}/mark-read', 'markAsRead');
        Route::get('/{conversationId}', 'show');
        Route::delete('/{id}', 'destroy');
    });

    Route::prefix('cv')->group(function () {
        Route::get('/', []);
        Route::post('from-profile', [CvBuilderController::class, 'fromProfile']);
        Route::post('user/build/profile', [CvBuilderController::class, 'fromCv']);
    });

    // notifications
    Route::get("notifications/user", [NotificationsController::class, "unread"]);

    Route::get("dashboard/user/info", [DashboardController::class, "userInfo"]);
});

Route::get("skills", [SkillController::class, "getSkill"]);


Route::controller(CompanyController::class)->group(function () {
    Route::get('companies/{type?}/{param?}', 'Index');
    Route::get('company/details/{company_id}', 'CompanyDetails');
});

Route::get("notification/read/{id}", [NotificationsController::class, "read"]);


require __DIR__ . '/recruiter.php';

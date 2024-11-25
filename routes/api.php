<?php
use App\Http\Controllers\Users\{
    SkillController,
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



Route::middleware(['auth:sanctum'])->group(function () {
    __DIR__.'/cvBuilder.php';
    __DIR__.'/cvBuilder.php';
    __DIR__.'/userMessages.php';
    __DIR__.'/userNotification.php';
});


require __DIR__ . '/recruiter.php';

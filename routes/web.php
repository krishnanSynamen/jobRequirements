<?php

use App\Http\Controllers\ApplicationFormController;
use App\Http\Controllers\JobDetailsController;
use App\Http\Controllers\LoginController;
use App\Models\Image;
use App\Models\JobDetails;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', [JobDetailsController::class, 'getJobDetails']);
Route::get('/', function(){
    // $jobDetails = JobDetails::jobJobDetails();
    // return view('/JobLists', ['jobData' => $jobDetails]);
    $user = Image::find(2);
    print_r($user->image->toArray());
});

// Route::get('/jobList', function () {
//     return view('JobLists');
// });

// Route::get('/jobForm', function () {
//     return view('ApplicationForm');
// });

Route::get('/loginForm', function () {
    return view('LoginForm');
})->name('login');

Route::controller(ApplicationFormController::class)->group(function(){
    Route::post('store', 'storeData');
});

Route::middleware('auth')->controller(ApplicationFormController::class)->group(function(){
    Route::get('applicationData', 'applicationData');
    Route::get('downloadresume/{resume}', 'downloadResume');
    Route::get('/status/{status}/user/{id}', 'statusUpdate');
    Route::get('logout', 'logout');
});

Route::controller(LoginController::class)->group(function(){
    Route::post('login', 'login');
});

Route::get('/jobFields', function(){
    return view('JobRequirements');
});

Route::prefix('jobDetails')->controller(JobDetailsController::class)->group(function(){
    Route::post('store', 'storeJobDetails');
    Route::get('selectedJob/{jobId}', 'getSelectedJob');
    Route::get('removeJob/{jobId}', 'removeSelectedJob');
});
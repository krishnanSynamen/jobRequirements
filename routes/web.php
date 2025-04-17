<?php

use App\Http\Controllers\AddJobController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ApplicationFormController;
use App\Http\Controllers\JobDetailsController;
use App\Http\Controllers\LoginController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\UserMiddleware;
use App\Models\CareerJobs;
use App\Models\JobDetails;
use App\Models\Skill;
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
Route::get('/loginForm', function(){
    return view('LoginForm');
})->name('login');

Route::get('/', [AddJobController::class, 'getJob']);


Route::prefix('user')->group(function() {
    Route::get('/registerForm', function(){
        return view('/frontend/screens/register');
    });
    Route::get('/login', fn() => view('/frontend/screens/login'));
    Route::post('/register', [LoginController::class, 'register']);
    Route::post('/login', [LoginController::class, 'authenticate']);

    Route::middleware(UserMiddleware::class)->group(function() {
        Route::get('/selectedJob/{job}/job/{id}', [AddJobController::class, 'selectedJob']);
        Route::post('/store', [AddJobController::class, 'storeJob']);
        Route::get('/trackApplication/{id}', [AddJobController::class, 'trackStatus']);

        Route::controller(LoginController::class)->group(function() {
            Route::get('/logout', 'logout');
        });
    });
});



Route::prefix('admin')->group(function () {
    
    Route::get('/', fn () => view('admin.Login'))->name('admin');
    Route::post('login', [AdminController::class, 'login']);

    Route::middleware(AdminMiddleware::class)->group(function() {
        Route::get('dashboard/{id?}', [AddJobController::class, 'getJob']);
        Route::get('/appliedJobs', [AddJobController::class, 'getAppliedJobs']);
        Route::get('/changeStatus/{id}', [AddJobController::class, 'changeStatus']);
        Route::get('/showJob/{id}', [AddJobController::class, 'showJob']);
        Route::get('/addJobForm', fn() => view('/admin/screens/jobs/create'));
        Route::get('/edit/{id}', [AddJobController::class, 'edit']);
        Route::post('/addJob/{id?}', [AddJobController::class, 'addJob']);
        Route::get('closeJob/{id}', [AddJobController::class, 'closeJob']);
        Route::get('/logout', [LoginController::class, 'logout']);
    });
});
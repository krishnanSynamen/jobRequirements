<?php

use App\Http\Controllers\AddJobController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\UserMiddleware;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
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

    Route::middleware('guest')->group(function() {
        Route::get('/registerForm', function(){
            return view('/frontend/screens/register');
        });
        Route::get('/login', fn() => view('/frontend/screens/login'));
    });

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
    
    Route::get('/', fn () => view('admin.Login'))->middleware('guest')->name('admin');
    Route::post('login', [AdminController::class, 'login']);

    Route::middleware(AdminMiddleware::class)->group(function() {
        Route::get('/addJobForm', fn() => view('/admin/screens/jobs/create'));

        Route::controller(AddJobController::class)->group(function() {
            Route::get('dashboard/{id?}', 'getJob');
            Route::get('/appliedJobs', 'getAppliedJobs');
            Route::get('/changeStatus/{id}', 'changeStatus');
            Route::get('/showJob/{id}', 'showJob');
            Route::get('/edit/{id}', 'edit');
            Route::post('/addJob/{id?}', 'addJob');
            Route::get('closeJob/{id}', 'closeJob');
        });
        Route::get('/logout', [LoginController::class, 'logout']);
    });
});
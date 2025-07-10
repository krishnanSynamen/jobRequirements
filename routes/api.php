<?php

use App\Http\Controllers\LoginController;
use Illuminate\Http\Request;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::controller(LoginController::class)->group(function () {
    Route::post('logindetails', 'storeApiLogin')->name('api.login.store');
    Route::get('userDetails', 'userDetails')->name('api.userDetails');
    Route::delete('deleteUser/{userId}', 'deleteUser')->name('api.deleteUser');
    Route::put('editUser/{userId}', 'editUser')->name('api.editUser');
});

<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HotelController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\Auth\AuthController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::controller(AuthController::class)->group(function () {
    Route::post('login', 'login')->name('login');
    Route::post('register', 'register')->name('register');
    Route::post('logout', 'logout')->name('logout');
});

Route::controller(HotelController::class)->group(function () {
    Route::get('hotel', 'index')->name('hotel');
    Route::post('hotel', 'store');
    Route::get('hotel/{id}', 'show');
    Route::post('hotel/{id}', 'update');
    Route::delete('hotel/{id}', 'destroy');
});

Route::controller(RoomController::class)->group(function () {
    Route::get('room', 'index');
    Route::post('room', 'store');
    Route::get('room/{id}', 'show');
    Route::post('room/{id}', 'update');
    Route::delete('room/{id}', 'destroy');
});

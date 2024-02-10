<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HotelController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\AgentController;
use App\Http\Controllers\RekeningController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\BookingDetailController;
use App\Http\Controllers\PaymentController;
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
// auth
Route::controller(AuthController::class)->group(function () {
    Route::post('login', 'login')->name('login');
    Route::post('register', 'register')->name('register');
    Route::post('logout', 'logout')->name('logout');
    Route::post('refresh', 'refresh')->name('refresh');
    Route::get('user-profile', 'userProfile')->name('userProfile');
});
// hotel
Route::controller(HotelController::class)->group(function () {
    Route::get('hotel', 'index')->name('hotel');
    Route::post('hotel', 'store');
    Route::get('hotel/{id}', 'show');
    Route::post('hotel/{id}', 'update');
    Route::delete('hotel/{id}', 'destroy');
});
// room
Route::controller(RoomController::class)->group(function () {
    Route::get('room', 'index')->name('room');
    Route::post('room', 'store');
    Route::get('room/{id}', 'show');
    Route::post('room/{id}', 'update');
    Route::delete('room/{id}', 'destroy');
});
// agent
Route::controller(AgentController::class)->group(function () {
    Route::get('agent', 'index')->name('agent');
    Route::post('agent', 'store');
    Route::get('agent/{id}', 'show');
    Route::post('agent/{id}', 'update');
    Route::delete('agent/{id}', 'destroy');
});
// rekening
Route::controller(RekeningController::class)->group(function () {
    Route::get('rekening', 'index')->name('rekening');
    Route::post('rekening', 'store');
    Route::get('rekening/{id}', 'show');
    Route::post('rekening/{id}', 'update');
    Route::delete('rekening/{id}', 'destroy');
});
// booking
Route::controller(BookingController::class)->group(function () {
    Route::get('booking', 'index')->name('booking');
    Route::post('booking', 'store');
    Route::get('booking/{id}', 'show');
    Route::post('booking/{id}', 'update');
    Route::delete('booking/{id}', 'destroy');
});
// booking detail
Route::controller(BookingDetailController::class)->group(function () {
    Route::get('booking_d', 'index')->name('booking_d');
    Route::post('booking_d', 'store');
    Route::get('booking_d/{id}', 'show');
    Route::get('booking_d_inv/{id}', 'showInv')->name('booking_d_inv');
    Route::post('booking_d/{id}', 'update');
    Route::delete('booking_d/{id}', 'destroy');
});
// payment
Route::controller(PaymentController::class)->group(function () {
    Route::get('payment', 'index')->name('payment');
    Route::post('payment', 'store');
    Route::get('payment/{id}', 'show');
    Route::get('payment_inv/{id}', 'showInv')->name('payment_inv');
    Route::post('payment/{id}', 'update');
    Route::delete('payment/{id}', 'destroy');
});

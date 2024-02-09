<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('page/login');
});

Route::prefix('pages')->name('p.')->group(function () {
    Route::get('signin', [PagesController::class, 'signin'])->name('signin');
    Route::get('dash', [PagesController::class, 'dash'])->name('dash');
    Route::get('hotel', [PagesController::class, 'hotel'])->name('hotel');
    Route::get('hotel/tambah', [PagesController::class, 'tambahHotel'])->name('hotel.tambah');
    Route::get('hotel/edit/{id}', [PagesController::class, 'editHotel'])->name('hotel.edit');
    Route::get('room', [PagesController::class, 'room'])->name('room');
    Route::get('room/tambah', [PagesController::class, 'tambahRoom'])->name('room.tambah');
    Route::get('room/edit/{id}', [PagesController::class, 'editRoom'])->name('room.edit');
    Route::get('agent', [PagesController::class, 'agent'])->name('agent');
    Route::get('agent/tambah', [PagesController::class, 'tambahAgent'])->name('agent.tambah');
    Route::get('agent/edit/{id}', [PagesController::class, 'editAgent'])->name('agent.edit');
    Route::get('rekening', [PagesController::class, 'rekening'])->name('rekening');
    Route::get('rekening/tambah', [PagesController::class, 'tambahRekening'])->name('rekening.tambah');
    Route::get('rekening/edit/{id}', [PagesController::class, 'editRekening'])->name('rekening.edit');
    Route::get('booking', [PagesController::class, 'booking'])->name('booking');
    Route::get('booking/tambah', [PagesController::class, 'tambahBooking'])->name('booking.tambah');
    Route::get('booking/edit/{id}', [PagesController::class, 'editBooking'])->name('booking.edit');
});

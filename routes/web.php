<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
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

// Route::get('/signin', [PagesController::class, 'signin'])->name('signin');
// Route::get('/dash', [PagesController::class, 'dash'])->name('dash');
// Route::get('/hotel', [PagesController::class, 'hotel'])->name('hotel');
// Route::get('/room', [PagesController::class, 'room'])->name('room');

Route::get('/pages/signin', [PagesController::class, 'signin'])->name('p.signin');
Route::get('/pages/dash', [PagesController::class, 'dash'])->name('p.dash');
Route::get('/pages/hotel', [PagesController::class, 'hotel'])->name('p.hotel');
Route::get('/pages/hotel/tambah', [PagesController::class, 'tambahHotel'])->name('p.hotel.tambah');
Route::get('/pages/hotel/edit', [PagesController::class, 'editHotel'])->name('p.hotel.edit');
Route::get('/pages/room', [PagesController::class, 'room'])->name('p.room');
Route::get('/pages/room/tambah', [PagesController::class, 'tambahRoom'])->name('p.room');

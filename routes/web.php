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
});

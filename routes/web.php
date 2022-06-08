<?php

use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\Lomba\LombaController;
use App\Http\Controllers\Rekrutmen\RekrutmenController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\User\UserDashboardController;
use Illuminate\Support\Facades\Route;

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

// landing page
Route::get('/', [LandingPageController::class, 'index'])->name('landing_page');

Route::group(['prefix'=>'profil'], function () {
    Route::get('/{user}', [UserController::class, 'profile'])->name('public_profil');
});


// rute group dashboard
Route::group(['prefix'=> 'dashboard', 'middleware'=>'auth'], function () {
    Route::view('/', 'dashboard')->name('dashboard');
    Route::get('/profile', [UserDashboardController::class, 'profile'])->name('profile');
    Route::get('/rekrutmen', [UserDashboardController::class, 'rekrutmen'])->name('rekrutmen');
    Route::get('/rekrutmen/{rekrutmen}', [UserDashboardController::class, 'pengumuman_rekrutmen'])->name('detail_rekrutmen_user');

    Route::get('/edit', [UserController::class, 'edit'])->name('edit_profil');
    Route::post('/edit', [UserController::class, 'update'])->name('update_profil');

    Route::get('/add-prestasi', [UserController::class, 'addPrestasi'])->name('add_prestasi');
    Route::post('/add-prestasi', [UserController::class, 'storePrestasi'])->name('store_prestasi');
});

Route::group(['prefix'=>'lomba'], function() {
   Route::get('/', [LombaController::class, 'daftar_lomba'])->name('daftar_lomba');

   Route::middleware('auth')->group(function() {
       Route::view('/add', 'lomba.create')->name('add_lomba');
       Route::post('/add', [LombaController::class, 'store'])->name('store_lomba');
       Route::get('/edit/{lomba}', [LombaController::class, 'edit'])->name('edit_lomba');
       Route::put('/edit/{lomba}', [LombaController::class, 'update'])->name('update_lomba');
       Route::delete('/delete/{lomba}', [LombaController::class, 'delete'])->name('delete_lomba');
   });

    Route::get('/{lomba}', [LombaController::class, 'detail_lomba'])->name('detail_lomba');
});

Route::group(['prefix'=>'rekrutmen'], function() {
   Route::get('/', [RekrutmenController::class, 'daftar_rekrutmen'])->name('daftar_rekrutmen');
   Route::get('{rekrutmen}', [RekrutmenController::class, 'detail_rekrutmen'])->name('detail_rekrutmen');

   Route::middleware('auth')->group(function() {
       Route::get('/add/{lomba}', [RekrutmenController::class, 'add'])->name('add_rekrutmen');
       Route::post('/add/{lomba}', [RekrutmenController::class, 'store'])->name('store_rekrutmen');

       Route::get('/edit/{rekrutmen}', [RekrutmenController::class, 'edit'])->name('edit_rekrutmen');
       Route::put('/edit/{rekrutmen}', [RekrutmenController::class, 'update'])->name('update_rekrutmen');

       Route::delete('/delete/{rekrutmen}', [RekrutmenController::class, 'delete'])->name('delete_rekrutmen');
   });
});

// Auth Routes
require __DIR__.'/auth.php';

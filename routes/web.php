<?php

use App\Http\Controllers\Lomba\LombaController;
use App\Http\Controllers\Rekrutmen\RekrutmenController;
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
Route::view('/', 'welcome');

// rute group dashboard
Route::group(['prefix'=> 'dashboard', 'middleware'=>'auth'], function () {
    Route::view('/', 'dashboard')->name('dashboard');
    Route::get('/profile', [UserDashboardController::class, 'profile'])->name('profile');
    Route::get('/rekrutmen', [UserDashboardController::class, 'rekrutmen'])->name('rekrutmen');
    Route::get('/rekrutmen/{id}', [UserDashboardController::class, 'detail_rekrutmen'])->name('detail_rekrutmen');
});

Route::group(['prefix'=>'lomba'], function() {
   Route::get('/', [LombaController::class, 'daftar_lomba'])->name('daftar_lomba');

   Route::middleware('auth')->group(function() {
       Route::view('/add', 'lomba.add')->name('add_lomba');
       Route::post('/add', [LombaController::class, 'store'])->name('store_lomba');
       Route::get('/edit/{id}', [LombaController::class, 'edit'])->name('edit_lomba');
       Route::post('/edit/{id}', [LombaController::class, 'update'])->name('update_lomba');
       Route::get('/delete/{id}', [LombaController::class, 'delete'])->name('delete_lomba');
   });

    Route::get('/{id}', [LombaController::class, 'detail_lomba'])->name('detail_lomba');
});

Route::group(['prefix'=>'rekrutmen'], function() {
   Route::get('/', [RekrutmenController::class, 'daftar_rekrutmen'])->name('daftar_rekrutmen');

   Route::middleware('auth')->group(function() {
       Route::get('/add/{idLomba}', [RekrutmenController::class, 'add'])->name('add_rekrutmen');
       Route::post('/add', [RekrutmenController::class, 'store'])->name('store_rekrutmen');

       Route::get('/edit/{id}', [RekrutmenController::class, 'edit'])->name('edit_rekrutmen');
       Route::post('/edit/{id}', [RekrutmenController::class, 'update'])->name('update_rekrutmen');

       Route::get('/delete/{id}', [RekrutmenController::class, 'delete'])->name('delete_rekrutmen');
   });
});

// Auth Routes
require __DIR__.'/auth.php';

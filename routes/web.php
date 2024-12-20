<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PlaceController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TouristInfoController;
use App\Http\Controllers\MapController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\InformasiController;




use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;




Route::resource('places', PlaceController::class);
Route::resource('tourist_info', TouristInfoController::class);
Route::get('/', [HomeController::class, 'index'])->name('home.index');
Route::get('/informasi', [InformasiController::class, 'index'])->name('informasi.index');
Route::get('/map', [MapController::class, 'index'])->name('map.index');
Route::get('/login', [AuthController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'authenticate']);
Route::post('/logout', [AuthController::class, 'logout']);
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware('auth');



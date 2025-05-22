<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\ReservationController;

Route::get('/', [HomeController::class, 'index'])->name('dashboard');
Route::get('/login', [AuthController::class, 'showLoginForm']);
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/dashboard', [DashboardController::class, 'index']);
Route::get('/reservation', [ReservationController::class, 'showForm'])->name('reservation.form');
Route::post('/reservation', [ReservationController::class, 'submit'])->name('reservation.submit');
Route::get('/feedback', [FeedbackController::class, 'index'])->name('feedback.form');
Route::post('/feedback', [FeedbackController::class, 'store']);
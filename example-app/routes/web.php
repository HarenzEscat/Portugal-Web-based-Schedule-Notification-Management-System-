<?php

use Illuminate\Support\Facades\Route;

//admin controllers
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\UserProfileController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


//admin navigations
Route::view('/', 'dashboard')->name('dashboard');

Route::view('/schedule', 'schedule')->name('schedule');
Route::get('/schedule', [ScheduleController::class, 'index'])->name('schedule');
Route::post('/schedule', [ScheduleController::class, 'store'])->name('schedule.store');
Route::delete('/schedule/{id}', [ScheduleController::class, 'destroy'])->name('schedule.destroy');

Route::get('/notifications', [NotificationController::class, 'index'])->name('notifications');
Route::post('/notifications', [NotificationController::class, 'store'])->name('notifications.store');
Route::get('/notifications/{id}/edit', [NotificationController::class, 'edit'])->name('notifications.edit');
Route::put('/notifications/{id}', [NotificationController::class, 'update'])->name('notifications.update');
Route::delete('/notifications/{id}', [NotificationController::class, 'destroy'])->name('notifications.destroy');

Route::get('/profiles', [UserProfileController::class, 'index'])->name('profiles');
Route::get('/profiles/create', [UserProfileController::class, 'create'])->name('profiles.create');
Route::post('/profiles', [UserProfileController::class, 'store'])->name('profiles.store');
Route::get('/profiles/{id}/edit', [UserProfileController::class, 'edit'])->name('profiles.edit');
Route::put('/profiles/{id}', [UserProfileController::class, 'update'])->name('profiles.update');
Route::delete('/profiles/{id}', [UserProfileController::class, 'destroy'])->name('profiles.destroy');




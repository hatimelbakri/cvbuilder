<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\backend\backendController;
use App\Http\Controllers\frontend\frontendController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/', [frontendController::class, 'index']);


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/user/cv', [backendController::class, 'Usercv'])->name('usercv');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::controller(backendController::class)->group(function () {
    //Route::get('/user/cv', [backendController::class, 'Usercv'])->name('usercv');
    Route::post('/user/logout', [AuthenticatedSessionController::class, 'userLogout'])->name('user.logout');
});

require __DIR__.'/auth.php';
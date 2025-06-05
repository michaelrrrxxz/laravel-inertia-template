<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;


Route::group(['middleware' => ['sleep','auth','preventBackHistory']], function () {
        Route::resource('users',UserController::class);
        Route::resource('settings',SettingController::class);
        Route::resource('dashboard', DashboardController::class);
});


Route::middleware('auth')->group(function () {
    Route::get('profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
require __DIR__.'/auth.php';

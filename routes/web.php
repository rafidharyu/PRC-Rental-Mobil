<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\CarController;
use App\Http\Controllers\Backend\EventController;

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('panel')->middleware('auth')->group(function() {
    Route::get('/dashboard', function () {
        return view('backend.dashboard.index');
    })->name('panel.dashboard');

    Route::resource('car', CarController::class)->names('panel.car');
    Route::resource('event', EventController::class)->names('panel.event');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

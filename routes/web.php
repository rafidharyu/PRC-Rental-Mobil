<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\CarController;
use App\Http\Controllers\Backend\EventController;
use App\Http\Controllers\Frontend\MainController;
use App\Http\Controllers\Frontend\BookingController;
use App\Http\Controllers\Backend\TransactionController;


Route::get('/', [MainController::class, 'index'])->name('index');
Route::get('/about', [MainController::class, 'about'])->name('about');
Route::get('/service', [MainController::class, 'service'])->name('service');
Route::get('/blog', [MainController::class, 'blog'])->name('blog');
Route::get('/contact', [MainController::class, 'contact'])->name('contact');
Route::get('/feature', [MainController::class, 'feature'])->name('feature');
Route::get('/car', [MainController::class, 'car'])->name('car');
Route::get('/testimonial', [MainController::class, 'testimonial'])->name('testimonial');

Route::post('booking', [BookingController::class, 'store'])->name('book.attempt');

Route::prefix('panel')->middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        return view('backend.dashboard.index');
    })->name('panel.dashboard');

    Route::resource('car', CarController::class)->names('panel.car');
    Route::resource('event', EventController::class)->names('panel.event');
    Route::resource('transaction', TransactionController::class)
    ->except(['create', 'store'])
    ->names('panel.transaction');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\OperatorMiddleware;
use App\Http\Controllers\Backend\CarController;
use App\Http\Controllers\Backend\EventController;
use App\Http\Controllers\Frontend\MainController;
use App\Http\Controllers\Backend\ReviewController;
use App\Http\Controllers\Auth\GoogleAuthController;
use App\Http\Controllers\Frontend\BookingController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\TransactionController;
use App\Http\Controllers\Backend\OperatorActivationController;
use App\Http\Controllers\Frontend\ReviewController as FrontReviewController;


Route::get('/', [MainController::class, 'index'])->name('index');
Route::get('/about', [MainController::class, 'about'])->name('about');
Route::get('/service', [MainController::class, 'service'])->name('service');
Route::get('/blog', [MainController::class, 'blog'])->name('blog');
Route::get('/contact', [MainController::class, 'contact'])->name('contact');
Route::get('/feature', [MainController::class, 'feature'])->name('feature');
Route::get('/car', [MainController::class, 'car'])->name('car');
Route::get('/testimonial', [MainController::class, 'testimonial'])->name('testimonial');

// Google OAuth Routes
Route::get('auth/google', [GoogleAuthController::class, 'redirect'])->name('google-auth');
Route::get('auth/google/callback', [GoogleAuthController::class, 'callbackGoogle']);

Route::post('home', [BookingController::class, 'store'])->name('book.attempt');
Route::post('testimonial', [FrontReviewController::class, 'store'])->name('testimonial.attempt');

Route::get('operator/inactive', [OperatorActivationController::class, 'showInactiveAccountPage'])->name('operator.inactive');

// Route::prefix('panel')->middleware('auth')->group(function () {
// // Routes for the backend panel, protected by authentication and operator middleware
Route::prefix('panel')->middleware(['auth', OperatorMiddleware::class])->group(function () {

    Route::get('dashboard', [DashboardController::class, 'index'])->name('panel.dashboard');

    Route::resource('car', CarController::class)->names('panel.car');
    Route::resource('event', EventController::class)->names('panel.event');
    Route::resource('operator', OperatorActivationController::class)->names('panel.operator');

    Route::resource('transaction', TransactionController::class)
        ->except(['create', 'store'])
        ->names('panel.transaction');
    Route::post('transaction/download', [TransactionController::class, 'download'])->name('panel.transaction.download');

    Route::resource('review', ReviewController::class)
        // ->only('index', 'show', 'destroy')
        ->names('panel.review');

    // Operator-specific routes
    Route::get('operators/serverside', [OperatorActivationController::class, 'serverside'])->name('backend.operators.serverside');
    Route::post('operators/status', [OperatorActivationController::class, 'status'])->name('backend.operators.status');
    Route::post('/operator', [OperatorActivationController::class, 'store'])->name('panel.operator.store');


    // Resource routes for managing operators
    Route::resource('operators', OperatorActivationController::class)
        ->only(['index', 'create', 'store', 'show', 'edit', 'update', 'destroy'])
        ->names('backend.operators');


});
// });

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

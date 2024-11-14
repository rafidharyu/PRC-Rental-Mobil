<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\OperatorMiddleware;
use App\Http\Controllers\Backend\CarController;
use App\Http\Controllers\Backend\EventController;
use App\Http\Controllers\Frontend\MainController;
use App\Http\Controllers\Backend\OperatorActivationController;

Route::get('/', [MainController::class, 'index'])->name('index');
Route::get('/about', [MainController::class, 'about'])->name('about');
Route::get('/service', [MainController::class, 'service'])->name('service');
Route::get('/blog', [MainController::class, 'blog'])->name('blog');
Route::get('/contact', [MainController::class, 'contact'])->name('contact');
Route::get('/feature', [MainController::class, 'feature'])->name('feature');
Route::get('/car', [MainController::class, 'car'])->name('car');
Route::get('/testimonial', [MainController::class, 'testimonial'])->name('testimonial');

// Routes for the backend panel, protected by authentication and operator middleware
Route::prefix('panel')->middleware(['auth', OperatorMiddleware::class])->group(function () {
    Route::get('/dashboard', function () {
        return view('backend.dashboard.index');
    })->name('panel.dashboard');

    Route::resource('car', CarController::class)->names('panel.car');
    Route::resource('event', EventController::class)->names('panel.event');

    // Operator-specific routes
    Route::get('operators/serverside', [OperatorActivationController::class, 'serverside'])->name('backend.operators.serverside');
    Route::post('operators/status', [OperatorActivationController::class, 'status'])->name('backend.operators.status');

    // Resource routes for managing operators
    Route::resource('operators', OperatorActivationController::class)
        ->only(['index', 'show', 'edit', 'update', 'destroy'])
        ->names('backend.operators');

    

    Route::get('operator/inactive', [OperatorActivationController::class, 'showInactiveAccountPage'])->name('operator.inactive');

});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

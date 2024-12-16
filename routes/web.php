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

Route::get('/register', function () {
    if (Auth::check()) {
        // Dapatkan role dari pengguna yang sudah login
        $role = Auth::user()->role;

        // Redirect berdasarkan role
        if ($role === 'owner' || $role === 'operator') {
            return redirect()->route('panel.dashboard'); // Redirect ke dashboard
        }

        return redirect()->route('index'); // Redirect ke halaman utama untuk user biasa
    }

    // Jika belum login, tampilkan halaman register
    return view('auth.register');
})->name('register');

// Pembatasan Login untuk Role User, Operator, dan Owner
Route::get('/login', function () {
    if (Auth::check()) {
        // Pengalihan berdasarkan peran
        $role = Auth::user()->role; // Memastikan 'peran' tersedia di model User
        if ($role === 'owner') {
            return redirect()->route('panel.dashboard');
        } elseif ($role === 'operator') {
            return redirect()->route('panel.dashboard');
        } elseif ($role === 'user') {
            return redirect()->route('index');
        } else {
            return redirect()->route('home');
        }
    }
    return view('auth.login');
})->name('login');

// Redirect /home berdasarkan peran setelah login
Route::get('/home', function () {
    if (Auth::check()) {
        // Pengalihan berdasarkan peran
        $role = Auth::user()->role; // Memastikan 'peran' tersedia di model User
        if ($role === 'owner' || $role === 'operator' ) {
            return redirect()->route('panel.dashboard');
        } else {
            return view('home'); // Jika peran tidak dikenali, tampilkan halaman utama
        }

        if ($role === 'user') {
            return redirect()->route('index');
        } else {
            return view('home');
        }
    }
    return redirect()->route('login');
})->name('home');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

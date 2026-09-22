<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Admin\CapsterController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ServiceController;

use App\Http\Controllers\BookingController;

// Public static routes
Route::get('/', function () { return view('index'); });
Route::get('/pricing', function () { return view('pricing'); });
Route::get('/customer-stories', function () { return view('customer-stories'); });
Route::get('/blog', function () { return view('blog'); });
Route::get('/noble-barber', function () { return view('noble-barber'); });
Route::get('/onboarding', function () { return view('auth.onboarding'); })->name('admin.onboarding');
Route::get('/onboarding-success', [\App\Http\Controllers\Auth\OnboardingController::class, 'success'])->name('onboarding.success')->middleware('auth');
Route::get('/suspended', function () { return view('suspended'); });

// Public Booking Routes
Route::get('/book', [BookingController::class, 'show'])->name('book');
Route::get('/b/{slug}', [BookingController::class, 'show'])->name('book.tenant');
Route::post('/book/checkout', [BookingController::class, 'store'])->name('book.store');
Route::get('/booking-success', [BookingController::class, 'success'])->name('book.success');
Route::get('/book/track', [BookingController::class, 'track'])->name('book.track');
Route::get('/book/occupied-slots', [BookingController::class, 'getOccupiedSlots'])->name('book.occupiedSlots');
Route::get('/ticket', [BookingController::class, 'ticket'])->name('book.ticket');
Route::post('/ticket/cancel', [BookingController::class, 'cancel'])->name('book.cancel');
Route::post('/ticket/reschedule', [BookingController::class, 'reschedule'])->name('book.reschedule');
Route::post('/ticket/review', [\App\Http\Controllers\BookingController::class, 'submitReview'])->name('book.review');

// Authentication Routes
Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login']);
    Route::get('/register', [RegisterController::class, 'showRegisterForm'])->name('register');
    Route::post('/register', [RegisterController::class, 'register']);
});
Route::post('/logout', [LoginController::class, 'logout'])->name('logout')->middleware('auth');

// Protected Routes (Admin)
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin-settings', [CapsterController::class, 'index'])->name('admin.settings');
    Route::post('/admin/settings/operating-hours', [CapsterController::class, 'updateOperatingHours'])->name('admin.settings.operatingHours');
    Route::post('/admin/settings/emergency-close', [CapsterController::class, 'updateEmergencyClose'])->name('admin.settings.emergencyClose');
    Route::post('/admin/capsters', [CapsterController::class, 'store'])->name('admin.capsters.store');
    Route::post('/admin/services', [ServiceController::class, 'store'])->name('admin.services.store');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
    Route::match(['post', 'patch'], '/dashboard/bookings/{booking}/status', [DashboardController::class, 'updateStatus'])->name('admin.bookings.updateStatus');
    Route::get('/overview', [\App\Http\Controllers\Admin\OverviewController::class, 'index'])->name('admin.overview');
    Route::get('/admin-account', [\App\Http\Controllers\Admin\AccountController::class, 'index'])->name('admin.account');
    Route::post('/admin-account/profile', [\App\Http\Controllers\Admin\AccountController::class, 'updateProfile'])->name('admin.account.updateProfile');
    Route::post('/admin-account/password', [\App\Http\Controllers\Admin\AccountController::class, 'updatePassword'])->name('admin.account.updatePassword');
    Route::get('/leave-requests', [\App\Http\Controllers\Admin\LeaveRequestController::class, 'index'])->name('admin.leaveRequests.index');
    Route::post('/leave-requests/{leave}/approve', [\App\Http\Controllers\Admin\LeaveRequestController::class, 'approve'])->name('admin.leaveRequests.approve');
    Route::post('/leave-requests/{leave}/reject', [\App\Http\Controllers\Admin\LeaveRequestController::class, 'reject'])->name('admin.leaveRequests.reject');
    Route::get('/payments', [\App\Http\Controllers\Admin\PaymentController::class, 'index'])->name('admin.payments.index');
    Route::post('/payments', [\App\Http\Controllers\Admin\PaymentController::class, 'store'])->name('admin.payments.store');
    Route::post('/payments/{payment}/validate', [\App\Http\Controllers\Admin\PaymentController::class, 'validate'])->name('admin.payments.validate');
    Route::get('/reviews', [\App\Http\Controllers\Admin\ReviewController::class, 'index'])->name('admin.reviews.index');
    Route::post('/reviews/{review}/toggle-hidden', [\App\Http\Controllers\Admin\ReviewController::class, 'toggleHidden'])->name('admin.reviews.toggleHidden');
    Route::get('/bookings', [\App\Http\Controllers\Admin\BookingController::class, 'index'])->name('admin.bookings.index');
});

// Protected Routes (Capster)
Route::middleware(['auth', 'role:capster'])->group(function () {
    Route::get('/capster', [\App\Http\Controllers\Capster\DashboardController::class, 'index'])->name('capster.dashboard');
    Route::post('/capster/profile', [\App\Http\Controllers\Capster\DashboardController::class, 'updateProfile'])->name('capster.profile.update');
    Route::post('/capster/leave-request', [\App\Http\Controllers\Capster\DashboardController::class, 'requestLeave'])->name('capster.leave.request');
});

// Protected Routes (Super Admin)
Route::middleware(['auth', 'role:super_admin'])->group(function () {
    Route::get('/superadmin', [\App\Http\Controllers\SuperAdmin\DashboardController::class, 'index'])->name('superadmin.dashboard');
    Route::post('/superadmin/studios', [\App\Http\Controllers\SuperAdmin\DashboardController::class, 'createStudio'])->name('superadmin.studios.store');
    Route::post('/superadmin/barbershops/{barbershop}/toggle-suspend', [\App\Http\Controllers\SuperAdmin\DashboardController::class, 'toggleSuspend'])->name('superadmin.barbershops.toggleSuspend');
    Route::get('/superadmin/financial', [\App\Http\Controllers\SuperAdmin\DashboardController::class, 'financial'])->name('superadmin.financial');
    Route::get('/superadmin/settings', function () { return view('superadmin-settings'); });
});

// Tenant Dedicated Bio-Link / URL (e.g. trimly.com/doctor-barber)
Route::get('/{slug}', [BookingController::class, 'show'])->name('book.slug');


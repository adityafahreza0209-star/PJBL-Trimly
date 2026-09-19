<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});

Route::get('/pricing', function () {
    return view('pricing');
});

Route::get('/customer-stories', function () {
    return view('customer-stories');
});

Route::get('/blog', function () {
    return view('blog');
});


// Generated routes from migrated HTML pages
Route::get('/admin-settings', function () {
    return view('admin-settings');
});
Route::get('/book', function () {
    return view('book');
});
Route::get('/capster', function () {
    return view('capster');
});
Route::get('/dashboard', function () {
    return view('dashboard');
});
Route::get('/overview', function () {
    return view('overview');
});
Route::get('/admin-account', function () {
    return view('admin-account');
});
Route::get('/login', function () {
    return view('login');
});
Route::get('/noble-barber', function () {
    return view('noble-barber');
});
Route::get('/ticket', function () {
    return view('ticket');
});
Route::get('/register', function () { return view('auth.onboarding'); });
Route::get('/onboarding', function () { return view('auth.onboarding'); });
Route::get('/onboarding-success', function () { return view('onboarding-success'); });
Route::get('/booking-success', function () { return view('booking-success'); });
Route::get('/superadmin', function () { return view('superadmin'); });
Route::get('/superadmin/financial', function () { return view('superadmin-financial'); });
Route::get('/superadmin/settings', function () { return view('superadmin-settings'); });
Route::get('/suspended', function () { return view('suspended'); });

// New admin dashboard routes
Route::get('/leave-requests', function () { return view('leave-requests'); });
Route::get('/payments', function () { return view('payments'); });
Route::get('/reviews', function () { return view('reviews'); });
Route::get('/bookings', function () { return view('bookings'); });

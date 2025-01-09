<?php

use App\Http\Controllers\BackendController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\emailNotifController;
use App\Http\Controllers\HargaaController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProfileController;
use Faker\Provider\ar_EG\Payment;
use Illuminate\Support\Facades\Route;

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

// Halaman utama
Route::get('/', function () {
    return view('welcome');
})->name('home');

// Halaman tentang kami
Route::get('/about-us', function () {
    return view('components.about');
})->name('about');

// Rute yang membutuhkan autentikasi dan peran pengguna
Route::middleware(['auth', 'verified', 'role:user'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

// Rute untuk fitur profil pengguna
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Rute untuk fitur booking
Route::middleware('auth')->group(function () {
    // Route to show the booking form
    Route::get('/booking', [BookingController::class, 'showBookingForm'])->name('booking.form');
    
    // Route to generate the Snap token for payment
    Route::post('/midtrans/token', [BookingController::class, 'generateSnapToken'])->name('midtrans.token');
    Route::get('/success/{id}', [BookingController::class, 'success'])->name('succes');
    // Route to handle successful payments
    Route::post('/midtrans/success', [BookingController::class, 'storePaymentSuccess'])->name('midtrans.success');
    
    // Route to store the booking details
    Route::post('/booking/store', [BookingController::class, 'store'])->name('booking.store');
    
    // Route to handle Midtrans payment notifications
    Route::post('/midtrans/notification', [BookingController::class, 'handleNotification'])->name('midtrans.notification');

    Route::post('/api/midtrans/callback', [BookingController::class, 'callback']);

});


// Rute untuk fitur perhitungan harga
Route::post('/hitung-harga', [HargaaController::class, 'hitungHarga'])->name('hitung.harga');
Route::get('/backend', [BackendController::class, 'index'])->name('backend.index');
Route::get('/admin/bookings', [BackendController::class, 'bookings'])->name('admin.bookings');
Route::post('/midtrans/token', [BookingController::class, 'getPaymentToken'])->name('midtrans.token');
Route::post('/midtrans/success', [BookingController::class, 'handlePaymentSuccess'])->name('midtrans.success');

// Rute autentikasi bawaan Laravel
require __DIR__ . '/auth.php';

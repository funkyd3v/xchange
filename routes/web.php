<?php

use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\ContactController;
use App\Http\Controllers\admin\CurrencyController;
use App\Http\Controllers\admin\RateController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\user\HomeController;
use App\Http\Controllers\user\TestimonialController;
use App\Http\Controllers\user\TransactionController;
use App\Http\Controllers\user\UserController;
use App\Models\Contact;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::get('/testimonials', [TestimonialController::class, 'index'])->name('user.testimonials');
Route::get('/currency-rate', [CurrencyController::class, 'getRate'])->name('getRate');
Route::get('/rates', [RateController::class, 'rates'])->name('user.rates');
Route::get('/ref={promo_code}', [UserController::class, 'refer'])->name('refer');


// authenticated routes
Route::middleware('auth')->group(function () {
    Route::get('/account', [UserController::class, 'index'])->name('user.account');
    // Route::get('/invite', [UserController::class, 'invite'])->name('user.invite');

    Route::post('/change-password', [ProfileController::class, 'changePassword'])->name('user.password-change');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // testimonials
    Route::get('/testimonials/create', [TestimonialController::class, 'create'])->name('user.create.testimonial');
    Route::post('/testimonials/create', [TestimonialController::class, 'store'])->name('user.store.testimonial');

    // transaction
    Route::get('/exchange', [TransactionController::class, 'index'])->name('user.exchange');
    Route::post('/exchange', [TransactionController::class, 'store'])->name('user.exchange');
});

// admin routes
Route::prefix('admin')->middleware(['admin'])->group(function(){
    Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');

    // currencies
    Route::get('/currency/create', [CurrencyController::class, 'create'])->name('admin.currency');
    Route::post('/currency/create', [CurrencyController::class, 'store'])->name('admin.currency.store');
    Route::get('/currency', [CurrencyController::class, 'show'])->name('admin.currency.show');
    Route::get('/currency/{currency}/edit', [CurrencyController::class, 'edit'])->name('admin.currency.edit');
    Route::patch('/currency/{currency}/update', [CurrencyController::class, 'update'])->name('admin.currency.update');
    Route::get('/currency/{currency}/delete', [CurrencyController::class, 'destroy'])->name('admin.currency.delete');

    // rates
    Route::get('/rate/create', [RateController::class, 'create'])->name('admin.rate');
    Route::post('/rate/create', [RateController::class, 'store'])->name('admin.rate.store');
    Route::get('/rate', [RateController::class, 'index'])->name('admin.rate.index');
    Route::get('/rate/{rate}/edit', [RateController::class, 'edit'])->name('admin.rate.edit');
    Route::patch('/rate/{rate}/edit', [RateController::class, 'update'])->name('admin.rate.update');
    Route::post('/rate/{rate}/delete', [RateController::class, 'destroy'])->name('admin.rate.delete');

    // transaction
    Route::get('/transactions', [AdminController::class, 'transactions'])->name('admin.transaction');
    Route::patch('/transactions/{id}', [AdminController::class, 'update'])->name('admin.transaction.update');

    // contacts
    Route::get('/contacts', [ContactController::class, 'create'])->name('admin.contacts');
    Route::post('/contacts', [ContactController::class, 'store'])->name('admin.contacts.store');
    Route::get('/contacts/all', [ContactController::class, 'adminIndex'])->name('admin.contacts.all');
    Route::get('/contacts/{contact}/edit', [ContactController::class, 'adminEdit'])->name('admin.contacts.edit');
    Route::patch('/contacts/{contact}/update', [ContactController::class, 'adminUpdate'])->name('admin.contacts.update');
    Route::get('/contacts/{contact}/delete', [ContactController::class, 'adminDelete'])->name('admin.contacts.delete');

});

require __DIR__.'/auth.php';

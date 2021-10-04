<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\TransactionController;
use App\Http\Controllers\Admin\TravelPackageController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\DetailController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::prefix('admin')
    ->middleware(['auth', 'admin'])
    ->group(function () {
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
        Route::resource('travel-packages', TravelPackageController::class);
        Route::resource('galleries', GalleryController::class);
        Route::resource('transactions', TransactionController::class);
    });


Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/detail/{travel_package:slug}', [DetailController::class, 'index'])->name('detail');

Route::post('checkout/{travel_package:slug}', [CheckoutController::class, 'process'])
    ->middleware(['auth'])
    ->name('checkout-process');

Route::get('checkout/{transaction:id}', [CheckoutController::class, 'index'])
    ->middleware(['auth'])
    ->name('checkout');

Route::post('checkout/create/{transaction:id}', [CheckoutController::class, 'create'])
    ->middleware(['auth'])
    ->name('checkout-create');

Route::post('checkout/remove/{transaction_detail:id}', [CheckoutController::class, 'remove'])
    ->middleware(['auth'])
    ->name('checkout-remove');

Route::post('checkout/success/{transaction:id}', [CheckoutController::class, 'success'])
    ->middleware(['auth'])
    ->name('checkout-success');

Route::post('checkout/failed/{transaction:id}', [CheckoutController::class, 'failed'])
    ->middleware(['auth'])
    ->name('checkout-failed');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

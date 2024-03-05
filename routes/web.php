<?php

use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/error', [App\Http\Controllers\HomeController::class, 'error'])->name('error');
Route::get('/welcome1', [App\Http\Controllers\HomeController::class, 'welcome1'])->name('page.welcome1');



Route::middleware('auth')->group(function() {

    //route penerbangan
    Route::get('penerbangan', [App\Http\Controllers\PenerbanganController::class, 'index'])->name('penerbangan.index')->middleware(["admin", "maskapai"]);
    Route::get('penerbangan/create', [App\Http\Controllers\PenerbanganController::class, 'create'])->name('penerbangan.create')->middleware(["admin", "maskapai"]);
    Route::post('penerbangan', [App\Http\Controllers\PenerbanganController::class, 'store'])->name('penerbangan.store')->middleware(["admin", "maskapai"]);
    Route::get('penerbangan/{id}/edit', [App\Http\Controllers\PenerbanganController::class, 'edit'])->name('penerbangan.edit')->middleware(["admin", "maskapai"]);
    Route::put('penerbangan/{id}', [App\Http\Controllers\PenerbanganController::class, 'update'])->name('penerbangan.update')->middleware(["admin", "maskapai"]);
    Route::get('penerbangan/{id}', [App\Http\Controllers\PenerbanganController::class, 'destroy'])->name('penerbangan.destroy')->middleware(["admin", "maskapai"]);

    Route::get('transaksi', [App\Http\Controllers\transaksiController::class, 'index'])->name('transaksi.index');
    Route::get('transaksi/create', [App\Http\Controllers\transaksiController::class, 'create'])->name('transaksi.create');
    Route::post('transaksi/store', [App\Http\Controllers\transaksiController::class, 'store'])->name('transaksi.store');
    Route::get('transaksi/edit/{id}', [App\Http\Controllers\TransaksiController::class,'edit'])->name('transaksi.edit');
    Route::get('transaksi/destroy/{id}', [App\Http\Controllers\TransaksiController::class,'destroy'])->name('transaksi.destroy');
    Route::put('transaksi/update/{id}', [App\Http\Controllers\TransaksiController::class,'update'])->name('transaksi.update');
    Route::get('transaksi/laporan', [App\Http\Controllers\TransaksiController::class, 'laporan'])->name('laporan.index');


    Route::get('checkout', [App\Http\Controllers\TransaksiController::class, 'checkout'])->name('transaksi.checkout');
    Route::post('checkoutstore', [App\Http\Controllers\TransaksiController::class, 'checkout_store'])->name('transaksi.checkout_store');

    Route::get('user', [App\Http\Controllers\UserController::class, 'index'])->name('user.index');
    Route::get('user/create', [App\Http\Controllers\UserController::class, 'create'])->name('user.create');
    Route::get('user/{id}/edit', [App\Http\Controllers\UserController::class, 'edit'])->name('user.edit');
    Route::put('user/{id}', [App\Http\Controllers\UserController::class, 'update'])->name('user.update');
    Route::post('user', [App\Http\Controllers\UserController::class, 'store'])->name('user.store');
    Route::get('user/{id}', [App\Http\Controllers\UserController::class, 'destroy'])->name('user.destroy');






});


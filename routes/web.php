<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/customer/create', [CustomerController::class, 'create'])->middleware(['auth'])->name('create_customer');
Route::post('/customer/store', [CustomerController::class, 'store'])->middleware(['auth'])->name('store_customer');
Route::get('/customer/list', [CustomerController::class, 'index'])->middleware(['auth'])->name('customer.list');
Route::get('/customer/{customer}', [CustomerController::class, 'show'])->middleware(['auth'])->name('customer.info');
Route::get('/customer/{customer}/edit', [CustomerController::class, 'edit'])->middleware(['auth'])->name('customer.edit');



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\PopPointController;
use App\Http\Controllers\ServiceTypeController;

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
Route::get('/customer/edit/{customer}', [CustomerController::class, 'edit'])->middleware(['auth'])->name('customer.edit');
Route::post('/customer/update/{customer}', [CustomerController::class, 'update'])->middleware(['auth'])->name('update_customer');
Route::get('/customer/delete/{customer}', [CustomerController::class, 'destroy'])->middleware(['auth'])->name('delete_customer');


Route::get('/popPoint/create', [PopPointController::class, 'create'])->middleware(['auth'])->name('create_popPoint');
Route::post('/popPoint/store', [PopPointController::class, 'store'])->middleware(['auth'])->name('store_pop_point');
Route::get('/popPoint/list', [PopPointController::class, 'index'])->middleware(['auth'])->name('poppoint.list');
Route::get('/popPoint/{poppoint}', [PopPointController::class, 'show'])->middleware(['auth'])->name('poppoint.info');
Route::get('/popPoint/edit/{poppoint}', [PopPointController::class, 'edit'])->middleware(['auth'])->name('poppoint.edit');
Route::post('/popPoint/update/{poppoint}', [PopPointController::class, 'update'])->middleware(['auth'])->name('poppoint.update');
Route::get('/popPoint/delete/{poppoint}', [PopPointController::class, 'destroy'])->middleware(['auth'])->name('poppoint.delete');


Route::get('/serviceType/create', [ServiceTypeController::class, 'create'])->middleware(['auth'])->name('create_service_type');
Route::post('/serviceType/store', [ServiceTypeController::class, 'store'])->middleware(['auth'])->name('store_service_type');
Route::get('/serviceType/list', [ServiceTypeController::class, 'index'])->middleware(['auth'])->name('service_type_list');
Route::get('/serviceType/{servicetype}', [ServiceTypeController::class, 'show'])->middleware(['auth'])->name('store_service_info');
Route::get('/serviceType/edit/{servicetype}', [ServiceTypeController::class, 'edit'])->middleware(['auth'])->name('service_type_edit');
Route::post('/serviceType/update/{servicetype}', [ServiceTypeController::class, 'update'])->middleware(['auth'])->name('service_type_update');
Route::get('/serviceType/delete/{servicetype}', [ServiceTypeController::class, 'destroy'])->middleware(['auth'])->name('service_type_delete');




Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

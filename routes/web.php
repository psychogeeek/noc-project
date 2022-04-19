<?php

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

Route::get('/', function () {
    return view('welcome');
});

// user routes
Route::get('/user/create', [UserController::class, 'create']);
Route::post('/user/list', [UserController::class, 'store']);

// pop routes
Route::get('/pop/create', [PopController::class, 'create']);
Route::get('/user/list', [PopController::class, 'store']);


// point routes
Route::get('/point/create', [PointController::class, 'create']);
Route::get('/point/list', [PointController::class, 'store']);

// service routes
Route::get('/service/create', [ServiceController::class, 'create']);
Route::get('/service/list', [ServiceController::class, 'store']);


// service Type routes
Route::get('/serviceType/create', [serviceTypeController::class, 'create']);
Route::get('/serviceType/list', [serviceTypeController::class, 'store']);


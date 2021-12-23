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

    Route::get('/', [\App\Http\Controllers\LoginController::class, 'index'])->name('index');
    Route::post('login', [\App\Http\Controllers\LoginController::class, 'authenticate'])->name('login');
    Route::get('logout', [\App\Http\Controllers\LoginController::class, 'logout'])->name('logout');

    Route::get('/customer/create', [\App\Http\Controllers\CustomersController::class, 'create'])->name('customer.create');
    Route::post('/customer/store', [\App\Http\Controllers\CustomersController::class, 'store'])->name('customer.store');


Route::middleware(['auth'])->group(function() {
        Route::get('/fee', [\App\Http\Controllers\EmployeesController::class, 'fee'])->name('employee.fee');
        Route::post('/fee', [\App\Http\Controllers\EmployeesController::class, 'storeFee'])->name('employee.fee.store');
        Route::get('/employee/indexF', [\App\Http\Controllers\EmployeesController::class, 'indexFiltered'])->name('employee.indexFiltered');

        Route::resource('/employee', \App\Http\Controllers\EmployeesController::class);

        Route::get('/customer/historic', [\App\Http\Controllers\CustomersController::class, 'historic'])->name('customer.historic');
        Route::resource('/customer', \App\Http\Controllers\CustomersController::class)->except('create', 'store');

        Route::resource('/order', \App\Http\Controllers\OrderController::class);
    });




<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarsController;
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

    // this gets all the methods of the controller
    // ex. /cars/index will use the index() method in the controller
    Route::resource('/cars', CarsController::class);

    Route::get('/', [CarsController::class, 'index']);

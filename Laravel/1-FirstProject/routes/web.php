<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductsController;
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
        return view('home');
    });


    // Will go to the ProductsController and run the function index()
    Route::get('/products', [ProductsController::class, 'index'])->name('products');

    //passing route parameters
    Route::get('/products/{id}', [ProductsController::class, 'show']);

    //adding a constraint top the parameter: accepting integers only
    Route::get('/products/{id}', [ProductsController::class, 'show'])->where('id', '[0-9]+');

    //adding a constraint top the parameter: accepting strings only
    Route::get('/products/{name}', [ProductsController::class, 'show'])->where('id', '[aA-zZ]+');

    //adding more than a parameter
    Route::get('/products/{id}/{name}', [ProductsController::class, 'showTwo'])->where([
        'id' => '[0-9]+',
        'name' => '[aA-zZ]+'
    ]);

    Route::get('/products/about', [ProductsController::class, 'about']);

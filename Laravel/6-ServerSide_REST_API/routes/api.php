<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StaffController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//Route::prefix('api')->group() {
//}

Route::post('login', [\App\Http\Controllers\LoginController::class ,'authenticate']);

Route::middleware('auth')->group(function() {
    Route::post('/staff', [\App\Http\Controllers\StaffController::class, 'create']);
    Route::get('/staff', [\App\Http\Controllers\StaffController::class, 'show']);
});



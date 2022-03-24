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

//                  "auth:api" because we are using it for APIs
//                  "auth" will be for web
Route::middleware('auth:api')->group(function() {
    Route::post('/staff', [\App\Http\Controllers\StaffController::class, 'create']);
    Route::get('/staff', [\App\Http\Controllers\StaffController::class, 'show']);
    Route::post('/points', [\App\Http\Controllers\PointsController::class, 'create']);
    Route::get('/points', [\App\Http\Controllers\PointsController::class, 'show']);
});



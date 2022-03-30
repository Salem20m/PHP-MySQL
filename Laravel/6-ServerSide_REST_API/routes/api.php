<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\PointsController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\GroupsController;
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

Route::post('login', [LoginController::class ,'authenticate']);

//                  "auth:api" because we are using it for APIs
//                  "auth" will be for web
Route::middleware('auth:api')->group(function() {
    Route::post('/staff', [StaffController::class, 'create']);
    Route::get('/staff', [StaffController::class, 'show']);
    Route::post('/points', [PointsController::class, 'create']);
    Route::get('/points', [PointsController::class, 'show']);
    Route::post('/groups', [GroupsController::class, 'create']);
    Route::get('/groups', [GroupsController::class, 'show']);
    Route::post('/groups/{id}/points', [GroupsController::class, 'addToGroupPoints']);
    Route::post('/groups/{id}/staff', [GroupsController::class, 'addToGroupStaff']);
    Route::post('/access', [StaffController::class, 'access']);
    Route::get('/logs', [StaffController::class, 'showLogs']);
    Route::post('/staff/{id}/access', [StaffController::class, 'giveAccess']);



});



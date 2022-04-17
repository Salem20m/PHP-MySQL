<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegistrationController;

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



Route::prefix('v1')->group(function() {

    Route::get('events', [EventController::class, 'apiIndex']);
    Route::get('organizers/{organizerSlug}/events/{eventSlug}', [EventController::class, 'apiShow']);

    Route::post('login', [LoginController::class, 'attendeeLogin']);
    Route::post('logout', [LoginController::class, 'attendeeLogout']);

    Route::post('organizers/{organizerSlug}/events/{eventSlug}/registration', [RegistrationController::class, 'store']);
    Route::get('registrations', [RegistrationController::class, 'show']);


});

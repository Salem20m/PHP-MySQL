<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\TicketController;

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

Route::get('/', [LoginController::class, 'index'])->name('login');
Route::post('logged-in', [LoginController::class, 'authenticate'])->name('login.auth');
Route::get('logout', [LoginController::class, 'logout'])->name('logout');

Route::middleware(['auth:web'])->group(function () {
    Route::resource('events', EventController::class);
    Route::get('/events/{id}/tickets/create', [TicketController::class, 'create'])->name('tickets.create');

});

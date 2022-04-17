<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\ChannelController;
use App\Http\Controllers\SessionController;
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
    return view('index');
})->name('login');

Route::post('/',[LoginController::class, 'authenticate'])->name('auth');

Route::middleware(['auth'])->group(function() {
    Route::get('logout', [LoginController::class, 'logout'])->name('logout');

    Route::resource('events',EventController::class);
    //Route::get('event/{id}', [EventController::class, 'index'])->name('events.index');
    //Route::get('event/{id}', [EventController::class, 'create'])->name('events.create');

    Route::get('/events/{event}/ticket/create', [TicketController::class, 'create'])->name('ticket.create');
    Route::post('/events/{event}/ticket', [TicketController::class, 'store'])->name('ticket.store');

    Route::get('/events/{event}/rooms/create', [RoomController::class, 'create'])->name('rooms.create');
    Route::post('/events/{event}/rooms', [RoomController::class, 'store'])->name('rooms.store');

    Route::get('/events/{event}/channels/create', [ChannelController::class, 'create'])->name('channels.create');
    Route::post('/events/{event}/channels', [ChannelController::class, 'store'])->name('channels.store');

    Route::get('/events/{event}/sessions/create', [SessionController::class, 'create'])->name('sessions.create');
    Route::post('/events/{event}/sessions', [SessionController::class, 'store'])->name('sessions.store');

    Route::get('/events/{event}/sessions/{id}/edit', [SessionController::class, 'edit'])->name('sessions.edit');
    Route::put('/events/{event}/sessions/{id}', [SessionController::class, 'update'])->name('sessions.update');

    Route::get('/events/{event}/reports', [EventController::class, 'reports'])->name('reports.show');
});

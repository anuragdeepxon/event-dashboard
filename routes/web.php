<?php

use App\Http\Controllers\API\EventAPIController;
use App\Http\Controllers\API\TicketAPIController;
use App\Http\Controllers\EventController;
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

Auth::routes();

Route::get('/', function () {
    return view('welcome');
});


Route::get('event/list', [EventAPIController::class, 'event_list']);

Route::get('event/editEvent/{id}', [EventController::class, 'event_one']);

Route::post('event/update/{id}', [EventAPIController::class, 'event_update_one']);

Route::post('event/store', [EventAPIController::class, 'event_store']);


Route::get('event/ticketList/{event_id}', [TicketAPIController::class, 'event_ticket_list']);
Route::post('event/ticket/store', [TicketAPIController::class, 'event_ticket_store']);

Route::get('event/ticket/delete/{ticket_id}', [TicketAPIController::class, 'event_ticket_delete']);
Route::post('event/ticket/update/{ticket_id}', [TicketAPIController::class, 'event_ticket_update']);

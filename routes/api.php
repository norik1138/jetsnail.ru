<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TransportController;
use App\Http\Controllers\DriversController;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


//get transports
Route::get('getTransports', [TransportController::class, 'getTransports']);
//get transport detail
Route::get('get_transport/{id}', [TransportController::class, 'get_transport']);
//get transport kinds
Route::get('getTransportKinds', [TransportController::class, 'getTransportKinds']);
//get drivers
Route::get('getDrivers', [DriversController::class, 'getDrivers']);
//save transport
Route::post('save_transport', [TransportController::class, 'save_transport']);
//update transport
Route::post('update_transport/{id}', [TransportController::class, 'update_transport']);
//delete transport
Route::delete('deleteTransport/{id}', [TransportController::class, 'deleteTransport']);

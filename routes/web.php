<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
// use App\Http\Controllers\UsersController;
use App\Http\Controllers\DriversController;
// use App\Http\Controllers\TransportController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\Auth\LoginController;
// use App\Http\Controllers\HomeController;


Auth::routes([
  'reset' => false,
  'confirm' => false,
  'verify' => false
]);

Route::get('/', [MainController::class, 'index'])->name('index');

Route::get('/logout', [LoginController::class, 'logout'])->name('get-logout');

Route::get('/home', function() {
  // return view('auth.transports.home');
  return view('app');
});



Route::group(['middleware' => 'auth'], function() {
  Route::group(['middleware' => 'is_admin'], function() {
    Route::resource('drivers', DriversController::class);
    Route::post('drivers/{driverId}/{transportId}', [DriversController::class, 'deleteRelation'])->name('drivers.deleteRelation');
    Route::get('/transports', function() {
      return view('auth.transports.app');
    })->name('transports');
  });
});



// Route::fallback(function() {
//   return view('app');
// });

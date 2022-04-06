<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;
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
    return view('welcome');
});

Route::resource('schedules','ScheduleController');
Route::resource('master','MasterController');
Route::resource('customer','CustomerController');
Route::resource('staff','StaffController');

Route::get('/welcome','MasterController@welcome');
Route::get('/crreate','ScheduleController@Create');
Route::get('/eddit','ScheduleController@Edit');
Route::get('/viewSchedule','ScheduleController@index');
Route::get('/createCustomer','CustomerController@create');

Route::resource('order',OrderController::class);

Route::patch('/uppdate','ScheduleController@Update');
Route::patch('order/{orderID}','OrderController@update')->name('order.update');

Route::resource('payments', 'PaymentController');
Route::get('/paymentIndex', 'PaymentController@index');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

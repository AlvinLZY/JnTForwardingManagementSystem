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
Route::resource('User','UserController');
Route::resource('order',OrderController::class);

Route::get('/welcome','MasterController@welcome');

Route::get('/createSchedule','ScheduleController@Create');
Route::get('/showSchedule/{scheduleID}','ScheduleController@Show');
Route::get('/indexSchedule','ScheduleController@index');
Route::get('/RemoveOrder/{scheduleID}/{orderID}','ScheduleController@RemoveOrder');
Route::patch('/updateSchedule/{scheduleID}','ScheduleController@Update');

Route::get('/createCustomer','CustomerController@create');

Route::patch('order/{orderID}','OrderController@update')->name('order.update');

Route::resource('payments', 'PaymentController');
Route::get('/paymentIndex', 'PaymentController@index');


Route::get('/showXML','UserController@showXML');
Auth::routes([
  'verify' => false,
  'reset' => false
]);

Route::group(['middleware'=>'auth'], function () {
	Route::get('permissions-all-users',['middleware'=>'check-permission:user|admin','uses'=>'HomeController@allUsers']);
	Route::get('permissions-admin',['middleware'=>'check-permission:admin','uses'=>'HomeController@adminSuperadmin']);
});
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

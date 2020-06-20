<?php

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
Route::get('/', function () {return view('auth.login');});
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/reservation', 'ReservationController@index')->name('reservation');
Route::get('/clients', 'ClientController@index')->name('clients');
Route::get('/clients/add', 'ClientController@create')->name('add_clients');
Route::get('/register',function(){ return back()->withInput();});
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
Route::get('/reservation', 'ReservationController@index')->name('reservation')->middleware('auth');

Route::get('/clients', 'ClientController@index')->name('clients')->middleware('auth');
Route::get('/clients/add', 'ClientController@create')->name('add_clients')->middleware('auth');
Route::get('/clients/delete/{id}', 'ClientController@destroy')->name('deleteclient')->middleware('auth');
Route::get('/clients/update/{id}', 'ClientController@show')->name('updateclient')->middleware('auth');
Route::post('/clients/update/{id}','ClientController@edit')->name('update')->middleware('auth');
Route::post('/client/search','ClientController@search')->name('search')->middleware('auth');

Route::post('/clients/add', 'ClientController@store')->name('save_clients')->middleware('auth');
Route::get('/register',function(){ return back()->withInput();})->middleware('auth');




Route::get('/liste_reservation', 'ReservationController@list')->name('liste_reservation')->middleware('auth');
Route::get('/liste_reservation/ajouter_reservation', 'ReservationController@create')->name('ajouter_reservation')->middleware('auth');
Route::post('/ajoutreservation','ReservationController@store')->name('saveres')->middleware('auth');
Route::get('/deletereservation/{id}','ReservationController@destroy')->name('deletereservation')->middleware('auth');
Route::get('/register',function(){ return back()->withInput();})->middleware('auth');

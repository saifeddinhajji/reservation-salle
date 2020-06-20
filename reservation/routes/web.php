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
Route::get('/clients/delete/{id}', 'ClientController@destroy')->name('deleteclient');
Route::get('/clients/update/{id}', 'ClientController@show')->name('updateclient');
Route::post('/clients/update/{id}','ClientController@edit')->name('update');
Route::post('/client/search','ClientController@search')->name('search');

Route::post('/clients/add', 'ClientController@store')->name('save_clients');
Route::get('/register',function(){ return back()->withInput();});




Route::get('/liste_reservation', 'ReservationController@list')->name('liste_reservation');
Route::get('/liste_reservation/ajouter_reservation', 'ReservationController@create')->name('ajouter_reservation');
Route::post('/ajoutreservation','ReservationController@store')->name('saveres');
Route::get('/deletereservation/{id}','ReservationController@destroy')->name('deletereservation');
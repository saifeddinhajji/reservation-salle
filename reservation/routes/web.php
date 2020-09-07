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



Route::get('/', function () {return view('welcome');});
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/reservation', 'ReservationController@index')->name('reservation')->middleware('auth');

Route::get('/clients', 'ClientController@index')->name('clients')->middleware('auth');
Route::get('/clients/add', 'ClientController@create')->name('add_clients')->middleware('auth');
Route::get('/clients/delete/{id}', 'ClientController@destroy')->name('deleteclient')->middleware('auth');
Route::get('/clients/update/{id}', 'ClientController@show')->name('updateclient')->middleware('auth');
Route::post('/clients/update/{id}','ClientController@edit')->name('update')->middleware('auth');
Route::post('/client/search','ClientController@search')->name('search')->middleware('auth');

Route::post('/clients/add', 'ClientController@store')->name('save_clients')->middleware('auth');
//Route::get('/register',function(){ return back()->withInput();})->middleware('auth');


/***********************list des utlisateurs******************************/
Route::get('/utlisateurs/list','UsersController@list')->name('listutlisateur');
Route::post('/addcompte','UsersController@add')->name('addcompte');
Route::get('/deletecompte/{id}','UsersController@deletecompte')->name('deletecompte');
/*********************end list des utlisateurs***************************/

Route::get('/liste_reservation', 'ReservationController@list')->name('liste_reservation')->middleware('auth');
Route::get('/liste_reservation/ajouter_reservation', 'ReservationController@create')->name('ajouter_reservation')->middleware('auth');
Route::post('/ajoutreservation','ReservationController@store')->name('saveres')->middleware('auth');
Route::get('/deletereservation/{id}','ReservationController@destroy')->name('deletereservation')->middleware('auth');
Route::post('/searchreservation','ReservationController@search')->name('serachres');
//Route::get('/register',function(){ return back()->withInput();})->middleware('auth');

/***********************salles*****************************/
Route::get('/salles','SalleController@index')->name('allsalles');
Route::post('/addsalle','SalleController@add')->name('addsalle');
Route::get('/deletesalle/{id}','SalleController@delete')->name('deletesalle');
Route::post('/updatesalle','SalleController@update')->name('updatesalle');
Route::get('/detailsalle/{id}','SalleController@detail')->name('detailsalle');
/**********************end salles***************************/
/***********************autres****************** */
Route::get('/allautres','AutresController@all')->name('allautres');
Route::post('/addautre','AutresController@add')->name('addautre');
Route::get('/deleteautre/{id}','AutresController@delete')->name('deleteautre');
/**************************end autres******************/
/***********************prix locataires ******************************/
Route::post('/addprixtosalle','PrixLocataireController@add')->name('addprixtosalle');
Route::get('/deleteprix/{d}','PrixLocataireController@delete')->name('deleteprix');
Route::post('/updateprixloc','PrixLocataireController@update')->name('updateprixloc');

/************************end prix locataire*************************/
/****************************reglement*****************************/
Route::get('/reglement/{id}','ReglementController@index')->name('reglement');
Route::post('/addreglement','ReglementController@add')->name('addreglement');
/****************************end reglement*******************************/
/************************************addbanque******/
Route::post('/addbanque','ReglementController@addbanque')->name('addbanque');
/**********************************endaddbanque */
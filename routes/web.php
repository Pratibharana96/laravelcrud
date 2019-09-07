<?php
Use App\link;
use Illuminate\Http\Request;

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
///////////////////////////////Pratibha's Github Data/////////////////////////////////////////
//get all table data
Route::get('pratibha','PratibhaController@index');
// edit a record y id
Route::get('/prdata/{prdata?}','PratibhaController@edit');
//save a record
Route::post('/prdata','PratibhaController@save');
//update a record
Route::put('/prdata/{prdata?}','PratibhaController@update');
//delete a record
Route::delete('/prdata/{prdata?}','PratibhaController@delete');


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

Route::get('/', function () {
    return view('welcome');
});

Route::get('client', 'ClientController@index')->name('client');
Route::get('client/table', 'ClientController@indextable')->name('client.table');

Route::get('client/create', 'ClientController@create')->name('client.create');
Route::post('client', 'ClientController@store')->name('client.store');

Route::get('client/{id}/edit', 'ClientController@edit')->name('client.edit');
Route::put('client/{id}', 'ClientController@update')->name('client.update');
Route::delete('client/{id}/destroy', 'ClientController@destroy')->name('client.destroy');

Route::get('client/{id}/validate', 'ClientController@to_validate')->name('client.to_validate');

//Route::resource('client', 'ClientController');


Route::get('cardboard', 'CardboardController@index')->name('cardboard');
Route::get('cardboard/create', 'CardboardController@create')->name('cardboard.create');
Route::post('cardboard/store', 'CardboardController@store')->name('cardboard.store');



//correoenvio2021@gmail.com
//correoenvio123
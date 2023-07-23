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

Route::get('/api/people', 'PersonController@index');
Route::post('/api/people', 'PersonController@store');
Route::get('/api/people/{id}', 'PersonController@show');
Route::put('/api/people/{id}', 'PersonController@update');
Route::delete('/api/people/{id}', 'PersonController@destroy');

Route::post('/api/people/{id}/contacts', 'ContactController@store');
Route::put('/api/people/{person_id}/contacts/{contact_id}', 'ContactController@update');
Route::delete('/api/people/{person_id}/contacts/{contact_id}', 'ContactController@destroy');

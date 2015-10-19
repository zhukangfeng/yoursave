<?php
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/login', 'LoginController@index');
Route::post('/login', 'LoginController@login');

Route::get('/', 'DashboardController@index');

Route::get('/home', 'UserController@home');
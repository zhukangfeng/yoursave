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

Route::get('/login', 'AuthController@index');
Route::post('/login', 'AuthController@login');

Route::get('/logout', 'AuthController@logout');

Route::get('/', 'DashboardController@index');

Route::get('/home', 'UserController@home');

// 商店管理
Route::resource('/myshop', 'ShopController');

// 生产厂家管理
Route::resource('/mycompany', 'ProduceCompanyController');
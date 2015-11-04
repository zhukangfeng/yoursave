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
Route::group([
    'middleware' => 'guest'
], function () {
    Route::get('/login', 'AuthController@index');
    Route::post('/login', 'AuthController@login');

    Route::get('/register', 'UserController@create');
    Route::put('/register', 'UserController@store');
    Route::get('/register/check', 'UserController@check');
    Route::post('/register/active', 'UserController@active');
});

// 用户登录
Route::group([
    'middleware'  => 'auth'
], function () {
    Route::get('/', 'DashboardController@index');

    // 文件下载api
    Route::get('api/file/uploadurl', 'APIController@getFileUploadUrl');
    Route::get('api/file/download', 'APIController@fileDownload');

    Route::get('/home', 'UserController@home');

    Route::get('/logout', 'AuthController@logout');

    Route::get('/user', 'UserController@show');
    Route::get('/user/edit', 'UserController@edit');
    Route::put('/user', 'UserController@update');

    // 商店职员登录
    Route::group([
        'middleware' => 'shop_auth'
    ], function () {
        // 商店管理
        Route::get('/myshop', 'ShopController@show');
        Route::group([
            'middleware' => 'shop_admin_auth'
        ], function () {
            Route::get('/myshop/edit', 'ShopController@edit');
            Route::put('/myshop', 'ShopController@update');
        });

    });

    // 生生产厂家登录
    Route::group([
        'middleware'  => 'produce_company_auth'
    ], function () {
        // 生产厂家管理
        Route::resource('/mycompany', 'ProduceCompanyController');

    });

});

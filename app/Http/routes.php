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
        // 商店信息显示
        Route::group([
            'prefix'    => 'myshop',
        ], function () {
            Route::get('/', 'ShopController@show');

            // 商店信息修改
            Route::group([
                'prefix'    => 'myshop',
                'middleware' => 'shop_admin_auth'
            ], function () {
                Route::get('/edit', 'ShopController@edit');
                Route::put('', 'ShopController@update');

                // 商店职员删除
                Route::delete('/users/{shoUserId}', 'ShopUserController@destroy');
            });

            // 职员信息修改
            Route::group([
                'middleware'    => 'shop_user_operate_auth'
            ], function () {
                Route::resource('/users', 'ShopUserController', [
                    'only'  => [
                        'index',
                        'create',
                        'store',
                        'show',
                        'edit',
                        'update'
                    ]
                ]);
            });

            // 商店商品信息
            Route::resource('/goods', 'ShopGoodController', [
                'only'  => [
                    'index',
                    'create',
                    'show',
                    'edit',
                    'update',
                    'destroy'
                ]
            ]);

            // 商店促销信息
            Route::resource('/preferences', 'ShopPreferenceController', [
                'only'  => [
                    'index',
                    'create',
                    'show',
                    'edit',
                    'update',
                    'destroy'
                ]
            ]);
        });
    });

    // 生生产厂家登录
    Route::group([
        'middleware'  => 'produce_company_auth'
    ], function () {
        // 生产厂家信息显示
        Route::group([
            'prefix'    => 'produce_company',
        ], function () {
            Route::get('/', 'ProduceCompanyController@show');

            // 生产厂家职员显示
            Route::resource('/users', 'ProduceCompanyUserController', [
                'only'  => [
                    'create',
                    'show',
                    'index',
                    'show'
                ]
            ]);
        });
        // 生产厂家信息修改
        Route::group([
            'prefix'    => 'produce_company',
            'middleware' => 'shop_admin_auth'
        ], function () {
            Route::get('/edit', 'ProduceCompanyController@edit');
            Route::put('', 'ProduceCompanyController@update');

            // 生产厂家职员修改
            Route::resource('/users', 'ProduceCompanyUserController', [
                'only'  => [
                    'edit',
                    'update',
                    'destroy'
                ]
            ]);
        });

    });

});

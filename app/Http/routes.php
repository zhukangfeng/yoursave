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

    // 用户账号信息
    Route::post('/accounts/login', 'AccountController@login');
    Route::post('/accounts/logout', 'AccountController@logout');
    Route::post('/accounts/accept', 'AccountController@accept');
    Route::resource('/accounts', 'AccountController');

    // 文件下载api
    Route::get('api/file/uploadurl', 'APIController@getFileUploadUrl');
    Route::get('api/file/download', 'APIController@fileDownload');

    // 个人消费
    Route::get('/consumes', 'ConsumeController@index');
    Route::post('/consumes', 'ConsumeController@store');
    Route::get('/consumes/create', 'ConsumeController@create');
    Route::get('/consumes/{consumeId}', 'ConsumeController@show');
    Route::put('/consumes/{consumeId}', 'ConsumeController@update');
    Route::get('/consumes/{consumeId}/edit', 'ConsumeController@edit');

    // 商品分类
    Route::get('good_kinds', 'GoodKindController@index');
    Route::get('good_kinds/create', 'GoodKindController@create');
    Route::get('/good_kinds/search', 'GoodKindController@search');
    Route::post('good_kinds', 'GoodKindController@store');
    Route::get('good_kinds/{goodKindId}/edit', 'GoodKindController@edit');
    Route::put('good_kinds/{goodKindId}', 'GoodKindController@update');

    // 商品
    Route::get('/goods/search', 'GoodController@search');
    Route::post('/goods', 'GoodController@store');
    Route::get('/goods/create', 'GoodController@create');
    Route::post('/goods/{goodId}', 'GoodController@update');
    Route::get('/goods/{goodId}/edit', 'GoodController@edit');

    // 促销信息
    Route::get('/preferences', 'PreferenceController@index');
    Route::post('/preferences', 'PreferenceController@store');
    Route::post('/preferences/search', 'PreferenceController@search');
    Route::get('/preferences/{preferenceId}', 'PreferenceController@show');
    Route::put('/preferences/{preferenceId}', 'PreferenceController@update');
    Route::get('/preferences/{preferenceId}/edit', 'PreferenceController@edit');

    // 商品信息搜索
    Route::get('/shops/search', 'ShopController@search');
    Route::post('/shops', 'ShopController@store');
    Route::get('/shops/create', 'ShopController@create');
    Route::get('/shops/{shopId}/authenticate', 'ShopAuthenticateController@index');

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
                    'create',
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

    // 注销
    Route::get('/logout', 'AuthController@logout');

    // 主页
    Route::get('/home', 'UserController@home');

    // 用户个人信息
    Route::get('/user', 'UserController@show');
    Route::get('/user/edit', 'UserController@edit');
    Route::put('/user', 'UserController@update');

});


// 商品分类
Route::get('good_kinds/', 'GoodKindController@index');
Route::get('good_kinds/{goodKindId}', 'GoodKindController@show');

// 商品
Route::get('/good', 'GoodController@index');
Route::get('/good/{goodId}', 'GoodController@show');

// 商店商品信息
Route::resource('/goods', 'GoodController', [
    'only'  => [
        'index',
        'show',
    ]
]);

// 商店
Route::get('/shops', 'ShopController@index');
Route::get('/shops/{shopId}', 'ShopController@show');

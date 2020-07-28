<?php

Route::group(['prefix' => LaravelLocalization::setLocale() , 'middleware' => 'auth'], function () {

    // start custome logout
    Route::any('logout' , 'UsersController@logout')->name('user.logout');
    // end custome logout
    Route::group(['prefix' => 'dashboard'], function () {
        Route::get('/index', 'DashboardController@index')->name('dashboard.index');

        //  start users routes
        Route::get('users', 'UsersController@index')->name('users.index');
        Route::get('users/create', 'UsersController@create')->name('users.create');
        Route::post('users', 'UsersController@store')->name('users.store');
        Route::get('users/edit/{id}', 'UsersController@edit')->name('users.edit');
        Route::post('users/edit/{id}', 'UsersController@update')->name('users.update');
        Route::get('users/delete/{id}', 'UsersController@destroy')->name('users.destroy');
        //  end users routes

        //  start Category routes
        Route::get('categories', 'CategoryController@index')->name('categories.index');
        Route::get('categories/create', 'CategoryController@create')->name('categories.create');
        Route::post('categories', 'CategoryController@store')->name('categories.store');
        Route::get('categories/edit/{id}', 'CategoryController@edit')->name('categories.edit');
        Route::post('categories/edit/{id}', 'CategoryController@update')->name('categories.update');
        Route::get('categories/delete/{id}', 'CategoryController@destroy')->name('categories.destroy');
        //  end Category routes


        //  start Product routes
        Route::get('products', 'ProductController@index')->name('products.index');
        Route::get('products/create', 'ProductController@create')->name('products.create');
        Route::post('products', 'ProductController@store')->name('products.store');
        Route::get('products/edit/{id}', 'ProductController@edit')->name('products.edit');
        Route::post('products/edit/{id}', 'ProductController@update')->name('products.update');
        Route::get('products/delete/{id}', 'ProductController@destroy')->name('products.destroy');
        //  end Product routes


        //  start Client routes
        Route::get('clients', 'ClientController@index')->name('clients.index');
        Route::get('clients/create', 'ClientController@create')->name('clients.create');
        Route::post('clients', 'ClientController@store')->name('clients.store');
        Route::get('clients/edit/{id}', 'ClientController@edit')->name('clients.edit');
        Route::post('clients/edit/{id}', 'ClientController@update')->name('clients.update');
        Route::get('clients/delete/{id}', 'ClientController@destroy')->name('clients.destroy');
        //  end Client routes


        //  start Order routes
        Route::get('orders', 'Client\OrderController@index')->name('orders.index');
        Route::get('orders/create/{id}', 'Client\OrderController@create')->name('orders.create');
        Route::post('orders', 'Client\OrderController@store')->name('orders.store');
        Route::get('orders/edit/{id}', 'Client\OrderController@edit')->name('orders.edit');
        Route::post('orders/edit/{id}', 'Client\OrderController@update')->name('orders.update');
        Route::get('orders/delete/{id}', 'Client\OrderController@destroy')->name('orders.destroy');
        //  end Order routes

    });
});

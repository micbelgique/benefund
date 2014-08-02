<?php

include_once( 'routes.rc.php' );
include_once( 'routes.kr.php' );

Route::get('/', array('as' => 'home', 'uses' => 'HomeController@showIndex'));
Route::get('/admin', array('as' => 'admin.home', 'uses' => 'Admin\HomeController@showIndex'));

Route::group(array('before' => 'auth'), function() {

    Route::get('/profile', array('as' => 'profile', 'uses' => 'UsersController@showIndex'));
    Route::post('/profile', array('as' => 'profile', 'uses' => 'UsersController@postUpdate'));

    Route::get('/logout', array('as' => 'logout', 'uses' => 'AuthController@showLogout'));

});

Route::get('/login', array('as' => 'login', 'uses' => 'AuthController@showIndex'));
Route::post('/login', array('as' => 'login', 'uses' => 'AuthController@postLogin'));

Route::get('/register', array('as' => 'register', 'uses' => 'AuthController@showNew'));
Route::post('/register', array('as' => 'register', 'uses' => 'AuthController@postCreate'));

Route::when('admin/*', 'auth' );
Route::when('admin', 'auth' );
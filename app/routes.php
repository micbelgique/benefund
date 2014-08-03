<?php

Route::pattern('id', '[0-9]+');

include_once( 'routes.rc.php' );
include_once( 'routes.kr.php' );

Route::get('/', array('as' => 'home', 'uses' => 'HomeController@showIndex'));
Route::get('/admin', array('as' => 'admin.home', 'uses' => 'Admin\HomeController@showIndex'));

Route::group(array('before' => 'auth'), function() {

    Route::get('/profile', array('as' => 'profile', 'uses' => 'UsersController@showProfile'));
    Route::post('/profile', array('as' => 'profile', 'uses' => 'UsersController@postUpdate'));

    Route::get('/logout', array('as' => 'logout', 'uses' => 'AuthController@showLogout'));


    Route::get('/campaigns/manage', array('as' => 'public.campaigns.manage', 'uses' => 'CampaignsController@showManage'));
    Route::post('/campaigns/{id}/pledges/add', array('as' => 'public.campaigns.pledges.create', 'uses' => 'Campaign\PledgeController@postCreate'));
});

Route::get('/login', array('as' => 'login', 'uses' => 'AuthController@showIndex'));
Route::post('/login', array('as' => 'login', 'uses' => 'AuthController@postLogin'));

Route::get('/register', array('as' => 'register', 'uses' => 'AuthController@showNew'));
Route::post('/register', array('as' => 'register', 'uses' => 'AuthController@postCreate'));

Route::when('admin/*', 'auth' );
Route::when('admin', 'auth' );

Route::get('/members', array('as' => 'public.members', 'uses' => 'UsersController@showIndex'));
Route::get('/members/{id}', array('as' => 'public.member', 'uses' => 'UsersController@showView'));
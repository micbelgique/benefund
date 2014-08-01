<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', array('as' => 'home', 'uses' => 'HomeController@showIndex'));
Route::get('/admin', array('as' => 'admin.home', 'uses' => 'Admin\HomeController@showIndex'));

Route::get('/login', array('as' => 'login', 'uses' => 'AuthController@showIndex'));
Route::post('/login', array('as' => 'auth.login', 'uses' => 'AuthController@postLogin'));

Route::when('admin/*', 'auth' );
Route::when('admin', 'auth' );
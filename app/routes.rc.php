<?php

// Routes specified by Romain Carlier

Route::get('/campaigns2', array('as' => 'public.campaigns2', 'uses' => 'Campaigns2Controller@showIndex'));
Route::post('/campaigns2', array('as' => 'public.campaigns2.search', 'uses' => 'Campaigns2Controller@showSearch'));

Route::get('/admin/pages', array('as' => 'admin.pages', 'uses' => 'Admin\PagesController@showIndex'));
Route::get('/admin/pages/new', array('as' => 'admin.pages.new', 'uses' => 'Admin\PagesController@showNew'));
Route::post('admin/pages/new', array('as' => 'admin.pages.create', 'uses' => 'Admin\PagesController@postCreate'));
Route::get('/admin/pages/{id}/edit', array('as' => 'admin.pages.edit', 'uses' => 'Admin\PagesController@showEdit'));
Route::post('/admin/pages/{id}/edit', array( 'as' => 'admin.pages.update', 'uses' => 'Admin\PagesController@postUpdate'));
Route::post('/admin/pages/{id}/delete', array( 'as' => 'admin.pages.delete', 'uses' => 'Admin\PagesController@postDelete'));

Route::get('/admin/categories', array('as' => 'admin.categories', 'uses' => 'Admin\CategoriesController@showIndex'));
Route::get('/admin/categories/new', array('as' => 'admin.categories.new', 'uses' => 'Admin\CategoriesController@showNew'));
Route::post('admin/categories/new', array('as' => 'admin.categories.create', 'uses' => 'Admin\CategoriesController@postCreate'));
Route::get('/admin/categories/{id}/edit', array('as' => 'admin.categories.edit', 'uses' => 'Admin\CategoriesController@showEdit'));
Route::post('/admin/categories/{id}/edit', array( 'as' => 'admin.categories.update', 'uses' => 'Admin\CategoriesController@postUpdate'));
Route::post('/admin/categories/{id}/delete', array( 'as' => 'admin.categories.delete', 'uses' => 'Admin\CategoriesController@postDelete'));
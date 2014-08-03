<?php

// Routes specified by Romain Carlier


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

Route::get('/campaigns', array('as' => 'public.campaigns', 'uses' => 'CampaignsController@showNew'));

Route::get('/campaigns/new', array('as' => 'public.campaigns.new', 'uses' => 'CampaignsController@showNew'));
Route::post('/campaigns/new', array('as' => 'public.campaigns.create', 'uses' => 'CampaignsController@postCreate'));

Route::get('/campaigns/{id}', array('as' => 'public.campaigns.details', 'uses' => 'CampaignsController@showDetails'));

Route::get('/categories/{id}', array('as' => 'public.categories.details', 'uses' => 'CategoriesController@showDetails'));

Route::get('/pages/{id}', array('as' => 'public.pages.details', 'uses' => 'PagesController@showDetails'));

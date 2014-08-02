<?php

// Routes specified by Romain Carlier

Route::get('/admin/pages', array('as' => 'admin.pages', 'uses' => 'Admin\PagesController@showIndex'));

Route::get('/admin/pages/new', array('as' => 'admin.pages.new', 'uses' => 'Admin\PagesController@showNew'));
Route::post('admin/pages/new', array('as' => 'admin.pages.create', 'uses' => 'Admin\PagesController@postCreate'));

Route::post('/admin/pages/{id}/delete', array( 'as' => 'admin.pages.delete', 'uses' => 'Admin\PagesController@postDelete'));
Route::get('/admin/pages/{id}/edit', array('as' => 'admin.pages.edit', 'uses' => 'Admin\PagesController@showEdit'));
Route::post('/admin/pages/{id}/edit', array( 'as' => 'admin.pages.update', 'uses' => 'Admin\PagesController@postUpdate'));
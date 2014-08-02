<?php

// Routes specified Kévin Rapaille

Route::get('/campaigns/', array('as' => 'public.campaigns', 'uses' => 'CampaignsController@showIndex'));
Route::get('/campaigns/create', array('as' => 'public.campaigns.new', 'uses' => 'CampaignsController@showNew'));
Route::post('/campaigns/create', array('as' => 'public.campaigns.create', 'uses' => 'CampaignsController@postCreate'));
Route::get('/campaigns/{id}/edit', array('as' => 'public.campaigns.edit', 'uses' => 'CampaignsController@showEdit'));
Route::post('/campaigns/{id}/edit', array('as' => 'public.campaigns.update', 'uses' => 'CampaignsController@postUpdate'));
Route::post('/campaigns/{id}/delete', array('as' => 'public.campaigns.delete', 'uses' => 'CampaignsController@postDelete'));

<?php

// Routes specified Kévin Rapaille

Route::get('/campaign/', array('as' => 'public.campaign', 'uses' => 'CampaignController@showIndex'));
Route::get('/campaign/create', array('as' => 'public.campaign.new', 'uses' => 'CampaignController@showNew'));
Route::post('/campaign/create', array('as' => 'public.campaign.create', 'uses' => 'CampaignController@postCreate'));
Route::get('/campaign/{id}/edit', array('as' => 'public.campaign.edit', 'uses' => 'CampaignController@showEdit'));
Route::post('/campaign/{id}/edit', array('as' => 'public.campaign.update', 'uses' => 'CampaignController@postEdit'));
Route::post('/campaign/{id}/delete', array('as' => 'public.campaign.delete', 'uses' => 'CampaignController@postDelete'));
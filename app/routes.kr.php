<?php

// Routes specified Kévin Rapaille

Route::get('/campaign/', array('as' => 'campaign', 'uses' => 'CampaignController@showIndex'));
Route::get('/campaign/create', array('as' => 'public.campaign.showNew', 'uses' => 'CampaignController@showNew'));
Route::post('/campaign/create', array('as' => 'public.campaign.create', 'uses' => 'CampaignController@postCreate'));
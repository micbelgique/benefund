<?php

// Routes specified Kévin Rapaille

Route::get('/campaigns/', array('as' => 'public.campaigns', 'uses' => 'CampaignsController@showIndex'));

Route::group(array('before' => 'auth'), function() {

    Route::get('/campaigns/create', array('as' => 'public.campaigns.new', 'uses' => 'CampaignsController@showNew'));
    Route::post('/campaigns/create', array('as' => 'public.campaigns.create', 'uses' => 'CampaignsController@postCreate'));
    Route::get('/campaigns/{id}/edit', array('as' => 'public.campaigns.edit', 'uses' => 'CampaignsController@showEdit'));
    Route::post('/campaigns/{id}/edit', array('as' => 'public.campaigns.update', 'uses' => 'CampaignsController@postUpdate'));
    Route::post('/campaigns/{id}/delete', array('as' => 'public.campaigns.delete', 'uses' => 'CampaignsController@postDelete'));

});

Route::get('/admin/campaigns/', array('as' => 'admin.campaigns', 'uses' => 'Admin\CampaignsController@showIndex'));
Route::get('/admin/campaigns/create', array('as' => 'admin.campaigns.new', 'uses' => 'Admin\CampaignsController@showNew'));
Route::post('/admin/campaigns/create', array('as' => 'admin.campaigns.create', 'uses' => 'Admin\CampaignsController@postCreate'));
Route::get('/admin/campaigns/{id}/edit', array('as' => 'admin.campaigns.edit', 'uses' => 'Admin\CampaignsController@showEdit'));
Route::post('/admin/campaigns/{id}/edit', array('as' => 'admin.campaigns.update', 'uses' => 'Admin\CampaignsController@postUpdate'));
Route::post('/cadmin/ampaigns/{id}/delete', array('as' => 'admin.campaigns.delete', 'uses' => 'Admin\CampaignsController@postDelete'));
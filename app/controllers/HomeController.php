<?php

class HomeController extends BaseController {

    protected $layout = 'public.templates.main';

    public function showIndex() {
	    $campaigns = Campaign::all();

        $this->layout->content = View::make('public.home.index');
        $this->layout->content->campaigns = $campaigns;
        $this->layout->content_title = Lang::get('campaigns.list');

    }

}
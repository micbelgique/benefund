<?php

class HomeController extends BaseController {

    protected $layout = 'templates.main';

    public function showIndex() {
        $this->layout->content = View::make('home.index');
    }

}
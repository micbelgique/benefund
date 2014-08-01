<?php

namespace Admin;

use \View;

class PagesController extends BaseController {

    protected $layout = 'admin.templates.main';

    public function showIndex() {
        $this->layout->content = View::make('admin.pages.index');
    }

}
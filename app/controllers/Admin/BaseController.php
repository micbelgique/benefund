<?php

namespace Admin;

use \Controller;
use \Route;
use \View;

class BaseController extends Controller {

    protected $styles = array();
    protected $scripts = array();
    protected $inline_js = '';

    /**
     * Setup the layout used by the controller.
     *
     * @return void
     */
    protected function setupLayout() {
        if ( ! is_null($this->layout)) {
            $route_parts = explode( '.', Route::currentRouteName() );
            $this->layout = View::make($this->layout)
                ->with('styles', $this->styles)
                ->with('scripts', $this->scripts)
                ->with('inline_js', $this->inline_js);
        }
    }

}

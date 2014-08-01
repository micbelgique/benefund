<?php

class AuthController extends BaseController {

    protected $layout = 'public.templates.auth';

    public function showIndex() {
        $this->layout->content = View::make('public.auth.login');
    }

    public function postLogin() {
        if( Auth::attempt( array( 'email' => Input::get('email'), 'password' => Input::get('password') ) ) ) {
            return Redirect::intended('admin');
        } else {
            return Redirect::guest('login')
                ->withInput()
                ->with('login_errors', true);
        }
    }

    public function getLogout() {
        Auth::logout();

        return Redirect::route('home');
    }

    public function showCreate() {

    }

}
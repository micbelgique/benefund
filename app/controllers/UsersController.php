<?php

class UsersController extends BaseController {

    protected $layout = 'public.templates.main';

    public function showIndex() {
        $this->layout->content = View::make('public.users.profile')
            ->with('user', Auth::user());
    }

    public function postUpdate() {
        $validator = Validator::make( Input::all(), User::$rules_update );
        if( $validator->passes() ) {
            if( User::where('email', Input::get('email'))->where('id', '!=', Auth::user()->id)->count() == 0 ) {
                $user = User::find(Auth::user()->id);
                $user->email      = Input::get('email');
                if( Input::get('password', '') != '' ) {
                    $user->password   = Hash::make(Input::get('password'));
                }
                $user->first_name = Input::get('first_name');
                $user->last_name  = Input::get('last_name');
                $user->bio        = Input::get('bio', '');
                $user->save();

                return Redirect::route('profile')->withMessage('Your profile has been updated.');
            } else {
                return Redirect::route('profile')->withInput()->withErrors(['email' => 'The email has already been taken.']);
            }

        } else {
            return Redirect::route('profile')->withErrors($validator)->withInput();
        }
    }

}
<?php

class UsersController extends BaseController {

    protected $layout = 'public.templates.main';

    public function __construct() {
        $this->scripts[] = "/assets/js/summernote.min.js?v=" . time();
        $this->scripts[] = "/assets/js/users.profile.js?v=" . time();
        $this->styles[] = "/assets/css/summernote.css?v=" . time();
    }

    public function showIndex() {
        $this->scripts[] = 'assets/js/users.profile.js';
        $this->layout->content = View::make('public.users.profile')
            ->with('user', Auth::user());
    }

    public function postUpdate() {
        $validator = Validator::make( Input::all(), User::$rules_update );
        if( $validator->passes() ) {
            $avatar = Input::file('avatar');
            $destination_path = 'uploads/avatars';
            $file_name = Auth::user()->id;

            $path_parts = explode('.', $avatar->getClientOriginalName() );
            $ext = $path_parts[count($path_parts) - 1];

            $upload_success = Input::file('avatar')->move($destination_path, $file_name . '.png');

            if( $upload_success ) {
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
                    return Redirect::route('profile')->withInput()->withErrors(['avatar' => 'The file could not be uploaded.']);
                }
            } else {
                return Redirect::route('profile')->withInput()->withErrors(['email' => 'The email has already been taken.']);
            }

        } else {
            return Redirect::route('profile')->withErrors($validator)->withInput();
        }
    }

}
<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	protected $table = 'users';

	protected $hidden = array('password');

	public static $rules = array(
		'email'                 => 'required|email|unique:users',
		'password'              => 'required|alpha_num|min:7|confirmed',
		'password_confirmation' => 'required|alpha_num',
		'first_name'            => 'required|min:2',
		'last_name'             => 'required|min:2'
	);

}

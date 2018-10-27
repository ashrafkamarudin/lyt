<?php

/**
* 
*/
class User extends Controller
{
	use Auth;

	protected $table = 'users';
	protected $id; // user id
	protected $fields = [
		'firstname' => '',
		'lastname' => '',
		'email' => '',
		'password' => ''
	];
	
}
<?php

/**
* 
*/
class User extends Auth
{
	protected $table = 'users';
	protected $id; // user id
	protected $fields = [
		'firstname' => '',
		'lastname' => '',
		'email' => '',
		'password' => ''
	];
	
}
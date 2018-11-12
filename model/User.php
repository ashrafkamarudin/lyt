<?php

/**
* 
*/
class User extends Model
{
	use Auth, stORM;

	protected static $table = 'users';
	protected $id; // user id
	protected $fields = [
		'firstname' => '',
		'lastname' => '',
		'email' => '',
		'password' => '',
		'list' => ''
	];
	
	public function liste()
	{
		return $this->has('model/listi');
	}
}
<?php

/**
* 
*/
class Listi extends Model
{
	use stORM;

	protected static $table = 'list';
	protected $id; // user id
	protected $fields = [
		'list_name' => '',
		'distance' => '',
		'user_id' => ''
	];
	
}
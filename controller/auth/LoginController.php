<?php

/**
* 
*/
class LoginController extends AuthLogin
{
	
	function __construct() {
		parent::__construct();
	}

	public function index($value='')
	{
		$this->view->render('login', 'authLayout'); // loads view with indexLayout
	}
}
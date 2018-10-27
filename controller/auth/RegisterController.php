<?php

/**
* 
*/
class RegisterController extends Controller
{

	private $errors = array();
	
	function __construct() {
		parent::__construct();
	}

	public function index($value='')
	{
		$this->view->render('register', 'authLayout'); // loads view with indexLayout
	}
}
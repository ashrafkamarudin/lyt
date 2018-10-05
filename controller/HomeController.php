<?php

/**
* 
*/
class HomeController extends Controller
{
	
	function __construct() {
		parent::__construct();
	}

	public function index($value='')
	{
		$this->view->render('welcome', 'welcomeLayout'); // loads view with indexLayout
	}
}
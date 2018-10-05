<?php

/**
* 
*/
class DashboardController extends Controller
{
	
	function __construct() {
		parent::__construct();
	}

	public function index($value='')
	{
		//test::var_dump($_SESSION);
		$this->view->render('dashboard', 'adminLayout'); // loads view with indexLayout
	}
}
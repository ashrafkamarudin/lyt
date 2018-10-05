<?php

/**
* Basic Controller
*/
class Error extends Controller
{
	function __construct() {
		parent::__construct();
	}

	public function index($value='')
	{
		$this->view->render('404'); // loads view with indexLayout
	}
}
<?php

require_once 'model/Listi.php';

/**
* 
*/
class DashboardController extends Controller
{
	
	function __construct() {
		parent::__construct();
	}

	public function index()
	{
		$users = User::All()->test();

		//test::var_dump($_SESSION);
		/*$users = User::All();
		$listi = Listi::All();

		echo "<pre>";

		$grouped = [];
		foreach ($listi as $lisst) {
			$grouped[$lisst->user_id][] = $lisst;
		}

		foreach ($users as $user) {
			//$user->list = $grouped[$user->id];

			print_r($user->liste());
		}*/


		//echo "<pre>";
		//print_r($users);
		//print_r($listi);
		//print_r($users);
		//$this->view->render('dashboard', 'adminLayout'); // loads view with indexLayout
	}
}
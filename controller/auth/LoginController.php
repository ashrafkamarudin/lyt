<?php

/**
* 
*/
class LoginController extends Controller
{
	private $errors = array();
	private $messages = array();
	
	function __construct() {
		parent::__construct();
	}

	public function index($value='')
	{
		$this->view->render('login', 'authLayout'); // loads view with indexLayout
	}

	public function doLogin($value='')
	{
		extract($_POST);
		$user = User::getByEmail($email); // find the user account

		// input validation
		if (User::validateEmail($email) == false) {
			$this->errors[] = "Please enter a valid e-mail address";
		}

		if ($user->email == null) {
			$this->errors[] = "No user found for " . $email . ".";
		} 

		if (User::validatePassword($password) == false) {
			$this->errors[] = "Password must be between 2 - 20 character";
		} elseif ($password !== $user->password) {
			$this->errors[] = "The password you entered is wrong. Please try again.";
		}

		if ($this->errors == null) {

			if ($user->password == $password) {

				$_SESSION['user_login_status'] = 1;
				$_SESSION['firstname'] = $user->firstname;
				$_SESSION['lastname'] = $user->lastname;
				$_SESSION['email'] = $user->email;

				test::var_dump($_SESSION);

				$redirect = 'dashboard';
			}

		} else {
			test::var_dump($this->errors);
			Flash::Set($this->errors, 'fail');

			$redirect = 'login';
		}

		$this->redirect(URL . $redirect); // redirect
	}

	public function doLogout($value='')
	{
		// delete the session of the user
        $_SESSION = array();
        session_destroy();

        // return a little feeedback message
        Flash::Set(['You have been logged out'], 'success');

        var_dump($_SESSION);

        $this->redirect(URL . 'login'); // redirect
	}
}
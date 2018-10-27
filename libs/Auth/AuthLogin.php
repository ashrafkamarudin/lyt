
<?php

/**
* 
*/
class AuthLogin extends Controller
{
	protected $errors = array();
	protected $messages = array();
		
	public function doLogin($value='')
	{
		extract($_POST);
		$user = User::getByEmail($email); // find the user account

		// input validation
		if (User::validateEmail($email) == false) {
			$this->errors[] = ['email' => "Please enter a valid e-mail address"];
		}

		if ($user->email == null) {
			$this->errors[] = ['email' => "No user found for " . $email . "."];
		} 

		if (User::validatePassword($password) == false) {
			$this->errors[] = ['password' => "Password must be between 2 - 20 character"];
		} elseif ($password !== $user->password) {
			$this->errors[] = ['password' => "The password you entered is wrong. Please try again."];
		}

		if ($this->errors == null) {

			if ($user->password == $password) {

				$_SESSION['user_login_status'] = 1;
				$_SESSION['firstname'] = $user->firstname;
				$_SESSION['lastname'] = $user->lastname;
				$_SESSION['email'] = $user->email;

				$redirect = 'dashboard';
			}

		} else {
			Session::SetFlash($this->errors, 'fail');

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
        Session::SetFlash(['You have been logged out'], 'success');

        var_dump($_SESSION);

        $this->redirect(URL . 'login'); // redirect
	}
}
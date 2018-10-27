
<?php

/**
* 
*/
trait Authenticate
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

	public function register($value='')
	{

		extract($_POST);

		if (User::validateUsername($first_name) == false | User::validateUsername($last_name) == false) {
			$this->errors[] = ['name' => "First Name or Last Name must be between 2 - 20 characters"];
		}

		if (User::validateEmail($email) == false) {
			$this->errors[] = ['email' => "Please enter a valid e-mail address"];
		}

		if (User::validatePassword($password) == false) {
			$this->errors[] = ['password' => "Password must be between 2 - 20 character"];
		}

		if ($password !== $confirm_password) {
			$this->errors[] = ['password' => "password must be same with confirm password"];
		}

		if ($this->errors == null) {
			$user = new User();

			$user->firstname = $first_name;
			$user->lastname = $last_name;
			$user->email = $email;
			$user->password = $password;

			if ($user->save()) {
				Session::SetFlash(['Your account has been created. You can now login.'], 'success');

				$redirect = 'login';
			}
		} else {
			Session::SetFlash($this->errors, 'fail');

			$redirect = 'register';
		}

		$this->redirect(URL . $redirect); // redirect
	}
}
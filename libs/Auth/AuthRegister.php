<?php

/**
* 
*/
class AuthRegister extends Controller
{
	
	public function register($value='')
	{

		extract($_POST);

		if (User::validateUsername($first_name) == false | User::validateUsername($last_name) == false) {
			$this->errors[] = "First Name or Last Name must be between 2 - 20 characters";
		}

		if (User::validateEmail($email) == false) {
			$this->errors[] = "Please enter a valid e-mail address";
		}

		if (User::validatePassword($password) == false) {
			$this->errors[] = "Password must be between 2 - 20 character";
		}

		if ($password !== $confirm_password) {
			$this->errors[] = "password must be same with confirm password";
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
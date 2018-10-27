<?php

/**
* 
*/
trait Auth
{

	// return boolean true if username is valid format
	public static function validateUsername($username)
	{
		return preg_match('/^[A-Z0-9]{2,20}$/i', $username);
	}

	// return email if email is valid format
	public static function validateEmail($email)
	{
		return filter_var($email, FILTER_VALIDATE_EMAIL);
	}

	// return boolean true if password is valid format
	public static function validatePassword($password)
	{
		return preg_match('/^[A-Z0-9]{2,20}$/i', $password);
	}

	/**
     * simply return the current state of the user's login
     * @return boolean user's login status
     */
    public static function isUserLoggedIn()
    {
        if (isset($_SESSION['user_login_status']) AND $_SESSION['user_login_status'] == 1) {
            return true;
        }
        // default return
        return false;
    }

    public static function getByUsername($username)
	{
		$user = new User();

		$query = 'SELECT * FROM users WHERE name = :username';

		$field = DB::Query($query, [':username' => $username])->fetch();

		if ($field) {
			$user->firstname = $field['firstname'];
			$user->firstname = $field['lastname'];
			$user->email = $field['email'];
			$user->password = $field['password'];
		}

		return $user;
	}

	public static function getByEmail($email)
	{
		$user = new User();

		$query = 'SELECT * FROM users WHERE email = :email';

		$field = DB::Query($query, [':email' => $email])->fetch();

		if ($field) {
			$user->firstname = $field['firstname'];
			$user->lastname = $field['lastname'];
			$user->email = $field['email'];
			$user->password = $field['password'];
		}

		return $user;
	}
}
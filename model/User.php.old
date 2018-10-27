<?php

/**
* 
*/
class User
{
	private $uid; // user id
	private $fields; // other record field
	private $table = 'users';
	
	function __construct()
	{
		$this->uid = null;
		$this->fields = [
			'firstname' => '',
			'lastname' => '',
			'email' => '',
			'password' => ''
			];
	}

	// override magic method to retrieve properties
	public function __get($field)
	{
		if ($field == 'userId') {
			return $this->uid;
		} else {
			return $this->fields[$field];
		}
	}

	public function __set($field, $value)
	{
		if (array_key_exists($field, $this->fields)) {
			$this->fields[$field] = $value;
		}

		// array_key_exists(key, array)
	}

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

	public static function getById($user_id)
	{
		$user = new User();

		$db = new Database();

		$data = $db->getId($user_id, 'users');

		if ($data) {
			$user->username = $data['name'];
			$user->password = $data['password'];
			$user->email = $data['email'];
		}

		return $user;
	}

	public static function getByUsername($username)
	{
		$db = new Database();
		$user = new User();

		$query = 'SELECT * FROM users WHERE name = :username';

		$field = $db->run($query, [':username' => $username])->fetch();

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
		$db = new Database();
		$user = new User();

		$query = 'SELECT * FROM users WHERE email = :email';

		$field = $db->run($query, [':email' => $email])->fetch();

		if ($field) {
			$user->firstname = $field['firstname'];
			$user->lastname = $field['lastname'];
			$user->email = $field['email'];
			$user->password = $field['password'];
		}

		return $user;
	}

	public function save($value='')
	{
		$db = new Database();
		$data = [
			'firstname' => $this->firstname,
			'lastname' => $this->lastname,
			'email' => $this->email,
			'password' => $this->password
			];

		if ($db->create($data, $this->table)) {
			return true;
		} 
		return false;
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
}
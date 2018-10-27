<?php

/**
* 
*/
class Session
{

	// to display messages function with bootstrap
    public static function Flash($value='') {

        if (isset($_SESSION['alert']) && isset($_SESSION['messages'])) {
            if ($_SESSION['alert'] == 'success') {
                echo "<div class='alert alert-success'>";
            } elseif ($_SESSION['alert'] == 'fail') {
                echo "<div class='alert alert-danger'>";
            } else {
               echo "<div>";
            }

            foreach ($_SESSION['messages'] as $message) {
                echo $message . "<br>";
            }
            echo "</div>";

            unset($_SESSION['messages']);
            unset($_SESSION['alert']);
        }
    }

    public static function SetFlash($messages, $alert) {

        $_SESSION['messages'] = $messages;
        $_SESSION['alert'] = $alert;
    }

    public static function Show($sessionName) {

    	if (isset($_SESSION[$sessionName])) {
    		return $_SESSION[$sessionName];
    	}
    }

    public static function Set($sessionName, $value) {
        $_SESSION[$sessionName] = $value;
    }

    public static function Destroy($sessionName) {

    	if (isset($_SESSION[$sessionName])) {
    		$_SESSION[$sessionName] = '';
	        unset($_SESSION[$sessionName]);
    	}
    }
}
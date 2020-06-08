<?php

/**
* 
*/
class Flash
{
	// to display messages function with bootstrap
    public static function Show($value='') 
    {
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

    // to set messages
    // messages must be in array
    public static function Set($messages, $alert) 
    {
        $_SESSION['messages'] = $messages;
        $_SESSION['alert'] = $alert;
    }
}
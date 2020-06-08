<?php

class Controller 
{
    function __construct() 
    {
        $this->view = new View();
    }

    function redirect($url, $permanent = false) 
    {
        if($permanent) {
            header('HTTP/1.1 301 Moved Permanently');
        }
        header('Location: '.$url);
        exit();
    }

    // to load model
    // @param string $table
    function load($name) 
    {
        $path = 'model/' . $name. '.php';
        
        if(file_exists($path)){
            require 'model/' . $name. '.php';
        }
    }

}
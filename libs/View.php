<?php

class View {

    public function render($name, $layout = NULL)
    {
        if ($layout != NULL) {
        	require 'views/layouts/' . $layout . '.php';
        } else {
        	require 'views/' . $name . '.php';
        }
    }
}
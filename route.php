<?php

/*
|----------------------------------------------------------------
| Routing File
|----------------------------------------------------------------
|
| This is where you register your web routes of your application
|
*/

/**
| Routes for Web Apps
*/

// Index / Main Page
$app->get('/', ['path' => 'HomeController', 'controller' => 'HomeController']);


$app->get('/register', ['path' => 'auth/RegisterController', 'controller' => 'RegisterController']);
$app->get('/login', ['path' => 'auth/LoginController', 'controller' => 'LoginController']);


if (User::isUserLoggedIn() == true) {	
	$app->get('/dashboard', ['path' => 'DashboardController', 'controller' => 'DashboardController']);
}
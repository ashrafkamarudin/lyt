<?php

session_start();

//Autoload
require 'libs/router.php';
require 'libs/Controller.php';
require 'libs/View.php';
require 'libs/Model.php';
require 'libs/Session.php';

//Library
require 'libs/Database.php';
require 'libs/Flash.php';

//auth
require 'libs/Auth/Auth.php';
require 'libs/Auth/AuthLogin.php';
require 'libs/Auth/AuthRegister.php';
require 'model/User.php';

require'config.php';

//Testing
require 'libs/Test.php';

$app = new Route();

require 'route.php';

$app->run();
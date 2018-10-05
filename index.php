<?php

session_start();

//Autoload
require 'libs/router.php';
require 'libs/Controller.php';
require 'libs/View.php';
require 'libs/Model.php';

//Library
require 'libs/Database.php';
require 'libs/Flash.php';
require 'libs/Test.php';

//auth
require 'model/User.php';

require'config.php';

//Testing
require 'test/ConsoleWrite.php';

$app = new Route();

require 'route.php';

$app->run();
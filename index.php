<?php

session_start();

//Autoload
require 'libs/router.php';
require 'libs/Controller.php';
require 'libs/View.php';
require 'libs/Model.php';

//Library
require 'libs/Database.php';
require 'libs/stORM.php';
require 'libs/Session.php';

//auth
require 'libs/Auth/Auth.php';
require 'libs/Auth/Authenticate.php';
require 'model/User.php';

require'config.php';

//Testing
require 'libs/Test.php';

$app = new Route();

require 'route.php';

$app->run();
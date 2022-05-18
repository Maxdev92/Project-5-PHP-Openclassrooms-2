<?php
session_start();
require_once(__DIR__.'/vendor/autoload.php');

use App\Manager\UserManager;
use App\Router;



// require_once('controllers/Router.php');

$router = new Router();

$router->routeReq();




 ?>

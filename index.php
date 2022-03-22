<?php
session_start();
require_once(dirname(__DIR__).'/BLOG-MVC-MASTER/vendor/autoload.php');
use App\Router;



// require_once('controllers/Router.php');

$router = new Router();

$router->routeReq();




 ?>

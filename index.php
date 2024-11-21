<?php 

require_once __DIR__."/vendor/autoload.php";
use App\routes\Router;

$uri=$_SERVER['REQUEST_URI'];
$method=$_SERVER['REQUEST_METHOD'];
$args=explode('/',$_SERVER['PATH_INFO']);

require_once "./app/views/templates/header.php";

Router::getRoutes($uri,$method,$args);

require_once "./app/views/templates/footer.php";
?>
<?php 

require_once __DIR__."/vendor/autoload.php";
use App\routes\Router;

require_once __DIR__."/app/routes/rutas.php";

require_once "./app/views/templates/header.php";

// Resolver rutas
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH); // Parsear la URL sin query params
$method = $_SERVER['REQUEST_METHOD'];
Router::resolve($uri, $method);

require_once "./app/views/templates/footer.php";
?>
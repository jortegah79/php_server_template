<?php 

use App\routes\Router;

// Registrar rutas
Router::get('/', function() {
    require "./app/views/pages/users/usuarios.php";
});

/*ejemplos */
Router::get('/usuario/:id', function($id) {
    echo "Usuario ID: " . htmlspecialchars($id);
    
});

Router::get('/productos', function() {
    $offset = $_GET['offset'] ?? 0; // Obtener query params
    $limit = $_GET['limit'] ?? 10;
    echo "Mostrando productos desde offset $offset con un límite de $limit";
});

// Registrar ruta POST de ejemplo
Router::post('/formulario', function() {
    $nombre = $_POST['nombre'] ?? '';
    echo "Formulario enviado con el nombre: " . htmlspecialchars($nombre);
});

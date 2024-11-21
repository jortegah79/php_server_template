<?php 

namespace App\routes;

class Router{

    public static function getRoutes(string $uri,string $method,array $args=[]){
        switch ($uri) {
            case '/':        
                require_once "./app/views/pages/users/usuarios.php";
                break;
            
            default:
                //404
                break;
        }
        
    }
}
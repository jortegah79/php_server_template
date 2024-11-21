<?php

namespace App\routes;

class Router {
    private static array $routes = [];

    public static function get(string $pattern, callable $callback) {
        self::$routes[] = [
            'method' => 'GET',
            'pattern' => self::convertToRegex($pattern),
            'callback' => $callback
        ];
    }

    public static function post(string $pattern, callable $callback) {
        self::$routes[] = [
            'method' => 'POST',
            'pattern' => self::convertToRegex($pattern),
            'callback' => $callback
        ];
    }

    public static function resolve(string $uri, string $method) {
        foreach (self::$routes as $route) {
            if ($method === $route['method'] && preg_match($route['pattern'], $uri, $matches)) {
                array_shift($matches); 
                return call_user_func_array($route['callback'], $matches); 
            }
        }
        
        http_response_code(404);
        echo "404 - Ruta no encontrada";
    }
    private static function convertToRegex(string $pattern): string {
        // Reemplazar variables dinámicas (como :id) por regex
        return '#^' . preg_replace('/:\w+/', '(\w+)', $pattern) . '$#';
    }
}


<?php

class Router {
    protected $routes = [];

    // Método para definir rutas GET
    public function get($url, $callback) {
        $this->routes['GET'][$url] = $callback;
    }

    // Método para definir rutas POST
    public function post($url, $callback) {
        $this->routes['POST'][$url] = $callback;
    }

    // Método para procesar las solicitudes entrantes
    public function run() {
        $currentUrl = $_SERVER['REQUEST_URI'] ?? '/';
        $method = $_SERVER['REQUEST_METHOD'];

        // Procesar las rutas
        if (isset($this->routes[$method][$currentUrl])) {
            $callback = $this->routes[$method][$currentUrl];

            // Si el callback es un string (como 'Controller@method'), dividir y llamar
            if (is_string($callback)) {
                $parts = explode('@', $callback);
                $controller = new $parts[0]();
                $method = $parts[1];
                call_user_func([$controller, $method]);
            } else {
                // Si es una función anónima, ejecutar directamente
                call_user_func($callback);
            }
        } else {
            // Página no encontrada (404)
            http_response_code(404);
            echo "Página no encontrada";
        }
    }
}

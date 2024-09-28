<?php
// Incluir el autoloader de Composer para cargar las clases
require_once __DIR__ . '/../vendor/autoload.php';

// Incluir el archivo del enrutador
require 'Router.php';

// Incluir controladores necesarios
require 'Controlador.php';

// Crear una instancia del enrutador
$router = new Router();

// Definir rutas GET (ejemplo: página de inicio)
$router->get('/', function () {
    require 'index.html'; // Cargar la página principal
});


// Definir rutas POST (para manejar el envío de formulario de contacto)
$router->post('/', 'Controlador@contacto');

// Ejecutar el enrutador para procesar la solicitud
$router->run();

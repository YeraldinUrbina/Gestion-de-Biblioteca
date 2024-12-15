<?php
require_once __DIR__ . '/../vendor/autoload.php';

// Obtener controlador y acción desde la URL
$controller = isset($_GET['controller']) ? ucfirst($_GET['controller']) : 'Home';
$action = isset($_GET['action']) ? $_GET['action'] : 'index';

// Obtener el ID (si existe) desde la URL
$id = isset($_GET['id']) ? intval($_GET['id']) : null;

// Construir el nombre de la clase del controlador
$controllerClass = "Estudiante\\Composer\\Controllers\\" . $controller . "Controller";

if (class_exists($controllerClass)) {
    $controllerObject = new $controllerClass();

    if (method_exists($controllerObject, $action)) {
        // Manejar solicitudes POST y GET
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Si es POST, pasar datos del formulario
            $params = [$id, $_POST]; // $id para identificar al usuario, $_POST contiene los datos
        } else {
            // Si es GET, pasar solo $id (si aplica)
            $params = $id ? [$id] : [];
        }

        // Llamar al método del controlador con los parámetros
        call_user_func_array([$controllerObject, $action], $params);
    } else {
        echo "El método '$action' no existe en el controlador '$controllerClass'.";
    }
} else {
    echo "El controlador '$controllerClass' no existe.";
}
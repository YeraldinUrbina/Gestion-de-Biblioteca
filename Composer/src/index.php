<?php
require_once __DIR__ . '/../vendor/autoload.php';

$controller = isset($_GET['controller']) ? ucfirst($_GET['controller']) : 'home';
$action = isset($_GET['action']) ? $_GET['action'] : 'index';

$id = isset($_GET['id']) ? $_GET['id'] : null;

$controllerClass = "Estudiante\\Composer\\Controllers\\" . $controller . "Controller";
$actionMethod = $action;

if (class_exists($controllerClass)) {
    $controllerObject = new $controllerClass();
    
    if (method_exists($controllerObject, $actionMethod)) {
        // Verificar si los datos vienen por GET o POST
        $params = $_SERVER['REQUEST_METHOD'] === 'POST' ? $_POST : array_slice($_GET, 2);

        // Llamar al método con los parámetros
        call_user_func_array([$controllerObject, $actionMethod], [$params]);
    } else {
        echo "El método '$actionMethod' no existe en el controlador '$controllerClass'.";
    }
} else {
    echo "El controlador '$controllerClass' no existe.";
}



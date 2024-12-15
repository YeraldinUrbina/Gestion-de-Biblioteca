<?php
namespace Estudiante\Composer\Controllers;

use Estudiante\Composer\Models\Usuario;

class UsuarioController
{
    public function index()
    {
        // Llamar al método estático del modelo
        $usuarios = Usuario::obtenerTodos(); // Obtiene todos los usuarios
        require __DIR__ . '/../views/usuario/index.php'; // Cargar la vista de usuarios
    }

    public function create()
    {
        require __DIR__ . '/../views/usuario/create.php';
    }

    public function store()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'nombre' => $_POST['nombre'],
                'numero_documento' => $_POST['numero_documento'],
                'tipo' => $_POST['tipo'],
                'correo_electronico' => $_POST['correo_electronico'],
                'contrasena' => $_POST['contrasena'],
            ];
    
            $resultado = \Estudiante\Composer\Models\Usuario::registrarUsuario($data);
    
            if ($resultado) {
                header('Location: index.php?controller=usuario&action=index');
                exit;
            } else {
                echo "Error al agregar usuario.";
        }
        }
    }

    public function edit($id) {
        if (empty($id)) {
            die("ID no proporcionado.");
        }
        
        $usuario = Usuario::obtenerPorId($id);
        if (!$usuario) {
            die("Usuario no encontrado.");
        }
        require __DIR__ . '/../views/usuario/edit.php';
    }

    public function update($id) {
        // Obtener datos del formulario
        $data = [
            'nombre' => $_POST['nombre'],
            'numero_documento' => $_POST['numero_documento'],
            'tipo' => $_POST['tipo'],
            'correo_electronico' => $_POST['correo_electronico'],
            'contrasena' => !empty($_POST['contrasena']) ? $_POST['contrasena'] : null,
        ];
    
        // Llamar al método del modelo para actualizar
        $resultado = Usuario::update($id, $data);
    
        if ($resultado) {
            header('Location: index.php?controller=usuario&action=index');
            exit;
        } else {
            echo "Error al actualizar el usuario.";
        }
    }

    public function delete($id)
    {
        Usuario::delete($id);
        header('Location: index.php?controller=usuario&action=index');
        exit;
    }

    public function show($id)
    {
        $usuario = Usuario::obtenerPorId($id); // Cambiado a singular
        require __DIR__ . '/../views/usuario/show.php';
    }
}
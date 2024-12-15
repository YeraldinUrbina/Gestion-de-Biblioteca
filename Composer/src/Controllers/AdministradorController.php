<?php
namespace Estudiante\Composer\Controllers;

use Estudiante\Composer\Models\Usuario;
use Estudiante\Composer\Models\Libro;

class AdministradorController {
    public function index() {
        require_once __DIR__ . '/../views/administrador/index.php';
    }

    public function gestionarUsuarios() {

        $usuarios = Usuario::obtenerTodos();
        require_once __DIR__ . '/../views/usuario/index.php';
    }

    public function gestionarLibros() {
        $libros = Libro::obtenerTodos();
        require_once __DIR__ . '/../views/libro/index.php';
    }

    public function gestionarPrestamos() {
        // Gestionar préstamos y devoluciones
    }

    public function gestionarReservas() {
        // Gestionar las reservas activas
    }
}
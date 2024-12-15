<?php
namespace Estudiante\Composer\Controllers;

class EstudianteController {
    public function index() {
        // Lógica para cargar los datos del panel de estudiante
        require_once __DIR__ . '/../views/estudiante/index.php';
    }

    public function consultarLibros() {
        // Mostrar libros disponibles
        require_once __DIR__ . '/../views/estudiante/consultarLibros.php';
    }

    public function pedirPrestamo() {
        // Lógica para solicitar préstamos
        echo "Función para pedir préstamo";
    }
}
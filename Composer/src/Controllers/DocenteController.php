<?php
namespace Estudiante\Composer\Controllers;

class DocenteController {
    public function index() {
        // Lógica para cargar los datos del panel de docente
        require_once __DIR__ . '/../views/docente/index.php';
    }

    public function reservarLibro() {
        // Lógica para reservar libros
        echo "Función para reservar libro";
    }
}
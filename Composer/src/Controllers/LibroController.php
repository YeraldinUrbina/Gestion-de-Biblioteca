<?php

namespace Estudiante\Composer\Controllers;

use Estudiante\Composer\Models\Libro;

class LibroController {
    // Mostrar todos los libros
    public function index() {
        $libros = Libro::obtenerTodos(); // Obtener todos los libros
        require __DIR__ . '/../views/libro/index.php'; // Cargar la vista de libros
    }

    // Mostrar el formulario para registrar un libro
    public function create() {
        $generos = Libro::obtenerGeneros(); 
        $autores = Libro::obtenerAutores(); // Obtener la lista de autores
        require __DIR__ . '/../views/libro/create.php'; // Cargar la vista del formulario
    }

    // Registrar un libro
    public function store() {
        // Recoger los datos enviados por el formulario
        $datos = [
            'id_autor_es' => $_POST['id_autor_es'],
            'id_genero' => $_POST['id_genero'] ?? null, // Si no hay género, será null
            'titulo' => $_POST['titulo'],
            'editorial' => $_POST['editorial'],
            'anio_publicacion' => $_POST['anio_publicacion'],
            'ISBN' => $_POST['ISBN'],
            'immagen' => $_POST['immagen'],
            'estado' => $_POST['estado'],
            'cantidad' => $_POST['cantidad']
        ];

        // Llamar al modelo para registrar el libro
        $success = Libro::registrarLibro($datos);

        // Redirigir o mostrar un mensaje según el resultado
        if ($success) {
            header('Location: index.php?controller=libro&action=index');
        } else {
            echo "Hubo un error al registrar el libro.";
        }
    }

    public function edit($id) {
       
        // Obtener los datos del libro desde la base de datos
        $libro = Libro::buscarPorId($id);
    
        // Verificar si el libro existe
        if (!$libro) {
            echo "El libro con ID $id no existe.";
            return;
        }
    
        $autores = Libro::obtenerAutores();
        $generos = Libro::obtenerGeneros();
        // Cargar la vista para editar el libro
        require_once __DIR__ . '/../Views/Libro/edit.php';

    }

    public function update($datos) {
        $success = Libro::actualizarLibro($datos);
        if ($success) {
            header('Location: index.php?controller=libro&action=index');
        } else {
            echo "Hubo un error al actualizar el libro.";
        }
    }
    
    public function delete($id) {
        // Verificar si el id del libro está presente
        if (!$id) {
            echo "El ID del libro no fue proporcionado.";
            return;
        }
    
        // Intentar eliminar el libro usando el modelo
        $success = Libro::eliminarLibro($id);
    
        if ($success) {
            // Redirigir a la página de libros después de eliminar
            header('Location: index.php?controller=libro&action=index');
        } else {
            echo "Hubo un error al eliminar el libro.";
        }
    }
    
    // En `LibroController.php`
    public function show($id) {
        // Verificar si el ID del libro es válido
        if (!$id) {
            echo "El ID del libro no fue proporcionado.";
            return;
        }

        // Obtener el libro desde el modelo
        $libro = Libro::encontrarPorId($id);

        // Verificar si se encontró el libro
        if ($libro) {
            // Mostrar la vista con los detalles del libro
            require __DIR__ . '/../views/libro/show.php';  // La vista donde se mostrarán los detalles
        } else {
            echo "No se encontró el libro con el ID: " . $id;
        }
    }

    
}

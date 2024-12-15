<?php

namespace Estudiante\Composer\Models;

require_once __DIR__ . '/../config/Database.php';
use PDO;
use PDOException;

class Libro {
    private static $conn;

    // Obtener conexión de base de datos
    public static function getConnection() {
        if (!self::$conn) {
            $db = new \Estudiante\Composer\Config\Database();
            self::$conn = $db->connect();
        }
        return self::$conn;
    }

    // Obtener todos los libros
    public static function obtenerTodos() {
        try {
            $conn = self::getConnection();
            $query = "SELECT * FROM libros";
            $stmt = $conn->prepare($query);
            $stmt->execute();

            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Error al obtener los libros: " . $e->getMessage();
            return [];
        }
    }

    // Registrar un nuevo libro
    public static function registrarLibro($datos) {
        try {
            $conn = self::getConnection();
            $query = "INSERT INTO libros (id_autor_es, id_genero, titulo, editorial, anio_publicacion, ISBN, immagen, estado, cantidad) 
                      VALUES (:id_autor_es, :id_genero, :titulo, :editorial, :anio_publicacion, :ISBN, :immagen, :estado, :cantidad)";
            $stmt = $conn->prepare($query);

            $stmt->bindParam(":id_autor_es", $datos['id_autor_es']);
            $stmt->bindParam(":id_genero", $datos['id_genero']);
            $stmt->bindParam(":titulo", $datos['titulo']);
            $stmt->bindParam(":editorial", $datos['editorial']);
            $stmt->bindParam(":anio_publicacion", $datos['anio_publicacion']);
            $stmt->bindParam(":ISBN", $datos['ISBN']);
            $stmt->bindParam(":immagen", $datos['immagen']);
            $stmt->bindParam(":estado", $datos['estado']);
            $stmt->bindParam(":cantidad", $datos['cantidad']);

            return $stmt->execute();
        } catch (PDOException $e) {
            echo "Error al registrar libro: " . $e->getMessage();
            return false;
        }
    }

    // obtener generos 
    public static function obtenerGeneros() {
        try {
            $conn = self::getConnection();
            $query = "SELECT id, nombre FROM generos"; // Ajusta la consulta según tu base de datos
            $stmt = $conn->prepare($query);
            $stmt->execute();

            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Error al obtener los géneros: " . $e->getMessage();
            return [];
        }
    }

    // Obtener lista de autores
    public static function obtenerAutores() {
        try {
            $conn = self::getConnection();
            $query = "SELECT id, nombre FROM autores";
            $stmt = $conn->prepare($query);
            $stmt->execute();

            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Error al obtener los autores: " . $e->getMessage();
            return [];
        }
    }

    public static function buscarPorId($id) {
        try {
            $conn = self::getConnection();
            $query = "SELECT * FROM libros WHERE id = :id";
            $stmt = $conn->prepare($query);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
    
            return $stmt->fetch(PDO::FETCH_ASSOC); // Retorna un arreglo asociativo con los datos del libro
        } catch (PDOException $e) {
            echo "Error al buscar el libro: " . $e->getMessage();
            return null;
        }
    }

    public static function actualizarLibro($datos) {
        try {
            $conn = self::getConnection();
            $query = "UPDATE libros 
                      SET id_autor_es = :id_autor_es, 
                          id_genero = :id_genero, 
                          titulo = :titulo, 
                          editorial = :editorial, 
                          anio_publicacion = :anio_publicacion, 
                          ISBN = :ISBN, 
                          immagen = :immagen, 
                          estado = :estado, 
                          cantidad = :cantidad 
                      WHERE id = :id";
            $stmt = $conn->prepare($query);
    
            $stmt->bindParam(':id', $datos['id'], PDO::PARAM_INT);
            $stmt->bindParam(':id_autor_es', $datos['id_autor_es']);
            $stmt->bindParam(':id_genero', $datos['id_genero']);
            $stmt->bindParam(':titulo', $datos['titulo']);
            $stmt->bindParam(':editorial', $datos['editorial']);
            $stmt->bindParam(':anio_publicacion', $datos['anio_publicacion']);
            $stmt->bindParam(':ISBN', $datos['ISBN']);
            $stmt->bindParam(':immagen', $datos['immagen']);
            $stmt->bindParam(':estado', $datos['estado']);
            $stmt->bindParam(':cantidad', $datos['cantidad']);
    
            return $stmt->execute();
        } catch (PDOException $e) {
            echo "Error al actualizar el libro: " . $e->getMessage();
            return false;
        }
    }
    

    public static function eliminarLibro($id) {
        try {
            $conn = self::getConnection();
            $query = "DELETE FROM libros WHERE id = :id";
            $stmt = $conn->prepare($query);
            $stmt->bindParam(":id", $id, PDO::PARAM_INT);
            
            return $stmt->execute();
        } catch (PDOException $e) {
            echo "Error al eliminar el libro: " . $e->getMessage();
            return false;
        }
    }
    
    public static function encontrarPorId($id) {
        try {
            $conn = self::getConnection(); // Establece la conexión
            $query = "SELECT * FROM libros WHERE id = :id";
            $stmt = $conn->prepare($query);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);  // Devuelve el libro encontrado
        } catch (PDOException $e) {
            echo "Error al buscar el libro: " . $e->getMessage();
            return null;  // En caso de error, retorna null
        }
    }
    
    
    
}

<?php

namespace Estudiante\Composer\config;

use PDO;
use PDOException;

class Database {
    private $host = "localhost"; 
    private $db_name = "SGB"; 
    private $username = "root"; 
    private $password = ""; 
    private $conn; 

  
    public function connect() {
        $this->conn = null;

        try {
            $this->conn = new PDO(
                "mysql:host=" . $this->host . ";dbname=" . $this->db_name, 
                $this->username, 
                $this->password
            );
            // Configuramos el modo de error a excepciones
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            // Captura y muestra cualquier error de conexión
            die("Error de conexión: " . $e->getMessage());
        }

        return $this->conn;
    }
}
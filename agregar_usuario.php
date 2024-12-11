<?php


$servername = "localhost";
$username = "root";
$password = ""; 
$dbname = "SGB3";

$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}


// Verificar si el formulario ha sido enviado
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Obtener los datos del formulario
    $nombre = $_POST['nombre'];
    $tipo = $_POST['tipo'];
    $telefono = $_POST['telefono'];
    $correo = $_POST['correo'];

    // Preparar la consulta SQL para insertar el nuevo usuario
    $sql = "INSERT INTO Usuario (Nombre, Tipo, Telefono, CorreoElectronico) 
            VALUES (?, ?, ?, ?)";

    // Preparar la sentencia SQL
    if ($stmt = $conn->prepare($sql)) {
        // Vincular los parámetros
        $stmt->bind_param("ssss", $nombre, $tipo, $telefono, $correo);
        
        // Ejecutar la sentencia
        if ($stmt->execute()) {
            echo "Usuario agregado exitosamente.";
        } else {
            echo "Error al agregar el usuario: " . $stmt->error;
        }

        // Cerrar la sentencia
        $stmt->close();
    } else {
        echo "Error en la preparación de la consulta: " . $conn->error;
    }

    // Cerrar la conexión
    $conn->close();
}
?>

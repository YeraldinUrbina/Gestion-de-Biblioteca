<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "SGB3";

$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

$usuario = $_POST['usuario'];
$telefono = $_POST['telefono'];


$sqlUsuario = "SELECT * FROM Usuario WHERE (Nombre = ? OR CorreoElectronico = ?) AND Telefono = ?";
$stmtUsuario = $conn->prepare($sqlUsuario);
$stmtUsuario->bind_param("sss", $usuario, $usuario, $telefono);
$stmtUsuario->execute();
$resultUsuario = $stmtUsuario->get_result();

if ($resultUsuario->num_rows > 0) {
    
    header("Location: index.php");
    exit;
} else {
    
    $sqlAdmin = "SELECT * FROM Administrador WHERE Admin_user = ? AND Contraseña = ?";
    $stmtAdmin = $conn->prepare($sqlAdmin);
    $stmtAdmin->bind_param("ss", $usuario, $telefono);
    $stmtAdmin->execute();
    $resultAdmin = $stmtAdmin->get_result();

    if ($resultAdmin->num_rows > 0) {
        
        header("Location: vista_administrador.php");
        exit;
    } else {
        
        header("Location: datosmal.php");
        exit;
    }
}

$stmtUsuario->close();
$stmtAdmin->close();
$conn->close();
?>

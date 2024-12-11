<?php
// Verificar si se ha recibido el ID del usuario
if (isset($_POST['ID_Usuario'])) {
    // Conectar a la base de datos
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "SGB3";

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Comprobar si la conexión fue exitosa
    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    // Obtener el ID del usuario que se quiere eliminar
    $id_usuario = $_POST['ID_Usuario'];

    // Consulta SQL para eliminar el usuario
    $sql = "DELETE FROM usuario WHERE ID_Usuario = ?";

    // Preparar la consulta
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id_usuario); // "i" indica que es un entero

    // Ejecutar la consulta
    if ($stmt->execute()) {
        // Si la eliminación fue exitosa, redirigir de nuevo a la página de usuarios
        header("Location: vista_administrador2.php");
        exit();
    } else {
        echo "Error al eliminar el usuario: " . $conn->error;
    }

    // Cerrar la conexión
    $stmt->close();
    $conn->close();
} else {
    echo "No se ha recibido el ID del usuario.";
}
?>

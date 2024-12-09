<?php
// Conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "SGB3"; // Cambia este nombre por el de tu base de datos real

$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Verifica si los datos de la reserva fueron enviados
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id_libro']) && isset($_POST['id_usuario'])) {
    // Obtener los datos del formulario
    $id_libro = $_POST['id_libro'];
    $id_usuario = $_POST['id_usuario'];
    $fecha_reserva = date('Y-m-d'); // Fecha actual
    $estado = 'activa'; // Estado de la reserva por defecto

    // Prevenir inyecciones SQL utilizando prepared statements
    $stmt = $conn->prepare("INSERT INTO Reserva (ID_Usuario, ID_Libro, Fecha_Reserva, Estado) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("iiss", $id_usuario, $id_libro, $fecha_reserva, $estado);

    if ($stmt->execute()) {
        echo "<p>Reserva realizada con éxito.</p>";
    } else {
        echo "<p>Error al realizar la reserva.</p>";
    }

    // Cerrar la declaración y la conexión
    $stmt->close();
    $conn->close();
} else {
    echo "<p>No se pudieron procesar los datos de la reserva.</p>";
}
?>

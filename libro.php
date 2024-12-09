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

// Verifica si se ha enviado una búsqueda
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['busqueda'])) {
    // Obtener el término de búsqueda
    $busqueda = $_POST['busqueda'];
    
    // Prevenir inyecciones SQL utilizando prepared statements
    $stmt = $conn->prepare("SELECT * FROM Libro WHERE Titulo LIKE ? OR Autor LIKE ?");
    $busqueda_param = "%" . $busqueda . "%"; // Para buscar títulos o autores que contengan la palabra
    $stmt->bind_param("ss", $busqueda_param, $busqueda_param);
    
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        echo "<h2>Resultados de búsqueda:</h2>";
        while ($row = $result->fetch_assoc()) {
            echo "<div class='resultado'>";
            echo "<h3>" . htmlspecialchars($row['Titulo']) . "</h3>";
            echo "<p><strong>Autor:</strong> " . htmlspecialchars($row['Autor']) . "<br>";
            echo "<strong>Editorial:</strong> " . htmlspecialchars($row['Editorial']) . "<br>";
            echo "<strong>Año de publicación:</strong> " . $row['Año_Publicacion'] . "<br>";
            echo "<strong>Género:</strong> " . htmlspecialchars($row['Genero']) . "<br>";
            echo "<strong>ISBN:</strong> " . htmlspecialchars($row['ISBN']) . "<br>";
            echo "<strong>Estado:</strong> " . htmlspecialchars($row['Estado']) . "<br>";
            echo "<strong>Cantidad disponible:</strong> " . $row['Cantidad'] . "<br>";

            // Verifica si la URL de la imagen existe y es válida
            $imagen_url = $row['Imagen_URL'];
            
            // Comprobar si la ruta relativa existe en el servidor
            if (!empty($imagen_url) && file_exists($_SERVER['DOCUMENT_ROOT'] . '/' . $imagen_url)) {
                // Mostrar la imagen
                echo '<img src="' . htmlspecialchars($imagen_url, ENT_QUOTES, 'UTF-8') . '" alt="Imagen de ' . htmlspecialchars($row['Titulo']) . '" class="imagen-libro"><br>';
            } else {
                echo "<p>No hay imagen disponible.</p>";
            }

            // Agregar el formulario de reserva
            echo '<form action="reservar.php" method="POST" class="form-reserva">';
            echo '<input type="hidden" name="id_libro" value="' . $row['ID_Libro'] . '">';
            echo '<input type="hidden" name="id_usuario" value="1">'; // Aquí debes poner el ID del usuario que está realizando la reserva
            echo '<input type="submit" value="Reservar" class="btn-reservar">';
            echo '</form>';
            echo "</div>";
        }
    } else {
        echo "<p>No se encontraron resultados para '" . htmlspecialchars($busqueda) . "'</p>";
    }

    // Cerrar la declaración y la conexión
    $stmt->close();
    $conn->close();
} else {
    echo "<p>Por favor, ingrese un término de búsqueda.</p>";
}
?>

<!-- Estilos CSS -->
<style>
    body {
        font-family: Arial, sans-serif;
        margin: 20px;
        background-color: #f4f4f4;
    }

    h2 {
        color: #333;
    }

    .resultado {
        background-color: #fff;
        padding: 20px;
        margin-bottom: 20px;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .resultado h3 {
        color: #2c3e50;
        font-size: 1.5em;
    }

    .resultado p {
        color: #7f8c8d;
    }

    .imagen-libro {
        max-width: 300px;
        height: auto;
        margin-top: 10px;
        border-radius: 8px;
    }

    .form-reserva {
        margin-top: 20px;
    }

    .btn-reservar {
        background-color: #3498db;
        color: white;
        border: none;
        padding: 10px 20px;
        font-size: 16px;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    .btn-reservar:hover {
        background-color: #2980b9;
    }

    .btn-reservar:active {
        background-color: #1c6381;
    }
</style>

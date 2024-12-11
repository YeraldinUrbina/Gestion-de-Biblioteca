<?php
$servername = "localhost";
$username = "root";
$password = ""; 
$dbname = "SGB3";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize and validate inputs
    $titulo = $conn->real_escape_string(trim($_POST['titulo']));
    $autor = $conn->real_escape_string(trim($_POST['autor']));
    $editorial = $conn->real_escape_string(trim($_POST['editorial']));
    $año = intval($_POST['año']); // Ensure it's an integer
    $genero = $conn->real_escape_string(trim($_POST['genero']));
    $isbn = $conn->real_escape_string(trim($_POST['isbn']));
    $estado = $conn->real_escape_string(trim($_POST['estado']));
    $cantidad = intval($_POST['cantidad']); // Ensure it's an integer
    $imagen_url = $conn->real_escape_string(trim($_POST['imagen_url']));

    // Prepare the SQL query with placeholders
    $stmt = $conn->prepare("INSERT INTO Libro (Titulo, Autor, Editorial, Año_Publicacion, Genero, ISBN, Estado, Cantidad, Imagen_URL) 
                            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
    
    // Bind parameters to the SQL query
    $stmt->bind_param("sssssssis", $titulo, $autor, $editorial, $año, $genero, $isbn, $estado, $cantidad, $imagen_url);

    // Execute the statement and check if it was successful
    if ($stmt->execute()) {
        echo "<p style='color: green;'>Nuevo libro agregado exitosamente.</p>";
    } else {
        echo "<p style='color: red;'>Error: " . $stmt->error . "</p>";
    }

    // Close the prepared statement and the connection
    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Libro</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 20px;
        }

        h1 {
            color: #333;
            text-align: center;
        }

        .form-container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            max-width: 600px;
            margin: 0 auto;
        }

        label {
            font-size: 16px;
            color: #555;
            margin-bottom: 8px;
            display: inline-block;
        }

        input[type="text"],
        input[type="number"],
        select {
            width: 100%;
            padding: 8px;
            margin-bottom: 12px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
        }

        button {
            background-color: #4e524e;
            color: white;
            border: none;
            padding: 12px 20px;
            cursor: pointer;
            font-size: 16px;
            width: 100%;
            border-radius: 4px;
        }

        button:hover {
            background-color: #45a049;
        }

        .form-container p {
            text-align: center;
            font-size: 18px;
            margin-top: 10px;
        }
    </style>
</head>
<body>

    <h1>Agregar Nuevo Libro</h1>

    <div class="form-container">
        <form action="agregar_libro.php" method="post">
            <label for="titulo">Título:</label>
            <input type="text" id="titulo" name="titulo" required><br>

            <label for="autor">Autor:</label>
            <input type="text" id="autor" name="autor" required><br>

            <label for="editorial">Editorial:</label>
            <input type="text" id="editorial" name="editorial" required><br>

            <label for="año">Año de Publicación:</label>
            <input type="number" id="año" name="año" required><br>

            <label for="genero">Género:</label>
            <input type="text" id="genero" name="genero"><br>

            <label for="isbn">ISBN:</label>
            <input type="text" id="isbn" name="isbn" required><br>

            <label for="estado">Estado:</label>
            <select id="estado" name="estado" required>
                <option value="disponible">Disponible</option>
                <option value="prestado">Prestado</option>
                <option value="mantenimiento">Mantenimiento</option>
            </select><br>

            <label for="cantidad">Cantidad:</label>
            <input type="number" id="cantidad" name="cantidad" value="1" required><br>

            <label for="imagen_url">Imagen URL:</label>
            <input type="text" id="imagen_url" name="imagen_url"><br>

            <button type="submit">Agregar Libro</button>
        </form>
    </div>

</body>
</html>

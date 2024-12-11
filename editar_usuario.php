<?php
// Conectar a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "SGB3";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Verificar si se pasa un ID de usuario por GET
if (isset($_GET['ID_Usuario'])) {
    $ID_Usuario = $_GET['ID_Usuario'];

    // Obtener los datos actuales del usuario
    $sql = "SELECT * FROM Usuario WHERE ID_Usuario = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $ID_Usuario);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    if (!$user) {
        echo "Usuario no encontrado.";
        exit;
    }
} else {
    echo "ID de usuario no proporcionado.";
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Actualizar los datos del usuario
    $Nombre = $_POST['Nombre'];
    $Tipo = $_POST['Tipo'];
    $Telefono = $_POST['Telefono'];
    $CorreoElectronico = $_POST['CorreoElectronico'];

    $sql = "UPDATE Usuario SET Nombre = ?, Tipo = ?, Telefono = ?, CorreoElectronico = ? WHERE ID_Usuario = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('ssssi', $Nombre, $Tipo, $Telefono, $CorreoElectronico, $ID_Usuario);

    if ($stmt->execute()) {
        echo "Usuario actualizado exitosamente.";
    } else {
        echo "Error al actualizar el usuario: " . $stmt->error;
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Usuario</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            color: #333;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 80%;
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            text-align: center;
            color: #333;
        }
        form {
            display: flex;
            flex-direction: column;
        }
        label {
            margin: 10px 0 5px;
            font-weight: bold;
        }
        input[type="text"],
        input[type="email"] {
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 14px;
        }
        input[type="text"]:focus,
        input[type="email"]:focus {
            border-color: #4CAF50;
            outline: none;
        }
        button {
            padding: 10px;
            background-color: #4e524e;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s;
        }
        button:hover {
            background-color: #45a049;
        }
        .form-group {
            display: flex;
            flex-direction: column;
        }
        .form-group input {
            font-size: 14px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Editar Usuario</h2>
        <form action="editar_usuario.php?ID_Usuario=<?php echo $user['ID_Usuario']; ?>" method="POST">
            <div class="form-group">
                <label for="Nombre">Nombre:</label>
                <input type="text" name="Nombre" value="<?php echo $user['Nombre']; ?>" required>
            </div>

            <div class="form-group">
                <label for="Tipo">Tipo:</label>
                <input type="text" name="Tipo" value="<?php echo $user['Tipo']; ?>" required>
            </div>

            <div class="form-group">
                <label for="Telefono">Teléfono:</label>
                <input type="text" name="Telefono" value="<?php echo $user['Telefono']; ?>" required>
            </div>

            <div class="form-group">
                <label for="CorreoElectronico">Correo Electrónico:</label>
                <input type="email" name="CorreoElectronico" value="<?php echo $user['CorreoElectronico']; ?>" required>
            </div>

            <button type="submit">Actualizar Usuario</button>
        </form>
    </div>
</body>
</html>

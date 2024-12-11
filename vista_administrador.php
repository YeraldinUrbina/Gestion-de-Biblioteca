<?php

$servername = "localhost";
$username = "root";
$password = ""; 
$dbname = "SGB3";

$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}


$sql = "SELECT ID_Usuario, Nombre, Tipo, Telefono, CorreoElectronico FROM Usuario";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vista 1 de Usuarios</title>
    <style>
        /* Reseteo de márgenes y padding */
        body {
            margin: 0;
            padding: 0;
            font-family: 'Lucida Sans', Geneva, Verdana, sans-serif;
        }

        /* Fondo y encabezado principal */
        .encabezado {
            display: flex;
            align-items: center;
            justify-content: center;  /* Centrado en lugar de espacio entre */
            background-color: #4e524e;
            padding: 15px 30px;
            max-width: 100%; /* Asegura que no se expanda más allá del ancho de la pantalla */
            box-sizing: border-box;  /* Asegura que el padding no afecte al ancho */
        }

        .encabezado h1 {
            color: white;
            margin: 0;
            font-size: 28px;
            text-align: center;  /* Centrado del texto dentro del h1 */
        }

        .encabezado img {
            width: 40px;
            height: 40px;
        }

        /* Menú lateral */
        .contenedor_menu_administrador {
            position: fixed;
            top: 0;
            left: 0;
            width: 270px;
            height: 100vh;
            background-color: #444;
            padding-top: 20px;
            box-shadow: 2px 0 10px rgba(0, 0, 0, 0.2);
        }

        .contenedor_menu_administrador2 {
            text-align: center;
            color: white;
            margin-top: 20px;
        }

        .contenedor_menu_administrador img {
            border-radius: 50%;
            margin-bottom: 10px;
        }

        #administrador {
            font-size: 20px;
            font-weight: bold;
            margin: 10px 0;
        }

        /* Estilo de los botones */
        button {
            width: 200px;
            height: 40px;
            margin: 10px auto;
            border: none;
            background-color: #3498db;
            color: white;
            font-size: 16px;
            border-radius: 8px;
            cursor: pointer;
            transition: all 0.3s ease;
            display: block;
        }

        button:hover {
            background-color: #2980b9;
            transform: scale(1.05);
        }

        button:active {
            background-color: #1c6ea4;
            transform: scale(0.98);
        }

        button#b5 {
            background-color: #e74c3c;
        }

        button#b5:hover {
            background-color: #c0392b;
        }

        button#b5:active {
            background-color: #992d22;
        }

        /* Sección de contenido principal */
        .ss {
            margin-left: 270px;
            padding: 30px;
            background-color: rgb(192, 196, 199);
            box-shadow: 4px 4px 10px rgba(0, 0, 0, 0.2);
            margin-top: 50px;
            border-radius: 10px;
        }

        .encabezado2 {
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 15px;
            background-color: #f5f5f5;
            border-radius: 10px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }

        #text1 {
            font-size: 24px;
            color: #333;
            margin: 0;
        }

        /* Estilo para la tabla */
        .tabla {
            margin-top: 30px;
            padding: 20px;
            background-color: white;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            overflow-x: auto;
        }

        table {
            width: 80%;
            border-collapse: collapse;
            position: relative;
            margin-left: 280px;
        }

        th, td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #3498db;
            color: white;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        button {
            padding: 8px 12px;
            font-size: 14px;
            margin: 5px;
            cursor: pointer;
        }

        button.edit {
            background-color: #4caf50;
        }

        button.delete {
            background-color: #e74c3c;
        }

        button:hover {
            opacity: 0.8;
        }

        /* Responsividad */
        @media screen and (max-width: 768px) {
            .contenedor_menu_administrador {
                position: relative;
                width: 100%;
                height: auto;
                box-shadow: none;
            }

            .contenedor_menu_administrador2 {
                text-align: left;
                margin-left: 10px;
            }

            .ss {
                margin-left: 0;
                width: 100%;
            }

            .tabla {
                padding: 10px;
            }

            table {
                font-size: 14px;
            }

            th, td {
                padding: 8px 10px;
            }
        }
        a{
            text-decoration: none;
        }

    </style>
</head>
<body>
    <div class="encabezado">
        <h1>📚Biblio web</h1>
    </div>

    <div class="contenedor_menu_administrador">
        <div class="contenedor_menu_administrador2">
            <img src="hombre.jpeg" alt="Imagen Admin" class="imajen_admin" style="width: 50px;">
            <h3 id="administrador">Administrador</h3>
            <a href="agregar_libro.php">
                <button id="b3">Agregar libros</button>
            </a>
            
            <a href="libros_reservados.php">
                <button id="b3">Libros Reservados</button>
            </a>
            <a href="form.php">
                <button id="b4">Agregar usuarios</button>
            </a>
            <a href="pagina_mia.php">
                <button id="b5">Cerrar Sesión</button>
            </a>
        </div>
    </div>

    <div class="ss">
        <div class="encabezado2">
            <h1 id="text1">👨‍👦‍👦Usuarios</h1>
        </div>
    </div>

    <div class="tabla">
        <table>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Tipo</th>
                <th>Teléfono</th>
                <th>Email</th>
                <th>Acciones</th>
            </tr>

            <?php
            // Comprobar si hay filas
            if ($result->num_rows > 0) {
                // Salida de cada fila
                while($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td>" . $row["ID_Usuario"] . "</td>
                            <td>" . $row["Nombre"] . "</td>
                            <td>" . $row["Tipo"] . "</td>
                            <td>" . $row["Telefono"] . "</td>
                            <td>" . $row["CorreoElectronico"] . "</td>
                            <td>
                                <a href='editar_usuario.php?ID_Usuario=" . $row['ID_Usuario'] . "'>
                                    <button class='edit'>Editar</button>
                                </a>
                                <form action='eliminar_usuario.php' method='post' style='display:inline;'>
                                    <input type='hidden' name='ID_Usuario' value='" . $row["ID_Usuario"] . "'>
                                    <button type='submit' class='delete' onclick='return confirm(\"¿Seguro que quieres eliminar este usuario?\")'>Eliminar</button>
                                </form>
                            </td>
                        </tr>";
                }
            } else {
                echo "<tr><td colspan='6'>No hay usuarios registrados</td></tr>";
            }
            ?>

        </table>
    </div>

    <?php
    // Cerrar la conexión
    $conn->close();
    ?>
</body>
</html>

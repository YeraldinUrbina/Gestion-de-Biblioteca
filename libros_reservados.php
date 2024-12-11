<?php
$servername = "localhost";
$username = "root";
$password = ""; 
$dbname = "SGB3";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Realizar la consulta
$sql = "SELECT * FROM Reserva";
$result = $conn->query($sql);

// Comprobar si hay filas
if ($result->num_rows > 0) {
    // Crear la tabla HTML
    echo "<!DOCTYPE html>
    <html lang='es'>
    <head>
        <meta charset='UTF-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        <title>Reservas</title>
        <style>
            body {
                font-family: 'Arial', sans-serif;
                background-color: #f4f4f9;
                margin: 0;
                padding: 0;
                display: flex;
                justify-content: center;
                align-items: center;
                height: 100vh;
            }
            .table-container {
                background-color: white;
                box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.1);
                padding: 20px;
                border-radius: 8px;
                width: 80%;
                overflow-x: auto;
            }
            table {
                width: 100%;
                border-collapse: collapse;
                text-align: left;
            }
            th, td {
                padding: 12px;
                border-bottom: 1px solid #ddd;
            }
            th {
                background-color: #4CAF50;
                color: white;
            }
            tr:hover {
                background-color: #f1f1f1;
            }
            td {
                color: #555;
            }
            .no-data {
                text-align: center;
                color: #555;
                font-size: 18px;
            }
        </style>
    </head>
    <body>
        <div class='table-container'>";
    
    // Comprobar si hay resultados
    if ($result->num_rows > 0) {
        // Mostrar tabla
        echo "<table>
                <thead>
                    <tr>
                        <th>ID Reserva</th>
                        <th>ID Usuario</th>
                        <th>ID Libro</th>
                        <th>Fecha Reserva</th>
                        <th>Estado</th>
                    </tr>
                </thead>
                <tbody>";
        
        // Mostrar cada fila de resultados
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>" . $row["ID_Reserva"] . "</td>
                    <td>" . $row["ID_Usuario"] . "</td>
                    <td>" . $row["ID_Libro"] . "</td>
                    <td>" . $row["Fecha_Reserva"] . "</td>
                    <td>" . $row["Estado"] . "</td>
                </tr>";
        }
        
        // Cerrar la tabla
        echo "</tbody></table>";
    } else {
        echo "<p class='no-data'>No hay Libros Reservados</p>";
    }
    
    echo "</div></body></html>";

} else {
    echo "<p>No hay Libros Reservados</p>";
}
?>

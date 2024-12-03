<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Error - Usuario o Teléfono Incorrecto</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="error-container">
        <h1>¡Oops! Algo salió mal</h1>
        <p>Por favor, verifica los datos ingresados e inténtalo nuevamente.</p>
        <a href="pagina_mia.php" class="btn-return">Volver al inicio</a>
    </div>

    <style>
        /* Estilos generales para la página */
        body {
            font-family: 'Roboto', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f0f4f8;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            color: #333;
        }

        /* Contenedor de error */
        .error-container {
            text-align: center;
            padding: 40px;
            border-radius: 10px;
            background-color: #fff;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
            width: 80%;
            max-width: 400px;
            animation: fadeIn 0.6s ease-in-out;
        }

        /* Icono de error */
        .error-container img {
            width: 100px;
            height: 100px;
            margin-bottom: 20px;
        }

        /* Título del error */
        .error-container h1 {
            color: #e74c3c;
            font-size: 28px;
            font-weight: bold;
            margin-bottom: 15px;
        }

        /* Mensaje adicional */
        .error-container p {
            color: #555;
            font-size: 18px;
            margin-bottom: 20px;
        }

        /* Botón para volver al inicio */
        .btn-return {
            display: inline-block;
            padding: 12px 25px;
            background-color: #e74c3c;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            font-size: 16px;
            font-weight: bold;
            transition: background-color 0.3s;
        }

        .btn-return:hover {
            background-color: #c0392b;
        }

        /* Animación de desvanecimiento */
        @keyframes fadeIn {
            0% {
                opacity: 0;
                transform: translateY(-20px);
            }
            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</body>
</html>
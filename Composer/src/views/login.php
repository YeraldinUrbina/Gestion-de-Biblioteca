<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenido a la Biblioteca</title>
    <link rel="stylesheet" href="./Style/login.css">

</head>
<body>
    <div class="iniciar">
        <div class="login-form">
            <form action="index.php?controller=login&action=login" method="POST">
                <h1>Inicio de sesion</h1>
                <label for="email">Correo electronico:</label>
                <input type="email" name="email" required>

                <br>

                <label for="password">Contraseña:</label>
                <input type="password" name="password" required>

                <br>

                <button type="submit">Iniciar sesion</button>
            </form>
        </div>
    </div>

</body>
</html>
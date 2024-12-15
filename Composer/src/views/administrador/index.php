<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel del Administrador</title>
    <link rel="stylesheet" href="/../Proyecto biblioteca php/Gestion-de-Biblioteca/Composer/src/Style/vista-administrador.css">
        
</head>
<body>

    <header>
        <h2>Panel del Administrador</h2>
        <a href="index.php?controller=login&action=showLogin">Salir</a>
    </header>

    <div class="content">
        <h1>Bienvenido, Administrador</h1>
        <div class="container">
            <div class="card">
                <img src="./imagenes/usuarios.jpg" alt="Gestionar Usuarios">
                <a href="index.php?controller=administrador&action=gestionarUsuarios">Gestionar Usuarios</a>
            </div>
            <div class="card">
                <img src="./imagenes/libros.jpg" alt="Gestionar Libros">
                <a href="index.php?controller=administrador&action=gestionarLibros">Gestionar Libros</a>
            </div>
            <div class="card">
                <img src="./imagenes/prestar libros.jpg" alt="Gestionar Préstamos">
                <a href="index.php?controller=administrador&action=gestionarPrestamos">Gestionar Préstamos</a>
            </div>
            <div class="card">
                <img src="./imagenes/reservar libros.jpg" alt="Gestionar Reservas">
                <a href="index.php?controller=administrador&action=gestionarReservas">Gestionar Reservas</a>
            </div>
        </div>
    </div>

    <footer>
        &copy; 2024 Biblioweb. Todos los derechos reservados.
    </footer>
</body>
</html>
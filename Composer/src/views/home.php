<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenido a la Biblioteca</title>
    <link rel="stylesheet" href="./Style/home.css">

</head>
<body>
    <header>
        
        <div class="busqueda">
            <input type="text" placeholder="¿Qué quieres leer?" />
            <button>Buscar</button>
        </div>
    
        <nav class="menu">
            <a href="index.php?controller=login&action=showLogin">Iniciar sesión</a>
            <a href="index.php?controller=registro&action=showRegistro">Registrarse</a>
        </nav>

        <div class="barra">
        <img src="./imagenes/logo.png" alt="Logo Biblioteca">
        
    </div>
    </header>


    <h1>Bienvenido a la Biblioteca</h1>

    <div class="mensaje">
        <h2>Descubre tu próxima gran lectura</h2>
        <p>En nuestra biblioteca, revelamos historias que cautivan y te guían en un viaje literario inolvidable.</p>
    </div>

    <div class="libros">
        <div class="book-item">
            <img src="./imagenes/libro1 (2).png" alt="Libro 1">
            <h3>Don Quijote de la Mancha</h3>
            <p>Miguel de Cervantes</p>
            <p>Disponible</p>
            <button>Leer</button>
        </div>

        <div class="book-item">
            <img src="./imagenes/libro2 (2).png" alt="Libro 2">
            <h3>Las mil y unas noches</h3>
            <p>Mario Vargas Llosa</p>
            <p>Disponible</p>
            <button>Leer</button>
        </div>

        <div class="book-item">
            <img src="./imagenes/libro3 (2).png" alt="Libro 3">
            <h3>Harry Potter</h3>
            <p>J.K. Rowling</p>
            <p>Disponible</p>
            <button>Leer</button>
        </div>
    </div>

    <footer>
        <p>&copy; 2024 Biblioteca. Todos los derechos reservados.</p>
    </footer>
</body>
</html>
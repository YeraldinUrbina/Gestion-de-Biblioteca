<?php

include 'conexion.php';


?>



<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Barra de Navegación</title>
    <style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        font-size: 22px;
    }
    .barra {
        background-color: #616264;
        overflow: hidden;
        height: 10vh;
    }
    .menu {
        padding-left: 60vw;
    }
    .menu a {
        float: left;
        display: block;
        color: white;
        text-align: center;
        padding: 14px 16px;
        text-decoration: none;
        padding-left: 2vw;
        position: relative; bottom: 2vw;
    }
    .menu a:hover {
        background-color: #ddd;
        color: black;
    }
    img {
        padding: 0PX 56PX;
        width: 211px;
        height: 49PX;
        top: 26px;
        position: relative;
        margin-left: -7PX;
    }
    nav {
        display: flex;
        align-items: center;
    }   
    nav input[type="text"] {
        padding: 10px 242px;
        border: none;
        border-radius: 14px;
        background-color: #D9D9D9;
        flex-direction: 20PX;
        margin-left: 390PX;
        margin-top: -29px;
    }
    nav button {
        padding: 10px 15px;
        border: none;
        border-radius: 15px;
        background-color: #4e524e;
        color: #fff;
        cursor: pointer;
        margin-top: -30px;
        margin-left: -70px;
        transition: background-color 0.3s, transform 0.3s;
    }
    nav button:hover {
        background-color: #333;
        transform: scale(1.1);
    }
    .mensaje {
        background-color: #e0e0e0;
        padding: 50px;
        border-radius: 10px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3);
        margin: 50px auto;
        max-width: 600px;
        margin-left: 169px;
    }
    h2 {
        font-size: 24px;
        margin-bottom: 10px;
    }
    p {
        font-size: 16px;
        color: #666;
    } 
    .img2 img {
        width: 34vw;
        height: 53vh;
        position: relative;
        bottom: 2vw;
        padding-left: 50vw;
        margin-top: -305px;
    }
    .img3 img {
        width: 37vw;
        height: 27vh;
        position: relative;
        bottom: 2vw;
        padding-left: 50vw;
        margin-top: -305px;
        padding: 50px;
        margin-left: 117px;
    }
    .book-item {
        border: 1px solid #ccc;
        padding: 20px;
        text-align: center;
        transition: transform 0.3s ease-in-out;
    }
    .book-item:hover {
        transform: scale(1.05);
    }

    .img_libro1 img {
        padding: 32PX 61PX;
        width: 215px;
        height: 292PX;
        top: 26px;
        position: relative;
        margin-left: -7PX;
    }
    .book-item button {
        background-color: #4CAF50;
        border: none;
        color: white;
        padding: 15px 32px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        margin: 4px 2px;
        cursor: pointer;
        transition: background-color 0.3s, transform 0.3s;
    }
    .book-item button:hover {
        background-color: #45a049;
        transform: scale(1.1);
    }
    .cabesera_libro {
        display: flex;
        gap: 7vw;
        padding-top: 8vw;
        margin-left: 202px;
    }
    /* Estilos para el pie de página */
    footer {
        background-color: #333;
        color: white;
        text-align: center;
        padding: 20px 0;
        position: relative;
        bottom: 0;
        width: 100%;
        font-size: 14px;
    }
    footer a {
        color: #f1f1f1;
        text-decoration: none;
    }
    footer a:hover {
        text-decoration: underline;
    }
    </style>
</head>
<body>
<div class="barra">
    <img src="./logo.png" alt="Logo BiblioWeb">
    <form method="POST" action="libro.php">
        <nav>
            <input type="text" name="busqueda" id="busqueda" required placeholder="¿Que quieres leer?">
            <button type="submit">Buscar</button> 
            
        </nav>
    </form>
    <nav class="menu">
        <a href="#home">Inicio</a>
        <a href="#services">Servicios</a>
        <a href="#about">Acerca de</a>
        <a href="#contact">Contacto</a>
    </nav>
</div>
<div class="clases">

</div>
<div class="mensaje">
    <h2>Descubre tu próxima gran lectura</h2>
    <p>En Librería Byn, revelamos historias que cautivan y encienden la pasión, guiándote en un viaje literario inolvidable.</p>
</div>
<div class="img2">
   <img src="./img2.png" alt="">
</div>
<div class="img3">
    <img src="./img3.png" alt="">
 </div>
<div class="cabesera_libro">
    <div class="book-item">
         <div class="img_libro1">
            <img src="./libro1 (2).png">
         </div>
        <h2>Don Quijote de la Mancha</h2>
        <p>Miguel de Cervantes</p>
        <p>Disponible</p>
        <button>Reservar</button>
    </div>

    <div class="book-item">
        <div class="img_libro1">
           <img src="./libro2 (2).png">
        </div>
       <h2>Las mil y unas noches</h2>
       <p>Mario Vargas Llosa</p>
       <p>Disponible</p>
       <button>Reservar</button>
   </div>

   <div class="book-item">
    <div class="img_libro1">
       <img src="./libro3 (2).png">
    </div>
   <h2>Harry Potter</h2>
   <p>J.K Rowling</p>
   <p>Disponible</p>
   <button>Reservar</button>
</div>
</div>

<div class="cabesera_libro">
    <div class="book-item">
         <div class="img_libro1">
            <img src="./libro4 (2).png">
         </div>
        <h2>Los Siete maridos de Sandoval</h2>
        <p>Taylor Jenkins Reid</p>
        <p>Disponible</p>
        <button>Reservar</button>
    </div>

    <div class="book-item">
        <div class="img_libro1">
           <img src="./libro5 (2).png">
        </div>
       <h2>Antes de Diciembre</h2>
       <p>Margarita García Robayo</p>
       <p>Disponible</p>
       <button>Reservar</button>
   </div>

   <div class="book-item">
    <div class="img_libro1">
       <img src="./libro6 (2).png">
    </div>
   <h2>Lujuria</h2>
   <p>José Luis Zárate</p>
   <p>Disponible</p>
   <button>Reservar</button>
</div>
</div>

<footer>
    <p>&copy; 2024 Librería Byn. Todos los derechos reservados.</p>
    <p>Contáctanos: <a href="#">contacto@biblioweb.com</a></p>
</footer>

</body>
</html>

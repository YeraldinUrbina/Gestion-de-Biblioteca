<!-- views/libro/show.php -->
<h1>Detalles del Libro</h1>
<?php
if ($libro) {
    echo "<h2>" . $libro['titulo'] . "</h2>";
    echo "<p><strong>Autor:</strong> " . $libro['autor'] . "</p>";
    echo "<p><strong>Editorial:</strong> " . $libro['editorial'] . "</p>";
    echo "<p><strong>Año de publicación:</strong> " . $libro['anio_publicacion'] . "</p>";
    echo "<p><strong>ISBN:</strong> " . $libro['ISBN'] . "</p>";
    echo "<p><strong>Estado:</strong> " . $libro['estado'] . "</p>";
    echo "<p><strong>Cantidad:</strong> " . $libro['cantidad'] . "</p>";
    echo "<img src='" . $libro['immagen'] . "' alt='Imagen del libro' />";
} else {
    echo "<p>No se encontró el libro.</p>";
}
?>

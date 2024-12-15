<h1>Registrar Nuevo Libro</h1>

<form action="index.php?controller=libro&action=store" method="POST">
    <label for="titulo">Título:</label>
    <input type="text" name="titulo" required>

    <label for="editorial">Editorial:</label>
    <input type="text" name="editorial" required>

    <label for="anio_publicacion">Año de Publicación:</label>
    <input type="date" name="anio_publicacion" required>

    <label for="ISBN">ISBN:</label>
    <input type="text" name="ISBN" required>

    <label for="immagen">Imagen:</label>
    <input type="file" name="immagen" required>

    <label for="estado">Estado:</label>
    <select name="estado" required>
        <option value="Disponible">Disponible</option>
        <option value="Prestado">Prestado</option>
        <option value="Reservado">Reservado</option>
    </select>

    <label for="cantidad">Cantidad:</label>
    <input type="number" name="cantidad" required>

    <!-- Campo dinámico para seleccionar el autor -->
    <label for="id_autor_es">Autor:</label>
    <select name="id_autor_es" required>
        <option value="">-- Seleccione un autor --</option>
        <?php foreach ($autores as $autor): ?>
            <option value="<?php echo $autor['id']; ?>">
                <?php echo $autor['nombre']; ?>
            </option>
        <?php endforeach; ?>
    </select>

    <label for="id_genero">Género:</label>
    <select name="id_genero" required>
        <option value="">-- Seleccione un género --</option>
        <?php foreach ($generos as $genero): ?>
            <option value="<?php echo $genero['id']; ?>">
                <?php echo $genero['nombre']; ?>
            </option>
        <?php endforeach; ?>
    </select>

    <button type="submit">Registrar Libro</button>
</form>

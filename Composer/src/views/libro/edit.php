<h1>Editar Libro</h1>

<form action="index.php?controller=libro&action=update" method="POST">
    <input type="hidden" name="id" value="<?= htmlspecialchars($libro['id']) ?>">

    <label for="titulo">Título:</label>
    <input type="text" name="titulo" id="titulo" value="<?= htmlspecialchars($libro['titulo']) ?>" required>

    <label for="id_autor_es">Autor:</label>
    <select name="id_autor_es" id="id_autor_es" required>
        <option value="">-- Seleccione un autor --</option>
        <?php foreach ($autores as $autor): ?>
            <option value="<?= $autor['id'] ?>" <?= $autor['id'] == $libro['id_autor_es'] ? 'selected' : '' ?>>
                <?= htmlspecialchars($autor['nombre']) ?>
            </option>
        <?php endforeach; ?>
    </select>

    <label for="id_genero">Género:</label>
    <select name="id_genero" id="id_genero" required>
        <option value="">-- Seleccione un género --</option>
        <?php foreach ($generos as $genero): ?>
            <option value="<?= $genero['id'] ?>" <?= $genero['id'] == $libro['id_genero'] ? 'selected' : '' ?>>
                <?= htmlspecialchars($genero['nombre']) ?>
            </option>
        <?php endforeach; ?>
    </select>

    <label for="editorial">Editorial:</label>
    <input type="text" name="editorial" id="editorial" value="<?= htmlspecialchars($libro['editorial']) ?>" required>

    <label for="anio_publicacion">Año de Publicación:</label>
    <input type="date" name="anio_publicacion" id="anio_publicacion" value="<?= htmlspecialchars($libro['anio_publicacion']) ?>" required>

    <label for="ISBN">ISBN:</label>
    <input type="text" name="ISBN" id="ISBN" value="<?= htmlspecialchars($libro['ISBN']) ?>" required>

    <label for="immagen">Imagen:</label>
    <input type="text" name="immagen" id="immagen" value="<?= htmlspecialchars($libro['immagen']) ?>" required>

    <label for="estado">Estado:</label>
    <select name="estado" id="estado" required>
        <option value="Disponible" <?= $libro['estado'] == 'Disponible' ? 'selected' : '' ?>>Disponible</option>
        <option value="Prestado" <?= $libro['estado'] == 'Prestado' ? 'selected' : '' ?>>Prestado</option>
        <option value="Reservado" <?= $libro['estado'] == 'Reservado' ? 'selected' : '' ?>>Reservado</option>
    </select>

    <label for="cantidad">Cantidad:</label>
    <input type="number" name="cantidad" id="cantidad" value="<?= htmlspecialchars($libro['cantidad']) ?>" required>

    <button type="submit">Actualizar Libro</button>
</form>

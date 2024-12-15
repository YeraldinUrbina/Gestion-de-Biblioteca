<h1>Editar Préstamo</h1>

<form action="update.php" method="POST">
    <input type="hidden" name="id" value="<?= $prestamo['id'] ?>">

    <label for="id_usuario">Usuario:</label>
    <select name="id_usuario" required>
        <?php foreach ($usuarios as $usuario): ?>
        <option value="<?= $usuario['id'] ?>" <?= $prestamo['id_usuario'] == $usuario['id'] ? 'selected' : '' ?>>
            <?= $usuario['nombre'] ?>
        </option>
        <?php endforeach; ?>
    </select>

    <label for="id_libro">Libro:</label>
    <select name="id_libro" required>
        <?php foreach ($libros as $libro): ?>
        <option value="<?= $libro['id'] ?>" <?= $prestamo['id_libro'] == $libro['id'] ? 'selected' : '' ?>>
            <?= $libro['titulo'] ?>
        </option>
        <?php endforeach; ?>
    </select>

    <label for="fecha_devolucion">Fecha de Devolución:</label>
    <input type="date" name="fecha_devolucion" value="<?= $prestamo['fecha_devolucion'] ?>" required>

    <button type="submit">Actualizar</button>
</form>
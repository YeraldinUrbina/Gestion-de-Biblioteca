<h1>Registrar Nuevo Préstamo</h1>

<form action="store.php" method="POST">
    <label for="id_usuario">Usuario:</label>
    <select name="id_usuario" required>
        <?php foreach ($usuarios as $usuario): ?>
        <option value="<?= $usuario['id'] ?>"><?= $usuario['nombre'] ?></option>
        <?php endforeach; ?>
    </select>

    <label for="id_libro">Libro:</label>
    <select name="id_libro" required>
        <?php foreach ($libros as $libro): ?>
        <option value="<?= $libro['id'] ?>"><?= $libro['titulo'] ?></option>
        <?php endforeach; ?>
    </select>

    <label for="fecha_devolucion">Fecha de Devolución:</label>
    <input type="date" name="fecha_devolucion" required>

    <button type="submit">Registrar</button>
</form>
<h1>Registrar Nueva Reserva</h1>

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

    <label for="fecha_reserva">Fecha de Reserva:</label>
    <input type="date" name="fecha_reserva" required>

    <label for="estado">Estado:</label>
    <select name="estado" required>
        <option value="Pendiente">Pendiente</option>
        <option value="Aceptada">Aceptada</option>
        <option value="Rechazada">Rechazada</option>
    </select>

    <button type="submit">Registrar</button>
</form>
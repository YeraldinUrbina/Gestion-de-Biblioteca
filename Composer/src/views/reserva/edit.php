<h1>Editar Reserva</h1>

<form action="update.php" method="POST">
    <input type="hidden" name="id" value="<?= $reserva['id'] ?>">

    <label for="id_usuario">Usuario:</label>
    <select name="id_usuario" required>
        <?php foreach ($usuarios as $usuario): ?>
        <option value="<?= $usuario['id'] ?>" <?= $reserva['id_usuario'] == $usuario['id'] ? 'selected' : '' ?>>
            <?= $usuario['nombre'] ?>
        </option>
        <?php endforeach; ?>
    </select>

    <label for="id_libro">Libro:</label>
    <select name="id_libro" required>
        <?php foreach ($libros as $libro): ?>
        <option value="<?= $libro['id'] ?>" <?= $reserva['id_libro'] == $libro['id'] ? 'selected' : '' ?>>
            <?= $libro['titulo'] ?>
        </option>
        <?php endforeach; ?>
    </select>

    <label for="fecha_reserva">Fecha de Reserva:</label>
    <input type="date" name="fecha_reserva" value="<?= $reserva['fecha_reserva'] ?>" required>

    <label for="estado">Estado:</label>
    <select name="estado" required>
        <option value="Pendiente" <?= $reserva['estado'] == 'Pendiente' ? 'selected' : '' ?>>Pendiente</option>
        <option value="Aceptada" <?= $reserva['estado'] == 'Aceptada' ? 'selected' : '' ?>>Aceptada</option>
        <option value="Rechazada" <?= $reserva['estado'] == 'Rechazada' ? 'selected' : '' ?>>Rechazada</option>
    </select>

    <button type="submit">Actualizar</button>
</form>
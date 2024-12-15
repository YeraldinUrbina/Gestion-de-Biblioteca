<h1>Editar Usuario</h1>

<form action="index.php?controller=usuario&action=update&id=<?= $usuario['id'] ?>" method="POST">
    <label for="nombre">Nombre:</label>
    <input type="text" name="nombre" value="<?= htmlspecialchars($usuario['nombre']) ?>" required>

    <label for="numero_documento">Número de Documento:</label>
    <input type="text" name="numero_documento" value="<?= htmlspecialchars($usuario['numero_documento']) ?>" required>

    <label for="tipo">Tipo:</label>
    <select name="tipo" required>
        <option value="Estudiante" <?= $usuario['tipo'] == 'Estudiante' ? 'selected' : '' ?>>Estudiante</option>
        <option value="Docente" <?= $usuario['tipo'] == 'Docente' ? 'selected' : '' ?>>Docente</option>
        <option value="Bibliotecario" <?= $usuario['tipo'] == 'Bibliotecario' ? 'selected' : '' ?>>Bibliotecario</option>
    </select>

    <label for="correo_electronico">Correo Electrónico:</label>
    <input type="email" name="correo_electronico" value="<?= htmlspecialchars($usuario['correo_electronico']) ?>" required>

    <label for="contrasena">Contraseña:</label>
    <input type="password" name="contrasena" value="" placeholder="Actualizar contraseña">

    <button type="submit">Actualizar</button>
</form>
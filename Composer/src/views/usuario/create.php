<h1>Agregar Nuevo Usuario</h1>

<form action="index.php?controller=usuario&action=store" method="POST">
    <label for="nombre">Nombre:</label>
    <input type="text" name="nombre" required>

    <label for="numero_documento">Número de Documento:</label>
    <input type="text" name="numero_documento" required>

    <label for="tipo">Tipo:</label>
    <select name="tipo" required>
        <option value="Estudiante">Estudiante</option>
        <option value="Docente">Docente</option>
        <option value="Bibliotecario">Bibliotecario</option>
    </select>

    <label for="telefono">Teléfono:</label>
    <input type="text" name="telefono" required>

    <label for="correo_electronico">Correo Electrónico:</label>
    <input type="email" name="correo_electronico" required>

    <label for="contrasena">Contraseña:</label>
    <input type="password" name="contrasena" required>

    <button type="submit">Guardar</button>
</form>
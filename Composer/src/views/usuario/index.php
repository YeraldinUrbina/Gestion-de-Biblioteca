<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Usuarios</title>
</head>
<body>
    <h1>Lista de Usuarios</h1>
    <a href="index.php?controller=usuario&action=create">Agregar Nuevo Usuario</a>
    <table border="1">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Número de Documento</th>
                <th>Tipo</th>
                <th>Correo Electrónico</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($usuarios)): ?>
                <?php foreach ($usuarios as $usuario): ?>
                    <tr>
                        <td><?= htmlspecialchars($usuario['nombre']) ?></td>
                        <td><?= htmlspecialchars($usuario['numero_documento']) ?></td>
                        <td><?= htmlspecialchars($usuario['tipo']) ?></td>
                        <td><?= htmlspecialchars($usuario['correo_electronico']) ?></td>
                        <td>
                            <a href="index.php?controller=usuario&action=edit&id=<?= $usuario['id'] ?>">Editar</a>
                            <a href="index.php?controller=usuario&action=delete&id=<?= $usuario['id'] ?>">Eliminar</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="5">No se encontraron usuarios.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</body>
</html>
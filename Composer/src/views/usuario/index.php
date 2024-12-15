<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Usuarios</title>
    <link rel="stylesheet" href="/../Proyecto biblioteca php/Gestion-de-Biblioteca/Composer/src/Style/vista-usuarios.css">
</head>
<body>

    <header>
        <h2>Panel del Administrador</h2>
        <a href="index.php?controller=login&action=showLogin">Salir</a>
    </header>

    
    <main>
        <h2>Lista de Usuarios</h2>
        <a href="index.php?controller=usuario&action=create" class="add-user">Agregar Nuevo Usuario</a>
        <table>
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

                              <a  class="eliminar" href="index.php?controller=usuario&action=delete&id=<?= $usuario['id'] ?>">Eliminar</a>
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
    </main>
    <footer>
        &copy; 2024 BiblioWeb. Todos los derechos reservados.
    </footer>
</body>
</html>
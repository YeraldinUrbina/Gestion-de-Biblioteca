<h1>Gestión de Libros</h1>
<a href="index.php?controller=libro&action=create">Agregar Nuevo Libro</a>

<table border="1">
    <thead>
        <tr>
            <th>Título</th>
            <th>Editorial</th>
            <th>Año de Publicación</th>
            <th>Estado</th>
            <th>Cantidad</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        <?php if (!empty($libros)): ?>
            <?php foreach ($libros as $libro): ?>
                <tr>
                    <td><?= htmlspecialchars($libro['titulo']) ?></td>
                    <td><?= htmlspecialchars($libro['editorial']) ?></td>
                    <td><?= htmlspecialchars($libro['anio_publicacion']) ?></td>
                    <td><?= htmlspecialchars($libro['estado']) ?></td>
                    <td><?= htmlspecialchars($libro['cantidad']) ?></td>
                    <td>
                        <!-- Aquí agregarás enlaces para editar y eliminar -->
                        <a href="index.php?controller=libro&action=edit&id=<?= $libro['id'] ?>">Editar</a>
                        <a href="index.php?controller=libro&action=delete&id=<?= $libro['id'] ?>">Eliminar</a>
                        <a href="index.php?controller=libro&action=show&id=<?php echo $libro['id']; ?>">Ver</a>

                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="6">No se encontraron libros.</td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>
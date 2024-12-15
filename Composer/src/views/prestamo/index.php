<h1>Lista de Préstamos</h1>
<a href="create.php">Registrar Nuevo Préstamo</a>

<table border="1">
    <thead>
        <tr>
            <th>Usuario</th>
            <th>Libro</th>
            <th>Fecha de Préstamo</th>
            <th>Fecha de Devolución</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($prestamos as $prestamo): ?>
        <tr>
            <td><?= $prestamo['usuario'] ?></td>
            <td><?= $prestamo['libro'] ?></td>
            <td><?= $prestamo['fecha_prestamo'] ?></td>
            <td><?= $prestamo['fecha_devolucion'] ?></td>
            <td>
                <a href="show.php?id=<?= $prestamo['id'] ?>">Ver</a>
                <a href="edit.php?id=<?= $prestamo['id'] ?>">Editar</a>
                <a href="delete.php?id=<?= $prestamo['id'] ?>">Eliminar</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
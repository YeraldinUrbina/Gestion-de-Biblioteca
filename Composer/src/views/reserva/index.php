<h1>Lista de Reservas</h1>
<a href="create.php">Registrar Nueva Reserva</a>

<table border="1">
    <thead>
        <tr>
            <th>Usuario</th>
            <th>Libro</th>
            <th>Fecha de Reserva</th>
            <th>Estado</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($reservas as $reserva): ?>
        <tr>
            <td><?= $reserva['usuario'] ?></td>
            <td><?= $reserva['libro'] ?></td>
            <td><?= $reserva['fecha_reserva'] ?></td>
            <td><?= $reserva['estado'] ?></td>
            <td>
                <a href="show.php?id=<?= $reserva['id'] ?>">Ver</a>
                <a href="edit.php?id=<?= $reserva['id'] ?>">Editar</a>
                <a href="delete.php?id=<?= $reserva['id'] ?>">Eliminar</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
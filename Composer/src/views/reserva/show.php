<h1>Detalles de la Reserva</h1>

<p><strong>Usuario:</strong> <?= $reserva['usuario'] ?></p>
<p><strong>Libro:</strong> <?= $reserva['libro'] ?></p>
<p><strong>Fecha de Reserva:</strong> <?= $reserva['fecha_reserva'] ?></p>
<p><strong>Estado:</strong> <?= $reserva['estado'] ?></p>

<a href="index.php">Volver a la Lista</a>
<a href="edit.php?id=<?= $reserva['id'] ?>">Editar</a>
<a href="delete.php?id=<?= $reserva['id'] ?>">Eliminar</a>
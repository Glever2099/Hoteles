<?php
include 'conexion.php';

// Realizar la consulta para obtener datos de reserva, titular y acompañante
$query = "SELECT reserva.*, titular.nombre as nombre_titular, habitacion.nombre as numero_habitacion
          FROM reserva
          INNER JOIN reserva_cliente ON reserva.id = reserva_cliente.id_reserva
          INNER JOIN titular ON reserva_cliente.id_cliente = titular.id
          INNER JOIN habitacion ON reserva.id_habitacion = habitacion.id order by reserva.id DESC";
$resultado = mysqli_query($conexion, $query);

// Verificar si hay resultados
if (!$resultado) {
    die("Error al realizar la consulta: " . mysqli_error($conexion));
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabla de Reservas</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>

    <h2>Tabla de Reservas</h2>

    <table>
        <tr>
            <th>ID Reserva</th>
            <th>Número de Habitación</th>
            <th>Ingreso</th>
            <th>Retiro</th>
            <th>Comentario</th>
            <th>Método de Pago</th>
            <th>Estado de Pago</th>
            <th>Cantidad de Pago</th>
            <th>Nombre del Titular</th>
        </tr>

        <?php
        // Mostrar resultados en la tabla
        while ($fila = mysqli_fetch_assoc($resultado)) {
            echo "<tr>";
            echo "<td>{$fila['id']}</td>";
            echo "<td>{$fila['numero_habitacion']}</td>";
            echo "<td>{$fila['ingreso']}</td>";
            echo "<td>{$fila['retiro']}</td>";
            echo "<td>{$fila['comentario']}</td>";
            echo "<td>{$fila['metodo_pago']}</td>";
            echo "<td>{$fila['estado_pago']}</td>";
            echo "<td>{$fila['cantidad_pago']}</td>";
            echo "<td>{$fila['nombre_titular']}</td>";
            echo "</tr>";
        }
        ?>

    </table>

</body>
</html>

<?php
// Cerrar la conexión
mysqli_close($conexion);
?>

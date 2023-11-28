<?php
// Conexión a la base de datos (reemplaza con tus propios datos de conexión)
include('conexion.php');

$consultaReservas = "SELECT * FROM reserva";
$resultadoReservas = $conexion->query($consultaReservas);

$consultaHabitaciones = "SELECT * FROM habitacion";
$resultadoHabitaciones = $conexion->query($consultaHabitaciones);

$reservas = array();
$habitaciones = array();

while ($filaReserva = $resultadoReservas->fetch_assoc()) {
    $reservas[] = $filaReserva;
}

while ($filaHabitacion = $resultadoHabitaciones->fetch_assoc()) {
    $habitaciones[] = $filaHabitacion;
}

// Devuelve los datos en formato JSON
echo json_encode(array("reservas" => $reservas, "habitaciones" => $habitaciones));

// Cierra la conexión a la base de datos
$conexion->close();
?>

<?php
include 'conexion.php';

// Datos del Titular
$tituNom = $_POST['tituNom'];
$tituDNI = $_POST['tituDNI'];
$tituGen = $_POST['tituGen'];
$tituOcu = $_POST['tituOcu'];
$tituCiudad = $_POST['tituCiudad'];
$tituTelC = $_POST['tituTelC'];
$tituEmail = $_POST['tituEmail'];

// Datos de la Reserva
$reserIngreso = $_POST['ReserIngreso'];
$reserSalida = $_POST['ReserSalida'];
$reserCom = $_POST['ReserCom'];
$reserMetodPago = $_POST['ReserMetodPago'];
$reserCantPago = $_POST['ReserCantPago'];

$cant = $_POST['selection'];
// Datos de la Habitación
$cantPer = $_POST['cantPer'];
$tipo = $_POST['tipo'];


$Habitacion = mysqli_query($conexion, "SELECT habitacion.id AS idh FROM `habitacion` inner join servi_habitacion on servi_habitacion.id = habitacion.id_servi_habitacion WHERE cantidad_persona = '$cantPer' AND descripcion = '$tipo'");
$rol1 = mysqli_fetch_array($Habitacion);
$numHabi = $rol1['idh'];
$insertReserva = mysqli_query($conexion, "INSERT INTO `reserva`(`id_habitacion`, `ingreso`, `retiro`, `comentario`, `acompaniantes`, `metodo_pago`, `estado_pago`, `cantidad_pago`) VALUES ('$numHabi','$reserIngreso','$reserSalida','$reserCom','$cant','$reserMetodPago','NULL','$reserCantPago')");
$idReserva = mysqli_insert_id($conexion);

$cant = $cant + 1;

$insertTitu = mysqli_query($conexion, "INSERT INTO `titular`( `nombre`, `ciudad`, `dni`, `ocupacion`, `celular`, `email`, `genero`) VALUES ('$tituNom','$tituCiudad','$tituDNI','$tituOcu','$tituTelC','$tituEmail','$tituGen')");
$insertReservaClienteTitular = mysqli_query($conexion, "INSERT INTO `reserva_cliente`(`id_cliente`, `id_reserva`) VALUES (LAST_INSERT_ID(), '$idReserva')");
$sqlA = '';
for ($i = 1; $i < $cant; $i++) {
    $Anombre = 'ANombre' . $i;
    $dniA = 'ADNI' . $i;
    $genA = 'AGenero' . $i;
    $AOcu = 'AOcu' . $i;

    $nomA =  $_POST[$Anombre];
    $ADNI = $_POST[$dniA];
    $AGen = $_POST[$genA];
    $ocuA = $_POST[$AOcu];

    // Concatenate SQL statements
    $sqlA = "INSERT INTO `acompaniante`(`nombre`, `dni`, `genero`, `ocupacion`) VALUES ('$nomA','$ADNI','$AGen','$ocuA')";


    $idAcompaniante = mysqli_insert_id($conexion);
    $insertReservaClienteAcompaniante = mysqli_query($conexion, "INSERT INTO `reserva_cliente`(`id_cliente`, `id_reserva`) VALUES ('$idAcompaniante', '$idReserva')");


}

// if ( $insertTitu && mysqli_query($conexion, $sqlA)) {
//     echo "Reserva guardada correctamente.";
// } else {
//     echo "Error al guardar la reserva: " . mysqli_error($conexion);
// }

// mysqli_close($conexion);
?>

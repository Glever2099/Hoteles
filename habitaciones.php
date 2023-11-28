<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="estilo.css">
</head>
<body>
    <header>
        <button><a href="cargarTipoHabitacion.php">+ tipos habitaciones</a></button>
        <button><a href="cargarHabitacion.php">+ habitaciones</a></button>
    </header>

    <?php 
                include('conexion.php');
                $habi = mysqli_query($conexion, "SELECT * FROM `habitacion` inner join servi_habitacion on habitacion.id_servi_habitacion = servi_habitacion.id WHERE 1 order by nombre asc");
                while ($a = mysqli_fetch_array($habi)) {
                    echo "<div class='verHabi' >";
                    echo "<h3>".$a['nombre']."</h3> ";
                    echo $a['cantidad_persona']." ".$a['descripcion']." <br>";
                    echo "$".$a['costo']." ".$a['moneda'];
                    echo "</div>";
                }
                
                
        ?>
</body>
</html>
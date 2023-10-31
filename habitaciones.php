<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Incluye Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="estilo.css">
    
    <title>Lista de Habitaciones</title>
</head>
<body>
    <header>
        <button class="btn btn-dark mp-auto"><a href="cargarTipoHabitacion.php">+ Tipos de Habitaciones</a></button>
        <button class="btn btn-dark ml-auto"><a href="cargarHabitacion.php">+ Habitaciones</a></button>
    </header>

    <div class="container mt-5">
        <div class="row">
            <?php 
                include('conexion.php');
                $habi = mysqli_query($conexion, "SELECT * FROM `habitacion` INNER JOIN servi_habitacion ON habitacion.id_servi_habitacion = servi_habitacion.id WHERE 1 ORDER BY nombre ASC");
                while ($a = mysqli_fetch_array($habi)) {
            ?>
                <div class="col-md-4">
                    <div class="verHabi-ini">
                        <h3><?php echo $a['nombre']; ?></h3>
                        <?php echo $a['cantidad_persona'] . ' ' . $a['descripcion']; ?><br>
                        <?php echo "$" . $a['costo'] . ' ' . $a['moneda']; ?>
                    </div>
                </div>
            <?php
                }
            ?>
        </div>
    </div>
    
    <!-- Incluye Bootstrap JS y Popper.js (requerido por Bootstrap) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@2.9.3/dist/umd/popper.min.js"></script>
</body>
</html>

<?php 
    if (empty($_POST['nomHabi']) || empty($_POST['tipo']) || empty($_POST['cantPer'])) {
        echo "<script language='javascript'> 
            alert('cargue todos los datos');
        </script>";
    } else {
        $nomHabi = ($_POST['nomHabi']);	
        $tipo = ($_POST['tipo']);	
        $cantPer = ($_POST['cantPer']);	
        

        include 'conexion.php';
        $verIDservi = mysqli_query($conexion, "SELECT `id` FROM `servi_habitacion` WHERE descripcion = '".$tipo."' and cantidad_persona = '".$cantPer."' ");
        $a = mysqli_fetch_array($verIDservi);
        $idServi = $a["id"];
		$habitacion = mysqli_query($conexion, "INSERT INTO `habitacion`(`nombre`, `id_servi_habitacion`, `habilitado`) VALUES ('".$nomHabi."','".$idServi."','si')");

        if ($verIDservi && $habitacion) {
            echo "<script language='javascript'> 
            alert('Habitacion Registrada');
            </script>";
        } else {
            echo "<script language='javascript'> 
            alert('no se pudo registrar la habitacion');
            </script>";
        }
        
    }
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Incluye Bootstrap CSS -->
    <link rel="stylesheet" href="estilo.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <title>Formulario de Habitaciones</title>
    <style>
        body{
        background-color: #3f363a !important;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <div class="cargar">
            <form action="" method="post">
                <h2>Nombre de la Habitacion</h2> 
                <input type="text" name="nomHabi" class="form-control mb-3"> 
                <h2>Cantidad de Personas</h2> 
                <select name="cantPer" id="cantPer" class="form-select mb-3">
                <?php 
                include 'conexion.php';
                $sql1 = mysqli_query($conexion,"SELECT distinct cantidad_persona FROM servi_habitacion where 1 order by cantidad_persona asc");
                $result1 = mysqli_num_rows($sql1);
                if($result1 > 0){
                    while ($rol1 = mysqli_fetch_array($sql1)) {
                ?>
                    <option value="<?php echo $rol1["cantidad_persona"]; ?>"><?php echo $rol1["cantidad_persona"]; ?></option>
                <?php
                    }}
                ?>
             </select>
                <h2>Tipo</h2> 
                <select name="tipo" id="tipo" class="form-select mb-3">
                <?php 
                include 'conexion.php';
                $sql2 = mysqli_query($conexion,"SELECT distinct cantidad_persona, descripcion FROM servi_habitacion where 1 ");
                $result2 = mysqli_num_rows($sql2);
                if($result2 > 0){
                    while ($rol2 = mysqli_fetch_array($sql2)) {
                ?>
                    <option data-option="<?php echo $rol2['cantidad_persona']; ?>" value="<?php echo $rol2["descripcion"]; ?>"><?php echo $rol2["descripcion"]; ?></option>
                <?php
                    }}
                ?>
                            </select>
                <br>
                <button id="guardar" class="btn btn-dark">Guardar Habitacion</button>
            </form>
        </div>
    </div>

    <!-- Incluye Bootstrap JS y Popper.js (requerido por Bootstrap) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@2.9.3/dist/umd/popper.min.js"></script>
</body>
</html>


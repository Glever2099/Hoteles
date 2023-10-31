<?php 
    if (empty($_POST['cantPer']) || empty($_POST['tipo']) || empty($_POST['costo']) || empty($_POST['moneda'])) {
        echo "<script language='javascript'> 
            alert('cargue todos los datos');
        </script>";
    } else {
        $costo = ($_POST['costo']);
        $moneda = ($_POST['moneda']);	
        $tipo = ($_POST['tipo']);	
        $cantPer = ($_POST['cantPer']);	
        

        include 'conexion.php';
        // consultamos que no haya concidencia
        $verServi = mysqli_query($conexion, "SELECT * FROM `servi_habitacion` WHERE cantidad_persona = '".$cantPer."' and descripcion = '".$tipo."' and costo = '".$costo."' and moneda = '".$moneda."'");
        $r1 = mysqli_num_rows($verServi);
        if($r1 > 0){
            echo "<script language='javascript'> 
            alert('Verifique que los datos que desea ingresar no se hayan registrado anteriormente');
            </script>";
        }else{
            $tipohabitacion = mysqli_query($conexion, "INSERT INTO `servi_habitacion`(`cantidad_persona`, `descripcion`, `costo`, `moneda`) VALUES ('".$cantPer."','".$tipo."','".$costo."','".$moneda."')");
            if ($tipohabitacion) {
                echo "<script language='javascript'> 
                alert('Habitacion Registrada');
                </script>";
            } else {
                echo "<script language='javascript'> 
                alert('no se pudo registrar la habitacion');
                </script>";
            }
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
                <h2>Cantidad de Personas</h2>
                <div class="mb-3">
                    <input type="number" name="cantPer" class="form-control">
                </div>
                <h2>Tipo de Camas</h2>
                <div class="mb-3">
                    <input type="text" name="tipo" class="form-control">
                </div>
                <h2>Costo</h2>
                <div class="mb-3">
                    <input type="number" name="costo" class="form-control">
                </div>
                <h2>Moneda</h2>
                <div class="mb-3">
                    <input type="text" name="moneda" class="form-control">
                </div>
                <br>
                <button id="guardar" class="btn btn-dark">Cargar</button>
            </form>
        </div>
    </div>
    <h2 class="b">Tipos de Habitaciones</h2>
    <?php 
        include('conexion.php');
        $habi = mysqli_query($conexion, "SELECT * FROM `servi_habitacion` WHERE 1");
        while ($a = mysqli_fetch_array($habi)) {
            echo "<div class='verHabi'>";
            echo "Cantidad de Personas: " . $a['cantidad_persona'] . " <br>";
            echo "Tipos de Camas: " . $a['descripcion'] . " <br>";
            echo "$" . $a['costo'] . " " . $a['moneda'];
            echo "</div>";
        }
    ?>
    
    <!-- Incluye Bootstrap JS y Popper.js (requerido por Bootstrap) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@2.9.3/dist/umd/popper.min.js"></script>
</body>
</html>


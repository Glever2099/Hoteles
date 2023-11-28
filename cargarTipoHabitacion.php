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
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="estilo.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</head>
<body>
    <div class="cargar">
        <form action="" method="post">
            <h2>Cantidad de Personas</h2> 
            <input type="number" name="cantPer"> <br>
            <h2>Tipo de camas</h2> 
            <input type="text" name="tipo"> <br>
            <h2>Costo</h2> 
            <input type="number" name="costo"> <br>
            <h2>Moneda</h2> 
            <input type="text" name="moneda"> <br>
            <br>
            <button id="guardar">Cargar</button>
        </form>
    </div>
    <h2 class="b">Tipos de Habitaciones</h2>
    <?php 
            
                include('conexion.php');
                $habi = mysqli_query($conexion, "SELECT * FROM `servi_habitacion` WHERE 1");
                while ($a = mysqli_fetch_array($habi)) {
                    echo "<div class='verHabi' >";
                    echo "Cantidad de Personas: ".$a['cantidad_persona']." <br>";
                    echo "Tipos de Camas: ".$a['descripcion']." <br>";
                    echo "$".$a['costo']." ".$a['moneda'];
                    echo "</div>";
                }
                
                
        ?>
</body>
</html>

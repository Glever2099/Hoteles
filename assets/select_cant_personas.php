

<?php 
include "conexion.php"; 
$sql1 = mysqli_query($conexion, "SELECT distinct cantidad_persona FROM servi_habitacion ORDER BY cantidad_persona ASC"); 
while ($rol1 = mysqli_fetch_array($sql1)) { 
    echo "<option value='" . $rol1["cantidad_persona"] . "'>" . $rol1["cantidad_persona"] . "</option>"; 
} 
?>

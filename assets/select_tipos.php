<?php


if(isset($_GET['cantidad_persona'])) {
    $cantidad_persona = $_GET['cantidad_persona'];

    include "conexion.php"; 
    $sql = "SELECT cantidad_persona, descripcion FROM servi_habitacion WHERE cantidad_persona = ?";
    
    if ($stmt = mysqli_prepare($conexion, $sql)) {
       
        mysqli_stmt_bind_param($stmt, "i", $cantidad_persona);
        
        
        mysqli_stmt_execute($stmt);

        
        $result = mysqli_stmt_get_result($stmt);

        
        $options = '';
        while ($row = mysqli_fetch_assoc($result)) {
            $options .= '<option value="' . $row["descripcion"] . '">' . $row["descripcion"] . '</option>';
        }

       s
        echo $options;
    } else {
        echo "Error en la consulta SQL";
    }

    
} else {
    echo "Cantidad de personas no especificada";
}

?>
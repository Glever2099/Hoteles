<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $data = json_decode(file_get_contents("php://input"), true);

    $cantPer = $data['CantPers'];
    $tipo = $data['TipoCama'];
    $costo = $data['Costo'];
    $moneda = $data['Moneda'];

    // asegurar que los campos no estén vacíos
    if (empty($cantPer) || empty($tipo) || empty($costo) || empty($moneda)) {
        $response = [
            'success' => false,
            'message' => 'Por favor, complete todos los campos.'
        ];
        echo json_encode($response);
        exit; 
    }

   
    include 'conexion.php'; 

    $verServi = mysqli_query($conexion, "SELECT * FROM `servi_habitacion` WHERE cantidad_persona = '".$cantPer."' and descripcion = '".$tipo."' and costo = '".$costo."' and moneda = '".$moneda."'");
    $r1 = mysqli_num_rows($verServi);

    if ($r1 > 0) {
        $response = [
            'success' => false,
            'message' => 'Esta habitación ya ha sido registrada anteriormente.'
        ];
        echo json_encode($response);
    } else {
        $tipohabitacion = mysqli_query($conexion, "INSERT INTO `servi_habitacion`(`cantidad_persona`, `descripcion`, `costo`, `moneda`) VALUES ('".$cantPer."','".$tipo."','".$costo."','".$moneda."')");
        
        if ($tipohabitacion) {
            $response = [
                'success' => true
            ];
            echo json_encode($response);
        } else {
            $response = [
                'success' => false,
                'message' => 'No se pudo registrar la habitación.'
            ];
            echo json_encode($response);
        }
    }
} else {
    $response = [
        'success' => false,
        'message' => 'Datos incompletos o incorrectos.'
    ];
    echo json_encode($response);
}
?>

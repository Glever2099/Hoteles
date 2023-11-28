<?php
session_start();
include "conexion.php"
    ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Reserva</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

</head>

<body>
    <?php include 'navbar.php'; ?>
<br><br>
    <h1>Crear Reservas</h1>

    <div class="container">
        <form method="post" action="guardarReserva.php">
            <div class="row">
                <div class="col-sm-12 col-md-3">
                    <p>
                    <h6>Nombre Completo:</h6>
                    </p>
                    <input type="text" name="tituNom">
                    <br>
                </div>
                <div class="col-sm-12 col-md-3">
                    <p>
                    <h6>DNI:</h6>
                    </p>
                    <input type="number" name="tituDNI">
                    <br>
                </div>
                <div class="col-sm-12 col-md-3">
                    <p>
                    <h6>Genero:</h6>
                    </p>
                    <input type="text" name="tituGen">
                    <br>
                </div>
                <div class="col-sm-12 col-md-3">
                    <p>
                    <h6>Ocupacion:</h6>
                    </p>
                    <input type="text" name="tituOcu"> <br>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-12 col-md-3">
                    <p>
                    <h6>Ciudad:</h6>
                    </p>
                    <input type="text" name="tituCiudad">
                    <br>
                </div>
                <div class="col-sm-12 col-md-3">
                    <p>
                    <h6>Telefono Celular:</h6>
                    </p>
                    <input type="text" name="tituTelC">
                    <br>
                </div>
                <div class="col-sm-12 col-md-3">
                    <p>
                    <h6>Email:</h6>
                    </p>
                    <input type="email" name="tituEmail"> <br>
                    <br>
                </div>
            </div>
            <h2>Datos de la Reserva</h2>
            <div class="row">
                <div class="col-sm-6 col-md-3">
                    <p>
                    <h6>
                        Ingreso:
                    </h6>
                    </p>
                    <input type="date" name="ReserIngreso"> <br>
                </div>
                <div class="col-sm-6 col-md-3">
                    <p>
                    <h6>
                        Salida:
                    </h6>
                    </p>
                    <input type="date" name="ReserSalida"> <br>
                </div>
                <div class="col-sm-6 col-md-3">
                    <p>
                    <h6>Comentario:</h6>
                    </p>
                    <input type="text" name="ReserCom"> <br>
                </div>
                <div class="col-sm-6 col-md-3">
                    <p>
                    <h6>
                        Metodo de Pago
                    </h6>
                    </p>
                    <input type="text" name="ReserMetodPago"> <br>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6 col-md-3">
                    <p>
                    <h6>
                        Cantidad de Pago
                    </h6>
                    </p>
                    <input type="number" name="ReserCantPago"> <br>
                </div>
                <div class="col-sm-6 col-md-3">
                    <p>
                    <h6>
                        Acompañante
                    </h6>
                    </p>
                    <select id="seleccion" name="selection">
                        <option value="0">Cantidad</option>
                        <?php
                        include 'conexion.php';
                        $sql1 = mysqli_query($conexion, "SELECT distinct cantidad_persona FROM servi_habitacion where 1 order by cantidad_persona asc");
                        $result1 = mysqli_num_rows($sql1);
                        if ($result1 > 0) {
                            while ($rol1 = mysqli_fetch_array($sql1)) {
                                ?>
                                <option value="<?php echo $rol1["cantidad_persona"]; ?>">
                                    <?php echo $rol1["cantidad_persona"]; ?>
                                </option>
                                <?php
                            }
                        }
                        ?>
                    </select>
                </div>
            </div>
            <br>
            <div id="resultado"></div>
            <h2>
                Datos de la Habitacion
            </h2>
            <h4>
                Cantidad de Personas
            </h4>
            <div class="row">
                <div class="col-sm-6 col-md-3">
                <select name="cantPer" id="cantPer" >
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
            </select> <br>
            <select name="tipo" id="tipo">
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
            <br>
            <button id="guardar" class="btn btn-primary">Guardar Habitacion</button>
                </div>
                
            </div>
        </form>
    </div>
    <br><br><br><br>
    <script type="text/javascript" src="filtro.js"></script>

</body>

</html>
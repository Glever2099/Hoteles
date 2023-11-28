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
        <form action="guardarReserva.php" method="post">
            <h1>Datos del Titular</h1>
            <div class="">
                <h2>Nombre Completo</h2> 
                    <input type="text" name="tituNom"> <br>
                <h2>DNI</h2> 
                    <input type="text" name="tituDNI"> <br>
                <h2>Genero</h2> 
                    <input type="text" name="tituGen"> <br>
                <h2>Ocupacion</h2> 
                    <input type="text" name="tituOcu"> <br>
                <h2>Cuidad</h2> 
                    <input type="text" name="tituCiudad"> <br>
                <h2>Telefono Celular</h2> 
                    <input type="text" name="tituTelC"> <br>
                <h2>Email</h2> 
                    <input type="email" name="tituEmail"> <br>
            </div>
            <hr>
            <h1>Datos de la Reserva</h1>
            <div>
                <h2>Ingreso</h2> 
                    <input type="date" name="ReserIngreso"> <br>
                <h2>Salida</h2> 
                    <input type="date" name="ReserSalida"> <br>
                <h2>Comentario</h2> 
                    <input type="text" name="ReserCom"> <br>
                <h2>Metodo de Pago</h2> 
                    <input type="text" name="ReserMetodPago"> <br>
                <h2>Cantidad de Pago</h2> 
                    <input type="number" name="ReserCantPago"> <br>    
            </div>
            <h2>Acompañantes</h2> 
            <select id="seleccion" name="selection">
                <option value="0">elige</option>
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
            </select> <br> <hr>
            <h1>Datos de los Acompañantes</h1>
            <div id="resultado">
            <!-- Los elementos generados se mostrarán aquí -->
            </div>
            <h1>Datos de la Habitacion</h1>
            <h2>Cantidad de Personas</h2> 
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
            </select> <br>
            <br>
            <button id="guardar">Guardar Habitacion</button>

        </form>
    </div>
    

    <script type="text/javascript" src="filtro.js"></script>
</body>
</html>
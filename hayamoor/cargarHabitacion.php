<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Gestión de Habitaciones</title>
  
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.all.min.js"></script>
  <link rel="stylesheet" href="style.css">
    
   
</head>
<body>

    <?php include 'navbar.php'; ?>

    
  <div class="container mt-4 contHab ">

    <div class="row align-items-center my-3 ">
        <div class="col-md-6">
          <h3 class="mb-0">Habitaciones</h3>
        </div>
        <div class="col-md-6 d-flex justify-content-end">
          
          <button class="btn btn-primary" onclick="agregarHabitacion()">Agregar Habitación</button>
        </div>
      </div>
      

      

    <div class="row">

      
      <?php 
                include('assets/conexion.php');
                $habi = mysqli_query($conexion, "SELECT * FROM `habitacion` inner join servi_habitacion on habitacion.id_servi_habitacion = servi_habitacion.id WHERE 1 order by nombre asc");
                while ($a = mysqli_fetch_array($habi)) {
                    echo "<div class='col-md-4 text-center'>";
                    echo "<div class='habitacion'>";
                    echo "<strong>".$a['nombre']."</strong><br> ";
                    echo $a['cantidad_persona']." ".$a['descripcion']." <br>";
                    echo "$".$a['costo']." ".$a['moneda'];
                    echo "</div>";
                    echo "</div>";
                }
                
                
        ?>

    </div>
  </div>

  
  <script>
 function agregarHabitacion() {
  fetch('assets/select_cant_personas.php')
    .then(response => response.text())
    .then(data1 => {
      Swal.fire({
        title: 'Agregar habitación',
        html:
          '<form id="myForm">' +
          '<div class="form-group">' +
          '<label for="NombHab">Nombre de la Habitación</label>' +
          '<input type="text" class="form-control" name="NombHab" id="NombHab" required>' +
          '</div>' +
          '<div class="form-group">' +
          '<label for="CantPers2">Cantidad de Personas</label>' +
          '<select class="form-control" name="CantPers2" id="CantPers2" required>' +
          '<option value=""></option>' +
          data1 +
          '</select>' +
          '</div>' +
          '<div class="form-group">' +
          '<label for="Tipo">Tipo</label>' +
          '<select class="form-control" name="Tipo" id="Tipo" required>' +
          '<option value=""></option>' +
          '</select>' +
          '</div>' +
          '</form>',
        focusConfirm: false,
        showCancelButton: true,
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Agregar',
        didOpen: () => {
          const cantSelect = document.getElementById('CantPers2');
          cantSelect.addEventListener('change', () => {
            const selectedValue = cantSelect.value;
            fetch(`assets/select_tipos.php?cantidad_persona=${selectedValue}`)
              .then(response => response.text())
              .then(data2 => {
                console.log('Datos recibidos para Tipo:', data2);
                const tipoSelect = document.getElementById('Tipo');
                tipoSelect.innerHTML = '' + data2;
              })
              .catch(error => {
                console.error('Error:', error);
              });
          });
        },
        preConfirm: () => {
          // 
        },
      });
    })
    .catch(error => {
      console.error('Error:', error);
    });
}





  </script>
</body>
</html>

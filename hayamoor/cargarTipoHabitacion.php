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

    
  <div class="container mt-4 contHab">
    

    <div class="row align-items-center my-3">
        <div class="col-md-6">
          <h3 class="mb-0">Tipo Habitaciones</h3>
        </div>
        <div class="col-md-6 d-flex justify-content-end">
          
          <button class="btn btn-primary" onclick="agregarHabitacion()">Agregar Habitación</button>
        </div>
      </div>
      


      
    <div class="row">

    
      <?php 
            
            include('assets/conexion.php');
            $habi = mysqli_query($conexion, "SELECT * FROM `servi_habitacion` WHERE 1");
            while ($a = mysqli_fetch_array($habi)) {
                echo "<div class='col-md-4 text-center' >";
                echo "<div class='habitacion'>";
                echo "Cantidad de Personas: ".$a['cantidad_persona']." <br>";
                echo "Tipos de Camas: ".$a['descripcion']." <br>";
                echo "$".$a['costo']." ".$a['moneda'];
                echo "</div>";
                echo "</div>";
            }
            
            
    ?>


    </div>
  </div>

  
  <script>
    function agregarHabitacion() {
        Swal.fire({
      title: 'Tipo de habitacion',
      html:
        '<form id="myForm">' +
          '<div class="form-group">' +
            '<label for="CantPers">Cantidad de Personas</label>' +
            '<input type="number" class="form-control" name="CantPers" id="CantPers" required>' +
          '</div>' +
          '<div class="form-group">' +
            '<label for="TipoCama">Tipos de Camas</label>' +
            '<input type="text" class="form-control" name="TipoCama" id="TipoCama" required>' +
          '</div>' +
          '<div class="form-group">' +
            '<label for="Costo">Costo</label>' +
            '<input type="number" class="form-control" name="Costo" id="Costo" required>' +
          '</div>' +
          '<div class="form-group">' +
            '<label for="Moneda">Moneda</label>' +
            '<input type="text" class="form-control" name="Moneda" id="Moneda" required>' +
          '</div>' +
        '</form>',
      focusConfirm: false,
      showCancelButton: true,
      cancelButtonText: 'Cancelar',
      confirmButtonText: 'Agregar',
      preConfirm: () => {
        const CantPers = document.getElementById('CantPers').value;
        const TipoCama = document.getElementById('TipoCama').value;
        const Costo = document.getElementById('Costo').value;
        const Moneda = document.getElementById('Moneda').value;

        return fetch('assets/Porc_Tipo_Hab.php', {
          method: 'POST',
          body: JSON.stringify({ CantPers, TipoCama, Costo, Moneda }),
          headers: {
            'Content-Type': 'application/json'
          }
        })
        .then(response => {
          if (!response.ok) {
            throw new Error('Hubo un problema al procesar el formulario.');
          }
          return response.json();
        })
        .then(data => {
          if (data.success) {
            Swal.fire('¡Habitación Registrada!');
          } else {
            Swal.fire('Error', data.message, 'error');
          }
        })
        .catch(error => {
          Swal.fire('Error', error.message, 'error');
        });
      }
    });
    }
  </script>
</body>
</html>

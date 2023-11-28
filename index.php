<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Navbar con Sidebar</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="style.css">
</head>
<body>

<?php include 'navbar.php'; ?>



  <div class="main-content">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <div class="panel">
            <div class="panel-header">
              <h3>Estado de Habitaciones</h3>
            </div>
            <p><strong>Habitaciones Ocupadas:</strong> 00</p>
            <p><strong>Habitaciones Disponibles:</strong> 00</p>
          
          </div>
        </div>
        <div class="col-md-6">
          <div class="panel">
            <div class="panel-header">
              <h3>Reservas</h3>
            </div>
            <p><strong>Reservas :</strong> 00</p>
           
          </div>
        </div>
      </div>
    </div>
  </div>


  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  
</body>
</html>

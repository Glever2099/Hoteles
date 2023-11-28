<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Navbar con Sidebar</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="style.css">

  

</head>
<body>

  <div class="navbar navbar-dark bg-dark">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <span class="navbar-brand">Hoteles</span>
  </div>

  <div class="sidebar">
    <ul>
        <li><a href="index.php">Inicio</a></li>
      <li><a href="cargarTipoHabitacion.php">Tipos de Habitacion</a></li>
      <li><a href="cargarHabitacion.php">Cargar Habitacion</a></li>
      <li><a href="calendario.php">Reservas</a></li>
    </ul>
  </div>



  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  
  <script>
    
    $('.navbar-toggler').on('click', function() {
      $('.sidebar').toggleClass('show');
    });
  </script>
</body>
</html>

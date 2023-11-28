<!DOCTYPE html>
<html>
<head>
    <title>Tabla con Reservas de Habitaciones</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: center;
        }
        .occupied {
            background-color: red;
        }
        .available {
            background-color: green;
        }
    </style>
</head>
<body>
    <h2>Calendario de Reservas</h2>
    <button class="nav-btn" onclick="retrocederSemana()">Dias Anteriores</button>
    <button class="nav-btn" onclick="avanzarSemana()">Dias Siguientes</button>
    <button class="nav-btn" onclick="hoy()">Hoy</button>

    <table>
        <tr>
            <th>Habitación / Fecha</th>
        </tr>
        <!-- Contenido de la tabla generado por JavaScript -->
    </table>

    <script>
        const tabla = document.querySelector('table');
        const numDias = 14;
        let fechaActual = new Date();

        function retrocederSemana() {
            fechaActual.setDate(fechaActual.getDate() - 7);
            actualizarTabla();
        }

        function avanzarSemana() {
            fechaActual.setDate(fechaActual.getDate() + 7);
            actualizarTabla();
        }

        function hoy() {
            window.location.reload();
        }

        function actualizarTabla() {
            const fechaSeleccionada = fechaActual.toISOString().split('T')[0]; // Convierte la fecha a formato 'yyyy-mm-dd'

            // Realiza la solicitud AJAX para obtener datos del servidor
            const url = `consulReserva.php`;
            fetch(url)
                .then(response => response.json())
                .then(data => {
                    // Limpiar la tabla antes de agregar nuevas filas
                    tabla.innerHTML = '';

                    const habitaciones = data.habitaciones; // Obtén la información de las habitaciones desde la respuesta

                    // Inicializa la tabla con las fechas
                    const headerRow = tabla.insertRow(0);
                    headerRow.innerHTML = '<th>Habitación / Fecha</th>';
                    let tempFecha = new Date(fechaSeleccionada);

                    for (let i = 0; i < numDias; i++) {
                        const th = document.createElement('th');
                        th.textContent = tempFecha.toLocaleDateString('es-ES');
                        headerRow.appendChild(th);
                        tempFecha.setDate(tempFecha.getDate() + 1);
                    }

                    // Crear filas para todas las habitaciones
                    habitaciones.forEach(habitacion => {
                        const row = tabla.insertRow(-1);
                        const th = row.insertCell(0);
                        th.textContent = `Habitación ${habitacion.nombre}`;

                        for (let i = 0; i < numDias; i++) {
                            const td = row.insertCell(-1);
                            const fecha = new Date(fechaActual);
                            fecha.setDate(fecha.getDate() + i);

                            // Buscar reservas para esta habitación y fecha
                            const reservasHabitacion = data.reservas.filter(reserva => reserva.id_habitacion === habitacion.id);
                            const ocupada = reservasHabitacion.some(reserva => {
                                const ingreso = new Date(reserva.ingreso);
                                const retiro = new Date(reserva.retiro);
                                return fecha >= ingreso && fecha <= retiro;
                            });

                            if (ocupada) {
                                td.classList.add('occupied');
                            } else {
                                td.classList.add('available');
                            }
                        }
                    });
                })
                .catch(error => console.error('Error en la solicitud AJAX:', error));
        }



        

        // Inicialmente, actualizamos la tabla con la fecha actual
        actualizarTabla();
    </script>
</body>
</html>

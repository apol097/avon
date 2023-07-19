<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <style>
        .cuadro{
            background-color: #5a0735;
            color: #fff;
            padding: 40px;
            text-align: center;
            width: 350px;
            border-radius: 30px;
        }
    </style>

    <div class="cuadro" style="position: fixed; top: 0; left: 0; right: 0; width: 100%;
         margin-left: auto; margin-right: auto; border-radius: 0; text-align: center; font-size: 40px;">

            Clientes
        <?php #boton regresar?>
        <a href="administrador.php">        
        <input type="button" value="Regresar" style = "background-color: #350a06; color: #fff; position: fixed; left: 5%; padding: 10px 20px; font-size: 14px;">
        </a>

    </div>

    <?php #BOTON DE AGREGAR?>
    <style>
        .agg{
            background-color: #952f57;
            color: #fff;
            padding: 8px;
            text-align: center;
            width: 145px;
            border-radius: 30px;
            
        }
    </style>
    <div class="agg" style="position: fixed; top: 21%; border-radius: 0; display: flex; justify-content: center; ">
        <a href="agregarcliente.php">
        <input type="button" value="Agregar cliente" style= "width: 150px; height: 53px; background-color: #350a06; color: white;">
        </a>
    </div>

    <?php #BOTON DE BUSCAR?>
    <style>
        .cuadro1{
            background-color: #952f57 ;
            color: #fff;
            padding: 41px;
            text-align: center;
            width: 800px;
            border-radius: 30px;
        }
    </style>

    <div class="cuadro1" style="position: fixed; top: 57%; border-radius: 3; transform: translateY(-50%); left: 0; right: 0; margin-left: auto; margin-right: auto;">
        <input type="text" name= "txtbusqueda">
        <input type="button" value="buscar" style= "background-color: #350a06; color: white;">
        <script>
            function editarCliente(id) {
                // Guardar el ID de la fila en el localStorage
                localStorage.setItem("editID", id);
                // Redirigir al usuario a la página de edición (o realizar cualquier otra acción)
                window.location.href = "editarcliente.php"; // Cambiar "editarcliente.php" por la ruta de la página de edición
            }
        </script>
        <div style="width: 100px; height: 50px;"></div>

        <table id="Tablaxd" border="1" style="background-color: #330000; padding: 7px; margin: 7px; margin-left: auto; margin-right: auto;" >
            <thead>
                <tr>
                    <td style="background-color: transparent ; font-size: 20px;">Id_cliente</td>
                    <td style="background-color: transparent; font-size: 20px;">Nombre</td>
                    <td style="background-color: transparent; font-size: 20px;;">Direccion</td>
                    <td style="background-color: transparent; font-size: 20px;;">Fecha de registro</td>
                    <td style="background-color: transparent; font-size: 20px;">Dashboard</td>
                    <td style="background-color: transparent; font-size: 20px;">Editar</td>
                    <td style="background-color: transparent; font-size: 20px;">Eliminar</td>
                </tr>
            </thead>
           <tbody>
            <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>
                        <a href="dashboardCliente.php">
                        <input type="button" value="dashboard" style="background-color: #C39BD3; color: white; font-size: 18px;">
                        </a>
                        
                    </td>
                    <td>
                        <a href="editarcliente.php">
                        <input type="button" value="Editar" style="background-color: #D4AC0D; color: white; font-size: 18px;">
                        </a>

                    </td>
                    <td><input type="button" value="Eliminar" style="background-color: #BF0C00; color: white; font-size: 18px;"></td>

                </tr>
           </tbody>
         </table>
    </div>

<script>
  document.addEventListener("DOMContentLoaded", function() {

   

    // Obtener el token del localStorage
    const token = localStorage.getItem("token");

    // Verificar si el token está presente
    if (token) {
      // Realizar la solicitud Fetch al backend
      fetch("http://localhost/avon/clients", {
        method: "GET",
        headers: {
          "Authorization": `Bearer ${token}`
        }
      })
        .then(response => response.json())
        .then(data => {

          // Obtener referencia a la tabla y el cuerpo de la tabla
          const tabla = document.getElementById("Tablaxd");
          const tbody = tabla.querySelector("tbody");

          // Limpiar el contenido actual del cuerpo de la tabla
          tbody.innerHTML = "";

          // Convertir la respuesta en un array
          const clientes = Object.values(data.data); // <-- Aquí se cambia data a data.data

          // Construir filas y celdas para mostrar los datos en la tabla
          clientes.forEach(cliente => {
            const fila = document.createElement("tr");
            const celdaId = document.createElement("td");
            const celdaNombre = document.createElement("td");
            const celdaDireccion = document.createElement("td");
            const celdaFechaRegistro = document.createElement("td");
            const celdaDashboard = document.createElement("td");
            const celdaEditar = document.createElement("td");
            const celdaEliminar = document.createElement("td");

            celdaId.textContent = cliente.id;
            celdaNombre.textContent = cliente.name;
            celdaDireccion.textContent = cliente.direccion;
            celdaFechaRegistro.textContent = cliente.created_at;
            celdaDashboard.innerHTML = '<a href="dashboardCliente.php"><input type="button" value="dashboard" style="background-color: #C39BD3; color: white; font-size: 18px;"></a>';
            celdaEditar.innerHTML = '<input type="button" value="Editar" onclick="editarCliente(' + cliente.id + ')" style="background-color: #D4AC0D; color: white; font-size: 18px;">';
            celdaEliminar.innerHTML = '<input type="button" value="Eliminar" style="background-color: #BF0C00; color: white; font-size: 18px;">';

            fila.appendChild(celdaId);
            fila.appendChild(celdaNombre);
            fila.appendChild(celdaDireccion);
            fila.appendChild(celdaFechaRegistro);
            fila.appendChild(celdaDashboard);
            fila.appendChild(celdaEditar);
            fila.appendChild(celdaEliminar);

            tbody.appendChild(fila);
          });
        })
        .catch(error => {
          // Manejar errores en la solicitud Fetch
          alert("Error en la solicitud");
          console.error(error);
        });
    }
   
  });
</script>

<!-- ... Tu código HTML existente ... -->


<!-- ... Tu código HTML existente ... -->

<!-- ... Tu código HTML existente ... -->

    
</body>
</html>
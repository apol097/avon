<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Cliente</title>
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
    
            Editar datos de clientes

        <?php #boton regresar?>
        <a href="cliente.php">        
        <input type="button" value="Regresar" style = "background-color: #350a06; color: #fff; position: fixed; left: 5%; padding: 10px 20px; font-size: 14px;">
        </a>
    </div>

    <style>
        .cuadro2{
            background-color: #952f57 ;
            color: #fff;
            padding: 50px;
            text-align: center;
            width: 550px;
            border-radius: 30px;
        }
    </style>

<div class="cuadro2" style="position: fixed; top: 55%; border-radius: 0; transform: translateY(-50%); left: 0; right: 0; margin-left: auto; margin-right: auto;">
        <table id="Tablaxd" border="1" style="background-color: #330000; padding: 5px; margin: 5px; margin-left: auto; margin-right: auto;">
            <tr>
                <td style="background-color: transparent; font-size: 20px;">Nombre</td>     
                <td><input type="text" name="txtNombre" id="txtNombre"></td>
            </tr>
            <tr>
                <td colspan="2">&nbsp;</td>
            </tr>
            <tr>
                <td style="background-color: transparent; font-size: 20px;">Direccion</td>
                <td><input type="text" name="txtLocalidad" id="txtLocalidad"></td>
            </tr>
            <tr>
                <td colspan="2">&nbsp;</td>
            </tr>
            <tr>
                <td colspan="2">
                    <input type="button" value="Guardar edicion" name="txtGuardar" id="txtGuardar" style="background-color: #1C2833; color: white;">
                    <input type="button" value="Limpiar" name="txtLimpiar" style="background-color: #1C2833; color: white;">
                </td>
            </tr>
        </table>
    </div>

    <!-- Agrega el script que obtiene y muestra los datos del cliente -->
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Obtener el token y el ID del cliente del localStorage
            // Verificar si el token y el ID del cliente están presentes
            
                // Realizar la solicitud Fetch para obtener los datos del cliente
                fetch(`http://localhost/avon/clients/${localStorage.getItem('editID')}`, {
                    method: "GET",
                    headers: {
                        "Authorization": "Bearer " +  `${ localStorage.getItem('token') }`,
                        "Content-Type": "application/json"
                    }
                })
                .then(response => response.json())
                .then(data => {
                    // Verificar si se obtuvieron los datos correctamente
                    if (data.status === "success") {
                        // Llenar los campos de los inputs con los datos del cliente
                        document.getElementById("txtNombre").value = data.data.name;
                        document.getElementById("txtLocalidad").value = data.data.direccion;
                    } else {
                        alert("No se pudieron obtener los datos del cliente");
                    }
                })
                .catch(error => {
                    // Manejar errores en la solicitud Fetch
                    alert("Error en la solicitud");
                    console.error(error);
                });
            
        });
    </script>

    <!-- Agrega el script que envía los datos actualizados del cliente al servidor -->
    <script>
        document.getElementById("txtGuardar").addEventListener("click", function() {
            // Obtener el token y el ID del cliente del localStorage
            const token = localStorage.getItem("token");
            const clienteID = localStorage.getItem("editID");

            // Verificar si el token y el ID del cliente están presentes
            if (token && clienteID) {
                // Obtener los valores de los inputs
                const nombre = document.getElementById("txtNombre").value;
                const direccion = document.getElementById("txtLocalidad").value;

                // Crear el objeto con los datos actualizados del cliente
                const data = {
                    nombre: nombre,
                    direccion: direccion,
                    id: clienteID
                };

                // Realizar la solicitud Fetch para actualizar los datos del cliente
                fetch(`http://localhost/avon/clients`, {
                    method: "PUT",
                    headers: {
                        "Authorization": `Bearer ${token}`,
                        "Content-Type": "application/json"
                    },
                    body: JSON.stringify(data)
                })
                .then(response => response.json())
                .then(data => {
                    // Verificar si los datos se actualizaron correctamente
                    if (data.status === "success") {
                        alert("Datos del cliente actualizados con éxito");
                        // Redirigir a la página deseada en caso de éxito
                        window.location.href = "cliente.php"; // Cambiar "otra_pagina.php" por la ruta de la página deseada
                    } else {
                        alert("No se pudieron actualizar los datos del cliente");
                    }
                })
                .catch(error => {
                    // Manejar errores en la solicitud Fetch
                    alert("Error en la solicitud");
                    console.error(error);
                });
            } else {
                alert("No se ha seleccionado un cliente para editar");
            }
        });
    </script>

</body>
</html>
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
    
            Agregar datos de clientes

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

<form id="miFormulario">
    <div class="cuadro2" style="position: fixed; top: 55%; border-radius: 2; transform: translateY(-50%); left: 0; right: 0; margin-left: auto; margin-right: auto;">
        <table id="Tablaxd" border="1" style="background-color: #330000; padding: 5px; margin: 5px; margin-left: auto; margin-right: auto;">
            <tr>
                <td style="background-color: #; font-size: 20px;">Nombre</td>
                <td><input type="text" name="txtNombre"></td>
            </tr>
            <tr>
                <td colspan="2"> &nbsp;</td>
            </tr>
            <tr>
                <td style="background-color: #; font-size: 20px;">Direccion</td>
                <td><input type="text" name="txtDireccion"></td>
            </tr>
            <tr>
                <td colspan="2"> &nbsp;</td>
            </tr>
            <tr>
                <td colspan="2">
                    <input type="submit" value="Guardar datos" name="txtGuardar" style="background-color: #1C2833; color: white;">
                    <input type="button" value="Limpiar" name="txtLimpiar" style="background-color: #1C2833; color: white;">
                </td>
            </tr>
        </table>
    </div>
</form>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Obtener referencia al formulario
        const formulario = document.getElementById("miFormulario");

        // Manejar el evento submit del formulario
        formulario.addEventListener("submit", function(event) {
        event.preventDefault(); // Evitar que el formulario se envíe normalmente

        // Obtener los datos del formulario
        const formData = new FormData(formulario);
        const nombre = formData.get("txtNombre");
        const direccion = formData.get("txtDireccion");

        // Construir el objeto con los datos a enviar en la solicitud POST
        const data = {
            name: nombre,
            direccion: direccion
        };

        // Realizar la solicitud Fetch al backend
        fetch("http://localhost/avon/clients", {
            method: "POST",
            headers: {
            "Content-Type": "application/json",
            "Authorization": `Bearer ${localStorage.getItem("token")}`
            },
            body: JSON.stringify(data)
        })
            .then(response => response.json())
            .then(data => { window.location.href = "cliente.php";
            })
            .catch(error => {
            // Manejar errores en la solicitud Fetch
            alert("Error en la solicitud");
            console.error(error);
            });
        });
    });
</script>
    

</body>
</html>
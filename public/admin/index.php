<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrador</title>
    <link rel="stylesheet" href="../css/esti.css">
    <script src="../js/windows.js"></script>
    <style>
        .cuadro{
            background-color: #952f57 ;
            color: #fff;
            padding: 40px;
            text-align: center;
            width: 350px;
            border-radius: 30px;
            opacity: 70;
        }
        body {
            margin: 0;
            padding: 0;
            background: url("../img/belleza.png") no-repeat center top;
            background-size: cover;
            font-family: sans-serif;
            height: 100vh;
        }
    </style>
    
</head>

<body>

    <div class= "body" style="background-image: url('../img/belleza.jpg'); background-position: center; background-size: cover; background-attachment: fixed; "> 
        <div style="display: flex; align-items: center; justify-content: center; height: 100vh;">
            <div class = "cuadro" style="margin-left: auto; margin-right: auto;">

                <h1 >ADMINISTRADOR</h1>    

                <a href="cliente.php">
                    <input type="button" value="Listado de Clientes" style=" width: 200px; height: 50px; background-color: #350a06; color: white;"><br><br>
                </a>
                <a href="vendedores.php">
                <input type="button" value="Listado de Vendedores" style=" width: 200px; height: 50px; background-color: #350a06; color: white;"><br><br>
                </a>
                    
                <a href="listproductos.php">
                    <input type="button" value="Listado de Productos" style="width: 200px; height: 50px; background-color: #350a06; color: white;"><br><br>
                </a>
            
                <a href="listadop.php">
                <input type="button" value="Listado de Pedidos" style=" width: 200px; height: 50px; background-color: #350a06; color: white;"><br><br>

                </a>
                
                <a href="listadopago.php">
                    <input type="button" value="Listado de Pagos" style=" width: 200px; height: 50px; background-color: #350a06; color: white;"><br><br>
                </a>
                <br><br>
                <a href="login.html" class="btn-neon" id="logout-link">
                    <span id="span1"></span>
                    <span id="span2"></span>
                    <span id="span3"></span>
                    <span id="span4"></span>
                    Cerrar sesión
                </a>
            </div>
        </div>
    </div>
    
<script>
        document.addEventListener("DOMContentLoaded", function() {
            // Obtener referencia al enlace o botón de logout
            const logoutLink = document.getElementById("logout-link");

            // Manejar el clic en el enlace o botón de logout
            logoutLink.addEventListener("click", function(event) {
            event.preventDefault(); // Evitar que el enlace ejecute su comportamiento predeterminado

            // Eliminar el token del localStorage para cerrar sesión
            localStorage.removeItem("token");

            // Redireccionar al usuario a la página de inicio o a la ruta deseada después de cerrar sesión
            window.location.href = "/avon/public"; // Cambiar '/' por la ruta deseada
            });
        });
</script>
    
</body>
</html>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalles mi perfil</title>
    <link rel="stylesheet" href="estilos.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
     rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    
</head>
<body>

    <img src="../img/usuario.png" class="mx-auto d-block style-img mt-5" <img src="../img/usuario.png" class="mx-auto d-block style-img mt-5" style="width: 135px; transform: translateY(20%);">>
    <div class="container">
        <form class="row col-6 position-absolute top-50 start-50 translate-middle mt-3">
            <br> <br><br>
            <div class="col-6">
                <label for="nombreInput" class="form-label">Nombre completo:</label>
                <input type="text" class="form-control" id="nombreInput" readonly placeholder="">
            </div>

            <br>
            <div class="col-3">
                <label for="idinput" class="form-label" id="id">ID_Cliente:</label>
                <input type="text" class="form-control" id="idinput" readonly placeholder="">
            </div>

            <br>
            <div class="col-3">
                <label for="edadinput" class="form-label">Edad:</label>
                <input type="text" class="form-control" id="edadinput" readonly placeholder=" ">      
            </div>
           
            <br>
            <div class="col-12">
                <label for="correoinput" class="form-label">Correo:</label>
                <input type="text" class="form-control" id="correoInput" readonly placeholder=" ">      
            </div>    
            <br>
            <div class="col-12">
                <picture>
                    <source srcset="../img/imagen-webp.webp" type="image/webp">
                    <source srcset="../img/imagen-jpeg.jpg" type="image/jpeg">
                    <img src="search.htm" alt="">
                </picture>
            </div>
            <br>
            <div class="col-6">
                 <a href="/avon/public/user" class="btn btn-primary">Regresar</a>
            </div>
        </form>
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const storedData = localStorage.getItem("profile");

            if (storedData) {
                const data = JSON.parse(storedData);
                
                const id = document.getElementById("idinput");
                id.value = data.id;

                const name = document.getElementById("nombreInput");
                name.value = data.name;

                const email = document.getElementById("correoInput");
                email.value = data.email;
            }
        });
    </script>

</body>
</html>
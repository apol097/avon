<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Deudas del cliente</title>
    <link rel="stylesheet" href="estilos.css" />

</head>
<body>

    <style>
        .cuadro{
            background-color: #7C82F3;
            color: #fff;
            padding: 40px;
            text-align: center;
            width: 350px;
            border-radius: 30px;
        }
    </style>

    <style>
        .cuadro1{
            background-color: #952f57 ;
            color: #fff;
            padding: 15%;
            text-align: center;
            width: 500px;
            border-radius: 30px;
        }
    </style>

    <div class="cuadro" style="position: fixed; top: 0; left: 0; right: 0; width: 100%;
         margin-left: auto; margin-right: auto; border-radius: 0; text-align: center; font-size: 40px;">

            Pago Deuda
        <?php #boton regresar?>
        <a href="historialcompra.php">        
        <input type="button" value="Regresar" style = "background-color: #350a06; color: #fff; position: fixed; left: 5%; padding: 10px 20px; font-size: 14px;">
        </a>

    </div>
    <div style= "position: fixed; top: 25%; right: 40%;">

            <div class="col-6">
                <label for="idInput" class="form-label">Nombre de usuario</label>
                <input type="text" class="form-control" id="UsuarioInput" placeholder="" reandoly>
            </div>

            <br>
            <div class="col-6">
                <label for="Productoinput" class="form-label">Fecha de pago</label>
                <input type="date" class="form-control" id="Fechpagoinput" placeholder="">
            </div>

            <br>
            <div class="col-12">
                <label for="Cantidadinput" class="form-label">Monto a pagar</label>
                <input type="text" class="form-control" id="Monto" placeholder=" ">      
            </div>
            <br>

            <div class="col-12">
                <label for="catAddress" class="form-label">cuota minima de pago</label>
                <input type="text" class="form-control" id="cuotaM" placeholder=" ">      
            </div>
            <br>

            <br>
            <div class="col-12">
                <label for="catAddress" class="form-label">total de deuda</label>
                <input type="text" class="form-control" id="catAddress" placeholder=" ">      
            </div>
            <br>
  
            <input type="button" value="Guardar Pago">
                
    </div>
    
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resumen de Cuenta</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>

<body>
        <h1 style="position: fixed; top: 25%;">Resumen de Cuenta/ Saldo Actual Cliente</h1><br>
    <div class="container">
        <table border="1" style="color: black;">
            <thead>
                    <tr>
                        <td>Pais: </td>
                        <td>Nombre: </td>
                        <td>Fecha</td>
                        <td>Monto Total</td>
                        <td>Debe</td>
                        <td>Saldo para gastar</td>
        
                    </tr>
            </thead>     
            <tbody>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>$</td>
                        <td>$</td>
                        <td>$</td>   
                    </tr>     
            </tbody>
        </table>
    </div>

            <input type="button" value="Regresar" name="btnRegresar"  onclick="window.location.href='/avon/public/user'"  style = "position: fixed; top: 70%; left:35%; font-size: 17px; background-color: #350a06; color: white;">
            
            <input type="button" value="Realizar un pago" name="btnPagar" onclick="window.location.href='rpagoCliente.php'" style = "position: fixed; top: 70%; right:35%; font-size: 16px; background-color: #350a06; color: white;">

</body>
</html>
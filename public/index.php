<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Login</title>
    <link rel="stylesheet" href="./css/maestro.css">
  </head>
  <body>

    <div class="login-box">
        <img src="./img/log.png" class="avatar" alt="Avatar Image">
      <h1>Log in</h1>
      <form id="login-form">
        <!-- email INPUT -->
        <label >Gmail</label>

        <input type="text"  name="email" placeholder="Ingrese su correo electrónico">
        <!-- PASSWORD INPUT -->

        <label >Contraseña</label>
        <input type="password" name="password" placeholder="Ingrese su contraseña">
        <input type="submit" id="login-btn">Log In</input> 
        <a href="#">Recuperar contraseña</a><br>
      </form>
    </div>
    <!-- ... Tu código HTML existente ... -->

<!-- ... Tu código HTML existente ... -->

<script>
  document.addEventListener("DOMContentLoaded", function() {
    // Obtener referencia al formulario y al botón de login
    const loginForm = document.getElementById("login-form");
    const loginBtn = document.getElementById("login-btn");

    // Manejar el envío del formulario con AJAX (Fetch)
    loginForm.addEventListener("submit", function(event) {
      event.preventDefault(); // Evitar que el formulario se envíe normalmente

      // Obtener los datos del formulario
      const formData = new FormData(loginForm);
      const email = formData.get("email");
      const password = formData.get("password");

      // Realizar la solicitud Fetch al backend
      fetch("http://localhost/avon/auth", {
        method: "POST",
        headers: {
          "Content-Type": "application/json"
        },
        body: JSON.stringify({ email, password })
      })
        .then(response => response.json()) // Parsear la respuesta JSON
        .then(data => {
          // Manejar la respuesta del servidor
          if (data.data.status === "success") {
            const token = data.data.token;
            const profile = JSON.stringify(data.data.profile);

            localStorage.setItem("token", token); 
            localStorage.setItem("profile", profile); 
            if(!data.data.redirect){

              window.location.href = "http://localhost/avon/public/user";
            }else{
              window.location.href = "http://localhost/avon/public/admin";
            }
            // Aquí puedes redirigir al usuario a la página que corresponda   
          } else {
            // Mostrar mensaje de error en caso de credenciales incorrectas
            alert(data.data.error); // El mensaje de error está dentro del objeto 'data'
          }
        })
        .catch(error => {
          // Manejar errores en la solicitud Fetch
          alert("Error en la solicitud");
          console.error(error);
        });
    });
  });
</script>

<!-- ... Tu código HTML existente ... -->


<!-- ... Tu código HTML existente ... -->

  </body>
</html>
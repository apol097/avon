
  document.addEventListener("DOMContentLoaded", function() {
    // Comprobar si la variable "token" está presente en el localStorage
    const token = localStorage.getItem("token");
    // Si la variable "token" no está presente, redirigir al usuario a la página de inicio
    if (!token) {
      window.location.href = "/avon/public"; // Cambiar "/inicio" por la ruta de la página de inicio
    }
  });

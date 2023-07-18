console.log("hola")

fetch('http://localhost/avon/users')
    .then(response => response.json())
    .then(data => {
        // Manejar la respuesta recibida
        console.log( JSON.stringify(data, null, 2));
    })
    .catch(error => {
        // Manejar errores en caso de que ocurran
        console.error('Error:', error);
    });
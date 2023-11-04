function llamarFunciones() {
    // Llamada a la función JavaScript
    imprimirEnConsola();

    // Llamada a la función PHP
    llamarPHP();
}

function imprimirEnConsola() {
    console.log("Estamos en JavaScript");
}

function llamarPHP() {
    // Hacer una petición a un archivo PHP usando fetch
    fetch('http://localhost:3000/index.php')
        .then(response => response.text())
        .then(data =>  alert(data))
        .catch(error => console.error('Error:', error));

}

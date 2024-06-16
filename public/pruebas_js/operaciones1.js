alert("HOLA DESDE EL ARCHIVO OPERACIONES DE JS");
console.log("HOLA DESDE EL ARCHIVO OPERACIONES DE JS");

function sumar() {
    var cantidad1 = parseFloat(document.getElementById("cantidad1").value);
    var cantidad2 = parseFloat(document.getElementById("cantidad2").value);
    if (isNaN(cantidad1) || isNaN(cantidad2)) {
        alert("Por favor, ingrese números en los campos de cantidad.");
        return;
    }
    var resultado = cantidad1 + cantidad2;
    document.getElementById("resultado").innerText = "Resultado: " + resultado;
}

function restar() {
    var cantidad1 = parseFloat(document.getElementById("cantidad1").value);
    var cantidad2 = parseFloat(document.getElementById("cantidad2").value);
    if (isNaN(cantidad1) || isNaN(cantidad2)) {
        alert("Por favor, ingrese números en los campos de cantidad.");
        return;
    }
    var resultado = cantidad1 - cantidad2;
    document.getElementById("resultado").innerText = "Resultado: " + resultado;
}

function multiplicar() {
    var cantidad1 = parseFloat(document.getElementById("cantidad1").value);
    var cantidad2 = parseFloat(document.getElementById("cantidad2").value);
    if (isNaN(cantidad1) || isNaN(cantidad2)) {
        alert("Por favor, ingrese números en los campos de cantidad.");
        return;
    }
    var resultado = cantidad1 * cantidad2;
    document.getElementById("resultado").innerText = "Resultado: " + resultado;
}

function dividir() {
    var cantidad1 = parseFloat(document.getElementById("cantidad1").value);
    var cantidad2 = parseFloat(document.getElementById("cantidad2").value);
    if (isNaN(cantidad1) || isNaN(cantidad2)) {
        alert("Por favor, ingrese números en los campos de cantidad.");
        return; 
    }
    if (cantidad2 !== 0) {
        var resultado = cantidad1 / cantidad2;
        document.getElementById("resultado").innerText = "Resultado: " + resultado;
    } else {
        document.getElementById("resultado").innerText = "Inválido";
    }
}

function residuo() {
    var cantidad1 = parseFloat(document.getElementById("cantidad1").value);
    var cantidad2 = parseFloat(document.getElementById("cantidad2").value);
    if (isNaN(cantidad1) || isNaN(cantidad2)) {
        alert("Por favor, ingrese números en los campos de cantidad.");
        return;
    }
    if (cantidad2 !== 0) {
        var resultado = cantidad1 % cantidad2;
        document.getElementById("resultado").innerText = "Resultado: " + resultado;
    } else {
        document.getElementById("resultado").innerText = "Inválido";
    }
}

// alert("HOLA DESDE EL ARCHIVO OPERACIONES DE JS");
console.log("HOLA DESDE EL ARCHIVO OPERACIONES DE JS");

var suma=document.getElementById('suma');
suma.addEventListener('click', sumar);
suma.addEventListener('mouseenter', sobre);
suma.addEventListener('mouseleave', afuera);

var resta=document.getElementById('resta');
resta.addEventListener('click', restar);
resta.addEventListener('mouseenter', sobre1);
resta.addEventListener('mouseleave', afuera1);

var multiplicacion=document.getElementById('multiplicacion');
multiplicacion.addEventListener('click', multiplicar);
multiplicacion.addEventListener('mouseenter', sobre2);
multiplicacion.addEventListener('mouseleave', afuera2);

var division=document.getElementById('division');
division.addEventListener('click', dividir);
division.addEventListener('mouseenter', sobre3);
division.addEventListener('mouseleave', afuera3);

var residuos=document.getElementById('residuos');
residuos.addEventListener('click', residuo);
residuos.addEventListener('mouseenter', sobre4);
residuos.addEventListener('mouseleave', afuera4);

function sumar() {
    // alert("HOLA DESDE LA FUNCION DE SUMAR");
    console.log("HOLA DESDE LA FUNCION DE SUMAR");
}

function sobre(){
    suma.style.color="white";
    suma.style.backgroundColor="blue";
    suma.style.fontFamily="Cambria";
    console.log("El mouse ha entrado en el botón de sumar");
}

function afuera(){
    // alert("El mouse se ha ido del botón sumar");
    suma.style.color="black";
    suma.style.backgroundColor="white";
    suma.style.fontFamily="Arial";
    console.log("El mouse se ha ido del botón sumar");
}



function restar() {
    // alert("HOLA DESDE LA FUNCION DE RESTAR");
    console.log("HOLA DESDE LA FUNCION DE RESTAR");
}

function sobre1(){
    resta.style.color="white";
    resta.style.backgroundColor="blue";
    resta.style.fontFamily="Cambria";
    console.log("El mouse ha entrado en el botón de resta");
}

function afuera1(){
    // alert("El mouse se ha ido del botón resta");
    resta.style.color="black";
    resta.style.backgroundColor="white";
    resta.style.fontFamily="Arial";
    console.log("El mouse se ha ido del botón resta");
}



function multiplicar() {
    // alert("HOLA DESDE LA FUNCION DE MULTIPLICAR");
    console.log("HOLA DESDE LA FUNCION DE MULTIPLICAR");
}

function sobre2(){
    multiplicacion.style.color="white";
    multiplicacion.style.backgroundColor="blue";
    multiplicacion.style.fontFamily="Cambria";
    console.log("El mouse ha entrado en el botón de multiplicacion");
}

function afuera2(){
    // alert("El mouse se ha ido del botón multiplicacion");
    multiplicacion.style.color="black";
    multiplicacion.style.backgroundColor="white";
    multiplicacion.style.fontFamily="Arial";
    console.log("El mouse se ha ido del botón multiplicacion");
}



function dividir() {
    // alert("HOLA DESDE LA FUNCION DE DIVIDIR");
    console.log("HOLA DESDE LA FUNCION DE DIVIDIR");
}

function sobre3(){
    division.style.color="white";
    division.style.backgroundColor="blue";
    division.style.fontFamily="Cambria";
    console.log("El mouse ha entrado en el botón de division");
}

function afuera3(){
    // alert("El mouse se ha ido del botón division");
    division.style.color="black";
    division.style.backgroundColor="white";
    division.style.fontFamily="Arial";
    console.log("El mouse se ha ido del botón division");
}



function residuo() {
    // alert("HOLA DESDE LA FUNCION DE RESIDUO");
    console.log("HOLA DESDE LA FUNCION DE RESIDUO");
}

function sobre4(){
    residuos.style.color="white";
    residuos.style.backgroundColor="blue";
    residuos.style.fontFamily="Cambria";
    console.log("El mouse ha entrado en el botón de residuo");
}

function afuera4(){
    // alert("El mouse se ha ido del botón residuo");
    residuos.style.color="black";
    residuos.style.backgroundColor="white";
    residuos.style.fontFamily="Arial";
    console.log("El mouse se ha ido del botón residuo");
}

function sumar() {
    var cantidad1 = parseFloat(document.getElementById("cantidad1").value);
    var cantidad2 = parseFloat(document.getElementById("cantidad2").value);
    var resultado = cantidad1 + cantidad2;
    document.getElementById("resultado").innerText = "Resultado: " + resultado;
}

function restar() {
    var cantidad1 = parseFloat(document.getElementById("cantidad1").value);
    var cantidad2 = parseFloat(document.getElementById("cantidad2").value);
    var resultado = cantidad1 - cantidad2;
    document.getElementById("resultado").innerText = "Resultado: " + resultado;
}

function multiplicar() {
    var cantidad1 = parseFloat(document.getElementById("cantidad1").value);
    var cantidad2 = parseFloat(document.getElementById("cantidad2").value);
    var resultado = cantidad1 * cantidad2;
    document.getElementById("resultado").innerText = "Resultado: " + resultado;
}

function dividir() {
    var cantidad1 = parseFloat(document.getElementById("cantidad1").value);
    var cantidad2 = parseFloat(document.getElementById("cantidad2").value);
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
    if (cantidad2 !== 0) {
        var resultado = cantidad1 % cantidad2;
        document.getElementById("resultado").innerText = "Resultado: " + resultado;
    } else {
        document.getElementById("resultado").innerText = "Inválido";
    }
}
//JavaScript Document
var carga = document.getElementById('Div-pantalla-carga');

setTimeout(function cerrar () {
	abrir_app();
},5000);

function abrir_app(){
	window.location.href = "login1.html";
}
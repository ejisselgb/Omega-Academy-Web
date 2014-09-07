function borrar() {
	document.getElementById('funcion').value = "";
	document.getElementById('a').value = "";
	document.getElementById('b').value = "";
	document.getElementById('digitos').value = "";
	document.getElementById('raiz').value = "";
	document.getElementById('error').value = "";
}

function biseccion() {
	if (document.getElementById('funcion').value.length > 0 && document.getElementById('a').value.length > 0
		&& document.getElementById('b').value.length > 0 && document.getElementById('digitos').value.length > 0) {
		alert("hola mundo");
	}
}
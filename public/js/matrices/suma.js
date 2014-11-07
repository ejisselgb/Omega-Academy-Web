function validarMatriz1() {	
	// Obtengo los valores de las filas y columnas de la matriz 1
	var filas = document.getElementById('filas').value;
	var columnas = document.getElementById('columnas').value;
	var campos = filas * columnas;
	
	for (var i = 0; i < campos; i++) {		
		if (document.getElementById('a'+i).value.length == 0) {			
			alert("LLenar campos Matriz 1");
			return false;
		}
	}
	return true;
}

function validarMatriz2() {	
	// Obtengo los valores de las filas y columnas de la matriz 2
	var filas = document.getElementById('filas').value;
	var columnas = document.getElementById('columnas').value;
	var campos = filas * columnas;
	
	for (var i = 0; i < campos; i++) {		
		if (document.getElementById('b'+i).value.length == 0) {			
			alert("LLenar campos Matriz 2");
			return false;
		}
	}
	return true;
}

function sumar() {
	// Obtengo los valores de las filas y columnas de la matriz 1
	var filas = document.getElementById('filas').value;
	var columnas = document.getElementById('columnas').value;
	var campos = filas * columnas;

	if (validarMatriz1() && validarMatriz2()) {
		for (var i = 0; i < campos; i++) {
			document.getElementById('c'+i).value = parseFloat(document.getElementById('a'+i).value) + parseFloat(document.getElementById('b'+i).value);
		}
	}
}

function borrar() {
	// Obtengo los valores de las filas y columnas de la matriz 1
	var filas = document.getElementById('filas').value;
	var columnas = document.getElementById('columnas').value;
	var campos = filas * columnas;

	for (var i = 0; i < campos; i++) {
		document.getElementById('a'+i).value = "";
	}

	for (var i = 0; i < campos; i++) {
		document.getElementById('b'+i).value = "";
	}

	for (var i = 0; i < campos; i++) {
		document.getElementById('c'+i).value = "";
	}
}





















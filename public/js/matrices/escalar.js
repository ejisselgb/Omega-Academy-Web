function validarMatriz1() {	
	// Obtengo los valores de las filas y columnas de la matriz 1
	var filas = document.getElementById('filas1').value;
	var columnas = document.getElementById('columnas1').value;
	var campos = filas * columnas;
	
	for (var i = 0; i < campos; i++) {		
		if (document.getElementById('a'+i).value.length == 0) {			
			return false;
		}
	}
	return true;
}

function borrar() {
	// Obtengo los valores de las filas y columnas de la matriz 1
	var filas = document.getElementById('filas1').value;
	var columnas = document.getElementById('columnas1').value;
	var campos = filas * columnas;

	for (var i = 0; i < campos; i++) {
		document.getElementById('a'+i).value = "";
	}

	for (var j = 0; j < campos; j++) {
		document.getElementById('c'+j).value = "";
	}

	document.getElementById('filas1').value = "";
	document.getElementById('columnas1').value = "";
	document.getElementById('escalar').value = "";
}

function escalar() {
	if (validarMatriz1()) {
		var escalar = parseFloat(document.getElementById('escalar').value);
		var filas = document.getElementById('filas1').value;
		var columnas = document.getElementById('columnas1').value;
		var campos = filas * columnas;

		for (var i = 0; i < campos; i++) {
			document.getElementById('c'+i).value = escalar * parseFloat(document.getElementById('a'+i).value);
		}

	} else {
		alert("LLenar campos Matriz 1");
	}
}
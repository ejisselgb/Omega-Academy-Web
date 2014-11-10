function borrar() {
	// Obtengo los valores de las filas y columnas de la matriz 1
	var filas1 = document.getElementById('filas1').value;
	var columnas1 = document.getElementById('columnas1').value;
	var campos1 = filas1 * columnas1;

	for (var i = 0; i < campos1; i++) {
		document.getElementById('a'+i).value = "";
	}

	// Obtengo los valores de las filas y columnas de la matriz 2
	var filas2 = document.getElementById('filas2').value;
	var columnas2 = document.getElementById('columnas2').value;
	var campos2 = filas2 * columnas2;

	for (var i = 0; i < campos2; i++) {
		document.getElementById('b'+i).value = "";
	}

	// Obtengo los valores para la matriz respuesta
	var campos3 = filas1 * columnas2;

	for (var i = 0; i < campos3; i++) {
		document.getElementById('c'+i).value = "";
	}

	document.getElementById('filas1').value = "";
	document.getElementById('filas2').value = "";
	document.getElementById('columnas1').value = "";
	document.getElementById('columnas2').value = "";
}

function crearValidar() {	
	document.getElementById('filas2').value = document.getElementById('columnas1').value;

	// Obtengo los valores de la columnas 1 y filas 2
	var columnas1 = document.getElementById('columnas1').value;
	var filas2 = document.getElementById('filas2').value;

	if (columnas1 != filas2) {		
		alert("El número de columnas de la matriz 1 debe ser igual al número de filas de la matriz 2.");		
		return false;
	}
	else {
		return true;
	}
}

function validar() {
	// Obtengo los valores de la columnas 1 y filas 2
	var columnas1 = document.getElementById('columnas1').value;
	var filas1 = document.getElementById('filas1').value;	
	var filas2 = document.getElementById('filas2').value;
	var columnas2 = document.getElementById('columnas2').value;
	var campos1 = columnas1 * filas1;
	var campos2 = columnas2 * filas2;

	if (columnas1 != filas2) {
		return false;
	}
	else if (columnas1 == filas2) {
		for (var i = 0; i < campos1; i++) {
			if (document.getElementById('a'+i).value.length == 0) {			
				alert("LLenar campos Matriz 1");
				return false;
			}
		}
		for (var j = 0; j < campos2; j++) {
			if (document.getElementById('b'+j).value.length == 0) {			
				alert("LLenar campos Matriz 2");
				return false;
			}
		}
		return true;
	}
	else {
		return true;
	}
}

function multiplicacion() {
	if (validar()) {
		var filas1 = document.getElementById('filas1').value;
		var filas2 = document.getElementById('filas2').value;
		var columnas1 = document.getElementById('columnas1').value;
		var columnas2 = document.getElementById('columnas2').value;

		var camposC = filas1 * columnas2;
		var camposA = filas1 * columnas1;
		var camposB = filas2 * columnas2;
		var resultado = 0;		
		
		// matriz 1
		var matriz1 = [];
		var tmp1 = [];
		var cont1 = 0;

		for (var j = 0; j < filas1; j++) {			
			for (var k = 0; k < columnas1; k++) {
				tmp1.push(document.getElementById('a'+cont1).value);
				cont1++;				
			}
			matriz1.push(tmp1);
			tmp1 = [];			
		}		

		// matriz 2
		var matriz2 = [];
		var tmp2 = [];
		var cont2 = 0;

		for (var j = 0; j < filas2; j++) {			
			for (var k = 0; k < columnas2; k++) {
				tmp2.push(document.getElementById('b'+cont2).value);
				cont2++;				
			}
			matriz2.push(tmp2);
			tmp2 = [];			
		}		

		matriz3 = [];
		var tmp3 = [];		

		for (var i = 0; i < filas1; i++) {
			for (var j = 0; j < columnas2; j++) {
				tmp3.push(0);				
			}
			matriz3.push(tmp3);
			tmp3 = [];
		}		

		for (var i = 0; i < filas1; i++) {
			for (var j = 0; j < columnas2; j++) {
				for (var k = 0; k < filas2; k++) {			
					matriz3[i][j] += matriz1[i][k] * matriz2[k][j];
				}
			}
		}

		var cont3 = 0;
		for (var i = 0; i < filas1; i++) {
			for (var j = 0; j < columnas2; j++) {
				document.getElementById('c'+cont3).value = matriz3[i][j];
				cont3++;
			}
		}
		
	}
	else {
		alert("Campos vacíos o inválidos");
		return false;
	}	
}
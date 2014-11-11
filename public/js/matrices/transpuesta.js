function borrar() {
	// Obtengo los valores de las filas y columnas de la matriz 1
	var filas = document.getElementById('filas').value;
	var columnas = document.getElementById('columnas').value;
	var campos = filas * columnas;

	for (var i = 0; i < campos; i++) {
		document.getElementById('a'+i).value = "";
	}	

	for (var i = 0; i < campos; i++) {
		document.getElementById('c'+i).value = "";
	}

	document.getElementById('filas').value = "";	
	document.getElementById('columnas').value = "";	
}

function validarMatriz1() {	
	// Obtengo los valores de las filas y columnas de la matriz 1
	var filas = document.getElementById('filas').value;
	var columnas = document.getElementById('columnas').value;
	var campos = filas * columnas;
	
	for (var i = 0; i < campos; i++) {		
		if (document.getElementById('a'+i).value.length == 0) {						
			return false;
		}
	}
	return true;
}

function transpuesta() {
	if (validarMatriz1()) {
		var filas = document.getElementById('filas').value;
		var columnas = document.getElementById('columnas').value;
		var campos = filas * columnas;

		// matriz 1
		var matriz1 = [];
		var tmp1 = [];
		var cont1 = 0;

		for (var jj = 0; jj < filas; jj++) {			
			for (var kk = 0; kk < columnas; kk++) {
				tmp1.push(document.getElementById('a'+cont1).value);
				cont1++;				
			}
			matriz1.push(tmp1);
			tmp1 = [];			
		}

		// Matriz resultado
		matriz3 = [];
		var tmp3 = [];		

		for (var i = 0; i < columnas; i++) {
			for (var jjj = 0; jjj < filas; jjj++) {
				tmp3.push(0);				
			}
			matriz3.push(tmp3);
			tmp3 = [];			
		}		

		for (var j = 0; j < columnas; j++) {
			for (var k = 0; k < filas; k++) {
				matriz3[j][k] = matriz1[k][j];
			}
		}

		var cont3 = 0;
		for (var i = 0; i < columnas; i++) {
			for (var j = 0; j < filas; j++) {
				document.getElementById('c'+cont3).value = matriz3[i][j];
				cont3++;
			}
		}


	} else {
		alert("LLene todos los campos de la Matriz 1");
	}
}
function borrar() {
	// Obtengo los valores de las filas y columnas de la matriz 1
	var filas1 = document.getElementById('filas1').value;
	var columnas1 = document.getElementById('columnas1').value;
	var campos1 = filas1 * columnas1;

	for (var i = 0; i < campos1; i++) {
		document.getElementById('a'+i).value = "";
	}	

	document.getElementById('filas1').value = "";
	document.getElementById('columnas1').value = "";	
}

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

function det(matriz) {
	var filas1 = document.getElementById('filas1').value;		
	var columnas1 = document.getElementById('columnas1').value;

	var sum = 0;
	var s = 0;

	if (matriz.length == 1) {
		alert("Debe ingresar mínimo una matriz de 2x2");		
	} else {
		for (var i = 0; i < matriz.length; i++) {
			smaller = [];
			var tmp3 = [];		

			for (var ii = 0; ii < filas1; ii++) {
				for (var jj = 0; jj < columnas1; jj++) {
					tmp3.push(0);				
				}
				smaller.push(tmp3);
				tmp3 = [];
			}
			for (var a = 1; a < matriz.length; a++) {
				for (var b = 0; b < matriz.length; b++) {
					if (b < i) {
						smaller[(a-1)][b] = matriz[a][b];
					} else if (b > i) {
						smaller[(a-1)][(b-1)] = matriz[a][b];
					}
				}
			}
			if (i % 2 == 0) {
				s = 1;
			} else {
				s = -1;
			}
			sum += s * matriz[0][i] * (det(smaller));
		}
		return sum;
	}
}

function determinante() {
	if (validarMatriz1()) {

		var filas1 = document.getElementById('filas1').value;		
		var columnas1 = document.getElementById('columnas1').value;		
		
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

		var resultado = det(matriz1);

		alert("matriz1 = " + resultado);


	} else {
		alert("Llene todos los campo de la matriz");
	}
}
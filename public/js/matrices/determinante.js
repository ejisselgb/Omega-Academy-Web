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
	var sum = 0;
    var s = 0;
    if (matriz.length == 1) {
    	return matriz[0][0];
    }
    for (var i = 0; i < matriz.length; i++) {
    	matriz3 = [];
		var tmp3 = [];		

		for (var i = 0; i < filas1; i++) {
			for (var j = 0; j < columnas2; j++) {
				tmp3.push(0);				
			}
			matriz3.push(tmp3);
			tmp3 = [];
		}
    }
}


def det(M):
    
    
    for i in range(len(M)):
            smaller= [ (len(M[0]) - 1 ) * [0] for i in range(len(M) - 1)]
            a=1
            for a in range (len(M)):
                for b in range(len(M)):
                    if (b < i):
                        smaller[a-1][b]= M[a][b]
                    elif(b > i):
                        smaller[a-1][b-1]= M[a][b]
            if(i % 2 == 0):
                s = 1
            else:
                s = -1
            sum += s * M[0][i] * (det(smaller))
    return sum
print(det(M))



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
		
		alert("resultado = " +  matriz1);
		

	} else {
		alert("LLenar campos Matriz 1");
	}	
}
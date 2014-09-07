function borrar() {
	document.getElementById('funcion').value = "";
	document.getElementById('a').value = "";
	document.getElementById('b').value = "";
	document.getElementById('digitos').value = "";
	document.getElementById('root').value = "";
	document.getElementById('error').value = "";
}

function biseccion() {
	if (document.getElementById('funcion').value.length > 0 && document.getElementById('a').value.length > 0
		&& document.getElementById('b').value.length > 0 && document.getElementById('digitos').value.length > 0) {
		
		var xmlhttp = new XMLHttpRequest();
	  xmlhttp.onreadystatechange = function() {
	    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {            
	      document.getElementById("root").value = xmlhttp.responseText;            
	    }
	  }        
	  xmlhttp.open("GET","../../../controllers/metodoBiseccion/getRoot.php?funcion="+document.getElementById('funcion').value+"&a="+document.getElementById('a').value+"&b="+document.getElementById('b').value+"&digitos="+document.getElementById('digitos').value,true);
	  xmlhttp.send();

	  var xmlhttp2 = new XMLHttpRequest();
	  xmlhttp2.onreadystatechange = function() {
	    if (xmlhttp2.readyState == 4 && xmlhttp2.status == 200) {            
	      document.getElementById("error").value = xmlhttp2.responseText;            
	    }
	  }        
	  xmlhttp2.open("GET","../../../controllers/metodoBiseccion/getError.php?funcion="+document.getElementById('funcion').value+"&a="+document.getElementById('a').value+"&b="+document.getElementById('b').value+"&digitos="+document.getElementById('digitos').value,true);
	  xmlhttp2.send();
		
	}
}
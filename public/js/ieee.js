function decimal2(str) {        
  
  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function() {
    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {            
      document.getElementById("signo").value = xmlhttp.responseText;            
    }
  }        
  xmlhttp.open("GET","../../../controllers/estandarIEEE/getSign.php?decimal="+str,true);
  xmlhttp.send();

  var xmlhttp2 = new XMLHttpRequest();
  xmlhttp2.onreadystatechange = function() {
    if (xmlhttp2.readyState == 4 && xmlhttp2.status == 200) {            
      document.getElementById("binary").value = xmlhttp2.responseText;            
    }
  }        
  xmlhttp2.open("GET","../../../controllers/estandarIEEE/getBinary.php?decimal="+str,true);
  xmlhttp2.send();
}

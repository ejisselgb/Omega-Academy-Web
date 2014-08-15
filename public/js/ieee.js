function decimal2(str) {        
  
  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function() {
    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {            
      document.getElementById("signo").value = xmlhttp.responseText;            
    }
  }        
  xmlhttp.open("GET","../../../controllers/estandarIEEE/getSign.php?decimal="+str,true);
  xmlhttp.send();
}
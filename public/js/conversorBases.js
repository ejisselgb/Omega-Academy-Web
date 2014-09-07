function decimal2(str) {        
  
  var xmlhttp=new XMLHttpRequest();
  xmlhttp.onreadystatechange=function() {
    if (xmlhttp.readyState==4 && xmlhttp.status==200) {            
      document.getElementById("binary").value=xmlhttp.responseText;            
    }
  }        
  xmlhttp.open("GET","../../../controllers/conversorBases/decimal_binary.php?decimal="+str,true);        
  xmlhttp.send();

  var xmlhttp2=new XMLHttpRequest();
  xmlhttp2.onreadystatechange=function() {
    if (xmlhttp2.readyState==4 && xmlhttp2.status==200) {            
      document.getElementById("octal").value=xmlhttp2.responseText;
    }
  }        
  xmlhttp2.open("GET","../../../controllers/conversorBases/decimal_octal.php?decimal="+str,true);        
  xmlhttp2.send();

  var xmlhttp3=new XMLHttpRequest();
  xmlhttp3.onreadystatechange=function() {
    if (xmlhttp3.readyState==4 && xmlhttp3.status==200) {            
      document.getElementById("hexadecimal").value=xmlhttp3.responseText;
    }
  }        
  xmlhttp3.open("GET","../../../controllers/conversorBases/decimal_hexadecimal.php?decimal="+str,true);      
  xmlhttp3.send();
}

function binary2(str) {        
  
  var xmlhttp=new XMLHttpRequest();
  xmlhttp.onreadystatechange=function() {
    if (xmlhttp.readyState==4 && xmlhttp.status==200) {            
      document.getElementById("decimal").value=xmlhttp.responseText;            
    }
  }        
  xmlhttp.open("GET","../../../controllers/conversorBases/binary_decimal.php?binary="+str,true);        
  xmlhttp.send();

  var xmlhttp2=new XMLHttpRequest();
  xmlhttp2.onreadystatechange=function() {
    if (xmlhttp2.readyState==4 && xmlhttp2.status==200) {            
      document.getElementById("octal").value=xmlhttp2.responseText;
    }
  }        
  xmlhttp2.open("GET","../../../controllers/conversorBases/binary_octal.php?binary="+str,true);        
  xmlhttp2.send();

  var xmlhttp3=new XMLHttpRequest();
  xmlhttp3.onreadystatechange=function() {
    if (xmlhttp3.readyState==4 && xmlhttp3.status==200) {            
      document.getElementById("hexadecimal").value=xmlhttp3.responseText;
    }
  }        
  xmlhttp3.open("GET","../../../controllers/conversorBases/binary_hexadecimal.php?binary="+str,true);        
  xmlhttp3.send();
}

function octal2(str) {
  
  var xmlhttp=new XMLHttpRequest();
  xmlhttp.onreadystatechange=function() {
    if (xmlhttp.readyState==4 && xmlhttp.status==200) {            
      document.getElementById("decimal").value=xmlhttp.responseText;            
    }
  }        
  xmlhttp.open("GET","../../../controllers/conversorBases/octal_decimal.php?octal="+str,true);        
  xmlhttp.send();

  var xmlhttp2=new XMLHttpRequest();
  xmlhttp2.onreadystatechange=function() {
    if (xmlhttp2.readyState==4 && xmlhttp2.status==200) {            
      document.getElementById("binary").value=xmlhttp2.responseText;
    }
  }        
  xmlhttp2.open("GET","../../../controllers/conversorBases/octal_binary.php?octal="+str,true);        
  xmlhttp2.send();

  var xmlhttp3=new XMLHttpRequest();
  xmlhttp3.onreadystatechange=function() {
    if (xmlhttp3.readyState==4 && xmlhttp3.status==200) {            
      document.getElementById("hexadecimal").value=xmlhttp3.responseText;
    }
  }        
  xmlhttp3.open("GET","../../../controllers/conversorBases/octal_hexadecimal.php?octal="+str,true);
  xmlhttp3.send();
}

function hexadecimal2(str) {

  var xmlhttp=new XMLHttpRequest();
  xmlhttp.onreadystatechange=function() {
    if (xmlhttp.readyState==4 && xmlhttp.status==200) {            
      document.getElementById("decimal").value=xmlhttp.responseText;            
    }
  }        
  xmlhttp.open("GET","../../../controllers/conversorBases/hexadecimal_decimal.php?hexadecimal="+str,true);
  xmlhttp.send();

  var xmlhttp2=new XMLHttpRequest();
  xmlhttp2.onreadystatechange=function() {
    if (xmlhttp2.readyState==4 && xmlhttp2.status==200) {            
      document.getElementById("binary").value=xmlhttp2.responseText;
    }
  }        
  xmlhttp2.open("GET","../../../controllers/conversorBases/hexadecimal_binary.php?hexadecimal="+str,true);
  xmlhttp2.send();

  var xmlhttp3=new XMLHttpRequest();
  xmlhttp3.onreadystatechange=function() {
    if (xmlhttp3.readyState==4 && xmlhttp3.status==200) {            
      document.getElementById("octal").value=xmlhttp3.responseText;
    }
  }        
  xmlhttp3.open("GET","../../../controllers/conversorBases/hexadecimal_octal.php?hexadecimal="+str,true);
  xmlhttp3.send();

  
}
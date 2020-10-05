setInterval(function()

{


 var xmlhttp = new  XMLHttpRequest();

 xmlhttp.open("GET","the_time.php",false);

 xmlhttp.send(null);

 document.getElementById("response").innerHTML= xmlhttp.responseText;

},1000);
<?php

   $host = "localhost";
   $user = "root";
   $pass = "";
   $db = "inspirafit";
   
   $conexion = new mysqli($host,$user,$pass,$db);
if ($conexion->connect_error) {
   die("Conexion fallida: " . $conexion->connect_error);
} else {
   echo "Conexión exitosa";
}
?>

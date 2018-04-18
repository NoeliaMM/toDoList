<?php 

define("HOST_BBDD","localhost");
define("USER_BBDD","root");
define("PASS_BBDD","");
define("NAME_BBDD","todolist");

$conexion = mysqli_connect(HOST_BBDD, USER_BBDD, PASS_BBDD, NAME_BBDD);
// Comprobar conexión
if($conexion === false){
    die("ERROR: Error de conexión " . mysqli_connect_error());
    
    
}

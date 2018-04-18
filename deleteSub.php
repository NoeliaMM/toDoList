<?php

require ("conexion.php");

$subtarea=$_POST["id"];
//Borrar datos tabla

$sql="DELETE  FROM subtareas WHERE id='$subtarea'";
echo $_POST["id"];
$result = mysqli_query($conexion,$sql);

if($result){
    echo ("Borrado");
}
<?php

require ("conexion.php");

$tarea=$_POST["id"];
//Borrar datos tabla

$sql="DELETE  FROM tareas WHERE id='$tarea'";
echo $_POST["id"];
$result = mysqli_query($conexion,$sql);

if($result){
    echo ("Borrado");
}
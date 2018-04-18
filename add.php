<?php 
    // header('Content-Type: application/json');
    require ("conexion.php");
    $tarea=$_POST["tarea"];
    $sql="INSERT INTO tareas (nombre) VALUES ('$tarea')";

    $result = mysqli_query($conexion,$sql);

    if($result){
        echo ("Conexion sql");



    }

    //echo json_encode(array(  ))    
   
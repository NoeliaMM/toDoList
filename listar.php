<?php 

header('Content-Type: application/json');

$mysqli = new mysqli("localhost", "root", "", "todolist");


if ($mysqli->connect_errno) {

   echo "Lo sentimos, este sitio web está experimentando problemas.";

   // Algo que no se debería de hacer en un sitio público, aunque este ejemplo lo mostrará
   // de todas formas, es imprimir información relacionada con errores de MySQL -- se podría registrar
   echo "Error: Fallo al conectarse a MySQL debido a: \n";
   echo "Errno: " . $mysqli->connect_errno . "\n";
   echo "Error: " . $mysqli->connect_error . "\n";
   
   // Podría ser conveniente mostrar algo interesante, aunque nosotros simplemente saldremos
   exit;
}

// Realizar una consulta SQL
$sql = "SELECT * FROM tareas";
if (!$resultado = $mysqli->query($sql)) {
   // ¡Oh, no! La consulta falló.
   echo "Lo sentimos, este sitio web está experimentando problemas.";

   // De nuevo, no hacer esto en un sitio público, aunque nosotros mostraremos
   // cómo obtener información del error
   echo "Error: La ejecución de la consulta falló debido a: \n";
   echo "Query: " . $sql . "\n";
   echo "Errno: " . $mysqli->errno . "\n";
   echo "Error: " . $mysqli->error . "\n";
   exit;
}

// ¡Uf, lo conseguimos!. Sabemos que nuestra conexión a MySQL y nuestra consulta
// tuvieron éxito, pero ¿tenemos un resultado?
if ($resultado->num_rows === 0) {
   // ¡Oh, no ha filas! Unas veces es lo previsto, pero otras
   // no. Nosotros decidimos. En este caso, ¿podría haber sido
   // actor_id demasiado grande?
   echo json_encode(array('tareas'=> array()));
   exit;
}

$resultados = array();

while ($tareas = $resultado->fetch_assoc()) {
   array_push($resultados,array('id'=>$tareas['id'],'nombre'=>$tareas['nombre']));
}

// El script automáticamente liberará el resultado y cerrará la conexión
// a MySQL cuando finalice, aunque aquí lo vamos a hacer nostros mismos
$resultado->free();
$mysqli->close();

echo json_encode($resultados);

?>





<?php 
//error_reporting(E_ALL ^ E_NOTICE);

$titulo=$_POST['titulo'];
$preguntas=$_POST['preguntas'];

//Conectamos con la base de datos
require('conexion.php'); 
/*
//FECHA ACTUAL                           segundos 3 meses 90 dias
$fecha_actual=strftime("%Y-%m-%d", time() -7776000); 

$consulta = "SELECT fecha FROM encuesta WHERE fecha='$fecha_actual'"; 
	$consulta = mysql_query($consulta); 
	while($row = mysql_fetch_array($consulta)){ 
		$fecha= $row['fecha'];

		echo $fecha;
	}

//echo $fecha_actual;

*/


//Obtenemos la fecha del sistema
$fecha_actual=date("Y-m-d");

//Insertamos la nueva encuesta
$sql = "INSERT INTO encuesta (titulo, fecha) VALUES ('$titulo', '$fecha_actual') "; 
$sql = mysql_query($sql); 

//Ahora obtenemos el ID de la encuesta que acabamos de insertar
$sql = "SELECT id FROM encuesta ORDER BY fecha";
$sql = mysql_query($sql);
while($row = mysql_fetch_array($sql)){ 
	$id=$row["id"];
} 

//Recorremos todas las preguntas
for($i=1; $i<=$preguntas; $i++){

//Obtenemos el texto de la pregunta
	$preg = p.$i;
    $pas=$_POST[$preg];
    $texto = $pas;


//Y lo insertamos
	$sql = "INSERT INTO respuestas(texto, votos, idenc) VALUES('$texto', 0, '$id')";
	$sql = mysql_query($sql);
	}
		header("Location: ../crearEncuesta.php");
 ?>


<?php 
//error_reporting(E_ALL ^ E_NOTICE);

 include("php/header.php");
require('php/conexion.php');  


$opcion=$_POST["opcion"];


 ?>
	<script type="text/javascript" src="https://www.google.com/jsapi"></script>
     <script type="text/javascript">

// Carga el API de Visualizacion y el paquete del gráfico de quesitos
google.load('visualization', '1.0', {'packages':['corechart']});

// Cuando la API de Visualización de Google está cargada llama a la función dibujaGrafico.
google.setOnLoadCallback(dibujaGrafico);

// Llama a la función que crea y rellena la tabla,
// crea el gráfico de quesitos, la pasa los datos y
// lo dibuja.
function dibujaGrafico() {

// Crea la tabla de datos.
var datos = new google.visualization.DataTable();
datos.addColumn('string', 'Nombre');
datos.addColumn('number', 'Id');
datos.addRows([
<?php
/*
// Conectar con el Servidor
$link = mysql_connect("localhost", "root", "enero7")
or die ("No puedo conectarme con el servidor");
// Usar la BD
mysql_select_db("encuestas",$link)
or die ("No puedo abrir la BD");

*/

	$consulta = "SELECT titulo FROM encuesta WHERE id=$opcion"; 
	$consulta = mysql_query($consulta); 
	while($row = mysql_fetch_array($consulta)){ 
		$titulo= $row['titulo'];
	}



$consulta= "SELECT votos, texto FROM respuestas WHERE idenc=$opcion";
$resultado = mysql_query($consulta)
or die ("No puedo ejecutar la consulta");
$numerodefilas=mysql_num_rows($resultado);
$i=0;
while ($fila = mysql_fetch_array($resultado)){
$i++;
if ($i<$numerodefilas){ // No es la última fila
echo "['".$fila['texto']."', ".$fila['votos']."],\n";
}else{ // Sí es la última fila
echo "['".$fila['texto']."', ".$fila['votos']."],\n";
}
}
mysql_close($conexion);
?>
]);

// Opciones del gráfico
var opciones = {'title':'Votaciones',
'max-width':630,
'max-height':350};
    
// Crea y dibuja el gráfico, pasando algunas opciones.
var grafico = new google.visualization.PieChart(document.getElementById('capaGrafico'));
grafico.draw(datos, opciones);
}
</script>
  <section id="form">

<h3> <?php echo $titulo ?></h3>
<div id="capaGrafico"></div>

  </section>
  <style>
     #center{
     	margin: -10px;
     	padding: 0px 0px 20px;
     }
  </style>
<center id="center">
	 <a id="paginas1" href="javascript:window.history.go(-2);;">&laquo; Volver atrás</a>
</center>
<?php 

include("php/footer.php");
  ?>
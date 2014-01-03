<?php
$host = "localhost"; 
$usuario = "root"; 
$password = "enero7"; 
$db = "encuestas"; 
$conexion = mysql_connect($host, $usuario, $password)or die('No hay conexion a l abase de datos'); 
mysql_select_db($db,$conexion)or die('No existe la base de datos');

	/*$conexion=mysql_connect('localhost','root','enro7')or die('No hay conexion a l abase de datos');
    $db=mysql_select_db('encuestas',$conexion)or die('No existe la base de datos');
*/

 ?>


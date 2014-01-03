<?php
error_reporting(E_ALL ^ E_NOTICE);

 $opcion=$_POST["opcion"];
require('php/conexion.php');  

 include("php/header.php");

//Seleccionamos la informacion de la última encuesta insertada
	$consulta = "SELECT * FROM encuesta WHERE id=$opcion "; 
  //$consulta = "SELECT * FROM encuesta ORDER BY fecha DESC LIMIT 0,1"
	$consulta = mysql_query($consulta); 
	while($row = mysql_fetch_array($consulta)){ 
		$titulo=$row["titulo"]; 
		$fecha=$row["fecha"];
		$id=$row['id'];
	}	

 ?>
 
 <section id="form">
 <form class="contact_form" name="form1" method="post" action="php/inserVotacion.php">
  <table>
    <tr> 
      <td colspan="2"><h3><?php echo $titulo; ?></h3></td>
        <input type="hidden" name="id" value="<?php echo $id;?>">
    </tr>
    <?php
	$sql = "SELECT texto, id FROM respuestas WHERE idenc='$id'";
	$sql = mysql_query($sql); 
	while($row = mysql_fetch_array($sql)){ 
		$texto=$row["texto"]; 
		$idres=$row["id"];
?>	
    <tr> 
      <td width="50"><input type="radio" name="opcion" value="<?php echo $idres; ?>" required></td>
      <td width="470"><?php echo $texto; ?></td>
    </tr>
    <?php } ?>
    <tr>
      <td >
          <input class="submit" type="submit" value="Votar"></input>

      </td>
		   
      <td>Esta encuesta est&aacute; del <?php echo $fecha; ?></td>
    </tr>
  
  </table>


</form>
</section>
<center> 
 <div id="paginador"> 
<form action="graficos.php" method="post" >
    <a id="paginas1" href="javascript:window.history.back();">&laquo; Volver atrás</a>  
    <input type="hidden" name="opcion" value="<?php echo $opcion;?>"></td>

  <input class="submit" type="submit" value="Ver"></input>

</form>
</div>
</center>
<?php 

include("php/footer.php");
  ?>
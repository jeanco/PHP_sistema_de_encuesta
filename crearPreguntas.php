<?php
 include("php/header.php");
 $titulo=$_POST["titulo"];
 $preguntas=$_POST["preguntas"];

 ?>
  <section id="form">
<form class="contact_form" action="php/inserPreguntas.php" method="post">
  <h3><?php echo $titulo; ?></h3>
<table>
<?php
  for($i=1;$i<=$preguntas;$i++){
?>
  <tr>
    <td>Preguntas <?php echo $i; ?>&nbsp;</td>
        <td><input name="p<?php echo $i;?>" type="text" size="50" maxlength="50"></td>
  </tr>
<?php } ?>
  </table><br>
  <input class="submit" type="submit" value="Inserta"></input>
	<input name="titulo" type="hidden" value="<?php echo $titulo;?>">
	<input type="hidden" name="preguntas" value="<?php echo $preguntas;?>">
</form>

</section>
<style>
     #center{
      margin: -10px;
      padding: 0px 0px 20px;
     }
  </style>
<center id="center">
  <a id="paginas1" href="javascript:window.history.back();">&laquo; Volver atrás</a>
  </center>
<?php 

include("php/footer.php");
  ?>
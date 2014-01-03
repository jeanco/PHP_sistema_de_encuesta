<?php 

include("php/header.php");

  
include("php/conexion.php");

$consulta = "SELECT titulo FROM encuesta "; 
  $consulta = mysql_query($consulta); 

 /* La variable numero de registro almacena la cantidad de
 de registros almacenados en la tabla datos */                     
 $numRegistros=mysql_num_rows($consulta);
/*Condicion que evalua l vraiable numero de registros si es igual a 0 si la 
variable no tiene registros desplegara un mensaje */
 if ($numRegistros==0) {
   echo "No sean encontrado registos para mostrar";

 }
 /* A la variable registro por página se le asignara un valor que el valor que
 le asignemos sera la cantidad de registrospor página que mostrara */
 $reg_por_pagina=7;

 //Condicion que evalua la variable que viene por GET
if (isset($_GET['num'])) {
  //si la variable que viene por GET existe 
  $num_pagina=$_GET['num'];
}else{
  //si la variable que viene por GET no existe
  $num_pagina = 1;
}
//Condicion que evalua la variable numero de pagina si es numerico
 if(is_numeric($num_pagina))
  /*Si la variable numero de pagina es numerico a la variable $inicio se le 
    asignara una multiplicacion*/

    /*A la variable numero por pagina se restara 1 por los motivos que 
    comenzamos en la pagina 1 no en la pagina 0 para igualar los registros
    ya que los registros comieszan a contar desde 0 por ejemplo la variable
    numero por pagina es igual 2 se restara 1 y quedaria con le valor de 1 y se
    multiplicara 1 x registro por pagina que equivale a 12 y el resultado seria
    12 */
  $inicio=($num_pagina-1)* $reg_por_pagina;
else
  //Si la variable numerop por pagina no es numerico
  $inicio=0;
//Consulta a la base de datos que limita los datos a mostrar
 $consulta2=mysql_query("SELECT * FROM encuesta ORDER BY fecha  LIMIT $inicio, $reg_por_pagina");
 //A la variable catidad por pagina se le asignara la division
$can_paginas=ceil($numRegistros/$reg_por_pagina);

?>

 <section id="form">
 <form class="contact_form" name="form1" method="post" action="votarEncuesta.php">
  <table>

    <?php
  
  while($row = mysql_fetch_array($consulta2)){ 
    $titulo=$row["titulo"]; 
    $idres=$row["id"];
?>  
    <tr> 
      <td width="50"><input type="radio" name="opcion" value="<?php echo $idres; ?>" required></td>
      <td width="470"><?php echo $titulo; ?></td>
    </tr>
    <?php } ?>
    <tr>
      <td >
          <input class="submit" type="submit" value="Ver"></input>

      </td>
       
      <td>
        
      </td>
    </tr>
  
  </table>
             <center>

          <div id="paginador">
        <?php 
        /* condicion que evalua la variable numero por pagina para crear los 
        botones */
       if ($num_pagina>1) {
          //Enlaces para los botones primero y anterior
          echo "<a id='paginas1' href='verEncuesta.php?num=1'>Primero</a>";
          echo "<a id='paginas1' href='verEncuesta.php?num=".($num_pagina-1)."'>Anterior</a>";
        }
        /*Mensaje que muestra las paginas en la que estamos navegando y 
        cantidad de pagina que hay*/
        echo"<strong id='paginas2'>".($num_pagina)."de".($can_paginas)."</strong>";

        /* condicion que evalua la variable numero por pagina para crear los 
        botones */
        if ($num_pagina<$can_paginas) {
          //Enlaces para los botones siguiente y ultimo
          echo "<a id='paginas1' href='verEncuesta.php?num=".($num_pagina +1)."'>Siguiente</a>";
          echo "<a id='paginas1' href='verEncuesta.php?num=".($can_paginas)."'>Ultimo</a>";
        }
         ?>
         </div>
         </center>

         </section>
         <center>

           <a id="paginas1" href="javascript:window.history.back();">&laquo; Volver atrás</a>
         </center><br>
  <?php 
include("php/footer.php");

   ?>
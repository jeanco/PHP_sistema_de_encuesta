<?php
include("php/sesion.php");
 include("php/header.php");
 ?>
 
<section id="form">
<form class="contact_form" action="crearPreguntas.php" method="post">
    <ul>
        <li>
             <h2>Crear encuesta</h2>
        </li>
        <li>
            <label for="email">Encuesta:</label>
            <input type="text"  name="titulo" placeholder="Encuesta" required />
        </li>
        <li>
            <label for="preguntas">N&uacute;mero de preguntas:</label>
            <input type="number" name="preguntas" placeholder="N Preguntas"  min="0" max="5" required />
        </li>
        
        <li>
            <input class="submit" type="submit" value="Crear"></input>
        </li>
    </ul>
</form>
</section>
<?php 

include("php/footer.php");
  ?>
<?php

error_reporting(E_ALL ^ E_NOTICE);
 include("php/header.php") ;
isset($_POS["email"]);
    # code...
    $email = $_POST["email"];
 
?>

<section id="form">
<form class="contact_form" action="php/control.php" method="post">
    <ul>
        <li>
             <h2>Iniciar sesión</h2>
        </li>
          <h5>Email</h5>
        <li>
            
            <input type="email"  name="email" placeholder="Email" value="<?php echo $email;?>"required />
        </li>
            <h5>Contraseña</h5>
        <li>

            <input type="password" name="password" placeholder="Password" required />
        </li>
                
        <?php 

        if (isset($_POST["email"])) {
            # code...
             echo "Email incorecto"; 
         }else{
            if (isset($_POST["password"])) {
            # code...
            echo "Contraseña incorecta"; 
            }
         }
            
             ?>
        <li>
        	<input class="submit" type="submit" value="Eniciar"></input>
        </li>
        <a id="paginas1" href="javascript:window.history.back();">&laquo; Volver atrás</a>  
    </ul>
</form>
</section>
 <?php 

include("php/footer.php");
  ?>
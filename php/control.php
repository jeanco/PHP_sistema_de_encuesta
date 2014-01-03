
<?php
include ('conexion.php');
/*
$usuarioIng=$_POST['email'];
$passIng=$_POST['password'];
*/
$consulta=mysql_query("SELECT * FROM login"); //El mysql_fetch_array () devuelve los registros de la tabla usuarios
 $filas=mysql_fetch_array($consulta);
	 
    // $nombre=$filas['nombre'];
     $usuario=$filas['email'];
     $pass=$filas['password'];
  
  if ($email=$_POST['email']!=$usuario) {
  	$email=$_POST['email'];
  	//$error=$_POST['email'];
  	
  	//header("Location: ../login.php?email=$email");
    ?>

     <form name="formulario" method="post" action="../login.php">
         <input type="hidden" name="email" value="<?php echo $email; ?>">
      </form>
    <?php
  }else{

     if ($password=$_POST['password']!=$pass) {
  //	$error=$_POST['password'];
  	//header("Location: ../login.php?password=$password");
         ?>

     <form name="formulario" method="post" action="../login.php">
         <input type="hidden" name="password" value="<?php echo $password; ?>">
      </form>
    <?php

  }else{
  	//Inicio la Seción
	session_start();
	//Declaro mis variables de sesión
	$_SESSION["autentificado"] = true;
	$_SESSION["usuario"] = $_POST['email'];

	header("Location: ../crearEncuesta.php?entrar=si");

  }
  }
/*
if ($_POST['email']==$usuario && $_POST['password']==$pass) {
	# code...
	//Inicio la Seción
	session_start();
	//Declaro mis variables de sesión
	$_SESSION["autentificado"] = true;
	$_SESSION["usuario"] = $_POST['email'];

	header("Location: crearEncuesta.php");
}else{

	header("Location: ../login.php?error=no");

}*/

 ?>
   <script src="js/jquery-1.10.1.min.js"></script>
 <script type="text/javascript"> 
    //Redireccionar con el formulario creado
    document.formulario.submit();
</script>
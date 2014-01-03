
<!doctype html>
<html lang="es-ES">
<head>
  <meta charset="UTF-8">
  <title>Encuestas</title>

  <link rel="shortcut icon" type="image/x-icon" href="Untitled-32.ico"/>

  <link rel="stylesheet" href="css/StylePrincipal.css">
  

  <link rel="stylesheet" href="css/StyleForm.css">
  <link rel="stylesheet" href="css/styleFooter.css">

  <!--<link rel="stylesheet" href="css/stylemenu.css">-->
  <link rel="stylesheet" href="css/flexslider.css">
  <link rel="stylesheet" type="text/css" href="css/styleSlider.css" />
 <script type="text/javascript" src="js/modernizr.custom.28468.js"></script>

  <script src="js/jquery-1.10.1.min.js"></script>
  <script src="js/jquery.flexslider-min.js"></script>

  <script>
    $(function() {
      var pull    = $('#pull');
        menu    = $('nav ul');
        menuHeight  = menu.height();

      $(pull).on('click', function(e) {
        e.preventDefault();
        menu.slideToggle();
      });

     /*$(window).resize(function(){
            var w = $(window).width();
            if(w > 240 && menu.is(':hidden')) {
              menu.removeAttr('style');
            }
        });*/
    });
  </script>
</head>
<body>
  <header>
    <nav id="menu">
    <ul>
      <li><a id="logo" href="index.php">&nbsp;</a></li>
      <li><a id="enlaces" class="inicio"href="index.php">Inicio</a></li>
      <li><a id="enlaces" href="verEncuesta.php">Encuestas</a></li>
      <li><a id="enlaces" href="votarEncuesta2.php">Responder</a></li>
      <li>
      <?php 
     
          error_reporting(E_ALL ^ E_NOTICE);
          session_start();
          /*Evaluo que la sesion continue verificando una delas variables creadas en control.php */
          if ($_SESSION["autentificado"]){ 
              echo "<a id='enlaces' href='crearEncuesta.php'>Crear</a>";
                ?>
              </li>
              <?php 
               echo "<li><a id='enlaces' href='php/salir.php'>Salir</a></li>";
            }else{
              echo "<li><a id='enlaces' href='login.php'>Login</a></li>";
            }
           ?>
      
     
    </ul>
    <a href="" id="pull">&nbsp;</a>

  </nav>
  </header>
  
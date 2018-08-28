<?php
require('session.php');
?>

<!DOCTYPE html>
<html>
<head>
      <title>Bienvenido al Administrador</title>
      <meta charset="utf-8">
    	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    	<script type="text/javascript" src="js/jquery/jquery-3.3.1.min.js"></script>
    	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    	<link rel="stylesheet" type="text/css" href="css/style.css">
    	<script type="text/javascript" src="js/bootstrap.min.js"></script>
    	<script type="text/javascript" src="js/bootstrap-formhelpers-phone.js"></script>
    	<script type="text/javascript" src="js/admin.js"></script>
    	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.1/css/all.css" integrity="sha384-O8whS3fhG2OnA5Kas0Y9l3cfpmYjapjI0E4theH4iuMD+pLhbf6JI0jIMfYcK3yZ" crossorigin="anonymous">
    </head>
<body>
    <?php
    require('sys_nav.php')
    ?>
<!-- Services -->
    <section id="services" class="bg-image-full py-5" style="background-image: url('back.png');">
      <div class="container ">
        <div class="row">
          <div class="col-lg-12 text-center">
            <h2 class="section-heading text-uppercase text-black">Bienvenido '<?=$_SESSION['nombre']?>' <br> al administrador</h2>
          </div>
        </div>
        <div class="row text-center">
          <div class="col-md-6">
            <span class="fa-stack fa-4x">
              <i class="fa fa-circle fa-stack-2x fondo-icono"></i>
              <i class="fas fa-car fa-stack-1x fa-inverse"></i>
            </span>
            <h3 class="service-heading text-black">Pedidos</h3>
            <p class="font-weight-bold text-black">Ingrese aqui para el gestor de viajes</p>
          <a href="admin_pedidos.php" class="btn btn-dark text-white">Pedidos</a>
          </div>
          <div class="col-md-6">
            <span class="fa-stack fa-4x">
              <i class="fa fa-circle fa-stack-2x fondo-icono"></i>
              <i class="fas fa-users fa-stack-1x fa-inverse"></i>
            </span>
            <h3 class="service-heading text-black">Usuarios</h3>
            <p class="font-weight-bold text-black">Ingrese aqui para el gestor de usuarios</p>
            <a href="admin_usuarios.php" class="btn btn-dark text-white">Usuarios</a>
          </div>
        </div>
      </div>
    </section>
    
    <?php
    require('sys_footer.php');
    ?>
</body>
</html>
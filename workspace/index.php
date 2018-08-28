<?php

	require('session.php');
	require('registro_usuario.php')
?>

<!DOCTYPE html>
<html>
<head>
	<title>Inicio</title>
	<?php
	require('head.php');
	?>
	<link rel="stylesheet" href="css/agency2.css" type="text/css" />
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

</head>
<body>
	<header>
	</header>

	<?php
		require('nav_bar.php');
	?>
	
	<!-- Nosotros -->
    <section id="services" class="bg-black py-5">
      <div class="container p-4">
        <div class="row">
          <div class="col-lg-12 text-center">
            <h2 class="section-heading mb-5 text-uppercase text-white">Nosotros</h2>
          </div>
        </div>
        <div class="row text-center mt-3">
          <div class="col-md-12">
            <p class="text-white">
            Lorem Ipsum is simply dummy text of the printing and typesetting industry. 
            Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. 
            It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. 
            It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
            </p>
          </div>
        </div>
      </div>
    </section>
	
	
<!-- Services -->
    <section id="services" class="bg-warning py-5">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 text-center">
            <h2 class="section-heading text-uppercase text-black">Servicios</h2>
          </div>
        </div>
        <div class="row text-center">
          <div class="col-md-4">
            <span class="fa-stack fa-4x">
              <i class="fa fa-circle fa-stack-2x fondo-icono"></i>
              <i class="fas fa-car fa-stack-1x fa-inverse"></i>
            </span>
            <h4 class="service-heading">Pedidos</h4>
            <p class="text-dark">Realice el pedido de su coche, via online a través de esta plataforma.</p>
          </div>
          <div class="col-md-4">
            <span class="fa-stack fa-4x">
              <i class="fa fa-circle fa-stack-2x fondo-icono"></i>
              <i class="fas fa-desktop fa-stack-1x fa-inverse"></i>
            </span>
            <h4 class="service-heading">Administracion Sistema</h4>
            <p class="text-dark">Lleve el control del sistema, pudiendo gestionar los pedidos realizados por los usuarios, como asi tambien sus peticiones.</p>
          </div>
          <div class="col-md-4">
            <span class="fa-stack fa-4x">
              <i class="fa fa-circle fa-stack-2x fondo-icono"></i>
              <i class="fas fa-users fa-stack-1x fa-inverse"></i>
            </span>
            <h4 class="service-heading">Comience!</h4>
            <p class="text-dark">Empiece registrandose si aun no tiene una cuenta propia, y comience a utilizar nuestro sistema de gestion de transporte.</p>
          </div>
        </div>
      </div>
    </section>
    
    <!-- Contact -->
    <section id="contacto" class="bg-light py-5">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 text-center">
            <h2 class="text-uppercase text-black">Contacto</h2>
          </div>
        </div>
        <div class="row text-left">
          <div class="col-md-12">
            <form method="POST" class="formulario" id="formulario_contacto">
              <div class="form-group">
                <label for="nombre_contacto" class="text-black font-weight-bold">Nombre</label>
                <input class="form-control" type="text" name="nombre_contacto" id="nombre_contacto"/>
              </div>
              <div class="form-group">
                <label for="apellido_contacto" class="text-black font-weight-bold">Apellido</label>
                <input class="form-control" type="text" name="apellido_contacto" id="apellido_contacto"/>
              </div>
              <div class="form-group">
                <label for="email_contacto" class="text-black font-weight-bold">Email</label>
                <input class="form-control" type="text" name="email_contacto" id="email_contacto"/>
              </div>
              <div class="form-group">
                <label for="mensaje_contacto" class="text-black font-weight-bold">Mensaje</label>
                <textarea class="form-control" type="text" name="mensaje_contacto" id="mensaje_contacto"></textarea>
              </div>
                <button type="submit" class="btn btn-warning btn-block font-weight-bold">Enviar</button>
            </form>
          </div>
        </div>
      </div>
    </section>

	<?php
		require('footer.php');
	?>
</body>
</html>
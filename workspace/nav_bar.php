<!-----------------------NAV BAR---------------------->
	<nav class="navbar sticky-top navbar-expand-lg navbar-dark bg-black" id="navbar">
		<div class="container">
		  <a class="navbar-brand" href="#"><img src="images/logo.png"  width="150" height="30" alt=""></a>
		  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
		    <span class="navbar-toggler-icon"></span>
		  </button>
		  <div class="collapse navbar-collapse" id="navbarText">
			    <ul class="navbar-nav mr-auto">
			      <li class="nav-item">
			        <a class="nav-link h5 active" href="index.php#" id="nav_inicio">Inicio</a>
			      </li>
			      <li class="nav-item">
			        <?php
			        if(isset($_SESSION['id_usuario'])){
			        ?>
			        <a class="nav-link h5" href="pedido.php" id="nav_pedido">Pida Su Remis</a>
			        <?php
			        } else {?>
			        <a class="nav-link h5" href="" data-toggle="modal" data-target="#modalIngreso">Pida Su Remis</a>
			        <?php
			        }
			        ?>
		      	  </li>
				  <li class="nav-item">
			        <a class="nav-link h5" href="index.php#services" id="nav_servicios">Servicios</a>
			      </li>
			      <li class="nav-item">
			        <a class="nav-link h5" href="index.php#contacto" id="nav_contacto">Contacto</a>
			      </li>
			    </ul>
			    <?php
			    	if(!isset($_SESSION['nombre'])){
			    ?>
			    <ul class="navbar-nav ml-auto" id="reg_log">
				   	<li class="nav-item">
			        	<a class="nav-link h5" href="" data-toggle="modal" data-target="#modalIngreso">Ingresar</a>
			      	</li>
			      	<span class="nav-link d-none d-lg-block">|</span>
				    <li class="nav-item">
			        	<a class="nav-link h5" href="" data-toggle="modal" data-target="#modalRegistro">Registrarse</a>
			      	</li>
			    </ul>
			    <?php
			    	} else {
			    ?>
			    <div class="dropdown bg-black">
				  <button class="btn btn-dark bg-black dropdown-toggle border-0" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				  	<a class="h5"><?=$_SESSION['nombre']?></a>
				  </button>
				  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
				    <a class="dropdown-item" href="cuentaP.php">Mi Cuenta</a>
				    <div class="dropdown-divider"></div>
				    <a class="dropdown-item" href="cerrar_session.php">Cerrar sesion</a>
				  </div>
				</div>
				<?php
			    	}
				?>
			</div>
		</div>
	</nav>
	<!--------------------NAV BAR---------------------------->
	
	<?php
	require('modalIngreso.php');
	require('modalRegistro.1.php');
	?>
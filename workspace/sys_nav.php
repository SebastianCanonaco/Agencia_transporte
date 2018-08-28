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
			        <a class="nav-link h5" href="sys_index.php" id="nav_inicio">Inicio</a>
			      </li>
				  <li class="nav-item">
			        <a class="nav-link h5" href="admin_pedidos.php" id="nav_pedidos">Pedidos</a>
			      </li>
			      <li class="nav-item">
			        <a class="nav-link h5" href="admin_usuarios.php" id="nav_usuarios">Usuarios</a>
			      </li>
			    </ul>
			    <div class="dropdown bg-black">
				  <button class="btn btn-dark bg-black dropdown-toggle border-0" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				  	<a class="h5"><?=$_SESSION['nombre']?></a>
				  </button>
				  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
				    <!--<div class="dropdown-divider"></div>-->
				    <a class="dropdown-item" href="cerrar_session.php">Cerrar sesion</a>
				  </div>
				</div>
			</div>
		</div>
	</nav>
	<!--------------------NAV BAR---------------------------->

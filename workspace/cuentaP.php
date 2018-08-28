<?php
	require('session.php');
	
	/*if(!isset($_SESSION['id_usuario']))
    header("location: index.php");*/
	
	$usuario_id = $_SESSION['id_usuario'];
	$sql_query = "SELECT * from `usuarios` WHERE `id_usuario`= '$usuario_id';";
	$usuario_db = mysqli_query($db, $sql_query);
	
	if($usuario_db){
		$usuario_cuenta = mysqli_fetch_assoc($usuario_db);
		$usuario_datos	.=	'<table class="table">
								<thead>
									<tr>
										<th>Datos cuenta</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>Nombre</td>
										<td>'.$usuario_cuenta['nombres'].'</td>
									</tr>
									<tr>
										<td>Apellido</td>
										<td>'.$usuario_cuenta['apellido'].'</td>
									</tr>
									<tr>
										<td>Telefono</td>
										<td>'.$usuario_cuenta['telefono'].'</td>
									</tr>
									<tr>
										<td>Email</td>
										<td>'.$usuario_cuenta['email'].'</td>
									</tr>							
								</tbody>
					</table>';
	}
	
	$usuario_id = $_SESSION['id_usuario'];
	$sql_query = "SELECT * FROM `viajes` WHERE `id_usuario`= '$usuario_id' ORDER BY `estado` ASC;";
	$viajes_query = mysqli_query($db, $sql_query);
	
	if (mysqli_num_rows($viajes_query)!=0){
    	while($viaje = mysqli_fetch_array($viajes_query)){
    		
    		$estado_viaje = $viaje['estado'];
        	switch ($estado_viaje) {
                case 1:
                    $estado_viaje = 'NO ASIGNADO';
                    $color = 'bg-warning';
                    break;
                case 2:
                    $estado_viaje = 'ASIGNADO';
                    $color = 'bg-info';
                    break;
                case 3:
                    $estado_viaje = 'FINALIZADO';
                    $color = 'bg-success';
                    break;
                case 4:
                    $estado_viaje = 'CANCELADO';
                    $color = 'bg-danger';
                    break;
            }
    		
    		$id_vehiculo = $viaje['id_vehiculo'];
    		$id_origen = $viaje['id_origen'];
    		$id_destino = $viaje['id_destino'];
    		$sql_query = "SELECT * FROM `vehiculos` WHERE `id_vehiculo`= '$id_vehiculo';";
    		$vehiculo_query = mysqli_query($db, $sql_query);
    		$sql_query = "SELECT * FROM `direcciones` WHERE `id_direccion`= '$id_origen';";
    		$origen_query = mysqli_query($db, $sql_query);
    		$sql_query = "SELECT * FROM `direcciones` WHERE `id_direccion`='$id_destino';";
    		$destino_query = mysqli_query($db, $sql_query);
    		if($vehiculo_query && $origen_query && $destino_query){
				$vehiculo = mysqli_fetch_assoc($vehiculo_query); 
				$origen = mysqli_fetch_assoc($origen_query);    			
				$destino = mysqli_fetch_assoc($destino_query);				
    			$carta_viaje .= '<div id="viajes">
									<div class="m-3 card">
									  <div class="card-header '.$color.'"><h5>VIAJE '.$estado_viaje.'</h5> 
									  </div>
									  <div class="card-body">
									    <p class="card-text"><strong>Fecha:</strong> '.$viaje['hora_pedido'].'</p>
									    <p class="card-text"><strong>Origen:</strong> '.$origen['calle'].' '.$origen['altura'].'  <strong>Destino:</strong> '.$destino['calle'].' '.$destino['altura'].'</p>
									    <p class="card-text"></p>
									    <p class="card-text"><strong>Vehiculo:</strong> '.$vehiculo['patente'].' '.$vehiculo['modelo'].' <strong>COLOR:</strong> '.$vehiculo['color'].'</p>
									    <p class="card-text"><strong>Precio:</strong></p>
									  </div>
									  <div class="card-footer">
										<button id_viaje='.$viaje['id_viaje'].' id="boton_eliminar_pedido" class="btn btn-secondary">Cancelar</button>
										
										<i class="fas fa-star text-warning"></i>
										<i class="fas fa-star text-warning"></i>
										<i class="fas fa-star text-warning"></i>
										<i class="fas fa-star text-warning"></i>
										<i class="fas fa-star text-warning"></i>
									  </div>
									</div>
								</div>';
	
    		} else { 
    			echo "Error: " . $sql_query . "<br>" . mysqli_error($db);
    		}
    	}
	} else {
		$carta_viaje .= '
		<div class="alert alert-primary m-3" role="alert">
			Aun no ha realizado viajes.
		</div>';
	}
	
	$usuario_id = $_SESSION['id_usuario'];
	$sql_query =   "SELECT * 
					FROM `direcciones`
					INNER JOIN `direcciones_favoritas` ON `direcciones_favoritas`.`id_direccion`=`direcciones`.`id_direccion`
					WHERE `direcciones_favoritas`.`id_usuario`= '$usuario_id' ORDER BY `calle`, `altura`;";
	$favoritos_query = mysqli_query($db, $sql_query); 
	
	if(mysqli_num_rows($favoritos_query) > 0){
		while($favoritos_direccion = mysqli_fetch_array($favoritos_query)){
				$usuario_favoritos .= 
										'<li class="list-group-item d-flex justify-content-between align-items-center">
						    				'.$favoritos_direccion['calle'].' '.$favoritos_direccion['altura'].'
						    				<a direccion=\''.$favoritos_direccion['id_direccion'].'\' href="javascript:void(0)" onclick="return eliminar_fav('.$favoritos_direccion['id_direccion'].')" class="badge badge-danger badge-pill elim_dir"><i class="fas fa-trash-alt"></i></a>
										</li>';
			
		}
	} else {
		$usuario_favoritos .=	'<div class="alert alert-primary m-3" role="alert">
									Aun no ha anadido ninguna direccion favorita.
								</div>';
	}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Mi cuenta</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script type="text/javascript" src="js/jquery/jquery-3.3.1.min.js"></script>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/bootstrap-formhelpers-phone.js"></script>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.1/css/all.css" integrity="sha384-O8whS3fhG2OnA5Kas0Y9l3cfpmYjapjI0E4theH4iuMD+pLhbf6JI0jIMfYcK3yZ" crossorigin="anonymous">
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	<link rel="stylesheet" href="css/sidebarp.css" type="text/css" />
</head>
<body>
	
	<?php
		require('nav_bar.php');
	?>
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-2 text-center text-md-left sidebar bg-dark">
				<nav class="">
					<div class="list-group list-group-flush" role="tablist">
						<a class="list-group-item bg-grey text-white active" href="#cuenta" id="link_cuenta" data-toggle="tab" role="tab" aria-controls="cuenta" aria-selected="true"><i class="fas fa-user"></i>  Datos cuenta</a>
						<a class="list-group-item bg-grey text-white" href="#viajes" id="link_viajes" data-toggle="tab" role="tab" aria-controls="viajes" aria-selected="false"><i class="fas fa-taxi"></i>  Mis viajes</a>
						<a class="list-group-item bg-grey text-white" href="#favoritos" id="link_direcciones" data-toggle="tab" role="tab" aria-controls="favoritos" aria-selected="false"><i class="fas fa-map-marker-alt"></i>  Direcciones favoritas</a>
					</div>
				</nav>
			</div>
			<div class="col-md-8 col-12 tab-content mr-5 mt-2 mb-5" id="content">
			  <div class="tab-pane active" id="cuenta" role="tabpanel" aria-labelledby="cuenta-tab">
  				<?=$usuario_datos;?>
				<div class="text-right">
					<button class="btn btn-warning font-weight-bold">Editar</button>
			  	</div>
			  </div>
			  <div class="tab-pane" id="viajes" role="tabpanel" aria-labelledby="viajes-tab">
			  	<?=$carta_viaje;?>
			  </div>
			  <div class="tab-pane" id="favoritos" role="tabpanel" aria-labelledby="favotiros-tab">
  	    		<form id="form_cuadro_fav" method="POST" class="formulario">
  	    			<h3 class="mb-4">Direcciones favoritas</h3>
  	    			<div class="form-group" id="cuadro_favoritos">
  	    				<ul class="list-group">
							<?=$usuario_favoritos?>
						</ul>
				</form>						
  	    			</div>
  	    			<form id="form_favorito" method="POST" class="formulario">
  	    			<h3 class="my-4">Agregue una direccion</h3>
		    		<div class="form-group">
		    			<label for="calle_favorito">Calle</label>
		    			<input type="text" class="form-control" name="calle" id="calle_favorito" required>
		    		</div>		    	
		    		<div class="form-group">
		    			<label for="altura_favorito">Altura</label>
		    			<input type="number" name="altura" class="form-control" id="altura_favorito" min="0" required>
		    		</div>
		    		<button type="submit" class="btn btn-warning btn-block">Agregar</button>
		    		<div class="col-lg-7 col-sm-12 p-3">
    					<div id="googleMap"></div>
    				</div>
				</form>
			  </div>
			</div>
		</div>
	</div>
	
	
	<?php
		require('footer.php');
	?>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Eliminar direccion</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p class="">Desea eliminar esta direccion favorita?</p>
      </div>
      <div class="modal-footer">
        <button type="button" id="boton_cerrar" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="button" id="boton_eliminar" class="btn btn-danger">Eliminar</button>
      </div>
    </div>
  </div>
</div>
</div>

																<!-- Button trigger modal -->
<button type="button" id="boton_modal" class="btn btn-primary d-none" data-toggle="modal" data-target="#exampleModal">
  Launch demo modal
</button>
<script type="text/javascript" src="js/cuenta.js"></script>
</body>
</html>
<?php
	require('session.php');
    $id_usuario = $_SESSION['id_usuario'];

	$sql_query = "SELECT * FROM `usuarios` WHERE `id_usuario`='$id_usuario';";
	$usuario_query = mysqli_query($db, $sql_query);
	if(mysqli_num_rows($usuario_query) > 0){
		$usuario = mysqli_fetch_assoc($usuario_query);
		$telefono = $usuario['telefono'];
	}
	
	$sql_query =   "SELECT * 
					FROM `direcciones`
					INNER JOIN `direcciones_favoritas` ON `direcciones_favoritas`.`id_direccion`=`direcciones`.`id_direccion`
					WHERE `direcciones_favoritas`.`id_usuario`= '$id_usuario';";
	$favoritos_query = mysqli_query($db, $sql_query); 
	
	if(mysqli_num_rows($favoritos_query) > 0){
		while($favoritos_direccion = mysqli_fetch_array($favoritos_query)){
				$usuario_favoritos .= '<option value=\''.$favoritos_direccion['id_direccion'].'\' calle=\''.$favoritos_direccion['calle'].'\' altura=\''.$favoritos_direccion['altura'].'\'>'.$favoritos_direccion['calle'].' '.$favoritos_direccion['altura'].'</option>';
		}
	} else {
		//echo die(mysqli_error($db));
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Pida su remis</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script type="text/javascript" src="js/jquery/jquery-3.3.1.min.js"></script>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/scripts.js"></script>
	<script type="text/javascript" src="js/bootstrap-formhelpers-phone.js"></script>
	<script type="text/javascript" src="js/pedido.js"></script>
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>
<body class="bg-image-full" style="background-image: url('back.png');">

	<?php
		require('nav_bar.php');
	?>
	<div class="container-fluid p-3">
		<div class="row">
			<div class="col-lg-1"></div>
			<div class="col-lg-4 col-sm-12">
	    		<form id="form_pedido" method="POST" class="">
		    		<div class="form-group">
		    			<label for="telefono">Télefono</label>
		    			<input type="text" class="bfh-phone form-control" data-format="ddd ddd-dddd" id="telefono_pedido" value="<?=$telefono?>" required>
		    		</div>
		    		<div class="form-group">
		    			<select class="form-control" id="favoritos">
		    				<option selected>Selecciona una direccion favorita</option>
		    				<?=$usuario_favoritos?>
		    			</select>
		    		</div>
		    		<div class="form-group">
		    			<label for="calle">Calle</label>
		    			<input type="text" name="calle" class="form-control" id="input_calle" required>
		    		</div>
		    		<div class="form-group">
		    			<label for="altura">Altura</label>
		    			<input type="number" name="altura" class="form-control" id="input_altura" min="0" required>
		    		</div>
		    		<div class="form-group">
		    			<label for="pasajeros">Cantidad de pasajeros</label>
		    			<input type="number" name="pasajeros" class="form-control" id="pasajeros" max="4" min="0"required>
		    		</div>
		    		<div class="form-group"
		    			<label for="descripcion">Ayuda para conductor</label>
		    			<input type="text" name="ayuda" class="form-control" id="descripcion">
		    		</div>		    		
		    		<button type="submit" class="btn btn-primary form-control">Solicitar</button>
	    		</form>
    		</div>
    		<div class="col-lg-6 col-sm-12 pt-4">
    			<div id="googleMap"></div>
    		</div>
			<div class="col-lg-1"></div>
		</div>
	</div>
	<?php
	require('footer.php');
	?>
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAZSmeT8tznWd0MX9kbOYH3-8AW0Shgnf4&callback=myMap"></script>
</body>
</html>
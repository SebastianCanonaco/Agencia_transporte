<?php

    require('db.php');
    /*$id_usuario = $_SESSION['id_usuario'];

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
	}*/
	
	
	
	$id_usuario = $_SESSION['id_usuario'];
	$calle = $_POST['calle_ajax'];
	$altura = $_POST['altura_ajax'];
	$pasajeros = $_POST['pasajeros_ajax'];
	$telefono = $_POST['telefono_ajax'];
	$descripcion = $_POST['descripcion_ajax'];
	$DateTime = new DateTime();
	$DateTime->modify('-3 hours');
	$fecha_hora =  $DateTime->format("Y-m-d H:i:s");
	//$fecha_hora = date ('Y-m-d H:i:s');
	
	$calle = strtolower($calle);
	$calle = ucwords($calle);
	$sql_query = "SELECT * FROM `direcciones` WHERE `calle`='$calle' AND altura='$altura';";
	$direccion_query = mysqli_query($db, $sql_query);
	
	if (mysqli_num_rows($direccion_query) > 0){
		$direccion_origen = mysqli_fetch_assoc($direccion_query);
		$id_origen = $direccion_origen['id_direccion'];
	} else {
		$sql_query = "INSERT INTO `direcciones` (`calle`, `altura`) VALUES ('$calle', '$altura');";
		
		if (mysqli_query($db, $sql_query)) {
		    $id_origen = mysqli_insert_id($db);
		} else {
		   // echo die(mysqli_error($db));
		}
	}
	$estado = 1;//no asignado
	$sql_query = "INSERT INTO `viajes` (`id_origen`, `id_usuario`, `cant_pasajeros`, `hora_pedido`, `telefono`, `estado`, `descripcion`) VALUES ('$id_origen', '$id_usuario', '$pasajeros', '$fecha_hora', '$telefono', '$estado', '$descripcion');";
	
	if (mysqli_query($db, $sql_query)){
		echo 'success';
	} else {
	    echo mysqli_error($db);
	}

?>
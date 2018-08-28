<?php
    require('db.php');
    $id_viaje = $_POST['id_viaje'];
    $calle_salida = $_POST['calle_salida'];
    $altura_salida = $_POST['altura_salida'];
    $calle_llegada = $_POST['calle_llegada'];
    $altura_llegada = $_POST['altura_llegada'];
    $id_conductor = $_POST['id_conductor'];
    $id_vehiculo = $_POST['id_vehiculo'];
	
	$calle_salida = strtolower($calle_salida);
	$calle_salida = ucwords($calle_salida);
	$calle_llegada = strtolower($calle_llegada);
	$calle_llegada = ucwords($calle_llegada);
    
	$sql_query = "SELECT * FROM `direcciones` WHERE `calle`='$calle_salida' AND altura='$altura_salida';";
	$origen_query = mysqli_query($db, $sql_query);
	
	if (mysqli_num_rows($origen_query) > 0){
		$direccion_origen = mysqli_fetch_assoc($origen_query);
		$id_origen = $direccion_origen['id_direccion'];
	} else {
		$sql_query = "INSERT INTO `direcciones` (`calle`, `altura`) VALUES ('$calle_salida', '$altura_salida');";
		
		if (mysqli_query($db, $sql_query)) {
		    $id_origen = mysqli_insert_id($db);
		} else {
		   // echo die(mysqli_error($db));
		}
	}
	
	if($calle_llegada != '' && $altura_llegada !=  ''){
    	$sql_query = "SELECT * FROM `direcciones` WHERE `calle`='$calle_llegada' AND altura='$altura_llegada';";
    	$destino_query = mysqli_query($db, $sql_query);
    	
    	if (mysqli_num_rows($destino_query) > 0){
    		$direccion_destino = mysqli_fetch_assoc($destino_query);
    		$id_destino = $direccion_destino['id_direccion'];
        } else {
    		$sql_query = "INSERT INTO `direcciones` (`calle`, `altura`) VALUES ('$calle_llegada', '$altura_llegada');";
    		
    		if (mysqli_query($db, $sql_query)) {
    		    $id_destino = mysqli_insert_id($db);
    		} else {
    		   // echo die(mysqli_error($db));
    		}
	    }
	
	    $sql_query = "UPDATE `viajes` SET  `id_origen`='$id_origen',`id_destino`='$id_destino',`id_conductor`='$id_conductor',`id_vehiculo`='$id_vehiculo', `estado`='2' WHERE `id_viaje`='$id_viaje';";
	} else {
	 $sql_query = "UPDATE `viajes` SET  `id_origen`='$id_origen',`id_conductor`='$id_conductor',`id_vehiculo`='$id_vehiculo', `estado`='2' WHERE `id_viaje`='$id_viaje';";   
	}
    
    if(mysqli_query($db, $sql_query)){
        echo 'success';   
    }

?>
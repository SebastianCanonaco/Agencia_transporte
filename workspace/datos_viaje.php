<?php
    require('session.php');
    
    $id_viaje = $_POST['id_viaje_ajax'];

    $viaje_query = mysqli_query($db, "SELECT * FROM `viajes` WHERE `id_viaje`='$id_viaje';");
    
    if(mysqli_num_rows($viaje_query) > 0){
        $viaje = mysqli_fetch_assoc($viaje_query);
        
        $id_usuario_viaje = $viaje['id_usuario'];
	    $sql_query = "SELECT * FROM `usuarios` WHERE `id_usuario` = '$id_usuario_viaje';";
    	$usuario_query = mysqli_query($db, $sql_query);
        $usuario_viaje = mysqli_fetch_assoc($usuario_query);
    	
    	$id_origen_viaje = $viaje['id_origen'];
	    $sql_query = "SELECT * FROM `direcciones` WHERE `id_direccion` = '$id_origen_viaje';";
    	$origen_query = mysqli_query($db, $sql_query);
        $origen_viaje = mysqli_fetch_assoc($origen_query);
    	
    	$id_conductor_viaje = $viaje['id_conductor'];
    	$sql_query = "SELECT * FROM `conductores` WHERE `id_conductor` = '$id_conductor_viaje';";
    	$conductor_query = mysqli_query($db, $sql_query);
    	$conductor_viaje = mysqli_fetch_assoc($conductor_query);
    	
    	$id_vehiculo_viaje = $viaje['id_vehiculo'];
    	$sql_query = "SELECT * FROM `vehiculos` WHERE `id_vehiculo` = '$id_vehiculo_viaje';";
    	$vehiculo_query = mysqli_query($db, $sql_query);
    	$vehiculo_viaje = mysqli_fetch_assoc($vehiculo_query);
    	
        echo    '<div class="form-group">
                    <span class="">Pasajero: '.$usuario_viaje['apellido'].' '.$usuario_viaje['nombres'].'</span>
                </div>
                <div class="form-group">
                    <span>Telefono: '.$viaje['telefono'].'</span>
                </div>
                <div class="form-group">
                    <span>Direccion salida: '.$origen_viaje['calle'].' '.$origen_viaje['altura'].'</span>
                </div>';
    
    }
    else
    {
        echo mysqli_error($db);
    }
    
?>


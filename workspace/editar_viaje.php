<?php
    require('db.php');
    require('carga_selects_admin.php');
    
    $id_viaje = $_REQUEST['id'];
    
    $viaje_query = mysqli_query($db, "SELECT * FROM `viajes` WHERE `id_viaje`='$id_viaje';");
    
    if(mysqli_num_rows($viaje_query) > 0){
        $viaje = mysqli_fetch_assoc($viaje_query);
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
        $id_usuario_viaje = $viaje['id_usuario'];
	    $sql_query = "SELECT * FROM `usuarios` WHERE `id_usuario` = '$id_usuario_viaje';";
    	$usuario_query = mysqli_query($db, $sql_query);
        $usuario_viaje = mysqli_fetch_assoc($usuario_query);
    	
    	$id_origen_viaje = $viaje['id_origen'];
	    $sql_query = "SELECT * FROM `direcciones` WHERE `id_direccion` = '$id_origen_viaje';";
    	$origen_query = mysqli_query($db, $sql_query);
        $origen_viaje = mysqli_fetch_assoc($origen_query);
        
	    $id_destino_viaje = $viaje['id_destino'];
	    $sql_query = "SELECT * FROM `direcciones` WHERE `id_direccion` = '$id_destino_viaje';";
    	$destino_query = mysqli_query($db, $sql_query);
        $destino_viaje = mysqli_fetch_assoc($destino_query);
    	
    	$id_conductor_viaje = $viaje['id_conductor'];
    	$sql_query = "SELECT * FROM `conductores` WHERE `id_conductor` = '$id_conductor_viaje';";
    	$conductor_query = mysqli_query($db, $sql_query);
    	$conductor_viaje = mysqli_fetch_assoc($conductor_query);
    	
    	$id_vehiculo_viaje = $viaje['id_vehiculo'];
    	$sql_query = "SELECT * FROM `vehiculos` WHERE `id_vehiculo` = '$id_vehiculo_viaje';";
    	$vehiculo_query = mysqli_query($db, $sql_query);
    	$vehiculo_viaje = mysqli_fetch_assoc($vehiculo_query);
    	
    }
    else
    {
        echo mysqli_error($db);
    }
?>

<!DOCTYPE html>
<html>
    <head>
	<title>Editar viaje</title>
	<?php
	require('head.php');
	?>
	<link rel="stylesheet" href="css/agency2.css" type="text/css" />
</head>
<body class="bg-image-full" style="background-image: url('back.png');">
    <?php
    require('sys_nav.php')
    ?>
    
    <div class="container">
        <div class="row">
            <div class="card col-12 my-4">
                <div class="card-header <?=$color?> mt-3" id="cabecera" id_viaje="<?=$viaje['id_viaje']?>"
                id_conductor="<?=$conductor_viaje['id_conductor'];?>" id_vehiculo="<?=$vehiculo_viaje['id_vehiculo'];?>" ><h5>Viaje N: <?=$viaje['id_viaje']?>  <?=$estado_viaje?></h5></div>
                <div class="card-body">
                <form id="form_editar_pedido">
                    <div class="form-group">
                        <h5 class="">Pasajero: <?=$usuario_viaje['apellido']?> <?=$usuario_viaje['nombres']?></h5>
                    </div>
                    <div class="form-group">
                        <h5>Telefono:  <?=$usuario_viaje['telefono']?></h5>
                    </div>
                    <h5>Direccion salida:</h5>
                    <div class="form-row">
                    <div class="col-md-6 form-group">
            		    <label for="calle_salida">Calle</label>
            			<input type="text" class="form-control" name="calle" id="calle_salida" value="<?=$origen_viaje['calle']?>" required>
            		</div>
            		<div class="col-md-6 form-group">
            			<label for="altura_salida">Altura</label>
            			<input type="number" name="altura" class="form-control" id="altura_salida" min="0"  value="<?=$origen_viaje['altura']?>" required>
            		</div>
            		</div>
                    <h5>Direccion llegada:</h5>
                    <div class="form-row">
                    <div class="col-md-6 form-group">
            		    <label for="calle_llegada">Calle</label>
            			<input type="text" class="form-control" name="calle" id="calle_llegada" value="<?=$destino_viaje['calle']?>">
            		</div>
            		<div class="col-md-6 form-group">
            			<label for="altura_llegada">Altura</label>
            			<input type="number" name="altura" class="form-control" id="altura_llegada" min="0" value="<?=$destino_viaje['altura']?>">
            		</div>
            		</div>
            		<h5>Asignar conductor y vehiculo</h5>
                    <div class="form-group">
                        <select class="form-control" id="select_cond_editar" required>
                            <option value="">Seleccione conductor</option>
                            <?=$conductores_select?>
                        </select>
                    </div>
                    <div class="form-group">
                        <select class="form-control" id="select_veh_editar" required>
                            <option value="">Seleccione vehiculo</option>
                        </select>
                    </div>
                    <div class="form-group text-right">
                        <button type="submit" id="boton_pedido" class="btn btn-outline-warning bg-dark text-white font-weight-bold">Guardar datos</button>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>
    
    
    <?php
    require('sys_footer.php');
    ?>
    
    <script type="text/javascript" src="js/editar_viaje.js"></script>
</body>
</html>
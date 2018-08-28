<?php
	require('session.php');
	require('carga_selects_admin.php');
    $admin_id = $_SESSION['id_usuario'];
    
    $sql_query = "SELECT * FROM `viajes` ORDER BY `estado` ASC, `hora_pedido` ASC;";
    $viajes_query = mysqli_query($db, $sql_query);
    if(mysqli_num_rows($viajes_query) > 0){
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
            $id_usuario_viaje = $viaje['id_usuario'];
    	    $sql_query = "SELECT * FROM `usuarios` WHERE `id_usuario` = '$id_usuario_viaje';";
        	$usuario_query = mysqli_query($db, $sql_query);
            $usuario_viaje = mysqli_fetch_assoc($usuario_query);
        	 
        	$id_conductor_viaje = $viaje['id_conductor'];
        	$sql_query = "SELECT * FROM `conductores` WHERE `id_conductor` = '$id_conductor_viaje';";
        	$conductor_query = mysqli_query($db, $sql_query);
        	$conductor_viaje = mysqli_fetch_assoc($conductor_query); 
        	 
        	$id_vehiculo_viaje = $viaje['id_vehiculo'];
        	$sql_query = "SELECT * FROM `vehiculos` WHERE `id_vehiculo` = '$id_vehiculo_viaje';";
        	$vehiculo_query = mysqli_query($db, $sql_query);
        	$vehiculo_viaje = mysqli_fetch_assoc($vehiculo_query);
             
            $id_origen_viaje = $viaje['id_origen'];
    	    $sql_query = "SELECT * FROM `direcciones` WHERE `id_direccion` = '$id_origen_viaje';";
        	$origen_query = mysqli_query($db, $sql_query);
            $origen_viaje = mysqli_fetch_assoc($origen_query);
            
    	    $id_destino_viaje = $viaje['id_destino'];
    	    $sql_query = "SELECT * FROM `direcciones` WHERE `id_direccion` = '$id_destino_viaje';";
        	$destino_query = mysqli_query($db, $sql_query);
            $destino_viaje = mysqli_fetch_assoc($destino_query);
 
             
            if($viaje['estado'] == 1 || $viaje['estado'] == 2){
                $botones = '<button class="btn btn-secondary boton_cancelar" id_viaje='.$viaje['id_viaje'].'>Cancelar</button> ';
            } else {$botones = '';}
            
            if($viaje['estado'] == 2){
                $botones .= ' <button class="btn btn-success boton_finalizar" id_viaje='.$viaje['id_viaje'].'>Finalizar</button>';
            }
            $viajes_cards .=   '<div class="row my-3 datos"
                                    id_conductor="'.$conductor_viaje['id_conductor'].'"
                                    id_vehiculo="'.$vehiculo_viaje['id_vehiculo'].'"
                                    estado="'.$viaje['estado'].'">
                                    <!-- Card 1 -->
                                    <div class="col-12 card">
                                        <div class="card-header mt-2 '.$color.'"><h5>Viaje n: '.$viaje['id_viaje'].' '.$estado_viaje.'</h5></div>
                                        <div class="card-body">
                                            <ul class="list-inline">
                                              <li class="list-inline-item">Fecha/Hora(PEDIDO): '.$viaje['hora_pedido'].'</li>
                                            </ul>
                                            <ul class="list-inline">
                                              <li class="list-inline-item">Pasajero: '.$usuario_viaje['nombres'].' '.$usuario_viaje['apellido'].'</li>
                                              <li class="list-inline-item">Conductor: '.$conductor_viaje['nombre'].' '.$conductor_viaje['apellido'].'</li>
                                              <li class="list-inline-item">Vehiculo: '.$vehiculo_viaje['patente'].' '.$vehiculo_viaje['marca'].'</li>
                                            </ul>
                                            <ul class="list-inline">
                                              <li class="list-inline-item">Origen: '.$origen_viaje['calle'].' '.$origen_viaje['altura'].'</li>
                                              <li class="list-inline-item">Destino: '.$destino_viaje['calle'].' '.$destino_viaje['altura'].'</li>
                                            </ul>
                                            <a class="btn btn-primary boton_editar" href=editar_viaje.php?id='.$viaje['id_viaje'].'>Editar</a>
                                            '.$botones.'
                                            
                                            <button class="btn btn-danger boton_eliminar" id_viaje='.$viaje['id_viaje'].'>Eliminar</button>
                                        </div>
                                    </div>
                                </div>';
    	}
    
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Administrador</title>
        <meta charset="utf-8">
    	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    	<script type="text/javascript" src="js/jquery/jquery-3.3.1.min.js"></script>
    	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    	<link rel="stylesheet" type="text/css" href="css/style.css">
    	<script type="text/javascript" src="js/bootstrap.min.js"></script>
    	<script type="text/javascript" src="js/bootstrap-formhelpers-phone.js"></script>
    	<script type="text/javascript" src="js/admin_pedido.js"></script>
    	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.1/css/all.css" integrity="sha384-O8whS3fhG2OnA5Kas0Y9l3cfpmYjapjI0E4theH4iuMD+pLhbf6JI0jIMfYcK3yZ" crossorigin="anonymous">
    </head>
    <body class="bg-image-full" style="background-image: url('back.png');">
    
    <?php
    require('sys_nav.php');
    ?>

        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <form class="">
                        <div class="form-row m-3">
                            <div class="col-md-3 form-group">
                                <div class="">
                                    <strong>Seleccione conductor</strong>
                                </div>
                                <select class="form-control" id="select_cond">
                                    <option value="0" selected>Todos</option>  
                                    <?=$conductores_select?>
                                </select>
                            </div>
                            <div class="col-md-3 form-group">
                                <div class=" ">
                                    <strong>Seleccione vehiculo</strong>
                                    
                                </div>                                
                                <select class="form-control" id="select_veh">
                                    <option value="0" selected>Todos</option>  
                                    <?=$vehiculos_select?>
                                </select>
                            </div>
                            <div class="col-md-3 form-group">
                                <div class="">
                                    <strong>Seleccione estado</strong>
                                </div>                                
                                <select class="form-control" id="select_est">
                                    <option value="0" selected>Todos</option>  
                                    <option value="1">No asignados</option>
                                    <option value="2">Asignados</option>
                                    <option value="3">Finalizados</option>
                                    <option value="4">Cancelados</option>
                          
                                </select>
                            </div>
                            <div class="col-md-3 mt-4 form-group">
                                <button type="submit" class="btn btn-outline-warning bg-dark text-white font-weight-bold form-control">Buscar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="container">
            <?=$viajes_cards?>
        </div>
        
        
    <?php
    require('sys_footer.php');
    ?>
    </body>

        <?php
        require('modal_pedido.php');
        ?>
</html>
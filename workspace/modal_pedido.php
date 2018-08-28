<?php
    require('db.php');
    require('carga_selects_admin.php');
    
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
    	
    }
    else
    {
        echo mysqli_error($db);
    }
?>
  <!-- Modal -->
  <div id="registro_container">
  <div class="modal fade" id="modal_pedido" role="dialog">
  	<div class="modal-dialog" role="document">
    
      <!-- Modal content-->
    	<div class="modal-content">
      		<div class="modal-header">
        		<h4 class="modal-title">Pedido N</h4>
        		<button type="button" class="close" data-dismiss="modal">&times;</button>
        	</div>
        
        <div class="modal-body" id="modal_content_pedido">
        	
        </div>
        <div class="modal-footer">
        	<div class="text-left">
        		<p class="text-left">sssl viewport sizes.</p>
        	</div>
        </div>
      </div>
    </div>
  </div>
  
</div>
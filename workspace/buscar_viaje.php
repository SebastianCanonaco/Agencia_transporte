<?php
    require('datos_viaje.php');
    require('carga_selects_admin.php');
?>

        <form id="form_editar_pedido">
            <div id="modal_datos_pedido"></div>
            <h5>Direccion llegada:</h5>
            <div class="form-row">
                <div class="col-md-5 form-group mx-3">
        			<label for="calle_favorito">Calle</label>
        			<input type="text" class="form-control" name="calle" id="calle_favorito" required>
        		</div>
        		
        		<div class="col-md-5 form-group mx-3">
        			<label for="altura_favorito">Altura</label>
        			<input type="number" name="altura" class="form-control" id="altura_favorito" min="0" required>
        		</div>
    		</div>
            <div class="form-group">
                <select class="form-control" id="select_cond_editar">
                    <option selected>Seleccione conductor</option>
                    <?=$conductores_select?>
                </select>
            </div>
            <div class="form-group">
                <select class="form-control" id="select_veh_editar">
                    <option selected>Seleccione vehiculo</option>
                </select>
            </div>
            <div class="form-group">
                <button type="submit" id="botonpedido" class="btn btn-primary">Guardar</button>
            </div>
        </form>
        <script type="text/javascript" src="js/admin_pedido.js"></script>
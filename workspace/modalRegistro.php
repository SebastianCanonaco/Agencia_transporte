
  <!-- Modal -->
  <div class="modal fade" id="modalRegistro" role="dialog">
  	<div class="modal-dialog">
    
      <!-- Modal content-->
    	<div class="modal-content">
      		<div class="modal-header">
        		<h4 class="modal-title">Registrese</h4>
        		<button type="button" class="close" data-dismiss="modal">&times;</button>
        	</div>
        <div class="modal-body">
        	<form method="POST">
        		<div class="input-group mb-3">
	        		<div class="input-group-prepend">
		    			<label class="input-group-text" for="nombre">Nombre</span>
	    			</div>
	    			<input type="text" name="nombre" class="form-control" id="nombre">
    			</div>
    			<div class="input-group mb-3">
	        		<div class="input-group-prepend">
		    			<label class="input-group-text" for="telefono">Telefono</label>
	    			</div>
	    			<input type="text" name="telefono" class="bfh-phone form-control" data-format="+54 ddd ddd-dddd" id="telefono">    			
        		</div>
        		<div class="input-group mb-3">
	        		<div class="input-group-prepend">
		    			<label class="input-group-text" for="correo">Email</label>
	    			</div>
	    			<input type="email" name="email" class="form-control" id="correo">
    			</div>
    			<div class="input-group mb-3">
	        		<div class="input-group-prepend">
		    			<label class="input-group-text" for="contrasena_registro">Contraseña</label>
	    			</div>
    			<input type="password" name="contrasena" class="form-control ingreso_pass" id="contrasena_registro">
    			<div class="input-group-append">
    				<div class="btn btn-default input-group-text mostrar_pass"><i class="fas fa-eye icono_pass"></i></div>
  				</div>
    			</div>
    			<div class="text-right">
						<button class="btn btn-primary ml-auto mr-auto" type="submit">Registrarse</button>
      		</div>
        	</form>
        </div>
        <div class="modal-footer">
        	<!--FOOTER MODAL-->
        </div>
      </div>
    </div>
  </div>

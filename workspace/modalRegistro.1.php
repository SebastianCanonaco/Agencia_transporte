
  <!-- Modal -->
  <div id="registro_container">
  <div class="modal fade" id="modalRegistro" role="dialog">
  	<div class="modal-dialog" role="document">
    
      <!-- Modal content-->
    	<div class="modal-content">
      		<div class="modal-header">
        		<h4 class="modal-title">Registrese</h4>
        		<button type="button" class="close" data-dismiss="modal" id="cerrar_registro">&times;</button>
        	</div>
        <div class="modal-body">
        	<div class="alert alert-danger m-3 d-none" role="alert" id="email_alert">
						El e-mail ya esta en uso
					</div>
					<p class="text-left">*Campos obligatorios</p>
        	<form class="formulario" id="form_registro" method="POST">
        		<div class="form-group" >
		    			<label for="nombre_registro">Nombre *</label>
	    				<input type="text" name="nombre" placeholder="Ingrese su nombre" class="form-control" id="nombre_registro" required>
    					<div class="invalid-feedback">
          			Ingrese un nombre
        			</div>
    				</div>
        		<div class="form-group">
		    			<label for="apellido_registro">Apellido</label>
	    				<input type="text" name="apellido" placeholder="Ingrese su apellido" class="form-control" id="apellido_registro">
    				</div>
    				<div class="form-group">
		    			<label class="" for="telefono_registro">Telefono <span class="align-bottom">*</span></label>
	    				<input type="text" name="telefono" placeholder="Ingrese su telefono" class="bfh-phone form-control" data-format="ddd ddd-dddd" id="telefono_registro" required>
        			<small>Ingrese su telefono sin 15, ni 0 en el codigo de area </small>
        			<div class="invalid-feedback">
          			Ingrese un telefono
        			</div>
        		</div>
        		<div class="form-group">
		    			<label class="" for="email_registro">Email *</label>
	    				<input type="email" name="email" placeholder="Ingrese un email" class="form-control" id="email_registro" required>
	      		  <div class="invalid-feedback">
          			Ingrese un email valido
        			</div>
    				</div>
    				<div class="form-group mb-3">
	 				    <label class="" for="contrasena_registro">Contraseña *</label>
					    <div class="input-group mb-3" id="div_registro_pass">
				        <input type="password" name="contrasena" placeholder="Ingrese una contraseña" class="form-control ingreso_pass" id="contrasena_registro" required>
	        		  <div class="input-group-append">
	        			  <div class="btn btn-default input-group-text mostrar_pass"><i class="fas fa-eye icono_pass"></i></div>
	        		  </div>
	      		  </div>
	      		  <div class="invalid-feedback">
          			Ingrese una contraseña
        			</div>
        		</div>
						<div class="text-right m-0">
	            <button class="btn btn-warning border border-dark rounded ml-auto " type="submit" id="boton_registro">Registrar</button>
	          </div>
          	</form>
        </div>
        <div class="modal-footer text-left">
        	<div class="text-left">
        		
        	</div>
        </div>
      </div>
    </div>
  </div>
  
</div>
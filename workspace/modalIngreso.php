<!-- Modal -->
<div class="modal fade" id="modalIngreso" role="dialog">
  <div class="modal-dialog">
  
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Ingreso a cuenta</h4>
        <button id="cerrar_ingreso" type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
      	<div class="alert alert-danger m-3 d-none" role="alert" id="ingreso_alert">
					Usuario y/o contraseña incorrectos
				</div>
        <form id="form_ingreso" method="POST" class="formulario">
        	<div class="form-group">
		    			<label class="" for="email">Email</label>
	    				<input type="email" name="email" placeholder="Ingrese su email" class="form-control" id="email_ingreso" required>
    				</div>
          	<div class="form-group mb-3">
	 				    <label class="" for="contrasena_ingreso">Contraseña</label>
					    <div class="input-group mb-3" id="div_registro_pass">
				        <input type="password" name="contrasena" placeholder="Ingrese una contraseña" class="form-control ingreso_pass" id="contrasena_ingreso" required>
	        		  <div class="input-group-append">
	        			  <div class="btn btn-default input-group-text mostrar_pass"><i class="fas fa-eye icono_pass"></i></div>
	        		  </div>
	      		  </div>
        		</div>
        	<div class="text-right m-0">
            <button class="btn btn-warning ml-auto border border-dark rounded" type="submit" id="boton_ingreso">Ingresar</button>
          </div>
        </form>
      </div>
      <div class="modal-footer">
    		<a href="">Olvido su contraseña?</a>
    	  <a id="link_registro" href="" data-toggle="modal" data-target="#modalRegistro">Registrarse</a>
        <!--<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>-->
      </div>
    </div>
    
  </div>
</div>

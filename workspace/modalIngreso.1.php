  <!-- Modal -->
  <div class="modal fade" id="modalIngreso" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content -->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Ingreso a cuenta</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <form class="form-horizontal">
          	<!--<div class="form-group">
          	<select class="form-control">
          		<option selected>Eliga el tipo</option>
          		<option value="1">Empresa</option>
          		<option value="2">Cliente</option>
          	</select>
          	</div>-->
          	<div class="input-group mb-3">
  				    <input type="email" class="form-control" name="email" placeholder="Ingrese su email" aria-label="Email" aria-describedby="basic-addon1" id="email">
          	</div>
          	<div class="input-group mb-3">
  				      <input type="password" class="form-control" name="contrasena" placeholder="Ingrese su contraseña" aria-label="Password" aria-describedby="basic-addon1" id="password">
			        <div class="input-group-append">
				        <button class="input-group-text" type="button"><i class="fas fa-eye"></i></button>
			        </div>
          	</div>
			<button class="btn btn-primary ml-auto" type="submit">Ingresar</button>
			<a href="">Olvido su contraseña?</a>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        </div>
      </div>
      
    </div>
  </div>
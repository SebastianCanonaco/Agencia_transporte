	<!---------------FOOTER---------------->
    <footer class="py-5 bg-black pie">
      <div class="container">
      	<div class="row">
      		<div class="col-md-4 col-sm-12 text-center">
				<ul class="list-group-flush">
			    	<li class="list-group-item bg-black">
			        	<a class="" href="index.php#">Inicio</a>
			      	</li>
				    <li class="list-group-item bg-black">
			        	<a class="" href="index.php#services">Servicios</a>
			      	</li>
				    <li class="list-group-item bg-black">
			        	<?php
			        	if(isset($_SESSION['id_usuario'])){
			        	?>
			        	<a class="" href="pedido.php">Pida Su Remis</a>
			        	<?php
			        	} else {?>
			        	<a class="nav-link h5" href="" data-toggle="modal" data-target="#modalIngreso">Pida Su Remis</a>
			        	<?php
			        	}
			        	?>
			      	</li>
			      	<li class="list-group-item bg-black">
			        	<a class="" href="index.php#contacto">Contacto</a>
			      	</li>
		    	</ul>
	    	</div>
	    	<div class="col-md-4 col-sm-12">
				<ul class="list-group-flush  text-center">
			    	<li class="list-group-item bg-black">
			        	<span>Agencia XXXXXXXX</span>
			      	</li>
			    	<li class="list-group-item bg-black">
			        	<span>+542234123456</span>
			      	</li>
			    	<li class="list-group-item bg-black">
			        	<span>agencia@mail.com</span>
			      	</li>
			    	<li class="list-group-item bg-black">
			        	<span>Mar del Plata, 7600</span>
			      	</li>			      	
		    	</ul>
	    	</div>
	    	<div class="col-md-4 col-sm-12 text-center">
	    		<form>
	    			<div class="">
	    				<label class="" for="email_novedades">Ingrese email para las ultimas novedades!</label>
	    				<div class="my-3"></div>
			    		<div class="input-group">
			    			<input class="form-control" id="email_novedades" type="email" name="email" placeholder="Ingrese email para novedades!">
		            		<div class="input-group-append">
	    						<button class="btn btn-outline-warning" type="button">Enviar</button>
	  						</div>
			    		</div>
		    		</div>
	    		</form>
	    	</div>
      	</div>

        <p class="mr-0 mt-5 mb-2 text-center text-white">Copyright &copy; Your Website 2018</p>
      </div>
    </footer>
   	<!---------------FOOTER---------------->
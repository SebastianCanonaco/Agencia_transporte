<!DOCTYPE html>
<html>
<head>
	<title>Mi cuenta</title>
	<?php
		require('head.php');
	?>
	<link rel="stylesheet" href="css/sidebar2.css" type="text/css" />
</head>
<body>
	
	<?php
		require('nav_bar.php');
	?>
	<div class="container-fluid">
			<div class="row">
	        <nav class="col-md-2 bg-light sidebar">
	        	<div class="sidebar-sticky">
	            	<ul class="nav flex-column">
	              		<li class="nav-item">
	                		<a class="nav-link active" href="#">
	                  		Datos cuenta <span class="sr-only">(current)</span>
	                		</a>
	              		</li>
	              		<li class="nav-item">
	                		<a class="nav-link" href="#">Ultimos viajes</a>
	              		</li>
			            <li class="nav-item">
			            	<a class="nav-link" href="#">Direcciones favoritas</a>
			            </li>
	            	</ul>
				</div>
			</nav>
			<div class="col-10">
				
			</div>
		</div>
	</div>
	<?php
		require('footer.php');
	?>



</body>
</html>
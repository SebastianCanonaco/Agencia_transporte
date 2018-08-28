<?php
	require('session.php');
	require('carga_selects_usuarios.php');
    $admin_id = $_SESSION['id_usuario'];
    
    $sql_query = "SELECT * FROM `usuarios` WHERE `tipo`='cliente' ORDER BY `apellido` ASC, `nombres` ASC;";
    $usuarios_query = mysqli_query($db, $sql_query);
    if(mysqli_num_rows($usuarios_query) > 0){
    	while($usuario = mysqli_fetch_array($usuarios_query)){
    	 
    	    $estado_usuario = $usuario['estado'];
        	switch ($estado_usuario) {
                case 0:
                    $estado_usuario = 'DESCONECTADO';
                    $color = 'bg-danger';
                    break;
                case 1:
                    $estado_usuario = 'CONECTADO';
                    $color = 'bg-success';
                    break;
            }
    	    
            $viajes_cards .=   '<div class="row my-3">
                                    <!-- Card 1 -->
                                    <div class="col-12 card">
                                        <div class="card-header '.$color.'"><h5 usuario='.$usuario['id_usuario'].'>Usuario N: '.$usuario['id_usuario'].' | '.$usuario['apellido'].' '.$usuario['nombres'].' '.$estado_usuario.'</h5></div>
                                        <div class="card-body">
                                            <ul class="list-inline">
                                              <li class="list-inline-item">Email: '.$usuario['email'].'</li>
                                              <li class="list-inline-item">Telefono: '.$usuario['telefono'].'</li>
                                            </ul>
                                            <button class="btn btn-primary">Editar</button>                        
                                            <button class="btn btn-warning">Ver viajes</button>
                                            <button class="btn btn-danger">Borrar</button>                                            
                                        </div>
                                    </div>
                                </div>';
    	}
    
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Administrador usuarios</title>
        <meta charset="utf-8">
    	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    	<script type="text/javascript" src="js/jquery/jquery-3.3.1.min.js"></script>
    	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    	<link rel="stylesheet" type="text/css" href="css/style.css">
    	<script type="text/javascript" src="js/bootstrap.min.js"></script>
    	<script type="text/javascript" src="js/bootstrap-formhelpers-phone.js"></script>
    	<script type="text/javascript" src="js/admin_usuarios.js"></script>
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
                            <div class="col-md-9 form-group">
                                <div class="">
                                    <strong>Seleccione usuario</strong>
                                </div>
                                <select class="form-control" id="select_usuarios">
                                    <option value="0">Todos</option>
                                    <?=$usuarios_select?>
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
    
</html>
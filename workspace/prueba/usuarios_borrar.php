<?php

require('db.php');

$id = $_REQUEST['id'];
$confirm = $_REQUEST['confirm'];

$borrado_msg = "";

if ($confirm == 'si'){
    $borrado = mysqli_query($db, "DELETE FROM usuarios WHERE id_usuario = '$id';");
    $borrado_msg = "Registro eliminado con exito";
}


?>


<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body>
    
    <div class="container">
        <div class="row">
            <div class="col-6">
                <h1>Usuarios</h1>
            </div>
        </div>
        
        <div class="row">
            <div class="col">
                <?php
                if($borrado_msg==''){
                ?>
                <p>Confirma que desea eliminar este usuario?</p>
                <br>
                <a class="btn btn-danger" href="usuarios_borrar.php?id=<?=$id;?>&confirm=si">Confirmar</a>
                <a class="btn btn-secondary" href="usuarios_listado.php">Cancelar</a>
                <?php } else {?>
                <p>El registro fue borrado con exito. [<a href=usuarios_listado.php>Continuar</a>]</p>
                <?php } ?>
            </div>
        </div>
        
    </div>


        
</body>

</html>
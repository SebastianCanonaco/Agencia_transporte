<?php

require('db.php');

$id = $_REQUEST['id'];
$confirm = $_REQUEST['confirm'];

$usuario_query = mysqli_query($db, "SELECT * FROM usuarios WHERE id_usuario = '$id';");

$usuario = mysqli_fetch_assoc($usuario_query);

$confirm_msg="";

if ($confirm == 'si'){

    $nombres = $_REQUEST['nombres'];
    $email = $_REQUEST['email'];
    $contra = $_REQUEST['contra'];
    
    $contra = md5($contra . 'misalt');
    $actualiza = mysqli_query($db, "UPDATE usuarios SET nombres = '$nombres', email = '$email', password = '$contra' WHERE id_usuario = '$id';");
    $confirm_msg .= "Registro actualizado";
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
                if($confirm_msg==''){
                ?>
                <form action="usuarios_editar.php" method="POST">
                    <input type="hidden" name="confirm" value="si"/>
                    <input type="hidden" name="id" value="<?php echo $id;?>"/>
                  <div class="form-group">
                    <label for="nombre">Nombre</label>
                    <input type="text" class="form-control" name="nombres" id="nombres" placeholder="Ingrese nombre" value="<?=$usuario['nombres'];?>">
                  </div>
                  <div class="form-group">
                    <label for="email">email</label>
                    <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp" placeholder="Ingrese email" value="<?=$usuario['email'];?>">
                    <small id="email" class="form-text text-muted">We'll never share your email with anyone else.</small>
                  </div>
                  <div class="form-group">
                    <label for="contrasena">Contrasena</label>
                    <input type="text" class="form-control" name="contrasena" id="contrasena" placeholder="Ingrese contrasena" value="<?=$usuario['password'];?>">
                  </div>
                  <button type="submit" class="btn btn-primary">Guardar</button>
                </form>
                <?php
                } else {
                ?>
                <p>El registro se actualizo correctamente. [<a href="usuarios_listado.php" class="btn btn-secondary">Continuar</a>]</p>
                <?php
                }
                ?>
            </div>
        </div>
        
    </div>


        
</body>

</html>
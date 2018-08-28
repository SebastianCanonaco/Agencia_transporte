<?php

$esta_en_login = true;
require('db.php');

$id = $_REQUEST['id'];

    if($_REQUEST['email'] != ''){
        $email = $_REQUEST['email'];
        $contra = $_REQUEST['contrasena'];
        //$contra = md5($contra . 'misalt');
        
        $usuario = mysqli_query($db, "SELECT * FROM usuarios where email = '$email' AND password = '$contra';");
        
        if($usuario){
            $usuario_db = mysqli_fetch_assoc($usuario);
            $_SESSION['id_usuario'] = $usuario_db['id_usuario'];
            session_write_close();
            header("location: usuarios_listado.php");
        }
        else {
            $msg_error = 1;
        }
        
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
                if($msg_error==1){
                ?>
                <div class="alert alert-warning">Nombre usuario o contrasena incorrecto</div>
                <?php
                }
                ?>
                <form method="POST">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword1">Contrasena</label>
                        <input type="password" name="contrasena" class="form-control" id="exampleInputPassword1" placeholder="Password">
                      </div>
                      <button type="submit" class="btn btn-primary">Ingresar</button>
                </form>

            </div>
        </div>
        
    </div>


        
</body>

</html>
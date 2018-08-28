<?php

require('db.php');

$sql_query = "SELECT * FROM usuarios;";
$usuario_query = mysqli_query($db, $sql_query);

$usuario_listado = "";

if ($usuario_query){
    while($usuario = mysqli_fetch_array($usuario_query)){
        
        switch($usuario['estado']){
            case '0': $estado = "Activo"; break;
            case '1': $estado = "Inactivo"; break;
            case '2': $estado = "Otros"; break;
        }
        
    $usuario_listado .= '<tr>
                            <td>'.$usuario['id_usuario'].'</td>
                            <td>'.$usuario['nombres'].'</td>
                            <td>'.$usuario['email'].'</td>
                            <td>'.$estado.'</td>
                            <td>
                                <a href="usuarios_editar.php?id='.$usuario['id_usuario'].'" class= "btn btn-primary">Editar</a>
                                <a href="usuarios_borrar.php?id='.$usuario['id_usuario'].'" class= "btn btn-secondary">Borrar</a>
                            </td>
                        </tr>';
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
            <div class="col-6">
                <a href="">Agregar nuevo</a>
            </div>
        </div>
        
        <div class="row">
            <div class="col">
                <table class="table">
                    <thead>
                        <tr>
                            <td>ID</td>
                            <td>Nombre</td>
                            <td>Email</td>
                            <td>Estado</td>
                            <td>Acciones</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?=$usuario_listado;?>
                    </tbody>
                    <tfooter></tfooter>
                </table>
            </div>
        </div>
        
    </div>


        
</body>

</html>
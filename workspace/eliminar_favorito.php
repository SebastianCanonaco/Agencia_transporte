<?php
    require('db.php');
    $usuario_id = $_SESSION['id_usuario'];
    
    $direccion_id = $_POST['id_direccion_ajax'];
    
    $eliminado = mysqli_query($db, "DELETE FROM `direcciones_favoritas` WHERE `id_usuario`='$usuario_id' AND `id_direccion`='$direccion_id';");
    
    if($eliminado){
        echo "success";
    }
    else
    {
        echo mysqli_error($db);
    }
?>
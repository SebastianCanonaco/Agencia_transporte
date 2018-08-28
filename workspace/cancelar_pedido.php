<?php
    require('db.php');
    
    $id_viaje = $_POST['id_viaje'];
    
    $cancelado = mysqli_query($db, "UPDATE `viajes` SET `estado` = '4',`id_conductor`=NULL,`id_vehiculo`=NULL WHERE `id_viaje`='$id_viaje';");
    
    if($cancelado){
        echo "success";
    }
    else
    {
        echo mysqli_error($db);
    }
?>
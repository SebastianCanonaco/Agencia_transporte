<?php
    require('db.php');
    
    $id_viaje = $_POST['id_viaje'];
    
    $eliminado = mysqli_query($db, "DELETE FROM `viajes` WHERE `id_viaje`='$id_viaje';");
    
    if($eliminado){
        echo "success";
    }
    else
    {
        echo mysqli_error($db);
    }
?>
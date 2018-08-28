<?php
    require('db.php');
    $id_viaje = $_POST['id_viaje'];
	
    $sql_query = "UPDATE `viajes` SET  `estado`= '3' WHERE `id_viaje`='$id_viaje';";
    
    if(mysqli_query($db, $sql_query)){
        echo 'success';   
    } else {
    	echo mysqli_error($db);
    }

?>
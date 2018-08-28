<?php
    require('session.php');
    $salida_echo = '<option value="0">Todos</option>';    
    $id_conductor = $_POST['id_conductor_ajax'];
    $sql_query = "SELECT * FROM vehiculos INNER JOIN conductor_vehiculo ON conductor_vehiculo.id_vehiculo = vehiculos.id_vehiculo WHERE id_conductor = '$id_conductor';";
    $vehiculo_query = mysqli_query($db, $sql_query);
    if(mysqli_num_rows($vehiculo_query) > 0){
        while($vehiculo = mysqli_fetch_array($vehiculo_query)){
            $salida_echo .= '<option value='.$vehiculo['id_vehiculo'].'>'.$vehiculo['patente'].' '.$vehiculo['marca'].'</option>'; 
        }
    }
    echo $salida_echo;
?>
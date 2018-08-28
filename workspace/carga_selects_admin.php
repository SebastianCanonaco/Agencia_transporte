<?php
    $sql_query = "SELECT * FROM `conductores`";
    $conductor_query = mysqli_query($db, $sql_query);
    if(mysqli_num_rows($conductor_query) > 0){
        while($conductor = mysqli_fetch_assoc($conductor_query)){
            $conductores_select .= '<option value=\''.$conductor['id_conductor'].'\'>'.$conductor['nombre'].' '.$conductor['apellido'].'</option>';
        }
    }
    
    $sql_query = "SELECT * FROM `vehiculos`";
    $vehiculo_query = mysqli_query($db, $sql_query);
    if(mysqli_num_rows($vehiculo_query) > 0){
        while($vehiculo = mysqli_fetch_assoc($vehiculo_query)){
            $vehiculos_select .= '<option value=\''.$vehiculo['id_vehiculo'].'\'>'.$vehiculo['patente'].' '.$vehiculo['marca'].'</option>';
        }
    }
?>
<?php
    $sql_query = "SELECT * FROM `usuarios`";
    $usuario_query = mysqli_query($db, $sql_query);
    if(mysqli_num_rows($usuario_query) > 0){
        while($usuario = mysqli_fetch_assoc($usuario_query)){
            if($usuario['tipo'] != 'empresa')
            $usuarios_select .= '<option value=\''.$usuario['id_usuario'].'\'>'.$usuario['nombres'].' '.$usuario['apellido']. ' ['.$usuario['email'].']</option>';
        }
    }
?>
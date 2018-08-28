<?php

require('db.php');

if($_POST['email_ajax'] != ''){
    $email = $_POST['email_ajax'];
    $contra = $_POST['contra_ajax'];
    $contra = md5($contra . 'xiaomi');
  
    $usuario = mysqli_query($db, "SELECT * FROM usuarios WHERE email = '$email' AND `contrasena` = '$contra'");
    
    if(mysqli_num_rows($usuario) > 0){
      $DateTime = new DateTime();
	    $DateTime->modify('-3 hours');
	    $fecha_hora =  $DateTime->format("Y-m-d H:i:s");
      $usuario_db = mysqli_fetch_assoc($usuario);
      $tipo = $usuario_db['tipo'];
      if ($tipo == 'empresa'){
        $_SESSION['nombre'] = $usuario_db['razon_social'];
        $_SESSION['tipo'] = 'empresa';
        $_SESSION['id_usuario'] = $usuario_db['id_usuario'];
        
        echo "empresa";
      } else {
        $_SESSION['id_usuario'] = $usuario_db['id_usuario'];
        $id_usuario = $usuario_db['id_usuario'];
        $_SESSION['nombre'] = $usuario_db['nombres'];
        $_SESSION['tipo'] = 'usuario';
        $usuario = mysqli_query($db, "UPDATE `usuarios` SET `ultimo_inicio` = '$fecha_hora', `estado`='1' WHERE `id_usuario`='$id_usuario';");
        echo "usuario";
      }
      
    }
    else {
      echo mysqli_error($db);
    }
        
  }
?>

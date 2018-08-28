<?php
    require('db.php');
    
    if(isset($_POST['calle_ajax']) && isset($_POST['altura_ajax'])){
        $usuario_id = $_SESSION['id_usuario'];
        $calle = $_POST['calle_ajax'];
        $altura = $_POST['altura_ajax'];
		$calle = strtolower($calle);
		$calle = ucwords($calle);
        
        $direccion_query = mysqli_query($db, "SELECT * FROM `direcciones` WHERE `calle`='$calle' AND `altura`='$altura';");
        if(mysqli_num_rows($direccion_query) > 0){
            $direccion = mysqli_fetch_assoc($direccion_query);
            $id_direccion = $direccion['id_direccion'];
            $usuario = mysqli_query($db, "INSERT INTO `direcciones_favoritas` (`id_usuario`, `id_direccion`) VALUES ('$usuario_id', '$id_direccion');");
            if($usuario){
                echo "success";
            }
            
        } else {
            $usuario = mysqli_query($db, "INSERT INTO `direcciones` (`calle`, `altura`) VALUES ('$calle', '$altura');");
            if($usuario){
                $id_direccion = mysqli_insert_id($db);    
                $usuario = mysqli_query($db, "INSERT INTO `direcciones_favoritas` (`id_usuario`, `id_direccion`) VALUES ('$usuario_id', '$id_direccion');");
                echo "success";
            }
            
        }
        
        
        
  }
?>
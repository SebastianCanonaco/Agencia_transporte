<?php


define('DB_HOST', getenv('IP'));
define('DB_USER', 'sebas');
define('DB_PASS', '123456');
define('DB_DB','c9');

$db = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_DB);

if((isset($_POST['nombre_ajax']))){

    $email = $_POST['email_ajax'];
    $sql_query = "SELECT * FROM usuarios WHERE `email`='$email';";
    $email_query = mysqli_query($db, $sql_query);
    if (mysqli_num_rows($email_query) > 0){
        echo "existe";
    } else {
        $nombre = $_POST['nombre_ajax'];
        $apellido = $_POST['apellido_ajax'];
        $telefono = $_POST['telefono_ajax'];
        $contrasena = $_POST['contrasena_ajax'];
		$contrasena = md5($contrasena.'xiaomi');
		$nombre = strtolower($nombre);
		$nombre = ucwords($nombre);
		$apellido = strtolower($apellido);
		$apellido = ucwords($apellido);
        
        $DateTime = new DateTime();
	    $DateTime->modify('-3 hours');
	    $fecha_hora =  $DateTime->format("Y-m-d H:i:s");
        
        $sql_query = "INSERT INTO `usuarios` (`nombres`, `apellido`, `telefono`, `email`, `contrasena`, `tipo`, `fecha_registro`) VALUES ('$nombre', '$apellido', '$telefono', '$email', '$contrasena', 'cliente', '$fecha_hora');";
    
        if (mysqli_query($db, $sql_query)){
            echo "success";
        } else{
            echo mysqli_error($db);
        }
    }
}

?>
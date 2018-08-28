<?php

session_start();

/*if(isset($esta_en_login) && !$esta_en_login && $_SESSION['id_usuario'] == ""){
    header("location: index.php");
}*/

define('DB_HOST', getenv('IP'));
define('DB_USER', 'sebas');
define('DB_PASS', '123456');
define('DB_DB','c9');

$db = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_DB);


?>
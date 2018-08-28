<?php

session_start();

/*echo $_SESSION['nombre'];
echo $_SESSION['tipo'];
if(/*!$esta_en_login*//* $_SESSION['nombre'] != '' && $_SESSION['tipo'] == "usuario"){
    header("location: index.php");
}*/

define('DB_HOST', getenv('IP'));
define('DB_USER', 'sebas');
define('DB_PASS', '123456');
define('DB_DB','c9');

$db = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_DB);


?>
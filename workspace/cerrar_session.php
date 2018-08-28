<?php
//para trabajar con una sesion siempre debo iniciarla, aun para cerrarla
require('db.php');
$id_usuario = $_SESSION['id_usuario'];
$usuario = mysqli_query($db, "UPDATE `usuarios` SET `estado` = '0';");
session_destroy();

header("location: index.php");
?>
<?php

define('DB_HOST', getenv('IP'));
define('DB_USER', 'sebas');
define('DB_PASS', '123456');
define('DB_DB','c9');

$db = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_DB);

if(!$db){
    
    echo 'fallo';
    die();
}
else{
    
    $sql = "SELECT * FROM usuarios WHERE id_usuario = 1;";
    
    $rs = mysqli_query($db, $sql);

    if($rs){
        
        while($rec = mysqli_fetch_array($rs)){
            echo "Nombre: ". $rec['nombres']. "<br>";
            echo "Apellidos: ". $rec['apellidos']. "<br>";
            echo "email: ". $rec['email']. "<br>";
            echo '<pre>';
            var_dump($rec);
            echo '</pre>';
        }
    }
    else{
        
        echo 'No se encontraron resultados';
    }
}
    

?>
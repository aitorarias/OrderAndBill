<?php
/* Creedenciales de la base de datos
utilizando el nuevo método PHP */
define('DB_SERVER', 'mysql.aarias.colexio-karbo.com');
define('DB_USERNAME', 'karbo_aarias');
define('DB_PASSWORD', 'ACruz*2017');
define('DB_NAME', 'karbo_aarias');
 
/* Conectamos a MySQL*/
$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
 
// Checkeamos la conexión 
if($link === false){ // estrictamente falso
    die("ERROR: No se ha podido conectar. " . mysqli_connect_error());
}
?>
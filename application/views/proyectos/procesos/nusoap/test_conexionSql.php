<?php
include 'DB/conexion.php';

        
function obtenerFirmas(){
    
    $query = "SELECT Id_Com , idcompania, alias_com,  nombre  FROM `Compania` order by nombre ";
    $cn = Conectar();
    $rs = mysql_query($query, $cn);
    $cont = 0;
    while ($row = mysql_fetch_array($rs)) {
        echo $row['Id_Com']."<br>";
        echo $row['idcompania']."<br>";
        echo $row['alias_com']."<br>";
        echo $row['nombre']."<br>";
    }
}   

echo call_user_func(obtenerFirmas());
?>

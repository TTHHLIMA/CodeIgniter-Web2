<?php
function Conectar()
{
    // llama a la BD "dbo124595670"
    $cn = mysql_connect(":/tmp/mysql5.sock", "dbo393404115", "tXgXzSRJ") or die("HH->SW: No se puede conectar...");
    mysql_select_db("db393404115") or die("Error when you try to enter to the Database");
    return $cn;
}
?>
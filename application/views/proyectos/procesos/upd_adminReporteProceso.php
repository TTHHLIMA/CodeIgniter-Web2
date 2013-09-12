<?php
//require_once("../Lib/sesion.php");
require '../Lib/Db.conexion.php'; 
$db = DataBase::getInstance();

$xid=$_GET['xid'];
if ($xid<>""){	
    $xSql="";
    $xSql=" update `r_cambios_estados` 
            set visto = 'S' 
            WHERE id = ".$xid;
        $db->setQuery($xSql);  
        $db->loadObjectList();
        echo "1";
} else {
    echo "0";
    
}
?>

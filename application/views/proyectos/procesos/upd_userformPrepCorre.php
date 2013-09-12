<?
require_once("../Lib/sesion.php");
require '../Lib/Db.conexion.php'; 
$db = DataBase::getInstance();
	$pedido = $_GET['pedido'];
	$correccion=$_GET['Estado'];
	$txtobservacion8 = $_GET['txtobservacion8'];
	
if ($pedido<>""){	
	$Sql="";
	$Sql="UPDATE `pedido` SET 
			`realizadopor8` = '".$correccion."', 
			`observacion8` = '".$txtobservacion8."',
                        proc_conf_correccion = 'N'     
			WHERE `pedido`.`idpedido` = '".$pedido."';";	
	//echo $Sql;
	$db->setQuery($Sql);  
	$Rs = $db->loadObjectList();
        echo "ok";
        
} else {
    echo "";
}	
	//$url= "Location: listar.php";
	//header($url);
?>			
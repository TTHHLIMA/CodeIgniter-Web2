<?
require_once("../Lib/sesion.php");
require '../Lib/Db.conexion.php'; 
$db = DataBase::getInstance();
	$pedido = $_GET['pedido'];
	$traduccion=$_GET['Estado'];
	$Chktraduccion = $_GET['Chktraduccion'];
	$Chkarchivofinal = $_GET['Chkarchivofinal'];	
	$txtobservacion7 = $_GET['txtobservacion7'];
	
if ($pedido<>""){	
	$Sql="";
	$Sql="UPDATE `pedido` SET 
			`realizadopor7` = '".$traduccion."', 
			`Chktraduccion` = '".$Chktraduccion."',
			`Chkarchivofinal` = '".$Chkarchivofinal."',
			`txtobservacion7` = '".$txtobservacion7."',
                        proc_conf_traduccion = 'N' 
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
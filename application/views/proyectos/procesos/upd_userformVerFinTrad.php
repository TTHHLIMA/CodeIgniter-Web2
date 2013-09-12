<?
require_once("../Lib/sesion.php");
require '../Lib/Db.conexion.php'; 
$db = DataBase::getInstance();
	$pedido = $_GET['pedido'];
	$traduccion_final=$_GET['Estado'];
	$Chkactualizaciontm = $_GET['Chkactualizaciontm'];
	$Chktraduccionfinal = $_GET['Chktraduccionfinal'];
	$ChkCleanUp = $_GET['ChkCleanUp'];
	$txtobservacion3 = $_GET['txtobservacion3'];
	
if ($pedido<>""){	
	$Sql="";
	$Sql="UPDATE `pedido` SET 
			`realizadopor4` = '".$traduccion_final."',
			`actualizaciontm` = '".$Chkactualizaciontm."',
			`traduccionfinal` = '".$Chktraduccionfinal."',
			`cleanup` = '".$ChkCleanUp."',
			`observacion3` = '".$txtobservacion3."', 
                        proc_conf_traduccion_final = 'N' 
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
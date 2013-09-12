<?
require_once("../Lib/sesion.php");
require '../Lib/Db.conexion.php'; 
$db = DataBase::getInstance();

	$pedido = $_GET['pedido'];
        
	$salto_linea=$_GET['Estado'];
	$ChkPDFGlobal = $_GET['ChkPDFGlobal'];
	$Chksaltolinea = $_GET['Chksaltolinea'];
	$Chkchekearttx = $_GET['Chkchekearttx'];
	$txtobservacion5 = $_GET['txtobservacion5'];
	
if ($pedido<>""){	
	$Sql="";
	$Sql="UPDATE `pedido` SET 
			`realizadopor1` = '".$salto_linea."',
			`PDFGlobal` = '".$ChkPDFGlobal."',
			`saltolinea` = '".$Chksaltolinea."',
			`chekearttx` = '".$Chkchekearttx."',
			`observacion5` = '".$txtobservacion5."',
			`proc_conf_salto_linea` = 'N'
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
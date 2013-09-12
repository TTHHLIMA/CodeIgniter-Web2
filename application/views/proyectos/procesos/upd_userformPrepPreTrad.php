<?
require_once("../Lib/sesion.php");
require '../Lib/Db.conexion.php'; 
$db = DataBase::getInstance();

	$pedido = $_GET['pedido'];
	$pre_traduccion=$_GET['Estado'];
	$Chkanalisistm = $_GET['Chkanalisistm'];
	$Chk1roexporteus99 = $_GET['Chk1roexporteus99'];
	$Chkpretransl75 = $_GET['Chkpretransl75'];
	$Chktraducir100 = $_GET['Chktraducir100'];
	$Chk2doexporteus99 = $_GET['Chk2doexporteus99'];
	$Chkborrarunidadesnotraducibles = $_GET['Chkborrarunidadesnotraducibles'];
	$Chkalfabetic = $_GET['Chkalfabetic'];
	$Chkrtffortrans = $_GET['Chkrtffortrans'];
	$Chkcrearttx = $_GET['Chkcrearttx'];
	$Chkanalisisfinal = $_GET['Chkanalisisfinal'];
	$Chkpreparacionter = $_GET['Chkpreparacionter'];	
	$txtobservacion2 = $_GET['txtobservacion2'];
	
if ($pedido<>""){	
	$Sql="";
	$Sql="UPDATE `pedido` SET 
			`realizadopor3` = '".$pre_traduccion."',
			`analisistm` = '".$Chkanalisistm."',
			`1roexporteus99` = '".$Chk1roexporteus99."',
			`pretransl75` = '".$Chkpretransl75."',
			`traducir100` = '".$Chktraducir100."',
			`2doexporteus99` = '".$Chk2doexporteus99."',
			`borrarunidadesnotraducibles` = '".$Chkborrarunidadesnotraducibles."',
			`alfabetic` = '".$Chkalfabetic."',
			`rtffortrans` = '".$Chkrtffortrans."',
			`crearttx` = '".$Chkcrearttx."',			
			`analisisfinal` = '".$Chkanalisisfinal."',
			`preparacionter` = '".$Chkpreparacionter."',
			`observacion2` = '".$txtobservacion2."',
                        proc_conf_pre_traduccion = 'N'
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
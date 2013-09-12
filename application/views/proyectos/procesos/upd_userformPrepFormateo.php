<?
require_once("../Lib/sesion.php");
require '../Lib/Db.conexion.php'; 
$db = DataBase::getInstance();
	$pedido = $_GET['pedido'];
	$formateo=$_GET['Estado'];
	$Chkeditacionformateo = $_GET['Chkeditacionformateo'];
	$Chkttx1 = $_GET['Chkttx1'];
	$Cborealizadopor6 = $_GET['Estado2'];
	$Chkeditaciontextofoto = $_GET['Chkeditaciontextofoto'];	
	$txtobservacion1 = $_GET['txtobservacion1'];
	
	



if ($pedido<>""){	
	$Sql="";
	$Sql="UPDATE `pedido` SET 
			`realizadopor2` = '".$formateo."',
			`editacionformateo` = '".$Chkeditacionformateo."',
			`ttx1` = '".$Chkttx1."',
			`realizadopor6` = '".$Cborealizadopor6."',
			 editaciontextofoto = '".$Chkeditaciontextofoto."',
			 observacion1 = '".$txtobservacion1."',
			 proc_conf_formateo = 'N'			 
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
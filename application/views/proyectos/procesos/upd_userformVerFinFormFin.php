<?
require_once("../Lib/sesion.php");
require '../Lib/Db.conexion.php'; 
$db = DataBase::getInstance();
	$pedido = $_GET['pedido'];
	$formato_final=$_GET['Estado'];
	$Chkformatofinal = $_GET['Chkformatofinal'];
	$chkcambiaridioma = $_GET['chkcambiaridioma'];
	$chkactualizarindice1 = $_GET['chkactualizarindice1'];
	$chkpocisionamiento = $_GET['chkpocisionamiento'];
	$chkestiloletra = $_GET['chkestiloletra'];
	$chkmayusculaminuscula = $_GET['chkmayusculaminuscula'];
	$chknumerodecimales = $_GET['chknumerodecimales'];
	$chkcodigosfinal = $_GET['chkcodigosfinal'];
	$chkactualizarindice2 = $_GET['chkactualizarindice2'];
	$Chkverificarmayusmin = $_GET['Chkverificarmayusmin'];
	$txtobservacion4 = $_GET['txtobservacion4'];
	
if ($pedido<>""){	
	$Sql="";
	$Sql="UPDATE `pedido` SET 
			`realizadopor5` = '".$formato_final."',
			`formatofinal` = '".$Chkformatofinal."',
			`cambiaridioma` = '".$chkcambiaridioma."',
			`actualizarindice1` = '".$chkactualizarindice1."',
			`pocisionamiento` = '".$chkpocisionamiento."',
			`estiloletra` = '".$chkestiloletra."',
			`mayusculaminuscula` = '".$chkmayusculaminuscula."',
			`numerodecimales` = '".$chknumerodecimales."',
			`codigosfinal` = '".$chkcodigosfinal."',
			`actualizarindice2` = '".$chkactualizarindice2."',
			`verificarmayusmin` = '".$Chkverificarmayusmin."',		
			`observacion4` = '".$txtobservacion4."', 
                        proc_conf_formato_final = 'N' 
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
<?
require_once("../Lib/sesion.php");
require '../Lib/Db.conexion.php'; 
$db = DataBase::getInstance();

	$termstrac = $_GET['termstrac'];
	$txttot = $_GET['txttot'];
        $txtidiomaOrigen=$_GET['txtidiomaOrigen'];
	$txtidiomaFinal = $_GET['txtidiomaFinal'];
	$CboRealizado = $_GET['CboRealizado'];
	$CboRevisado = $_GET['CboRevisado'];
	$ChkTerminado = $_GET['ChkTerminado'];
        $nivel = $_GET['nivel'];
	
if ($termstrac<>""){	
	$Sql="";
        if ($nivel=="1"){
	$Sql="UPDATE `term_extrac` SET 
			`totpal` = '".$txttot."',
			`idiomaorigen` = '".$txtidiomaOrigen."',
			`combinaciones` = '".$txtidiomaFinal."',
			`realizado` = '".$CboRealizado."',
			`revisado` = '".$CboRevisado."',
			`terminado` = '".$ChkTerminado."',
			`informado` = 'N'
			WHERE `term_extrac`.`idtermextrac` = '".$termstrac."';";	
        } else {
	$Sql="UPDATE `term_extrac` SET 
			`totpal` = '".$txttot."',
			`idiomaorigen` = '".$txtidiomaOrigen."',
			`combinaciones` = '".$txtidiomaFinal."',
			`realizado` = '".$CboRealizado."',
			`informado` = 'N'
			WHERE `term_extrac`.`idtermextrac` = '".$termstrac."';";	
        }
	//echo $Sql;
	$db->setQuery($Sql);  
	$Rs = $db->loadObjectList();
//echo $nivel;        
echo "ok";
} else {
    echo "";
}	
	//$url= "Location: listar.php";
	//header($url);

?>
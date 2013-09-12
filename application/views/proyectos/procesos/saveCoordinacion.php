<?	
require_once("../Lib/sesion.php");
require '../Lib/Db.conexion.php'; 
$db = DataBase::getInstance();
	
	$pedido = $_POST['pedido'];
	
	$salto_linea=$_POST['Cbo'.$pedido.'1'];
	$formateo=$_POST['Cbo'.$pedido.'2'];
	$pre_traduccion=$_POST['Cbo'.$pedido.'3'];
	$traduccion=$_POST['Cbo'.$pedido.'4'];
	$traduccion_final=$_POST['Cbo'.$pedido.'5'];
	$formato_final=$_POST['Cbo'.$pedido.'6'];
	$correccion=$_POST['Cbo'.$pedido.'7'];
	
/*	
	echo "Dato: ".$pedido."<br>";
	echo "salto_linea: ".$salto_linea."<br>";
	echo "formateo: ".$formateo."<br>";
	echo "pre_traduccion: ".$pre_traduccion."<br>";
	echo "traduccion: ".$traduccion."<br>";
	echo "traduccion_final: ".$traduccion_final."<br>";
	echo "formato_final: ".$formato_final."<br>";
*/

if ($pedido<>""){	
			if ($xxxnivel=="1"){	
				$Sql="UPDATE `pedido` SET 
						`realizadopor1` = '".$salto_linea."',
						`realizadopor2` = '".$formateo."',
						`realizadopor3` = '".$pre_traduccion."',
						`realizadopor4` = '".$traduccion_final."',
						`realizadopor5` = '".$formato_final."',
						`Cborealizadopor7` = '".$traduccion."', 
						`realizadopor8` = '".$correccion."' 
						WHERE `pedido`.`idpedido` = '".$pedido."';";	

				$db->setQuery($Sql);  
				$Rs = $db->loadObjectList();
			}
			if ($xxxnivel=="2"){
				if($salto_linea<>""){
					$Sql="UPDATE `pedido` SET `realizadopor1` = '".$salto_linea."' WHERE `pedido`.`idpedido` = '".$pedido."';";	
					$db->setQuery($Sql);  
					$Rs = $db->loadObjectList();			
				}
				if($formateo<>""){
					$Sql="UPDATE `pedido` SET `realizadopor2` = '".$formateo."' WHERE `pedido`.`idpedido` = '".$pedido."';";	
					$db->setQuery($Sql);  
					$Rs = $db->loadObjectList();			
				}
				if($pre_traduccion<>""){
					$Sql="UPDATE `pedido` SET `realizadopor3` = '".$pre_traduccion."' WHERE `pedido`.`idpedido` = '".$pedido."';";	
					$db->setQuery($Sql);  
					$Rs = $db->loadObjectList();			
				}
				if($traduccion_final<>""){
					$Sql="UPDATE `pedido` SET `realizadopor4` = '".$traduccion_final."' WHERE `pedido`.`idpedido` = '".$pedido."';";	
					$db->setQuery($Sql);  
					$Rs = $db->loadObjectList();			
				}
				if($formato_final<>""){
					$Sql="UPDATE `pedido` SET `realizadopor5` = '".$formato_final."' WHERE `pedido`.`idpedido` = '".$pedido."';";	
					$db->setQuery($Sql);  
					$Rs = $db->loadObjectList();			
				}
				if($traduccion<>""){
					$Sql="UPDATE `pedido` SET `Cborealizadopor7` = '".$traduccion."' WHERE `pedido`.`idpedido` = '".$pedido."';";	
					$db->setQuery($Sql);  
					$Rs = $db->loadObjectList();			
				}
				
				if($correccion<>""){
					$Sql="UPDATE `pedido` SET `realizadopor8` = '".$correccion."' WHERE `pedido`.`idpedido` = '".$pedido."';";	
					$db->setQuery($Sql);  
					$Rs = $db->loadObjectList();			
				}				
				
			}
	}			
	$url= "Location: listar.php";
	header($url);

	
	/*pedido.realizadopor1 as salto_linea, 
pedido.realizadopor2 as formateo,  
pedido.realizadopor3 as pre_traduccion, 
pedido.Cborealizadopor7 as traduccion , 
pedido.realizadopor4 as traduccion_final , 
pedido.realizadopor5 as formato_final  */

?>

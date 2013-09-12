<?
require_once("../Lib/sesion.php");
require '../Lib/Db.conexion.php'; 
$db = DataBase::getInstance();

$xpedido=$_GET['xpedido'];
$xValproceso=$_GET['xproceso'];

if ($xpedido<>"" and $xValproceso<>""){	
    $xSql="";
    $xSql="SELECT distinct pedido.idpedido as idpedido,
                                     compania.alias_com as alias, 
                                     (select iniciales from coordinador where coordinador.nombre = pedido.coordinador limit 0,1 ) as coordinador,
                                     pedido.realizadopor1 as salto_linea, 
                                     pedido.realizadopor2 as formateo,  
				     pedido.realizadopor3 as pre_traduccion,
                                     pedido.realizadopor7 as traduccion , 
                                     pedido.realizadopor4 as traduccion_final , 
                                     pedido.realizadopor5 as formato_final , 
                                     pedido.realizadopor8 as correccion, 
                                     pedido.proyectoterminado
                    FROM  compania, contacto, requerimientos, cotizacion,  pedido 
                    where compania.idcompania = contacto.idcompania and 
                                     contacto.idcontacto = requerimientos.id_contacto and 
                                     requerimientos.idrequerimiento = cotizacion.idrequerimiento and  
                                     cotizacion.idcotizacion = pedido.idcotizacion and 
                                     pedido.proyectoterminado='N'  and  
                                     pedido.idpedido='".$xpedido."'";

    $db->setQuery($xSql);  
    $RsSql = $db->loadObjectList();
    $NrRes="";
    $NrRes = count($RsSql);
    if ($NrRes > 0) { // imprimo los datos 	
        foreach($RsSql as $Col){
                $xalias=$Col->alias;
                $xcoordinador=$Col->coordinador;
                $xproceso="";
                $xusuario=$xxxiduser; // dato de la sesion
                $salto_linea=$Col->salto_linea;	
                $formateo=$Col->formateo;	
                $pre_traduccion=$Col->pre_traduccion;	
                $traduccion=$Col->traduccion;	
                $traduccion_final=$Col->traduccion_final;	
                $formato_final=$Col->formato_final;	
                $correccion=$Col->correccion;	
                $xfecha=date("Ymd");
                $xhora=date("H:i:s");
                $xproyectoterminado=$Col->proyectoterminado;
        }

        $Sql="";
        $Sql1="";
        switch ($xValproceso){
            case "1":
                $xestado=$salto_linea;
                $xproceso="Salto de Linea";
                $Sql1="UPDATE `pedido` SET 
                                `proc_conf_salto_linea` = 'S'
                                WHERE `pedido`.`idpedido` = '".$xpedido."';";
                break;
            case "2":
                $xestado=$formateo;
                $xproceso="Formateo";
                $Sql1="UPDATE `pedido` SET 
                                `proc_conf_formateo` = 'S'
                                WHERE `pedido`.`idpedido` = '".$xpedido."';";
                break;
            case "3":
                $xestado=$pre_traduccion;
                $xproceso="Pre-Traduccion";
                $Sql1="UPDATE `pedido` SET 
                                `proc_conf_pre_traduccion` = 'S'
                                WHERE `pedido`.`idpedido` = '".$xpedido."';";
                break;
            case "4":
                $xestado=$traduccion;
                $xproceso="Traduccion";
                $Sql1="UPDATE `pedido` SET 
                                `proc_conf_traduccion` = 'S'
                                WHERE `pedido`.`idpedido` = '".$xpedido."';";
                break;
            
            case "7":
                $xestado=$correccion;
                $xproceso="Correccion";
                $Sql1="UPDATE `pedido` SET 
                                `proc_conf_correccion` = 'S'
                                WHERE `pedido`.`idpedido` = '".$xpedido."';";
                break;                
            
            case "5":
                $xestado=$traduccion_final;
                $xproceso="Traduccion Final";
                $Sql1="UPDATE `pedido` SET 
                                `proc_conf_traduccion_final` = 'S'
                                WHERE `pedido`.`idpedido` = '".$xpedido."';";
                break;

            
            case "6":
                $xestado=$formato_final;
                $xproceso="Formato Final";
                $Sql1="UPDATE `pedido` SET 
                                `proc_conf_formato_final` = 'S'
                                WHERE `pedido`.`idpedido` = '".$xpedido."';";
                break;                            
                        
            }

        $Sql=" insert into r_cambios_estados 		
            (	id,
                    pedido,
                    alias,
                    coordinador,
                    proceso,
                    usuario,
                    estado,
                    fecha,
                    hora,
                    proyecto_terminado)
             values 
             (	null,
                    '".$xpedido."',
                    '".$xalias."',
                    '".$xcoordinador."',
                    '".$xproceso."',
                    '".$xusuario."',
                    '".$xestado."',
                    '".$xfecha."',
                    '".$xhora."',
                    '".$xproyectoterminado."'
            );";	

        // inserto el registro al reporte
        //echo $Sql;
        $db->setQuery($Sql);  
        $Rs = $db->loadObjectList();
        // actualizo el cambio en la tabla pedido
        //echo $Sql;
        $db->setQuery($Sql1);  
        $Rs = $db->loadObjectList();		
    }	
    echo "ok";
} else {
    echo "";
}
	

//$url= "Location: listar.php";
//header($url);
?>
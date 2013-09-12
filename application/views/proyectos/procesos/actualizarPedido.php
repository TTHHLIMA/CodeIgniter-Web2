<?php
require '../Lib/Db.conexion.php'; 
$db = DataBase::getInstance();
    
        
        $SQL2="";
	$SQL2="select id_usuario , iniciales  from usuarios";	
	$db->setQuery($SQL2);  
	$Rs2 = $db->loadObjectList();  
		$Nr2="";
		$Nr2 = count($Rs2);
	echo "Total:".$Nr2."<br>";
        if ($Nr2 > 0) { // imprimo los datos 
            foreach($Rs2 as $Col){ 
                if ($Col->iniciales != ""){
                    // 2
                    //print "update r_cambios_estados set usuario = '".$Col->id_usuario."' where usuario='".$Col->iniciales."';<br>" ;
                            //echo $Col->id_usuario."- ".$Col->iniciales."<br>";
                                    $SQL3="";
                                    $SQL3="select ue.id_usuarios ,ue.idusuarios_estado , ue.descripcion ,ue.idestado , e.orden  from usuarios_estado ue, estado e where ue.id_usuarios= '".$Col->id_usuario."' and  e.idestado = ue.idestado order by ue.id_usuarios, e.orden";	
                                    $db->setQuery($SQL3);  
                                    $Rs3 = $db->loadObjectList();  
                                            $Nr3="";
                                            $Nr3 = count($Rs3);
                                    //echo "Total:".$Nr3."<br>";
                                    if ($Nr3 > 0) { // imprimo los datos 
                                        foreach($Rs3 as $Col3){ 
                                            if ($Col3->idusuarios_estado != ""){
                                                        //echo $Col3->idusuarios_estado."- ".$Col3->descripcion."<br>";
                                                        $i=1;
                                                        for ( $i = 1 ; $i <= 8 ; $i ++) {
                                                         // 1   
                                                        print "update pedido set realizadopor".$i." = '".$Col3->idusuarios_estado."' where realizadopor".$i."='".$Col3->descripcion."';<br>" ;
                                                            
                                                        }
                                                        // 2
                                                        //print "update r_cambios_estados set estado = '".$Col3->idusuarios_estado."' where estado='".$Col3->descripcion."';<br>" ;
                                                        
                                            }           
                                        }
                                    }		
                }           
            }
        }				
        
        
        
        ?>

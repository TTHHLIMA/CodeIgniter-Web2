<?
if ($xxxnivel=="1"){
	$SQL="";
	$SQL="select ue.id_usuarios ,ue.idusuarios_estado , ue.descripcion ,ue.idestado , e.orden  from usuarios u,  usuarios_estado ue, estado e where u.coordinador = '1' and u.id_usuario = ue.id_usuarios and e.idestado = ue.idestado order by ue.id_usuarios, e.orden ";	
	$db->setQuery($SQL);  
	$Rs1 = $db->loadObjectList();  
		$Nr="";
		$Nr = count($Rs1);
	if ($Nr > 0) { // imprimo los datos 
		echo "<select name='Cbo".$Columna->idterm."2' id='Cbo".$Columna->idterm."2' style='width:80px;'>"; 
			echo "<option value=''></option>";
				foreach($Rs1 as $Col1){ 
					if ($Col1->idusuarios_estado==$Columna->revisado){
						echo "<option value='".$Col1->idusuarios_estado."' SELECTED>".$Col1->descripcion."</option>";
						
					} else { 
						echo "<option value='".$Col1->idusuarios_estado."'>".$Col1->descripcion."</option>";
					}
				}	
			echo "</select>";
	} else {
		echo "<select name='Cbo".$Columna->idterm."2' id='Cbo' style='width:100px;'>"; 
			echo "<option value=''></option>";
		echo "</select>";
	}
					 
}

if ($xxxnivel=="2"){


// busco el usuario
	$SQL1="";
	$SQL1="select ue.id_usuarios ,ue.idusuarios_estado , ue.descripcion ,ue.idestado , e.orden  from usuarios_estado ue, estado e where e.idestado = ue.idestado and ue.idusuarios_estado ='".$Columna->revisado."' order by ue.id_usuarios, e.orden ";
	$db->setQuery($SQL1);  
	$Rs2 = $db->loadObjectList();  
		$Nrx="";
		$Nrx = count($Rs2);
//************ fin busco el usuario
	//echo "dato: ".$Nrx;
	if ($Nrx > 0) { // imprimo los datos 
        	foreach($Rs1 as $Col1){
		echo $Col1->descripcion;					
            }
        }     
}			
?>
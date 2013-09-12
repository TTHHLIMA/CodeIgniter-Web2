<?
if ($xxxnivel=="1"){
	$SQL="";
	$SQL="select id_usuario , estado from usuario_estado order by estado ";	
	$db->setQuery($SQL);  
	$Rs1 = $db->loadObjectList();  
		$Nr="";
		$Nr = count($Rs1);
	if ($Nr > 0) { // imprimo los datos 
		echo "<select name='Cbo".$Columna->idpedido."' id='Cbo' style='width:100px;'>"; 
			echo "<option value=''></option>";
				foreach($Rs1 as $Col1){ 
					if ($Col1->id_usuario==$xxxiduser){
						echo "<option value='".$Col1->estado."' SELECTED>".$Col1->estado."</option>";
						
					} else { 
						echo "<option value='".$Col1->estado."'>".$Col1->estado."</option>";
					}
				}	
			echo "</select>";
	} else {
		echo "<select name='Cbo".$Columna->idpedido."' id='Cbo' style='width:100px;'>"; 
			echo "<option value=''></option>";
		echo "</select>";
	}
}				
?>
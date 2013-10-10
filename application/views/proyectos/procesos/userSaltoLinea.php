<?
if ($xxxnivel=="1"){
	/*$SQL="";
	$SQL="select ue.id_usuarios ,ue.idusuarios_estado , ue.descripcion ,ue.idestado , e.orden  from usuarios_estado ue, estado e where e.idestado = ue.idestado order by ue.id_usuarios, e.orden ";	
	$db->setQuery($SQL);  
	$Rs1 = $db->loadObjectList();  
		$Nr="";
		$Nr = count($Rs1);
          */
              $userSaltoLinea= $pm->procesos_model->consultar_user("1","");
	if ($userSaltoLinea != null) {
		echo "<select name='Cbo".$Columna->idpedido."1' id='Cbo".$Columna->idpedido."1' style='width:80px;'>"; 
			echo "<option value=''></option>";
				foreach($userSaltoLinea as $Col1){ 
					if ($Col1->idusuarios_estado==$Columna->salto_linea){
						echo "<option value='".$Col1->idusuarios_estado."' SELECTED>".$Col1->descripcion."</option>";
						
					} else { 
						echo "<option value='".$Col1->idusuarios_estado."'>".$Col1->descripcion."</option>";
					}
				}	
			echo "</select>";
	} else {
		echo "<select name='Cbo".$Columna->idpedido."1' id='Cbo' style='width:100px;'>"; 
			echo "<option value=''></option>";
		echo "</select>";
	}
					 
}

if ($xxxnivel=="2"){

 $xuserSaltoLinea= $pm->procesos_model->buscar_userSaltoLinea($xxxiduser,$Columna->idpedido);
// busco el usuario
/*
	$SQL1="";
	$SQL1="select * from pedido where realizadopor1 in (select idusuarios_estado from usuarios_estado where id_usuarios = '".$xxxiduser."' ) and  idpedido='".$Columna->idpedido."'";	
	$db->setQuery($SQL1);  
	$Rs2 = $db->loadObjectList();  
		$Nrx="";
		$Nrx = count($Rs2);
//************ fin busco el usuario
	//echo "dato: ".$Nrx;
 * 
 */
    
	if ($xuserSaltoLinea != null) {
		/*$SQL="";
		//$SQL="select id_usuario , estado from usuario_estado where estado like '".$xxxnombre."%' order by estado ";	
		$SQL="select ue.id_usuarios ,ue.idusuarios_estado , ue.descripcion ,ue.idestado , e.orden  from usuarios_estado ue, estado e where e.idestado = ue.idestado and ue.id_usuarios ='".$xxxiduser."' order by ue.id_usuarios, e.orden ";	
		$db->setQuery($SQL);  
		$Rs1 = $db->loadObjectList();  
			$Nr="";
			$Nr = count($Rs1);
                  */
                      $userSaltoLinea= $pm->procesos_model->consultar_user("2",$xxxiduser);
                 
		if ($userSaltoLinea != null) {
			echo "<select name='Cbo".$Columna->idpedido."1' id='Cbo".$Columna->idpedido."1' style='width:80px;'>";
				//echo "<option value=''></option>";
					foreach($userSaltoLinea as $Col1){
						if ($Col1->idusuarios_estado==$Columna->salto_linea){
							echo "<option value='".$Col1->idusuarios_estado."' SELECTED>".$Col1->descripcion."</option>";
						} else {
							echo "<option value='".$Col1->idusuarios_estado."'>".$Col1->descripcion."</option>";
						}
					}
			echo "</select>";
		} else {
			echo "<select name='Cbo".$Columna->idpedido."1' id='Cbo' style='width:100px;'>"; 
				echo "<option value=''></option>";
			echo "</select>";
		}

	} else {
		echo mostrarInicialEstado($Columna->salto_linea);
	}
}			
?>
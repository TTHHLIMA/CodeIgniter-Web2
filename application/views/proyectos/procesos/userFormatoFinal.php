<?
if ($xxxnivel=="1"){
$userFormatoFinal= $pm->procesos_model->consultar_user("1","");
	if ($userFormatoFinal != null) {
		echo "<select name='Cbo".$Columna->idpedido."6' id='Cbo".$Columna->idpedido."6' style='width:80px;'>"; 
			echo "<option value=''></option>";
				foreach($userFormatoFinal as $Col1){ 
					if ($Col1->idusuarios_estado==$Columna->formato_final){
						echo "<option value='".$Col1->idusuarios_estado."' SELECTED>".$Col1->descripcion."</option>";
						
					} else { 
						echo "<option value='".$Col1->idusuarios_estado."'>".$Col1->descripcion."</option>";
					}
				}	
			echo "</select>";
	} else {
		echo "<select name='Cbo".$Columna->idpedido."6' id='Cbo' style='width:100px;'>"; 
			echo "<option value=''></option>";
		echo "</select>";
	}

}	

if ($xxxnivel=="2"){
    
   // echo "prueba: " . $xxxiduser . " - " . $Columna->idpedido ;
$xuserFormatoFinal= $pm->procesos_model->buscar_userFormatoFinal($xxxiduser,$Columna->idpedido);
//var_dump($xuserFormatoFinal);
if ($xuserFormatoFinal != null) {
                $userFormatoFinal= $pm->procesos_model->consultar_user("2",$xxxiduser);
                if ($userFormatoFinal != null) {
			echo "<select name='Cbo".$Columna->idpedido."6' id='Cbo".$Columna->idpedido."6' style='width:80px;'>"; 
					foreach($userFormatoFinal as $Col1){
                                            echo "columna: " . $Columna->formato_final . " - " .$Col1->idusuarios_estado ;
						if ($Col1->idusuarios_estado==$Columna->formato_final){
							echo "<option value='".$Col1->idusuarios_estado."' SELECTED>".$Col1->descripcion."</option>";
						} else { 
							echo "<option value='".$Col1->idusuarios_estado."'>".$Col1->descripcion."</option>";
						}
					}	
				echo "</select>";
		} else {
			echo "<select name='Cbo".$Columna->idpedido."6' id='Cbo' style='width:100px;'>"; 
				echo "<option value=''></option>";
			echo "</select>";
		}

	} else {
		echo mostrarInicialEstado($Columna->formato_final);
	}
}
?>
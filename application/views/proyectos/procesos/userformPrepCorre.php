<?
// busco el usuario
	$MySql7="";
	$MySql7="select idpedido , realizadopor8 , observacion8 , proc_conf_correccion	from pedido where idpedido='".$Columna->idpedido."'";	
	$db->setQuery($MySql7);  
	$MyRs7 = $db->loadObjectList();  
		$MyNr7="";
		$MyNr7 = count($MyRs7);
//************ fin busco el usuario
	//echo "dato: ".$Nrx;
	if ($MyNr7 > 0) { // imprimo los datos 			
	
				 foreach($MyRs7 as $MyCol7){ 
						if ($xxxnivel=="1"){ // reviso el nivel administrativo y dejo k edite	
							$activo="";
							$colorFondo="#F78181";
						} else {
							if($Columna->user_correccion<>$xxxiduser) {  //verifico si pertenece a 
								//echo 'No se ha encontrado "adios" en la cadena';
								$activo="DISABLED";
								$colorFondo="#6E6E6E";
                                                                $Botondisable="1";
							  } else {
								$activo="";
								$colorFondo="#F78181";
                                                                $Botondisable="0";
							  }
						}
							
				?>
		<td style="background-color: <? echo $colorFondo;?>;">
			<div id="<? echo $Columna->idpedido; ?>7" style="display:none;  max-width: 150px;"> <!-- cada div lleva su propio formulario -->				
			<!-- nombre del fomulario 'P100011' -> idpedido + el contador para que no se repita + el numero de formulario  -->
			<form  class="well"  name="frm<? echo $Columna->idpedido.$cont; ?>7" method="POST" action="">
				<fieldset><h3>Correcci&oacute;n</h3>
                
                
					
					<?
                    
                    $textoBoton7="Informar";
                    if ($Botondisable=="1"){
                        $tipoBoton7=" btn btn-mini";
                        $tipoBoton7_G=" btn btn-mini";
                    } else {
                        $tipoBoton7="btn btn-danger btn-mini";
                        $tipoBoton7_G="btn btn-mini btn-primary";
                        if ($MyCol7->proc_conf_correccion=="S") {
                            $tipoBoton7="btn btn-success btn-mini";
                            $textoBoton7="Ya informado";								
                        }
                    }                                 

                    ?>                
                    
                    <p>
                    
                    <!-- donde se guarda el idpedido -->
					<input type="hidden" name="pedido" id="pedido" value="<? echo $Columna->idpedido; ?>"/>
                         <button <? echo $activo;?> 
                                 onclick="upd_userformPrepCorre('<? echo $Columna->idpedido; ?>');" 
                                 type="button" class="<? echo $tipoBoton7_G;?>">
                                  Guardar
                         </button>  
                         
                         <button <? echo $activo;?> onclick="agregar_reporte('<? echo $Columna->idpedido; ?>','7',this,this.id);" type="button" 
                         		 id="btnR<? echo $Columna->idpedido; ?>7" class="<? echo $tipoBoton7;?>">
                                 <i class="icon-envelope icon-white"></i> <? echo $textoBoton7?> 
                         </button>                                     
                    </p>					
					
					                
                
                
					<? include("userCorreccion.php");  ?>
					<textarea name="txtobservacion8" 
                                                  id ="txtobservacion8<? echo $Columna->idpedido; ?>" <?echo $activo;?> rows="6" class="span12" style="height: 362px;"><?echo $MyCol7->observacion8;?></textarea>
				</fieldset>
				<? } //cierro el while ?>				
			</form>
			</div>
		</td>			
<? } //fin de imprimo datos

?>			
<?
// busco el usuario
	/* $MySql5="";
	$MySql5="select idpedido , actualizaciontm, realizadopor4, horafinal1, traduccionfinal, cleanup, observacion3, proc_conf_traduccion_final from pedido where idpedido='".$Columna->idpedido."'";	
	$db->setQuery($MySql5);  
	$MyRs5 = $db->loadObjectList();  
		$MyNr5="";
		$MyNr5 = count($MyRs5);
//************ fin busco el usuario
	//echo "dato: ".$Nrx;
         * 
         */
$userformVerFinTrad = $pm->procesos_model->consultar_userformVerFinTrad($Columna->idpedido);
if ($userformVerFinTrad != null) {		
					foreach($userformVerFinTrad as $MyCol5){ 
						if ($xxxnivel=="1"){ // reviso el nivel administrativo y dejo k edite	
							$activo="";
							$colorFondo="#BE81F7";
						} else {
							if($Columna->user_traduccion_final<>$xxxiduser) {  //verifico si pertenece a 
								//echo 'No se ha encontrado "adios" en la cadena';
								$activo="DISABLED";
								$colorFondo="#6E6E6E";
                                                                $Botondisable="1";
							  } else {
								$activo="";
								$colorFondo="#BE81F7";
                                                                $Botondisable="0";
							  }
						}
							
				?>
			<td style="background-color: <? echo $colorFondo;?>;">	
				<div id="<? echo $Columna->idpedido; ?>5" style="display:none;  max-width: 180px;">				
			<!-- nombre del fomulario 'P100011' -> idpedido + el contador para que no se repita + el numero de formulario  -->
			<form  class="well"  name="frm<? echo $Columna->idpedido.$cont; ?>5" method="POST" action="">				
				<fieldset>
                                    <h3> Traduci&oacute;n Final</h3>
                
					
					<?
                    //$tipoBoton5="btn btn-danger";
                    $textoBoton5="Informar";
                    if ($Botondisable=="1"){
                        $tipoBoton5=" btn btn-mini";
                        $tipoBoton5_G=" btn btn-mini";
                    } else {
                        $tipoBoton5="btn btn-danger btn-mini";
                        $tipoBoton5_G="btn btn-mini btn-primary";
                        if ($MyCol5->proc_conf_traduccion_final=="S") {
                            $tipoBoton5="btn btn-success btn-mini";
                            $textoBoton5="Ya informado";								
                        }
                    }                    
                    
                    
                    ?>                
                    
                    <p>
                    
                    <!-- donde se guarda el idpedido -->
					<input type="hidden" name="pedido" id="pedido" value="<? echo $Columna->idpedido; ?>"/>
                         <button <? echo $activo;?> 
                                 onclick="upd_userformVerFinTrad('<? echo $Columna->idpedido; ?>');" 
                                 type="button" class="<? echo $tipoBoton5_G;?>">
                                  Guardar
                         </button> 
                         
                         <button <? echo $activo;?> onclick="agregar_reporte('<? echo $Columna->idpedido; ?>','5',this,this.id);" type="button" 
                         		 id="btnR<? echo $Columna->idpedido; ?>5" class="<? echo $tipoBoton5;?>">
                                 <i class="icon-envelope icon-white"></i> <? echo $textoBoton5?> 
                         </button>                                     
                    </p>					
					
					                          
                
                
					<? include("userTraduccionFinal.php");  ?>
						<?
						$Echeck1="";
						if ($MyCol5->actualizaciontm=="S") {
								$Echeck1="checked";
							}
						?>
					<label class="checkbox"><input name="Chkactualizaciontm"  
                                                        id="Chkactualizaciontm<? echo $Columna->idpedido; ?>" <?echo $activo;?>  type="checkbox" <?echo $Echeck1;?> >Actualizaci&oacute;n de TM (Coordinador)</label>  
					
					<!--<label>Hora</label><input name="mskhorafinal1"  <?echo $activo;?>  type="text" class="input-mini" value="<? echo $MyCol5->horafinal1; ?>">-->
						<?
						$Echeck2="";
						if ($MyCol5->traduccionfinal=="S") {
								$Echeck2="checked";
							}
						?>						
					<label class="checkbox"><input name="Chktraduccionfinal"  
                                                        id="Chktraduccionfinal<? echo $Columna->idpedido; ?>" <?echo $activo;?>  type="checkbox"  <?echo $Echeck2;?> >Traduci&oacute;n final TTX</label>  
						<?
						$Echeck3="";
						if ($MyCol5->cleanup=="S") {
								$Echeck3="checked";
							}
						?>	
					<label class="checkbox"><input name="ChkCleanUp"  
                                                        id="ChkCleanUp<? echo $Columna->idpedido; ?>" <?echo $activo;?>  type="checkbox"  <?echo $Echeck3;?> >Clean Up (Save target as)</label>
					
					
                                        <textarea name="txtobservacion3"  
                                                  id="txtobservacion3<? echo $Columna->idpedido; ?>" <?echo $activo;?>   rows="6" class="span12" style="height: 279px;"><? echo $MyCol5->observacion3; ?></textarea>

				</fieldset>
				<? } //cierro el while ?>
			</form>
			</div>
		</td>			
<? } //fin de imprimo datos

?>			
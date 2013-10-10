<?
// busco el usuario
/*	$MySql4="";
	$MySql4="select idpedido , realizadopor7 , Mskhora7, Chktraduccion, Chkarchivofinal, txtobservacion7 , proc_conf_traduccion	from pedido where idpedido='".$Columna->idpedido."'";	
	$db->setQuery($MySql4);  
	$MyRs4 = $db->loadObjectList();  
		$MyNr4="";
		$MyNr4 = count($MyRs4);
//************ fin busco el usuario
	//echo "dato: ".$Nrx;
 * 
 */
$userformPrepTrad = $pm->procesos_model->consultar_userformPrepTrad($Columna->idpedido);
if ($userformPrepTrad != null) {		
	
				 foreach($userformPrepTrad as $MyCol4){ 
						if ($xxxnivel=="1"){ // reviso el nivel administrativo y dejo k edite	
							$activo="";
							$colorFondo="#F2F5A9";
                                                        $Botondisable="0";
						} else {
							if($Columna->user_traduccion<>$xxxiduser) {  //verifico si pertenece a 
								//echo 'No se ha encontrado "adios" en la cadena';
								$activo="DISABLED";
								$colorFondo="#6E6E6E";
                                                                $Botondisable="1";
							  } else {
								$activo="";
								$colorFondo="#F2F5A9";
                                                                $Botondisable="0";
							  }
						}
							
				?>
		<td style="background-color: <? echo $colorFondo;?>;">
			<div id="<? echo $Columna->idpedido; ?>4" style="display:none; max-width: 150px;"> <!-- cada div lleva su propio formulario -->				
			<!-- nombre del fomulario 'P100011' -> idpedido + el contador para que no se repita + el numero de formulario  -->
			<form  class="well"  name="frm<? echo $Columna->idpedido.$cont; ?>4" method="POST" action="">
				<fieldset><h3>Traduci&oacute;n</h3>
					
					
					
					<?
                    //$tipoBoton4="btn btn-danger";
                    $textoBoton4="Informar";
                    if ($Botondisable=="1"){
                        $tipoBoton4=" btn btn-mini";
                        $tipoBoton4_G=" btn btn-mini";
                    } else {
                        $tipoBoton4="btn btn-danger btn-mini";
                        $tipoBoton4_G="btn btn-mini btn-primary";
                        if ($MyCol4->proc_conf_traduccion=="S") {
                            $tipoBoton4="btn btn-success btn-mini";
                            $textoBoton4="Ya informado";								
                        }
                    }                    
                                        

                    ?>                
                    
                    <p>
                    
                    <!-- donde se guarda el idpedido -->
					<input type="hidden" name="pedido" id="pedido" value="<? echo $Columna->idpedido; ?>"/>
                         <button <? echo $activo;?> 
                                 onclick="upd_userformPrepTrad('<? echo $Columna->idpedido; ?>');" 
                                 type="button" class="<? echo $tipoBoton4_G;?>">
                                  Guardar
                         </button>  
                         
                         <button <? echo $activo;?> onclick="agregar_reporte('<? echo $Columna->idpedido; ?>','4',this,this.id);" type="button" 
                         		 id="btnR<? echo $Columna->idpedido; ?>4" class="<? echo $tipoBoton4;?>">
                                 <i class="icon-envelope icon-white"></i> <? echo $textoBoton4?> 
                         </button>                                     
                    </p>					
					
					
										
					
					
					
					<? include("userTraduccion.php");  ?>
					<!--<label>Hora</label><input name="Mskhora7" <?echo $activo;?>  type="text" class="input-mini" value="<?echo $MyCol4->Mskhora7;?>">-->
						<?
						$Dcheck1="";
						if ($MyCol4->Chktraduccion=="S") {
								$Dcheck1="checked";
							}
						?>					
					<label class="checkbox"><input name="Chktraduccion" 
                                                        id="Chktraduccion<? echo $Columna->idpedido; ?>" <?echo $activo;?>  type="checkbox"  <?echo $Dcheck1;?> >Traduci&oacute;n</label>  
						<?
						$Dcheck2="";
						if ($MyCol4->Chkarchivofinal=="S") {
								$Dcheck2="checked";
							}
						?>				
					<label class="checkbox"><input name="Chkarchivofinal" 
                                                        id="Chkarchivofinal<? echo $Columna->idpedido; ?>" <?echo $activo;?>  type="checkbox" <?echo $Dcheck2;?> >Archivos final para traducci&oacute;n listo</label>
					<textarea name="txtobservacion7" 
                                                        id="txtobservacion7<? echo $Columna->idpedido; ?>" <?echo $activo;?> rows="6" class="span12" style="height: 320px;"><?echo $MyCol4->txtobservacion7;?></textarea>

				</fieldset>
				<? } //cierro el while ?>				
			</form>
			</div>
		</td>			
<? } //fin de imprimo datos

?>			
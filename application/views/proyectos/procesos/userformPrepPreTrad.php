<?
// busco el usuario
	$MySql3="";
	$MySql3="select idpedido , realizadopor3 , hora4 , analisistm , 1roexporteus99 as proexporteus99 , pretransl75 , traducir100,
					2doexporteus99 as sdoexporteus99,
					borrarunidadesnotraducibles,
					alfabetic,
					rtffortrans,
					crearttx,
					analisisfinal,
					preparacionter,
					observacion2,
					proc_conf_pre_traduccion
				from pedido where idpedido='".$Columna->idpedido."'";	
	$db->setQuery($MySql3);  
	$MyRs3 = $db->loadObjectList();  
		$MyNr3="";
		$MyNr3 = count($MyRs3);
//************ fin busco el usuario
	//echo "dato: ".$Nrx;
	if ($MyNr3 > 0) { // imprimo los datos 			
					foreach($MyRs3 as $MyCol3){ 
						if ($xxxnivel=="1"){ // reviso el nivel administrativo y dejo k edite	
							$activo="";
							$colorFondo="#58D3F7";
						} else {
							if($Columna->user_pre_traduccion<>$xxxiduser) {  //verifico si pertenece a 
								//echo 'No se ha encontrado "adios" en la cadena';
								$activo="DISABLED";
								$colorFondo="#6E6E6E";
                                                                $Botondisable="1";
							  } else {
								$activo="";
								$colorFondo="#58D3F7";
                                                                $Botondisable="0";
							  }
						}
							
				?>
			<td style="background-color: <? echo $colorFondo;?>;" class="sin_margen">
				<div id="<? echo $Columna->idpedido; ?>3" style="display:none;  max-width: 250px;">				
			<!-- nombre del fomulario 'P100011' -> idpedido + el contador para que no se repita + el numero de formulario  -->
			<form  class="well"  name="frm<? echo $Columna->idpedido.$cont; ?>3" method="POST" action="">				
				<fieldset><h3>Pre-Traduci&oacute;n</h3>
					
					
					
					
		<?
                    
                    
                    $textoBoton3="Informar";
                    if ($Botondisable=="1"){
                        $tipoBoton3=" btn btn-mini";
                        $tipoBoton3_G=" btn btn-mini";
                    } else {
                        $tipoBoton3="btn btn-danger btn-mini";
                        $tipoBoton3_G="btn btn-mini btn-primary";
                        if ($MyCol3->proc_conf_pre_traduccion=="S") {
                            $tipoBoton3="btn btn-success btn-mini";
                            $textoBoton3="Ya informado";								
                        }                        
                    }

                        
                        
                        
                        
                    ?>                
                    
                    <p>
                    <!-- donde se guarda el idpedido -->
			<input type="hidden" name="pedido" id="pedido" value="<? echo $Columna->idpedido; ?>"/>
                         <button <? echo $activo;?> 
                                 onclick="upd_userformPrepPreTrad('<? echo $Columna->idpedido; ?>');" 
                                 type="button" class="<? echo $tipoBoton3_G;?>">
                                  Guardar
                         </button>  
                         
                         <button <? echo $activo;?> onclick="agregar_reporte('<? echo $Columna->idpedido; ?>','3',this,this.id);" type="button" 
                         		 id="btnR<? echo $Columna->idpedido; ?>3" class="<? echo $tipoBoton3;?>">
                                 <i class="icon-envelope icon-white"></i> <? echo $textoBoton3?> 
                         </button>                                     
                    </p>					
					
					
					
					
					
					<? include("userPreTraduccion.php");  ?>
					<!--<label>Hora</label><input name="Mskhora4"  <?echo $activo;?> type="text" class="input-mini" value="<?echo $MyCol3->hora4;?>">-->
						<?
						$Ccheck1="";
						if ($MyCol3->analisistm=="S") {
								$Ccheck1="checked";
							}
						?>						
					<label class="checkbox"><input name="Chkanalisistm" 
                                                            id="Chkanalisistm<? echo $Columna->idpedido; ?>"  <?echo $activo;?> type="checkbox" <?echo $Ccheck1;?> >1er analisis TTX1 con TM cliente</label>  
						<?
						$Ccheck2="";
						if ($MyCol3->proexporteus99=="S") {
								$Ccheck2="checked";
							}
						?>
					<label class="checkbox"><input name="Chk1roexporteus99"  
                                                        id="Chk1roexporteus99<? echo $Columna->idpedido; ?>"  <?echo $activo;?> type="checkbox" <?echo $Ccheck2;?> >1er Export EUS99 + crear TTX2</label>
					
						<?
						$Ccheck3="";
						if ($MyCol3->pretransl75=="S") {
								$Ccheck3="checked";
							}
						?>
					<label class="checkbox"><input name="Chkpretransl75"  
                                                        id="Chkpretransl75<? echo $Columna->idpedido; ?>" <?echo $activo;?> type="checkbox" <?echo $Ccheck3;?> >Pretrans 75% Autom&aacute;t. de TTX2</label>
						<?
						$Ccheck4="";
						if ($MyCol3->traducir100=="S") {
								$Ccheck4="checked";
							}
						?>
					<label class="checkbox"><input name="Chktraducir100"  
                                                        id="Chktraducir100<? echo $Columna->idpedido; ?>" <?echo $activo;?> type="checkbox" <?echo $Ccheck4;?> >Traducir al 100% el TTX2</label>  
					
						<?
						$Ccheck5="";
						if ($MyCol3->sdoexporteus99=="S") {
								$Ccheck5="checked";
							}
						?>
					<label class="checkbox"><input name="Chk2doexporteus99"  
                                                        id="Chk2doexporteus99<? echo $Columna->idpedido; ?>" <?echo $activo;?> type="checkbox" <?echo $Ccheck5;?> >2do. an&oacute;lisis + Export EUS99 de TTX2</label>
						<?
						$Ccheck6="";
						if ($MyCol3->borrarunidadesnotraducibles=="S") {
								$Ccheck6="checked";
							}
						?>
					<label class="checkbox"><input name="Chkborrarunidadesnotraducibles"  
                                                        id="Chkborrarunidadesnotraducibles<? echo $Columna->idpedido; ?>" <?echo $activo;?> type="checkbox" <?echo $Ccheck6;?> >Borrar textos no traducibles en RTF</label>
						<?
						$Ccheck7="";
						if ($MyCol3->alfabetic=="S") {
								$Ccheck7="checked";
							}
						?>
					<label class="checkbox"><input name="Chkalfabetic"  
                                                        id="Chkalfabetic<? echo $Columna->idpedido; ?>" <?echo $activo;?> type="checkbox" <?echo $Ccheck7;?> >Borrar repeticiones con "Alfabetic"</label>
					
						<?
						$Ccheck8="";
						if ($MyCol3->rtffortrans=="S") {
								$Ccheck8="checked";
							}
						?>
					<label class="checkbox"><input name="Chkrtffortrans"  
                                                        id="Chkrtffortrans<? echo $Columna->idpedido; ?>" <?echo $activo;?> type="checkbox" <?echo $Ccheck8;?> >Generar RTF "for_trans"</label>
						<?
						$Ccheck9="";
						if ($MyCol3->crearttx=="S") {
								$Ccheck9="checked";
							}
						?>
					<label class="checkbox"><input name="Chkcrearttx"  
                                                        id="Chkcrearttx<? echo $Columna->idpedido; ?>" <?echo $activo;?> type="checkbox" <?echo $Ccheck9;?> >Crear TTX "for_trans"</label>
						<?
						$Ccheck10="";
						if ($MyCol3->analisisfinal=="S") {
								$Ccheck10="checked";
							}
						?>
					<label class="checkbox"><input name="Chkanalisisfinal"  
                                                        id="Chkanalisisfinal<? echo $Columna->idpedido; ?>" <?echo $activo;?> type="checkbox" <?echo $Ccheck10;?> >Analisis final</label>
					
						<?
						$Ccheck11="";
						if ($MyCol3->preparacionter=="S") {
								$Ccheck11="checked";
							}
						?>
					<label class="checkbox"><input name="Chkpreparacionter"  
                                                        id="Chkpreparacionter<? echo $Columna->idpedido; ?>" <?echo $activo;?> type="checkbox" <?echo $Ccheck11;?> >Preparacion terminologia</label>
					
					<textarea name="txtobservacion2"  
                                                        id="txtobservacion2<? echo $Columna->idpedido; ?>" <?echo $activo;?> rows="6" class="span12"><?echo $MyCol3->observacion2;?></textarea>

				</fieldset>
				<? } //cierro el while ?>				
			</form>
			</div>
		</td>			
<? } //fin de imprimo datos

?>			
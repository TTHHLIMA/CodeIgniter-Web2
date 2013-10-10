<?
// busco el usuario
/*	$MySql6="";
	$MySql6="select idpedido , 
	realizadopor5, 
	horafinal2,
	formatofinal,
	cambiaridioma,
	actualizarindice1,
	pocisionamiento,
	estiloletra,
	mayusculaminuscula,
	numerodecimales,
	codigosfinal,
	actualizarindice2,
	verificarmayusmin,
	observacion4,
	proc_conf_formato_final
	from pedido where idpedido='".$Columna->idpedido."'";	
	$db->setQuery($MySql6);  
	$MyRs6 = $db->loadObjectList();  
		$MyNr6="";
		$MyNr6 = count($MyRs6);
//************ fin busco el usuario
	//echo "dato: ".$Nrx;
 * 
 */
$userformVerFinFormFin = $pm->procesos_model->consultar_userformVerFinFormFin($Columna->idpedido);
if ($userformVerFinFormFin != null) {		
					foreach($userformVerFinFormFin as $MyCol6){ 
						if ($xxxnivel=="1"){ // reviso el nivel administrativo y dejo k edite	
							$activo="";
							$colorFondo="#3ADF00";
						} else {
							if($Columna->user_formato_final<>$xxxiduser) {  //verifico si pertenece a 
								//echo 'No se ha encontrado "adios" en la cadena';
								$activo="DISABLED";
								$colorFondo="#6E6E6E";
                                                                $Botondisable="1";
							  } else {
								$activo="";
								$colorFondo="#3ADF00";
                                                                $Botondisable="0";
							  }
						}
							
				?>
			<td style="background-color: <? echo $colorFondo;?>;">	
				<div id="<? echo $Columna->idpedido; ?>6" style="display:none; max-width: 200px; ">				
			<!-- nombre del fomulario 'P100011' -> idpedido + el contador para que no se repita + el numero de formulario  -->
                        <form  class="well"  name="frm<? echo $Columna->idpedido.$cont; ?>6" method="POST" action="" >				
				<fieldset><h3>Formato Final</h3>
                
					
					<?
                    //$tipoBoton6="btn btn-danger";
                    $textoBoton6="Informar";
                    if ($Botondisable=="1"){
                        $tipoBoton6=" btn btn-mini";
                        $tipoBoton6_G=" btn btn-mini";
                    } else {
                        $tipoBoton6="btn btn-danger btn-mini";
                        $tipoBoton6_G="btn btn-mini btn-primary";
                        if ($MyCol6->proc_conf_formato_final=="S") {
                            $tipoBoton6="btn btn-success btn-mini";
                            $textoBoton6="Ya informado";								
                        }
                    }                    
                    

                    ?>                

                    <p>
                    
                    <!-- donde se guarda el idpedido -->
					<input type="hidden" name="pedido" id="pedido" value="<? echo $Columna->idpedido; ?>"/>
                         <button <? echo $activo;?> 
                                 onclick="upd_userformVerFinFormFin('<? echo $Columna->idpedido; ?>');" 
                                 type="button" class="<? echo $tipoBoton6_G;?>">
                                  Guardar
                         </button> 
                         
                         <button <? echo $activo;?> onclick="agregar_reporte('<? echo $Columna->idpedido; ?>','6',this,this.id);" type="button" 
                         		 id="btnR<? echo $Columna->idpedido; ?>6" class="<? echo $tipoBoton6;?>">
                                 <i class="icon-envelope icon-white"></i> <? echo $textoBoton6?> 
                         </button>                                     
                    </p>					
					                
                
					<? include("userFormatoFinal.php");  ?>
					<!--<label>Hora</label>
					<input name="mskhorafinal2"  <?echo $activo;?>  type="text" class="input-mini" value="<?echo $MyCol6->horafinal2; ?>">-->
						<?
						$Fcheck1="";
						if ($MyCol6->formatofinal=="S") {
								$Fcheck1="checked";
							}
						?>
					<label class="checkbox"><input name="Chkformatofinal" 
                                                        id="Chkformatofinal<? echo $Columna->idpedido; ?>" <?echo $activo;?>  type="checkbox" <?echo $Fcheck1;?> >Poner en paralelo (vista P, chequeo general rapido)</label>  
						<?
						$Fcheck2="";
						if ($MyCol6->cambiaridioma=="S") {
								$Fcheck2="checked";
							}
						?>
					<label class="checkbox"><input name="chkcambiaridioma" 
                                                        id="chkcambiaridioma<? echo $Columna->idpedido; ?>" <?echo $activo;?>  type="checkbox" <?echo $Fcheck2;?> >Cambiar el idioma</label>
						<?
						$Fcheck3="";
						if ($MyCol6->actualizarindice1=="S") {
								$Fcheck3="checked";
							}
						?>
					<label class="checkbox"><input name="chkactualizarindice1" 
                                                        id="chkactualizarindice1<? echo $Columna->idpedido; ?>" <?echo $activo;?>  type="checkbox" <?echo $Fcheck3;?> >Actualizar indice 1</label>
						<?
						$Fcheck4="";
						if ($MyCol6->pocisionamiento=="S") {
								$Fcheck4="checked";
							}
						?>
					<label class="checkbox"><input name="chkpocisionamiento" 
                                                        id="chkpocisionamiento<? echo $Columna->idpedido; ?>" <?echo $activo;?>  type="checkbox" <?echo $Fcheck4;?> >Posicionamiento</label>
						<?
						$Fcheck5="";
						if ($MyCol6->estiloletra=="S") {
								$Fcheck5="checked";
							}
						?>
					<label class="checkbox"><input name="chkestiloletra" 
                                                        id="chkestiloletra<? echo $Columna->idpedido; ?>" <?echo $activo;?>  type="checkbox" <?echo $Fcheck5;?> >Estilos de letras</label>					
						<?
						$Fcheck6="";
						if ($MyCol6->mayusculaminuscula=="S") {
								$Fcheck6="checked";
							}
						?>
					<label class="checkbox"><input name="chkmayusculaminuscula" 
                                                        id="chkmayusculaminuscula<? echo $Columna->idpedido; ?>" <?echo $activo;?>  type="checkbox" <?echo $Fcheck6;?> >Mayus-/ Minusculas</label>
						<?
						$Fcheck7="";
						if ($MyCol6->numerodecimales=="S") {
								$Fcheck7="checked";
							}
						?>
					<label class="checkbox"><input name="chknumerodecimales" 
                                                        id="chknumerodecimales<? echo $Columna->idpedido; ?>" <?echo $activo;?>  type="checkbox" <?echo $Fcheck7;?> >Numeros, Decimales</label>
						<?
						$Fcheck8="";
						if ($MyCol6->codigosfinal=="S") {
								$Fcheck8="checked";
							}
						?>
					<label class="checkbox"><input name="chkcodigosfinal" 
                                                        id="chkcodigosfinal<? echo $Columna->idpedido; ?>" <?echo $activo;?>  type="checkbox" <?echo $Fcheck8;?> >C&oacute;digos</label>
						<?
						$Fcheck9="";
						if ($MyCol6->actualizarindice2=="S") {
								$Fcheck9="checked";
							}
						?>
					<label class="checkbox"><input name="chkactualizarindice2" 
                                                        id="chkactualizarindice2<? echo $Columna->idpedido; ?>" <?echo $activo;?>  type="checkbox" <?echo $Fcheck9;?> >Actualizar indice 2</label>
						<?
						$Fcheck10="";
						if ($MyCol6->verificarmayusmin=="S") {
								$Fcheck10="checked";
							}
						?>
					<label class="checkbox"><input name="Chkverificarmayusmin" 
                                                        id="Chkverificarmayusmin<? echo $Columna->idpedido; ?>" <?echo $activo;?>  type="checkbox" <?echo $Fcheck10;?> >Puntuaci&oacute;n final de oraci&oacute;n</label>					
					<textarea  name="txtobservacion4" 
                                                   id="txtobservacion4<? echo $Columna->idpedido; ?>" <?echo $activo;?>   rows="6" class="span12" style="height: 135px;"><?echo $MyCol6->observacion4; ?></textarea>
				</fieldset>
				<? } //cierro el while ?>
			</form>
			</div>
		</td>			
<? } //fin de imprimo datos

?>			
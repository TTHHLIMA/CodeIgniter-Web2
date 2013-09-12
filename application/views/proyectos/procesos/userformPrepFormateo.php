<?
// busco el usuario
	$MySql2="";
	$MySql2="select idpedido , realizadopor2 , hora2 , editacionformateo , ttx1 , realizadopor6 , hora3,  editaciontextofoto, observacion1, proc_conf_formateo
				from pedido where idpedido='".$Columna->idpedido."'";	
	$db->setQuery($MySql2);  
	$MyRs2 = $db->loadObjectList();  
		$MyNr2="";
		$MyNr2 = count($MyRs2);
//************ fin busco el usuario
	//echo "dato: ".$Nrx;
	if ($MyNr2 > 0) { // imprimo los datos 			
				foreach($MyRs2 as $MyCol2){ 
						if ($xxxnivel=="1"){ // reviso el nivel administrativo y dejo k edite	
							$activo="";
							$colorFondo="#FFCC80";
						} else {
							if($Columna->user_formateo<>$xxxiduser) {  //verifico si pertenece a 
								//echo 'No se ha encontrado "adios" en la cadena';
								$activo="DISABLED";
								$colorFondo="#6E6E6E";
                                                                $Botondisable="1";
							  } else {
								$activo="";
								$colorFondo="#FFCC80";
                                                                $Botondisable="0";
							  }
						}
							
				?>
			<td style="background-color: <? echo $colorFondo;?>;">										
				<div id="<? echo $Columna->idpedido; ?>2" style="display:none;  max-width: 150px;">				
			<!-- nombre del fomulario 'P100011' -> idpedido + el contador para que no se repita + el numero de formulario  -->
			<form  class="well"  name="frm<? echo $Columna->idpedido.$cont; ?>2" method="POST" action="">				
				<fieldset><h3>Formateo</h3>
                
                
					<?
                    //$tipoBoton2="btn btn-danger";
                    $textoBoton2="Informar";
                    if ($Botondisable=="1"){
                        $tipoBoton2=" btn btn-mini";
                        $tipoBoton2_G=" btn btn-mini";
                    } else {
                        $tipoBoton2="btn btn-danger btn-mini";
                        $tipoBoton2_G="btn btn-mini btn-primary";
                        if ($MyCol2->proc_conf_formateo=="S") {
                            $tipoBoton2="btn btn-success btn-mini";
                            $textoBoton2="Ya informado";								
                        }
                    }                    
                    

                    ?>                
                    
                  
                    <!-- donde se guarda el idpedido -->
			<input type="hidden" name="pedido" id="pedido" value="<? echo $Columna->idpedido; ?>"/>
                         <button <? echo $activo;?> 
                                 onclick="upd_userformPrepFormateo('<? echo $Columna->idpedido; ?>');" 
                                 type="button" class="<? echo $tipoBoton2_G;?>">
                                  Guardar
                         </button>  
                         
                         <button <? echo $activo;?> onclick="agregar_reporte('<? echo $Columna->idpedido; ?>','2',this,this.id);" type="button" 
                         		 id="btnR<? echo $Columna->idpedido; ?>2" class="<? echo $tipoBoton2;?>">
                                 <i class="icon-envelope icon-white"></i> <? echo $textoBoton2?> 
                         </button>                                     
                    </p>
					
					<? include("userFormateo.php");  ?>
					<!--<label>Hora</label><input name="Mskhora2"  <?echo $activo;?>  type="text" class="input-mini"  value="<?echo $MyCol2->hora2;?>">-->
					<? 
					$Bcheck1="";
					if ($MyCol2->editacionformateo=="S") {
							$Bcheck1="checked";
						}
					?>
					<label class="checkbox">
					<input name="Chkeditacionformateo" 
                                                id="Chkeditacionformateo<? echo $Columna->idpedido; ?>" <? echo $activo;?> type="checkbox"  <? echo $Bcheck1;?> >Formato</label>  
					<?
					$Bcheck2="";
					if ($MyCol2->ttx1=="S") {
							$Bcheck2="checked";
						}
					?>
					<label class="checkbox">
					<input name="Chkttx1" 
                                                id="Chkttx1<? echo $Columna->idpedido; ?>" <? echo $activo;?> type="checkbox"  <? echo $Bcheck2;?> >Crear TTX1</label>

					<fieldset>
                                            <h3>Editar fotos</h3>
						<label>Realizado por</label>
						<? // include("userFormateo.php"); 
								$SQLr="";
								$SQLr="select ue.id_usuarios ,ue.idusuarios_estado , ue.descripcion ,ue.idestado , e.orden  from usuarios_estado ue, estado e where e.idestado = ue.idestado order by ue.id_usuarios, e.orden ";	
								$db->setQuery($SQLr);  
								$Rsr = $db->loadObjectList();  
									$Nro="";
									$Nro = count($Rsr);
								if ($Nro > 0) { // imprimo los datos 
									echo "<select ".$activo." name='Cborealizadopor6".$Columna->idpedido."' id='Cborealizadopor6".$Columna->idpedido."' style='width:100px;'>"; 
										echo "<option value=''></option>";
										foreach($Rsr as $Colr){ 
											if ($Colr->idusuarios_estado==$Columna->realizadopor6){
												echo "<option value='".$Colr->idusuarios_estado."' SELECTED>".$Colr->descripcion."</option>";
												
											} else { 
												echo "<option value='".$Colr->idusuarios_estado."'>".$Colr->descripcion."</option>";
											}
										}	
									echo "</select>";
								}
						?>
						
						
						
						
						<!--<label>Hora</label>
						<input type="text" class="input-mini" name="Mskhora3"  <?echo $activo;?> value="<?echo $MyCol2->hora3;?>">-->
						<?
						$Bcheck3="";
						if ($MyCol2->editaciontextofoto=="S") {
								$Bcheck3="checked";
							}
						?>						
						<label class="checkbox">
						<input name="Chkeditaciontextofoto" 
                                                       id="Chkeditaciontextofoto<? echo $Columna->idpedido; ?>" type="checkbox" <?echo $activo;?> <?echo $Bcheck3;?> >Editaci&oacute;n de text-foto</label>
					
					</fieldset>
					<textarea name="txtobservacion1" 
                                                        id="txtobservacion1<? echo $Columna->idpedido; ?>" <?echo $activo;?> rows="6" class="span12" style="height: 190px;"><?echo $MyCol2->observacion1;?></textarea>
					
                    
                
                    
 
                    
                         
                      
				</fieldset>
				<? } //cierro el while ?>
				</form>
				</div>
			</td>			
<? } //fin de imprimo datos

?>			
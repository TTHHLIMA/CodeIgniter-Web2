<?
//echo $Columna->idpedido;

// busco el usuario
	$MySql1="";
	$MySql1="select idpedido , realizadopor1 , hora1 , PDFGlobal , saltolinea , chekearttx , observacion5 , proc_conf_salto_linea
				from pedido where idpedido='".$Columna->idpedido."'";	
	$db->setQuery($MySql1);  
	$MyRs1 = $db->loadObjectList();  
		$MyNr1="";
		$MyNr1 = count($MyRs1);
//************ fin busco el usuario
          //      echo $MySql1;
	//echo "dato: ".$MyNr1;
	if ($MyNr1 > 0) { // imprimo los datos 			
				foreach($MyRs1 as $MyCol1){ 
						if ($xxxnivel=="1"){ // reviso el nivel administrativo y dejo k edite	
							$activo="";
							$colorFondo="#F8E6E0";
						} else {
							//echo $Columna->user_salto_linea." - ".$xxxiduser."<br>";
                                                        if($Columna->user_salto_linea<>$xxxiduser) {  //verifico si pertenece a 
								//echo 'No se ha encontrado "adios" en la cadena';
								$activo="DISABLED";
								$colorFondo="#6E6E6E";
                                                                $Botondisable="1";
							  } else {
								$activo="";
								$colorFondo="#F8E6E0";
                                                                $Botondisable="0";
							  }
                                                          //echo $activo;
						}
							
				?>
		<td style="background-color: <? echo $colorFondo;?>;">
			<div id="<? echo $Columna->idpedido; ?>1" style="display:none;  max-width: 150px;"> <!-- cada div lleva su propio formulario -->				
			<!-- nombre del fomulario 'P100011' -> idpedido + el contador para que no se repita + el numero de formulario  -->
			<form class="well" name="frm<? echo $Columna->idpedido.$cont; ?>1" method="POST" action="">
					<fieldset>
                    <h3>Salto de Linea</h3>
                    
                    
                    	
                                                 
                       
                    
						
                                        
                                        

		    <?
                   // $tipoBoton1="btn btn-danger";
                    $textoBoton1="Informar";
                    if ($Botondisable=="1"){
                        $tipoBoton1=" btn btn-mini";
                        $tipoBoton1_G=" btn btn-mini";
                    } else {
                        $tipoBoton1="btn btn-danger btn-mini";
                        $tipoBoton1_G="btn btn-mini btn-primary";
                        if ($MyCol1->proc_conf_salto_linea=="S") {
                            $tipoBoton1="btn btn-success btn-mini";
                            $textoBoton1="Ya informado";								
                        }                        
                    }                    
                                        

                    ?>                
                    
                    <p>
                    <!-- donde se guarda el idpedido -->
			<input type="hidden" name="pedido" id="pedido" value="<? echo $Columna->idpedido; ?>"/>
                         <button <? echo $activo;?> 
                                 onclick="upd_userformPrepSalto('<? echo $Columna->idpedido; ?>');" 
                                 type="button" class="<? echo $tipoBoton1_G;?>">
                                  Guardar
                         </button>                                     
                         
                         <button <? echo $activo;?> onclick="agregar_reporte('<? echo $Columna->idpedido; ?>','1',this , this.id);" type="button" 
                         		 id="btnR<? echo $Columna->idpedido; ?>1" class="<? echo $tipoBoton1;?>">
                                 <i class="icon-envelope icon-white"></i> <? echo $textoBoton1?> 
                         </button>                                     
                    </p>                                        
                                        
           
                                        
                                        
                                        
                                        <? include("userSaltoLinea.php");  ?>
						<!--<label>Hora</label>
						<input <?echo $activo;?> type="text" class="input-mini" name="Mskhora1" value="<?echo $MyCol1->hora1;?>">-->
						
						<?
						$Acheck1="";
						if ($MyCol1->PDFGlobal=="S") {
								$Acheck1="checked";
							}
						?>
						<label class="checkbox">
                                                    <input <? echo $activo;?> type="checkbox" name='ChkPDFGlobal' 
                                                                              id="ChkPDFGlobal<? echo $Columna->idpedido; ?>" <? echo $Acheck1;?> >PDF Global</label> 
						
						<?
						$Acheck2="";
						if ($MyCol1->saltolinea=="S") {
								$Acheck2="checked";
							}
						?>						
						<label class="checkbox">
						<input <? echo $activo;?> type="checkbox"  name="Chksaltolinea" 
                                                                            id="Chksaltolinea<? echo $Columna->idpedido; ?>"  <? echo $Acheck2;?> >Salto de linea</label>
						
						<?
						$Acheck3="";
						if ($MyCol1->chekearttx=="S") {
								$Acheck3="checked";
							}
						?>						
						<label class="checkbox">
						<input <? echo $activo;?> type="checkbox"  name="Chkchekearttx" 
                                                                    id="Chkchekearttx<? echo $Columna->idpedido; ?>" <? echo $Acheck3;?> >Chequear con ttx</label>
						
                                                                  
						<textarea <?echo $activo;?> rows="9" name="txtobservacion5" 
                                                                                id="txtobservacion5<? echo $Columna->idpedido; ?>"  class="span12" style="height: 315px"><?echo $MyCol1->observacion5;?></textarea>
                                               
                        
						<!-- fin idpedido-->
					</fieldset>
				<? } ?>	
			</form>
			</div>
		</td>			
<? } //fin de imprimo datos

?>
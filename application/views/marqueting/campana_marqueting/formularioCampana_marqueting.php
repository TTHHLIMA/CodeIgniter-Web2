<?PHP
if ($campana != null) {

    foreach ($campana as $row) {
        $xcodigo = $row->id_mar;
        $tipo_a  = $row->tipo_a;
        $tipo_b = $row->tipo_b;
        $responsable = $row->responsable;
        $coordinador = $row->coordinador;
        $fecha_inicio = fecha_calendario($row->fecha_inicio);
        $fecha_final = fecha_calendario($row->fecha_final);
        $feria = $row->feria;
        $pais = $row->xpais;
        $con_contacto = $row->con_contacto;
        $sin_contacto = $row->sin_contacto;
        $oem = $row->oem;
        $masch = $row->masch;
         
    }
} else {
    $xcodigo = "";
        $tipo_a  = "";
        $tipo_b = "";
        $responsable = "";
        $coordinador = "";
        $fecha_inicio = "";
        $fecha_final = "";
        $feria = "";
        $pais = "";
        $con_contacto = "";
        $sin_contacto = "";
        $oem = "";
        $masch = "";    
}
?>
<table width="900" border="0" cellpadding="0" cellspacing="0">
    <tr>
        <td valign="bottom"><table border="0" align="left" cellpadding="0" cellspacing="0">
                <tr>
                    <td  valign="middle"><table width="100%">
                            <tr>
                                <td width="130px">

                                    <div class="btn-group">
                                        <a class="btn" id="btnPrimero"
                                           href="#"
                                           data-toggle="modal"
                                           ><i class="icon-fast-backward"></i></a>  
                                        <a class="btn" id="btnAnterior"
                                           href="#"
                                           data-toggle="modal" 
                                           ><i class="icon-backward"></i></a>
                                        <a class="btn" id="btnSiguiente"
                                           href="#"
                                           data-toggle="modal"
                                           ><i class="icon-forward"></i></a>
                                        <a class="btn" id="btnUltimo"
                                           href="#"
                                           data-toggle="modal"
                                           ><i class="icon-fast-forward"></i></a>
                                    </div>

                                </td>
                                <td width="80">
                                    <div class="etiquetaCount">
                                        Total : <b><?= $countCampana; ?></b>
                                    </div></td>


                            </tr>
                        </table>
                    </td>
                    <td align="left" valign="middle">&nbsp;Codigo:&nbsp;</td>
                  <td align="left" valign="middle"><input type="text" name="txtcodigo" id="txtcodigo"  value="<?= $xcodigo; ?>"  readonly  style="width:50px; margin-top:7px;"></td>
                  <td width="10" align="left" valign="middle">&nbsp;</td>
                    <td align="left" valign="middle">&nbsp;Tipo:&nbsp;</td>
                    <td align="left" valign="middle"><table border="0">
                      <tr>
                        <td>
                            <?php if ($tipo_a=="1"){ 
                                echo "<input type='radio' name='tipo_a' id='tipo_a'  checked='checked'/>";
                            } else {
                                echo "<input type='radio' name='tipo_a' id='tipo_a'  />";
                            }
                            ?>
                            </td>
                        <td>Telefonmarketing</td>
                        <td>
                            <?php if ($tipo_b=="1"){ 
                                echo "<input type='radio' name='tipo_b' id='tipo_b' checked='checked'/>";
                            } else {
                                echo "<input type='radio' name='tipo_b' id='tipo_b'  />";
                            }
                            ?>
                            </td>
                        <td>Massenbriefe</td>
                      </tr>
                    </table></td>
                    <td align="left" valign="middle">&nbsp;</td>
                    <td align="left" valign="middle"></td>                   
                </tr>

      </table></td>
    </tr>
    <tr>
      <td><table width="100%" border="0" cellpadding="0" cellspacing="0">
        <tr>
          <td width="400" align="left" valign="top"><table width="400" border="0" cellpadding="0" cellspacing="0">
            <tr>
              <td width="120">&nbsp;Fecha Comienzo:&nbsp;</td>
              <td width="100"><input type="text" name="fecha_inicio" id="fecha_inicio"  value="<?php echo $fecha_inicio; ?>"  readonly="readonly"  style="width:70px; margin-top:2px;" /></td>
              <td width="90">&nbsp;Fecha Final:&nbsp;</td>
              <td width="100"><input type="text" name="fecha_final" id="fecha_final"  value="<?php echo $fecha_final; ?>"  readonly="readonly"  style="width:70px; margin-top:2px;" /></td>
            </tr>
            <tr>
              <td width="120">&nbsp;Responsable</td>
              <td colspan="3"><input type="text" name="responsable" id="responsable"  value="<?php echo $responsable; ?>"  readonly="readonly"  style="width:170px; margin-top:0px;" /></td>
            </tr>
            <tr>
              <td width="120">&nbsp;Coordinador</td>
              <td colspan="3"><input type="text" name="coordinador" id="coordinador"  value="<?php echo $coordinador; ?>"  readonly="readonly"  style="width:170px; margin-top:0px;" /></td>
            </tr>
          </table></td>
          <td align="left" valign="top" bgcolor="#EAEAEA"><table width="500" border="0" cellpadding="0" cellspacing="0">
            <tr>
              <td colspan="3">&nbsp;Configuración de Compañia</td>
              </tr>
            <tr>
              <td width="60">&nbsp;Ferias:</td>
              <td width="140" align="left" valign="bottom"><input type="text" name="feria" id="feria"  value="<?php echo $feria; ?>"  readonly="readonly"  style="width:220px; margin-top:2px;" /></td>
              <td width="300" rowspan="2" align="left" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0">
                <tr>
                  <td width="10">&nbsp;</td>
                  <td>&nbsp;Analisis A-B-C:&nbsp; </td>
                </tr>
                <tr>
                  <td>&nbsp;</td>
                  <td><textarea name="txtFechaInicial2" rows="2" readonly="readonly" id="txtFechaInicial2" style="width:200px; margin-top:2px;"></textarea></td>
                </tr>
              </table></td>
            </tr>
            <tr>
              <td>&nbsp;Pais</td>
              <td align="left" valign="bottom"><input type="text" name="pais" id="pais"  value="<?php echo $pais; ?>"  readonly="readonly"  style="width:220px; margin-top:2px;" /></td>
              </tr>
            <tr>
              <td colspan="3"><table border="0" cellpadding="0" cellspacing="0">
                <tr>
                  <td width="30" align="center" valign="top">
                       <?php if ($con_contacto=="1"){ 
                                echo "<input type='checkbox' name='con_contacto' id='con_contacto' checked='checked'/>";
                            } else {
                                echo "<input type='checkbox' name='con_contacto' id='con_contacto'  />";
                            }
                            ?>
                  </td>
                  <td>Con Contactos</td>
                  <td width="30" align="center" valign="top">
                     
                       <?php if ($sin_contacto=="1"){ 
                                echo "<input type='checkbox' name='sin_contacto' id='sin_contacto' checked='checked'/>";
                            } else {
                                echo "<input type='checkbox' name='sin_contacto' id='sin_contacto'  />";
                            }
                            ?>
                  </td>
                  <td>Sin Contactos</td>
                
                  <td width="30" align="center" valign="top">
                     
                       <?php if ($oem=="1"){ 
                                echo "<input type='checkbox' name='oem' id='oem' checked='checked'/>";
                            } else {
                                echo "<input type='checkbox' name='oem' id='oem'  />";
                            }
                            ?> 
                  </td>
                  <td>&nbsp;OEM</td>
                  <td width="30" align="center" valign="top">
                          
                                            <?php if ($masch=="1"){ 
                                echo "<input type='checkbox' name='masch' id='masch' checked='checked'/>";
                            } else {
                                echo "<input type='checkbox' name='masch' id='masch'  />";
                            }
                            ?> 
                  </td>
                  <td>Masch/Anlagebau</td>
                </tr>
              </table></td>
              </tr>
          </table></td>
        </tr>
      </table></td>
    </tr>
    <tr><td height="10"></td></tr>
    <tr>
        <td>
<div id="paneltareas" style="background-color:#FFC" >
  


</div>

        </td>
    </tr>
</table>
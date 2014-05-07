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
        $fecha_llamada_inicio = fecha_calendario($row->fecha_llamada_inicio);
        $fecha_llamada_final = fecha_calendario($row->fecha_llamada_final);         
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
        $fecha_llamada_inicio = "";
        $fecha_llamada_final = "";          
}
?>
<table width="730" border="0" cellpadding="0" cellspacing="0">
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
      <td width="310"><table border="0" cellpadding="0" cellspacing="0">
        <tr>
          <td width="310" align="left" valign="top"><table border="0" cellpadding="0" cellspacing="0">
            <tr>
              <td width="120" align="left" valign="top">&nbsp;Fecha Comienzo:&nbsp;</td>
              <td width="160" align="left" valign="top"><input type="text" name="fecha_inicio" id="fecha_inicio"  value="<?php echo $fecha_inicio; ?>"  readonly="readonly"  style="width:70px; margin-top:2px;" /></td>
              </tr>
            <tr>
              <td width="120" align="left" valign="top">&nbsp;Fecha Final:</td>
              <td width="160"><input type="text" name="fecha_final" id="fecha_final"  value="<?php echo $fecha_final; ?>"  readonly="readonly"  style="width:70px; margin-top:2px;" /></td>
            </tr>
            <tr>
              <td width="120" align="left" valign="top">&nbsp;Responsable</td>
              <td width="160"><input type="text" name="responsable" id="responsable"  value="<?php echo $responsable; ?>"  readonly="readonly"  style="width:170px; margin-top:0px;" /></td>
            </tr>
            <tr>
              <td width="120" align="left" valign="top">&nbsp;Coordinador</td>
              <td width="160"><input type="text" name="coordinador" id="coordinador"  value="<?php echo $coordinador; ?>"  readonly="readonly"  style="width:170px; margin-top:0px;" /></td>
            </tr>
          </table></td>
          <td width="400" align="left" valign="top" bgcolor="#EAEAEA"><table width="415" border="0" cellpadding="0" cellspacing="0">
            <tr>
              <td height="25" colspan="3">&nbsp;<u>Configuración de Compañia</u></td>
              </tr>
            <tr>
              <td width="60">&nbsp;&nbsp;Ferias:&nbsp;</td>
              <td width="140" align="left" valign="bottom"><input type="text" name="feria" id="feria"  value="<?php echo $feria; ?>"  readonly="readonly"  style="width:220px; margin-top:2px;" /></td>
              <td width="300" rowspan="3" align="left" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0">
                <tr>
                  <td width="10">&nbsp;</td>
                  <td>&nbsp;Analisis A-B-C:&nbsp; </td>
                </tr>
                <tr>
                  <td>&nbsp;</td>
                  <td><textarea name="txtFechaInicial2" rows="3" readonly="readonly" id="txtFechaInicial2" style="width:100px; margin-top:2px;">
<?php
if ($analisis != FALSE) {
   foreach ($analisis as $row1) {
       echo $row1->ana_abc . ", ";
    }
} 
?>
                      </textarea></td>
                </tr>
              </table></td>
            </tr>
            <tr>
              <td>&nbsp;&nbsp;Pais&nbsp;</td>
              <td align="left" valign="bottom"><input type="text" name="pais" id="pais"  value="<?php echo $pais; ?>"  readonly="readonly"  style="width:220px; margin-top:2px;" /></td>
            </tr>
            <tr>
              <td colspan="2"><table width="100%" border="0" cellpadding="0" cellspacing="0">
                <tr>
                  <td align="left" valign="top">&nbsp;&nbsp;F. Inicio&nbsp;</td>
                  <td><input type="text" name="fecha_inicio" id="fecha_inicio_1"  value="<?php echo $fecha_llamada_inicio; ?>"  readonly="readonly"  style="width:70px; margin-top:0px;" /></td>
                  <td align="left" valign="top">F. Final</td>
                  <td><input type="text" name="fecha_inicio" id="fecha_final_1"  value="<?php echo $fecha_llamada_final; ?>"  readonly="readonly"  style="width:70px; margin-top:0px;" /></td>
                </tr>
              </table></td>
              </tr>
            <tr>
              <td colspan="3"><table border="0" cellpadding="0" cellspacing="0">
                <tr>
                  <td width="25" height="30" align="center" valign="top">
                       <?php if ($con_contacto=="1"){ 
                                echo "<input type='checkbox' name='con_contacto' id='con_contacto' checked='checked'/>";
                            } else {
                                echo "<input type='checkbox' name='con_contacto' id='con_contacto'  />";
                            }
                            ?>
                  </td>
                  <td height="30" align="left" valign="top">Con Contactos</td>
                  <td width="25" height="30" align="center" valign="top">
                     
                       <?php if ($sin_contacto=="1"){ 
                                echo "<input type='checkbox' name='sin_contacto' id='sin_contacto' checked='checked'/>";
                            } else {
                                echo "<input type='checkbox' name='sin_contacto' id='sin_contacto'  />";
                            }
                            ?>
                  </td>
                  <td height="30" align="left" valign="top">Sin Contactos</td>
                
                  <td width="25" height="30" align="center" valign="top">
                     
                       <?php if ($oem=="1"){ 
                                echo "<input type='checkbox' name='oem' id='oem' checked='checked'/>";
                            } else {
                                echo "<input type='checkbox' name='oem' id='oem'  />";
                            }
                            ?> 
                  </td>
                  <td height="30" align="left" valign="top">&nbsp;OEM</td>
                  <td width="25" height="30" align="center" valign="top">
                          
                                            <?php if ($masch=="1"){ 
                                echo "<input type='checkbox' name='masch' id='masch' checked='checked'/>";
                            } else {
                                echo "<input type='checkbox' name='masch' id='masch'  />";
                            }
                            ?> 
                  </td>
                  <td height="30" align="left" valign="top">Masch/Anlagebau</td>
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
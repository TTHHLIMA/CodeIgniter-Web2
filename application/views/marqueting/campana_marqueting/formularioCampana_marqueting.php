<?PHP
if ($campana != null) {
    foreach ($campana as $row) {
        $xcodigo = $row->id_mar;

    }
} else {
    $xcodigo = "";
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
                        <td><input type="radio" name="radio" id="radio" value="radio" /></td>
                        <td>Telefonmarketing</td>
                        <td width="30" align="right"><input type="radio" name="radio" id="radio" value="radio" /></td>
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
              <td width="100"><input type="text" name="txtFechaInicial" id="txtFechaInicial"  value=""  readonly="readonly"  style="width:70px; margin-top:2px;" /></td>
              <td width="90">&nbsp;Fecha Final:&nbsp;</td>
              <td width="100"><input type="text" name="txtFechaFinal" id="txtFechaFinal"  value=""  readonly="readonly"  style="width:70px; margin-top:2px;" /></td>
            </tr>
            <tr>
              <td width="120">&nbsp;Responsable</td>
              <td colspan="3"><input type="text" name="" id=""  value=""  readonly="readonly"  style="width:80px; margin-top:0px;" /></td>
            </tr>
            <tr>
              <td width="120">&nbsp;Coordinador</td>
              <td colspan="3"><input type="text" name="input" id="input"  value=""  readonly="readonly"  style="width:80px; margin-top:0px;" /></td>
            </tr>
          </table></td>
          <td align="left" valign="top" bgcolor="#EAEAEA"><table width="500" border="0" cellpadding="0" cellspacing="0">
            <tr>
              <td colspan="3">&nbsp;Configuración de Compañia</td>
              </tr>
            <tr>
              <td width="60">&nbsp;Ferias:</td>
              <td width="140" align="left" valign="bottom"><input type="text" name="input3" id="input3"  value=""  readonly="readonly"  style="width:80px; margin-top:2px;" /></td>
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
              <td align="left" valign="bottom"><input type="text" name="input2" id="input2"  value=""  readonly="readonly"  style="width:80px; margin-top:2px;" /></td>
              </tr>
            <tr>
              <td colspan="3"><table border="0" cellpadding="0" cellspacing="0">
                <tr>
                  <td width="30" align="center" valign="top"><input type="checkbox" name="checkbox" id="checkbox" /></td>
                  <td>Con Contactos</td>
                  <td width="30" align="center" valign="top"><input type="checkbox" name="checkbox2" id="checkbox2" /></td>
                  <td>Sin Contactos</td>
                
                  <td width="30" align="center" valign="top"><input type="checkbox" name="checkbox3" id="checkbox3" /></td>
                  <td>&nbsp;OEM</td>
                  <td width="30" align="center" valign="top"><input type="checkbox" name="checkbox4" id="checkbox4" /></td>
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
<div id="panelllamadas" style="background-color:#FFC" >
  <table width="900" border="1">
    <tr>
      <td width="400" height="500" align="left" valign="top">&nbsp;</td>
      <td width="100" height="500" align="left" valign="top">&nbsp;</td>
      <td width="400" height="500" align="left" valign="top">&nbsp;</td>
    </tr>
    </table>


</div>

        </td>
    </tr>
</table>
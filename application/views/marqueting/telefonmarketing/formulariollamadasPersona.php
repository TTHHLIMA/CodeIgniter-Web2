<?PHP
//var_dump($llamadas);
if ($llamadas != null) {
    foreach ($llamadas as $row) {
        $xidregistro = $row->idregistro;
        $xcodigo = $row->codigo;
        $xfecha_ingreso = fecha_calendario(strftime($row->fecha_ingreso));
        $xhora_inicio = date("H:i",strtotime($row->hora_inicio));
        $xhora_final = date("H:i",strtotime($row->hora_final));
        $xllamadas = $row->llamadas;
        $xsumatoria_horas = date("H:i",strtotime($row->sumatoria_horas));
        $xfecha = fecha_calendario(strftime($row->fecha));
        $xzentrale = $row->zentrale;
        $xrichtiger = $row->richtiger;
        $xrichtig = $row->richtig;
    }
} else {
        $xidregistro = "";
        $xcodigo = "";
        $xfecha_ingreso = "";
        $xhora_inicio = "";
        $xhora_final = "";
        $xllamadas = "";
        $xsumatoria_horas = "";
        $xfecha = "";
        $xzentrale = "";
        $xrichtiger = "";
        $xrichtig = "";
}
?>
<form id="frmllamadas"  action="" method="post" >
<table width="100%" border="0" cellpadding="0" cellspacing="0">
    
    <tr>
        <td valign="bottom"><table width="450" border="0" align="left" cellpadding="0" cellspacing="0">
                <tr>
                    <td><table width="100%">
                            <tr>
                                <td width="130px">

                                    <div class="btn-group">
                                        <a class="btn" id="btnllamPrimero"
                                           href="#"
                                           data-toggle="modal"
                                           ><i class="icon-fast-backward"></i></a>  
                                        <a class="btn" id="btnllamAnterior"
                                           href="#"
                                           data-toggle="modal" 
                                           ><i class="icon-backward"></i></a>
                                        <a class="btn" id="btnllamSiguiente"
                                           href="#"
                                           data-toggle="modal"
                                           ><i class="icon-forward"></i></a>
                                        <a class="btn" id="btnllamUltimo"
                                           href="#"
                                           data-toggle="modal"
                                           ><i class="icon-fast-forward"></i></a>
                                    </div>

                                </td>
                                <td width="100px" >
                                    <div class="btn-group">

                                        <a class="btn" id="btnllamNuevo"
                                           href="#"
                                           data-toggle="modal"
                                           title="Nuevo"
                                           ><img src="<?= $this->config->base_url() ?>images/marqueting/nuevo.png" class="tamanoIconoMantenimiento"></a>
                                        <a class="btn" id="btnllamAgregar"
                                           href="#"
                                           data-toggle="modal"
                                           title="Agregar"
                                           ><img src="<?= $this->config->base_url() ?>images/marqueting/agregar.png" class="tamanoIconoMantenimiento"></a>
                                        <a class="btn" id="btnllamActualizar"
                                           href="#"
                                           data-toggle="modal"
                                           title="Actualizar"
                                           ><img src="<?= $this->config->base_url() ?>images/marqueting/actualizar.png" class="tamanoIconoMantenimiento"></a>


                                    </div>
                                </td>
                                <td width="80">
                                    <div class="etiquetaCount">
                                        Total : <b><?= $countLlamadas;?></b>
                                    </div></td>


                            </tr>
                        </table>
                    </td>
                    <td align="left" valign="middle">&nbsp;Codigo:&nbsp;</td>
                    <td align="left" valign="bottom"><input type="text" name="txtllamCodigo" id="txtllamCodigo"  value="<?= $xidregistro;?>"  readonly  style="width:30px; margin-top:7px;"></td>
                    <td align="left" valign="middle"><input type="hidden" name="txtxCodigo" id="txtxCodigo"  value="<?= $xcodigo; ?>">  </td>

                </tr>

            </table></td>
    </tr>
    <tr>
        <td align="left" valign="top"><table width="500" border="0" cellpadding="0" cellspacing="0">
                <tr>
                    <td align="left" valign="top">
                        <table border="0" cellpadding="0" cellspacing="0">
                            <tr>
                                <td align="left" valign="top">&nbsp;Fecha&nbsp;</td>
                                <td align="left" valign="top"><input  type="text" id ="txtllamFecha" name="txtllamFecha" value="<?= $xfecha_ingreso;?>" style="width:70px;" /></td>
                            </tr>
                            <tr>
                                <td align="left" valign="top">&nbsp;Llamadas&nbsp;</td>
                                <td align="left" valign="top">
                                    <select  name="cbollamLlamadas" id="cbollamLlamadas" style="width: 50px;">
                                        <option value=''></option>
                                        <?php
                                        for ($i = 1; $i <= 50; $i++) {
                                            if ($xllamadas==$i){
                                                echo "<option value='" . $i . "' selected>" . $i . "</option>";
                                            } else {
                                                echo "<option value='" . $i . "'>" . $i . "</option>";
                                            }
                                        }
                                        ?>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td align="left" valign="top">&nbsp;Zentrale verweigert:&nbsp;</td>
                                <td align="left" valign="top">
                                    <select  name="cbollamZentrale" id="cbollamZentrale" style="width: 50px;">
                                        <option value=''></option>
                                        <?php
                                        for ($i = 1; $i <= 50; $i++) {
                                            if ($xzentrale==$i){
                                                echo "<option value='" . $i . "' selected>" . $i . "</option>";
                                            } else {
                                                echo "<option value='" . $i . "'>" . $i . "</option>";
                                            }
                                        }
                                        ?>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td align="left" valign="top">&nbsp;Richtiger Ansprechpartner:&nbsp;</td>
                                <td align="left" valign="top">
                                    <select  name="cbollamRichtiger" id="cbollamRichtiger" style="width: 50px;">
                                        <option value=''></option>
                                        <?php
                                        for ($i = 1; $i <= 50; $i++) {
                                            if ($xrichtiger==$i){
                                                echo "<option value='" . $i . "' selected>" . $i . "</option>";
                                            } else {
                                                echo "<option value='" . $i . "'>" . $i . "</option>";
                                            }
                                        }
                                        ?>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td align="left" valign="top">&nbsp;Richtig/ nochmals versuchen:&nbsp;</td>
                                <td align="left" valign="top">
                                    <select  name="cbollamRichtig" id="cbollamRichtig" style="width: 50px;">
                                        <option value=''></option>
                                        <?php
                                        for ($i = 1; $i <= 50; $i++) {
                                            if ($xrichtig==$i){
                                                echo "<option value='" . $i . "' selected>" . $i . "</option>";
                                            } else {
                                                echo "<option value='" . $i . "'>" . $i . "</option>";
                                            }
                                        }
                                        ?>
                                    </select>                                
                                </td>
                            </tr>
                        </table></td>
                    <td align="left" valign="top"><table border="0" cellpadding="0" cellspacing="0">
                            <tr>
                                <td align="left" valign="top">&nbsp;</td>
                                <td align="left" valign="top">&nbsp;</td>
                            </tr>
                            <tr>
                                <td align="left" valign="top">&nbsp;Hora de inicio:&nbsp;</td>
                                <td align="left" valign="top"><input type="text" name="txtllamHoraInicio" id="txtllamHoraInicio" value="<?= $xhora_inicio;?>"  onChange="calcT3();"  onkeypress="ValidaSoloNumeros()"  maxlength="5"  style="width:40px; "></td>
                            </tr>
                            <tr>
                                <td align="left" valign="top">&nbsp;Hora de final:&nbsp;</td>
                                <td align="left" valign="top"><input type="text" name="txtllamHoraFinal" id="txtllamHoraFinal" value="<?= $xhora_final;?>"  onChange="calcT3();"  onkeypress="ValidaSoloNumeros()"  maxlength="5"  style="width:40px; "></td>
                            </tr>
                            <tr>
                                <td align="left" valign="top">&nbsp;Total de Horas:&nbsp;</td>
                                <td align="left" valign="top"><input type="text" name="txtllamTotalHoras" id="txtllamTotalHoras" value="<?= $xsumatoria_horas;?>"   style="width:40px; " readonly></td>
                            </tr>
                        </table></td>
                </tr>
                
            </table></td>
    </tr>

</table>
</form>


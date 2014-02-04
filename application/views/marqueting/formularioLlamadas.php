<?
//var_dump($llamada);
if ($llamada != null) {
    foreach ($llamada as $row) {
        $xidllamada = $row->idllamada;
        $xidcontacto = $row->idcontacto;
        $xusuario = $row->usuario;
        $xfecha_llamada = fecha_calendario($row->fecha_llamada);
        $xfecha_carta_html = fecha_calendario($row->fecha_carta_html);
        $xnota = $row->nota;
        $xvolver_llamar = fecha_calendario($row->volver_llamar);
        $xfecha_cdirecta1_1 = fecha_calendario($row->fecha_cdirecta1_1);
        $xchkCA1 = $row->chkCA1;
        $xchkCA2 = $row->chkCA2;
        $xchkCA3 = $row->chkCA3;
        $xchkCC1 = $row->chkCC1;
        $xchkCC2 = $row->chkCC2;
        $xchkCD1 = $row->chkCD1;
        $xchkCD2 = $row->chkCD2;
        $xinfo_email = fecha_calendario($row->info_email);
        $xprecio_email = fecha_calendario($row->precio_email);
    }
} else {
    $xidllamada = "";
    $xidcontacto = "";
    $xusuario = "";
    $xfecha_llamada = "";
    $xfecha_carta_html = "";
    $xnota = "";
    $xvolver_llamar = "";
    $xfecha_cdirecta1_1 = "";
    $xchkCA1 = "";
    $xchkCA2 = "";
    $xchkCA3 = "";
    $xchkCC1 = "";
    $xchkCC2 = "";
    $xchkCD1 = "";
    $xchkCD2 = "";
    $xinfo_email = "";
    $xprecio_email = "";
}
?>

<table width="740"  id="panelLlamadas" style='background-color: #EFDCBC' >
<form id="frmLlamada" action="javascript:void(0)" method="post">
    <tr>
        <td>
            <table width="700">
            <tr>
              <td width="130" align="left" valign="top">
                <div class="btn-group divLeft">
                    <a class="btn" id="btnPrimeroL"
                       href="#"
                       data-toggle="modal"
                       ><i class="icon-fast-backward"></i></a>  
                    <a class="btn" id="btnAnteriorL"
                       href="#"
                       data-toggle="modal" 
                       ><i class="icon-backward"></i></a>
                    <a class="btn" id="btnSiguienteL"
                       href="#"
                       data-toggle="modal"
                       ><i class="icon-forward"></i></a>
                    <a class="btn" id="btnUltimoL"
                       href="#"
                       data-toggle="modal"
                       ><i class="icon-fast-forward"></i></a>
                </div>
                </td>
                <td align="left" valign="top" width="140">
                <div class="btn-group divLeft">

                    <a class="btn" id="btnNuevoL"
                       href="#"
                       data-toggle="modal"
                       title="Nuevo"
                       ><img src="<?= $this->config->base_url() ?>images/marqueting/nuevo.png" class="tamanoIconoMantenimiento"></a>
                    <a class="btn" id="btnAgregarL"
                       href="#"
                       data-toggle="modal"
                       title="Agregar"
                       ><img src="<?= $this->config->base_url() ?>images/marqueting/agregar.png" class="tamanoIconoMantenimiento"></a>
                    <a class="btn" id="btnActualizarL"
                       href="#"
                       data-toggle="modal"
                       title="Actualizar"
                       ><img src="<?= $this->config->base_url() ?>images/marqueting/actualizar.png" class="tamanoIconoMantenimiento"></a>
                    <a class="btn" id="btnEliminarL"
                       href="#"
                       data-toggle="modal"
                       title="eliminar"
                       ><img src="<?= $this->config->base_url() ?>images/marqueting/eliminar2.png" class="tamanoIconoMantenimiento"></a>                                        

                </div>   
            </td>
            <td width="140" align="left" valign="top">
            <div class="etiquetaCount">
                                            Total de llamadas : <b><?= $countLlamadas ?></b>
                                        </div>
            </td>
            <td align="left" valign="top"><table border="0">
              <tr>
                <td width="80" align="right" valign="middle">Id Actual&nbsp;</td>
                <td><input class="boxleft" type="text" name="txtidLlamada" id="txtidLlamada"  value="<?= $xidllamada; ?>" readonly></td>
              </tr>
            </table></td>
            <td align="left" valign="top"><input class="boxleft" type="hidden" name="txtXidContacto" id="txtXidContacto"  value="<?= $xidcontacto; ?>" />&nbsp;</td>
            </tr>
            </table>
            
      </td>
    </tr>

    <tr>
        <td width="289" valign="top">
            
             <table width="700%" border="0" cellpadding="0" cellspacing="0">
                      <tr>
                        <td align="left" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0">
                          <tr>
                            <td>Usuario</td>
                          </tr>
                          <tr>
                            <td>
                            <select class="box"  name="cbousuario1" id="cbousuario1" >
                              <option value=''></option>
                              <option <? echo (trim($xusuario) === "Christian") ? "selected" : ""; ?>>Christian</option>
                              <option <? echo (trim($xusuario) === "Flormira") ? "selected" : ""; ?>>Flormira</option>
                              <option <? echo (trim($xusuario) === "Isolde Petrik") ? "selected" : ""; ?>>Isolde Petrik</option>
                              <option <? echo (trim($xusuario) === "Juan") ? "selected" : ""; ?>>Juan</option>
                            </select>
                            </td>
                          </tr>
                          <tr>
                            <td>Fecha de llamada</td>
                          </tr>
                          <tr>
                            <td><input  type="text" id ="txtfecha_llamada" name="txtfecha_llamada" value="<?= $xfecha_llamada; ?>" /></td>
                          </tr>
                          <tr>
                            <td>Volver a llamar</td>
                          </tr>
                          <tr>
                            <td><input  type="text" id ="txtvolver_llamar"  name="txtvolver_llamar" value="<?= $xvolver_llamar; ?>" /></td>
                          </tr>
                        </table></td>
                        <td align="left" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0">
                          <tr>
                            <td>Nota</td>
                          </tr>
                          <tr>
                            <td><textarea name="txtnotaContacto" id="txtnotaContacto" cols="45" rows="7"><?= $xnota; ?></textarea></td>
                          </tr>
                          <tr>
                            <td></td>
                          </tr>
                          <tr>
                            <td></td>
                          </tr>
                        </table></td>
                        <td align="left" valign="top"><table border="0" cellpadding="0" cellspacing="0">
                                <tr>
                                  <td><table width="100%" border="0" cellpadding="0" cellspacing="0">
                                           <tr>
                                             <td>&nbsp;</td>
                                             <td width="90" height="30" align="right">Info per Email&nbsp;</td>
                                             <td width="70" height="30"><input  type="text" id ="txtinfo_email"  name="txtinfo_email" value="<?= $xinfo_email; ?>" /></td>
                                             <td width="120" height="30" align="right">Preise per E-Mail&nbsp;</td>
                                             <td width="70" height="30"><input  type="text" id ="txtprecio_email"  name="txtprecio_email" value="<?= $xprecio_email; ?>" /></td>
                                           </tr>
                                         </table></td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" name="chkCa1" id="chkCa1" <? echo ($xchkCA1 === "1") ? "checked" : ""; ?> />
                                        Besonders intressiert</td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" name="chkCa2" id="chkCa2" <? echo ($xchkCA2 === "1") ? "checked" : ""; ?> />
                                        Bedarf, Interesse an Informationsmaterial </td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" name="chkCa3" id="chkCa3" <? echo ($xchkCA3 === "1") ? "checked" : ""; ?> />
                                        Bedarf, Interesse an Informationsmaterial mit Preisen</td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" name="chkCc1" id="chkCc1" <? echo ($xchkCC1 === "1") ? "checked" : ""; ?> />
                                        Bedarf, aber bereits fester Partner</td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" name="chkCc2" id="chkCc2" <? echo ($xchkCC2 === "1") ? "checked" : ""; ?> />
                                        Bedarf, aber wird intern durchgeführt</td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" name="chkCd1" id="chkCd1" <? echo ($xchkCD1 === "1") ? "checked" : ""; ?> />
                                        Kein Bedarf, national tätig</td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" name="chkCd2" id="chkCd2" <? echo ($xchkCD2 === "1") ? "checked" : ""; ?> />
                                        Kein Bedarf, nur Vertrieb/Handel</td>
                                </tr>
                            </table></td>
                      </tr>
                    </table>
           
        </td>
    </tr>
 </form>
</table>            


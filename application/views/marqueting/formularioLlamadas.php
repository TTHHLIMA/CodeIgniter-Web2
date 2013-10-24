<?
//var_dump($contacto);
if ($llamadas != null) {
    foreach ($llamadas as $row) {
        $idllamada = $row->idllamada;
        $idcontacto = $row->idcontacto;
        $usuario = $row->usuario;
        $fecha_llamada = $row->fecha_llamada;
        $fecha_carta_html = $row->fecha_carta_html;
        $nota = $row->nota;
        $volver_llamar = $row->volver_llamar;
        $fecha_cdirecta1_1 = $row->fecha_cdirecta1_1;
        $chkCA1 = $row->chkCA1;
        $chkCA2 = $row->chkCA2;
        $chkCA3 = $row->chkCA3;
        $chkCC1 = $row->chkCC1;
        $chkCC2 = $row->chkCC2;
        $chkCD1 = $row->chkCD1;
        $chkCD2 = $row->chkCD2;
        $info_email = $row->info_email;
        $precio_email = $row->precio_email;
    }
} else {
        $idllamada = "";
        $idcontacto = "";
        $usuario = "";
        $fecha_llamada = "";
        $fecha_carta_html = "";
        $nota = "";
        $volver_llamar = "";
        $fecha_cdirecta1_1 = "";
        $chkCA1 = "";
        $chkCA2 = "";
        $chkCA3 = "";
        $chkCC1 = "";
        $chkCC2 = "";
        $chkCD1 = "";
        $chkCD2 = "";
        $info_email = "";
        $precio_email = "";
}
?>

<table  id="panelLlamadas" style='background-color: #ddd' >
                    <tr>
                        <td>
                            <div class="FormLeft ">
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
                            </div>
                        </td>
                    </tr>

                    <tr>
                        <td width="289" valign="top">
                            <form id="frmLlamada" action="" method="post">
                                <table>
                                    <tr>
                                        <td colspan="2">

                                            <table  width="100%">
                                                <tr>
                                                    <td valign="top"><label  >Id.</label></td>
                                                    <td valign="top"><input class="boxleft" type="text" name="txtidLlamada" id="txtidLlamada"  value="<?= $xidllamada; ?>" readonly></td>
                                                    <td valign="top"> <input class="boxleft" type="hidden" name="txtidContacto" id="txtidContacto"  value="<?= $xidcontacto; ?>">                        
                                                        <div class="etiquetaCount">
                                                            Total de llamadas : <b><?= $countLlamadas ?></b>
                                                        </div></td>
                                                </tr>
                                            </table>


                                        </td>
                                    </tr>
                                    <tr>
                                        <td>

                                            <label for="cbousuario1" >Usuario</label>

                                        </td>
                                        <td>
                                            <select class="box"  name="cbousuario1" id="cbousuario1" >
                                                <option value=''></option>
                                                <option <? echo ($xcbousuario1 === "Christian") ? "selected" : ""; ?>>Christian</option>
                                                <option <? echo ($xcbousuario1 === "Flormira") ? "selected" : ""; ?>>Flormira</option>
                                                <option <? echo ($xcbousuario1 === "Isolde Petrik") ? "selected" : ""; ?>>Isolde Petrik</option>
                                                <option <? echo ($xcbousuario1 === "Juan") ? "selected" : ""; ?>>Juan</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Fecha de llamada</td>
                                        <td>
                                            <div class="input-append date" id="dp3" data-date="12-02-2012" data-date-format="dd-mm-yyyy">
                                                <input class="span2" size="16" type="text" value="12-02-2012" readonly="">
                                                <span class="add-on"><i class="icon-calendar"></i></span>
                                            </div>
                                           
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Info per Email</td>
                                        <td>
                                            <div class="input-append date" id="dp3" data-date="12-02-2012" data-date-format="dd-mm-yyyy">
                                                <input class="span2" size="16" type="text" value="12-02-2012" readonly="">
                                                <span class="add-on"><i class="icon-calendar"></i></span>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Preise per E-Mail</td>
                                        <td>
                                            <div class="input-append date" id="dp3" data-date="12-02-2012" data-date-format="dd-mm-yyyy">
                                                <input class="span2" size="16" type="text" value="12-02-2012" readonly="">
                                                <span class="add-on"><i class="icon-calendar"></i></span>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Volver a llamar</td>
                                        <td>
                                            <div class="input-append date" id="dp3" data-date="12-02-2012" data-date-format="dd-mm-yyyy">
                                                <input class="span2" size="16" type="text" value="12-02-2012" readonly="">
                                                <span class="add-on"><i class="icon-calendar"></i></span>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                            
                                                <table border="0" cellpadding="0" cellspacing="0">
                                                    <tr>
                                                        <td><input type="checkbox" name="chkCa1" id="chkCa1" <? echo ($xchknich === "1") ? "checked" : ""; ?> />
                                                            Besonders intressiert</td>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="checkbox" name="chkCa2" id="chkCa2" <? echo ($xchknich === "1") ? "checked" : ""; ?> />
                                                            Bedarf, Interesse an Informationsmaterial </td>
                                                    </tr>
                                                    <tr>
                                                      <td><input type="checkbox" name="chkCa3" id="chkCa3" <? echo ($xchknich === "1") ? "checked" : ""; ?> />
                                                            Bedarf, Interesse an Informationsmaterial mit Preisen</td>
                                                    </tr>
                                                    <tr>
                                                      <td><input type="checkbox" name="chkCc1" id="chkCc1" <? echo ($xchknich === "1") ? "checked" : ""; ?> />
                                                            Bedarf, aber bereits fester Partner</td>
                                                    </tr>
                                                    <tr>
                                                      <td><input type="checkbox" name="chkCc2" id="chkCc2" <? echo ($xchknich === "1") ? "checked" : ""; ?> />
                                                            Bedarf, aber wird intern durchgeführt</td>
                                                    </tr>
                                                    <tr>
                                                      <td><input type="checkbox" name="chkCd1" id="chkCd1" <? echo ($xchknich === "1") ? "checked" : ""; ?> />
                                                            Kein Bedarf, national tätig</td>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="checkbox" name="chkCd2" id="chkCd2" <? echo ($xchknich === "1") ? "checked" : ""; ?> />
                                                            Kein Bedarf, nur Vertrieb/Handel</td>
                                                    </tr>
                                                </table>
                                                     
                                        </td>
                                    </tr>
                                    <tr>
                                      <td colspan="2">Nota</td>
                                    </tr>
                                    <tr>
                                      <td colspan="2"><textarea name="txtnotaContacto" id="txtnotaContacto" cols="45" rows="5"></textarea></td>
                                    </tr>
                                </table>
                            </form>
                        </td>
                    </tr>

                </table>            


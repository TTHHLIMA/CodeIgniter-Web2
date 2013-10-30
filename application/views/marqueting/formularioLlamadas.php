<?
//var_dump($contacto);
if ($llamada != null) {
    foreach ($llamada as $row) {
        $xidllamada = $row->idllamada;
        $xidcontacto = $row->idcontacto;
        $xusuario = $row->usuario;
        $xfecha_llamada = $row->fecha_llamada;
        $xfecha_carta_html = $row->fecha_carta_html;
        $xnota = $row->nota;
        $xvolver_llamar = $row->volver_llamar;
        $xfecha_cdirecta1_1 = $row->fecha_cdirecta1_1;
        $xchkCA1 = $row->chkCA1;
        $xchkCA2 = $row->chkCA2;
        $xchkCA3 = $row->chkCA3;
        $xchkCC1 = $row->chkCC1;
        $xchkCC2 = $row->chkCC2;
        $xchkCD1 = $row->chkCD1;
        $xchkCD2 = $row->chkCD2;
        $xinfo_email = $row->info_email;
        $xprecio_email = $row->precio_email;
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
                            <form id="frmLlamada" action="javascript:void(0)" method="post">
                                <table>
                                    <tr>
                                        <td colspan="2">

                                            <table  width="100%">
                                                <tr>
                                                    <td valign="top"><label  >Id.</label></td>
                                                    <td valign="top"><input class="boxleft" type="text" name="txtidLlamada" id="txtidLlamada"  value="<?= $xidllamada; ?>" readonly></td>
                                                    <td valign="top"> <input class="boxleft" type="hidden" name="txtXidContacto" id="txtXidContacto"  value="<?= $xidcontacto; ?>">                        
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
                                                <option <? echo ($xusuario === "Christian") ? "selected" : ""; ?>>Christian</option>
                                                <option <? echo ($xusuario === "Flormira") ? "selected" : ""; ?>>Flormira</option>
                                                <option <? echo ($xusuario === "Isolde Petrik") ? "selected" : ""; ?>>Isolde Petrik</option>
                                                <option <? echo ($xusuario === "Juan") ? "selected" : ""; ?>>Juan</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Fecha de llamada</td>
                                        <td>
                                            <input  type="text" id ="txtfecha_llamada" name="txtfecha_llamada" value="<?= $xfecha_llamada; ?>" />
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Info per Email</td>
                                        <td>
                                            <input  type="text" id ="txtinfo_email"  name="txtinfo_email" value="<?= $xinfo_email; ?>" />
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Preise per E-Mail</td>
                                        <td>
                                             <input  type="text" id ="txtprecio_email"  name="txtprecio_email" value="<?= $xprecio_email; ?>" />
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Volver a llamar</td>
                                        <td>
                                             <input  type="text" id ="txtvolver_llamar"  name="txtvolver_llamar" value="<?= $xvolver_llamar; ?>" />
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                            
                                                <table border="0" cellpadding="0" cellspacing="0">
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
                                                </table>
                                                     
                                        </td>
                                    </tr>
                                    <tr>
                                      <td colspan="2">Nota</td>
                                    </tr>
                                    <tr>
                                      <td colspan="2"><textarea name="txtnotaContacto" id="txtnotaContacto" cols="45" rows="5"><?= $xnota; ?></textarea></td>
                                    </tr>
                                </table>
                            </form>
                        </td>
                    </tr>

                </table>            


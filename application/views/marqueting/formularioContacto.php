<?
//var_dump($contacto);
if ($contacto != null) {
    foreach ($contacto as $row) {
        $xidcontacto = $row->idcontacto;
        $xidcompania = $row->idcompania;
        $xanrede = $row->anrede;
        $xnombres = $row->nombres;
        $xapellidos = $row->apellidos;
        $xcargo = $row->cargo;
        $xdepartamento = $row->departamento;
        $xtelefono = $row->telefono;
        $xfax = $row->fax;
        $xmail = $row->mail;
        $xcontac_interes = $row->contac_interes;
        $xcelular = $row->celular;
        $xidioma = $row->idioma;
        $xtechni_forum = $row->techni_forum;
        $xreportes_tt = $row->reportes_tt;
        //$xexportado = '0';
        $xretirado = $row->retirado;
        $xreportes_tt_com = $row->reportes_tt_com;
        $xchknich = $row->chknich;
        //$xfecha_datos_admin = '0000-00-00';
        //$xfecha_datos_user = '0000-00-00';
    }
} else {
    $xidcontacto = "";
    $xidcompania = "";
    $xanrede = "";
    $xnombres = "";
    $xapellidos = "";
    $xcargo = "";
    $xdepartamento = "";
    $xtelefono = "";
    $xfax = "";
    $xmail = "";
    $xcontac_interes = "";
    $xcelular = "";
    $xidioma = "";
    $xtechni_forum = "";
    $xreportes_tt = "";
    //$xexportado = "";
    $xretirado = "";
    $xreportes_tt_com = "";
    $xchknich = "";
    //$xfecha_datos_admin = "";
    //$xfecha_datos_user = "";
}
?>


    <table width="100%" id="panelContacto" <? echo ($xretirado === "1") ? "style='background-color: #f8b9b7'" : "style='background-color: #ddddff'"; ?> >
        <tr>
            <td colspan="2">

                <table border="0">
                    <tr>
                        <td width="270" align="left" valign="top">

                            <div class="btn-group divLeft">

                                <a class="btn" id="btnPrimeroC"
                                   href="#"
                                   data-toggle="modal"
                                   ><i class="icon-fast-backward"></i></a>  
                                <a class="btn" id="btnAnteriorC"
                                   href="#"
                                   data-toggle="modal" 
                                   ><i class="icon-backward"></i></a>
                                <a class="btn" id="btnSiguienteC"
                                   href="#"
                                   data-toggle="modal"
                                   ><i class="icon-forward"></i></a>
                                <a class="btn" id="btnUltimoC"
                                   href="#"
                                   data-toggle="modal"
                                   ><i class="icon-fast-forward"></i></a>
                            </div>
                            <div class="btn-group divLeft">

                                <a class="btn" id="btnNuevoC"
                                   href="#"
                                   data-toggle="modal"
                                   title="Nuevo"
                                   ><img src="<?= $this->config->base_url() ?>images/marqueting/nuevo.png" class="tamanoIconoMantenimiento"></a>
                                <a class="btn" id="btnAgregarC"
                                   href="#"
                                   data-toggle="modal"
                                   title="Agregar"
                                   ><img src="<?= $this->config->base_url() ?>images/marqueting/agregar.png" class="tamanoIconoMantenimiento"></a>
                                <a class="btn" id="btnActualizarC"
                                   href="#"
                                   data-toggle="modal"
                                   title="Actualizar"
                                   ><img src="<?= $this->config->base_url() ?>images/marqueting/actualizar.png" class="tamanoIconoMantenimiento"></a>
                                   <?php
                                   if ($countContactosRequerimientos == 0) {
                                       ?>
                                    <a class="btn" id="btnEliminarC"
                                       href="#"
                                       data-toggle="modal"
                                       title="eliminar"
                                       ><img src="<?= $this->config->base_url() ?>images/marqueting/eliminar2.png" class="tamanoIconoMantenimiento"></a>                                        
                                       <?php
                                   }
                                   ?>
                            </div>   


                        </td>
                        <td align="left" valign="top">

                            <table border="0">
                                <tr>
                                    <td align="left" valign="top"> <div class="etiquetaCount">
                                            Total de Contactos : <b><?= $countContactos ?></b>
                                        </div></td>
                                    <td><div class="etiquetaCountRequerimiento">Total de Requerimientos: <b><?php echo $countContactosRequerimientos; ?></b></div></td>
                                    <td><div class="etiquetaCountPedido">Total de Pedidos: <b><?php echo $countContactosPedidos; ?></b></div></td>
                                </tr>
                            </table> 

                        </td>

                        <td align="left" valign="top">&nbsp;</td>
                        <td align="left" valign="top">&nbsp;</td>
                        <td align="left" valign="top">&nbsp;</td>
                    </tr>
                </table>
            </td>
        </tr>

        <tr>







            <td  valign="top">
                <table  >
                    <tr>
                        <td valign="top">
                        
                        <form method="post" action="" id="frmContacto">
                        
                            <table width="100%" >
                                <tr>
                                    <td valign="top">
                                        <table width="100%">
                                            <tr>
                                                <td colspan="2">

                                                    <table  width="260" border="0" cellpadding="0" cellspacing="0" bordercolor="#FF0000">
                                                        <tr>
                                                            <td width="48" align="left" valign="top">Andere</td>
                                                            <td width="50" align="left" valign="top"> 
                                                                <select class="box"  name="cboAndere" id="cboAndere" >
                                                                    <option value=''></option>
                                                                    <option <? echo ($xanrede === "Herr") ? "selected" : ""; ?>>Herr</option>
                                                                    <option <? echo ($xanrede === "Frau") ? "selected" : ""; ?>>Frau</option>
                                                                    <option <? echo ($xanrede === "Dipl. Ing.") ? "selected" : ""; ?>>Dipl. Ing.</option>
                                                                    <option <? echo ($xanrede === "Prof") ? "selected" : ""; ?>>Prof</option>
                                                                    <option <? echo ($xanrede === "Dr.") ? "selected" : ""; ?>>Dr.</option>
                                                                    <option <? echo ($xanrede === "Mr.") ? "selected" : ""; ?>>Mr.</option>
                                                                    <option <? echo ($xanrede === "Miss.") ? "selected" : ""; ?>>Miss.</option>
                                                                    <option <? echo ($xanrede === "Mrs.") ? "selected" : ""; ?>>Mrs.</option>
                                                                    <option <? echo ($xanrede === "Ms.") ? "selected" : ""; ?>>Ms.</option>
                                                                </select>
                                                            </td>
                                                            <td width="59" align="right" valign="top"><input class="boxleft" type="hidden" name="txtidCompania" id="txtidCompania"  value="<?= $xidcompania; ?>" />Codigo&nbsp;</td>
                                                            <td align="left" valign="top"><input class="boxleft" type="text" name="txtidContacto" id="txtidContacto"  value="<?= $xidcontacto; ?>" readonly ></td>
                                                        </tr>
                                                    </table>

                                                </td>
                                            </tr>

                                            <tr>
                                                <td></td>
                                                <td></td>
                                            </tr>

                                            <tr>
                                                <td><label>Nombre</label></td>
                                                <td><input  type="text" name="txtnomContacto" id="txtnomContacto" value="<?= $xnombres; ?>" /></td>
                                            </tr>

                                            <tr>
                                                <td><label>Apellido</label></td>
                                                <td><input  type="text" name="txtapeContacto" value="<?= $xapellidos; ?>" /></td>
                                            </tr>
                                            <tr>
                                                <td><label>Cargo</label></td>
                                                <td><input class="box" type="text" name="txtcargoContacto" value="<?= $xcargo; ?>" /></td>
                                            </tr>
                                            <tr>
                                                <td><label class="etiqueta">Dpt.</label></td>
                                                <td><input class="box" type="text" name="txtdepartamentoContacto" value="<?= $xdepartamento; ?>" /></td>
                                            </tr>
                                            <tr>
                                                <td><label class="etiqueta">T&eacute;l.</label></td>
                                                <td><input class="box" type="text" name="txttelefonoContacto" value ="<?= $xtelefono; ?>" /></td>
                                            </tr>
                                            <tr>
                                                <td><label class="etiqueta">Cel.</label></td>
                                                <td><input class="box" type="text" name="txtcelularContacto" value="<?= $xcelular; ?>" /></td>
                                            </tr>
                                            <tr>
                                                <td><label class="etiqueta">Fax</label></td>
                                                <td><input class="box" type="text" name="txtfaxContacto" value="<?= $xfax; ?>" /></td>
                                            </tr>
                                            <tr>
                                                <td><label class="etiqueta">Mail</label></td>
                                                <td><input class="box" type="text" name="txtmailcontacto" value="<?= $xmail; ?>" /></td>
                                            </tr>
                                            <tr>
                                                <td><label >Idioma</label></td>
                                                <td><?php
                                   echo "<select  name='cboIdioma' id='cboIdioma'>";
                                   echo "<option value=''></option>";
                                   foreach ($idiomas as $idioma) {
                                       if ($xidioma === $idioma->nombre) {
                                           echo "<option value='" . $idioma->nombre . "' selected>" . $idioma->nombre . "</option>";
                                       } else {
                                           echo "<option value='" . $idioma->nombre . "'>" . $idioma->nombre . "</option>";
                                       }
                                   }
                                   echo "</select>";
                                   ?>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                    <td valign="top">
                                        <table width="100%" border="0" cellpadding="0" cellspacing="0">
                                            <tr>
                                                <td width="26%" align="left" valign="top">   
                                                    <table width="180" border="0" cellpadding="0" cellspacing="0">
                                                        <tr>
                                                          <td colspan="2">&nbsp;</td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="2">Permisos</td>
                                                        </tr>
                                                        <tr>
                                                            <td width="20"><input type="checkbox" name="chktechniforum" id="chktechniforum" <? echo ($xtechni_forum === "1") ? "checked" : ""; ?> /></td>
                                                            <td width="150">Techni-Forum</td>
                                                        </tr>
                                                        <tr>
                                                            <td width="20"><input type="checkbox" name="chkreportett" id="chkreportett" <? echo ($xreportes_tt === "1") ? "checked" : ""; ?> ></td>
                                                            <td width="150">TT Reportes Contacto</td>
                                                        </tr>
                                                        <tr>
                                                            <td width="20"><input type="checkbox" name="chkreportettcom" id="chkreportettcom" <? echo ($xreportes_tt_com === "1") ? "checked" : ""; ?> ></td>
                                                            <td width="150">TT Reportes Compañia</td>
                                                        </tr>
                                                        <tr>
                                                            <td><input type="checkbox" name="chkcontacinteres" id="chkcontacinteres" <? echo ($xcontac_interes === "S") ? "checked" : ""; ?> ></td>
                                                            <td>Richtiger Ansprechpartner</td>
                                                        </tr>
                                                        <tr>
                                                            <td><input type="checkbox" name="chkretirado" id="chkretirado" <? echo ($xretirado === "1") ? "checked" : ""; ?> ></td>
                                                            <td>Retirado</td>
                                                        </tr>
                                                        <tr>
                                                            <td><input type="checkbox" name="chknich" id="chknich" <? echo ($xchknich === "1") ? "checked" : ""; ?> ></td>
                                                            <td>Nicht richtiger Ansprechpartner</td>
                                                        </tr>
                                                    </table>
                                                </td>
                                                
                                            </tr>
                                        </table>            
                                    </td>                        
                                </tr>
                            </table>
</form>




                        </td>
                        <td valign="top">
                            <!-- div  para llamadas de contactos -->
                          <div id="formularioLlamadas"></div>
                            <!-- fin del div de llamadas -->            
                        </td>                        
                    </tr>
                </table>
          </td>

        </tr>


        <tr>
            <td valign="top">

            </td>
        </tr>
    </table>


<?
//var_dump($contacto);
if ($contacto != null) {
    foreach ($contacto as $row) {
        $xidcontacto =  $row->idcontacto;
        $xidcompania = $row->idcompania;
        $xanrede = $row->anrede;
        $xnombres =  $row->nombres;
        $xapellidos = $row->apellidos;
        $xcargo =  $row->cargo;
        $xdepartamento =  $row->departamento;
        $xtelefono = $row->telefono;
        $xfax = $row->fax;
        $xmail = $row->mail;
        $xcontac_interes = $row->contac_interes;
        $xcelular = $row->celular;
        $xidioma = $row->idioma;
        //$xtechni_forum = '0';
        //$xreportes_tt = '0';
        //$xexportado = '0';
        $xretirado = $row->retirado;
        //$xreportes_tt_com = '0';
        $xchknich = $row->chknich;
        //$xfecha_datos_admin = '0000-00-00';
        //$xfecha_datos_user = '0000-00-00';
    }
} else {
        $xidcontacto =  "";
        $xidcompania = "";
        $xanrede = "";
        $xnombres =  "";
        $xapellidos = "";
        $xcargo =  "";
        $xdepartamento =  "";
        $xtelefono = "";
        $xfax = "";
        $xmail = "";
        $xcontac_interes = "";
        $xcelular = "";
        $xidioma = "";
        //$xtechni_forum = "";
        //$xreportes_tt = "";
        //$xexportado = "";
        $xretirado = "";
        //$xreportes_tt_com = "";
        $xchknich = "";
        //$xfecha_datos_admin = "";
        //$xfecha_datos_user = "";
}
?>

<fieldset class="marginCero">
    <div class="FormLeft ">
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
            <a class="btn" id="btnEliminarC"
               href="#"
               data-toggle="modal"
               title="eliminar"
               ><img src="<?= $this->config->base_url() ?>images/marqueting/eliminar2.png" class="tamanoIconoMantenimiento"></a>                                        

        </div>   
    </div>

</fieldset>

<fieldset id="panelContacto" <? echo ($xretirado === "1") ? "style='background-color: #f8b9b7'" : ""; ?> >
    <form id="frmContacto" action="" method="post">
        <div class="fila">
            <label class="etiqueta" >Contact.</label>
            <input class="boxleft" type="text" name="txtidContacto" id="txtidContacto"  value="<?= $xidcontacto; ?>" readonly>
            <input class="boxleft" type="hidden" name="txtidCompania" id="txtidCompania"  value="<?= $xidcompania; ?>">
            <div class="divLeft">
                <div class="etiquetaCount">
                    Total de Contactos : <b><?= $countContactos ?></b>
                </div>
            </div>
        </div>
        <div class="fila">
            <label class="etiqueta" >Andere</label>
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
        </div>
        <div class="fila">
            <label class="etiqueta" >Nombre</label>
            <input class="box" type="text" name="txtnomContacto" id="txtnomContacto" value="<?= $xnombres; ?>">
        </div>
        <div class="fila">
            <label class="etiqueta">Apellido</label>
            <input class ="box" type="text" name="txtapeContacto" value="<?= $xapellidos; ?>">
        </div>
        <div class="fila">
            <label class="etiqueta">Cargo</label>
            <input class="box" type="text" name="txtcargoContacto" value="<?= $xcargo; ?>">
        </div>
        <div class="fila">
            <label class="etiqueta">Dpt.</label>
            <input class="box" type="text" name="txtdepartamentoContacto" value="<?= $xdepartamento; ?>">
        </div>
        <div class="fila">
            <label class="etiqueta">T&eacute;l.</label>
            <input class="box" type="text" name="txttelefonoContacto" value ="<?= $xtelefono; ?>">
        </div>
        <div class="fila">
            <label class="etiqueta">Cel.</label>
            <input class="box" type="text" name="txtcelularContacto" value="<?= $xcelular; ?>">
        </div>
        <div class="fila">
            <label class="etiqueta">Fax</label>
            <input class="box" type="text" name="txtfaxContacto" value="<?= $xfax; ?>">
        </div>
        <div class="fila">
            <label class="etiqueta">Mail</label>
            <input class="box" type="text" name="txtmailcontacto" value="<?= $xmail; ?>" >
        </div>

        <div class="fila">
            <label class="etiqueta">Idioma</label>

            <?php
            echo "<select  name='cboIdioma' id='cboIdioma'>";
            echo "<option value=''></option>";
            foreach ($idiomas as $idioma) {
                if ($xidioma === $idioma->nombre) {
                    echo "<option value='" . $idioma->nombre  . "' selected>" . $idioma->nombre . "</option>";
                } else {
                    echo "<option value='" . $idioma->nombre  . "'>" . $idioma->nombre . "</option>";
                }
            }
            echo "</select>";
            ?>
        </div>  
        <div class="fila">

            <input type="checkbox" name="chkcontacinteres" id="chkcontacinteres" <? echo ($xcontac_interes === "S") ? "checked" : ""; ?> > Richtiger Ansprechpartner

        </div>
        <div class="fila">

            <input type="checkbox" name="chkretirado" id="chkretirado" <? echo ($xretirado === "1") ? "checked" : ""; ?> > Retirado

        </div>
        <div class="fila">

            <input type="checkbox" name="chknich" id="chknich" <? echo ($xchknich === "1") ? "checked" : ""; ?> > Nicht richtiger Ansprechpartner

        </div>
    </form>
</fieldset>

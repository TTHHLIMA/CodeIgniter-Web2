<?
//var_dump($contacto);
if ($contacto != null) {
    foreach ($contacto as $row) {
        $xidcontacto = $row->idcontacto;
        $xidcompania = $row->idcompania;
        $xandere = $row->anrede;
        $xnombre = $row->nombres;
        $xapellidos = $row->apellidos;
        $xcargo = $row->cargo;
        $xdepartamento = $row->departamento;
        $xtelefono = $row->telefono;
        $xcelular = $row->celular;
        $xfax = $row->fax;
        $xmail = $row->mail;
        $xidioma = $row->idioma;
    }
} else {
    $xidcontacto = "";
    $xidcompania="";
    $xandere="";
    $xnombre = "";
    $xapellidos = "";
    $xcargo = "";
    $xdepartamento = "";
    $xtelefono = "";
    $xcelular = "";
    $xfax = "";
    $xmail = "";
    $xidioma = "";
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

<fieldset >
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
                <option <? echo ($xandere === "Herr") ? "selected" : ""; ?>>Herr</option>
                <option <? echo ($xandere === "Frau") ? "selected" : ""; ?>>Frau</option>
                <option <? echo ($xandere === "Dipl. Ing.") ? "selected" : ""; ?>>Dipl. Ing.</option>
                <option <? echo ($xandere === "Prof") ? "selected" : ""; ?>>Prof</option>
                <option <? echo ($xandere === "Dr.") ? "selected" : ""; ?>>Dr.</option>
                <option <? echo ($xandere === "Mr.") ? "selected" : ""; ?>>Mr.</option>
                <option <? echo ($xandere === "Miss.") ? "selected" : ""; ?>>Miss.</option>
                <option <? echo ($xandere === "Mrs.") ? "selected" : ""; ?>>Mrs.</option>
                <option <? echo ($xandere === "Ms.") ? "selected" : ""; ?>>Ms.</option>
            </select>
        </div>
        <div class="fila">
            <label class="etiqueta" >Nombre</label>
            <input class="box" type="text" name="txtnomContacto" id="txtnomContacto" value="<?= $xnombre; ?>">
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
            echo "<select  name='cboPais' id='cboPais'>";
            echo "<option value=''></option>";
            foreach ($idiomas as $idioma) {
                if ($xidioma === $idioma->nombre) {
                    echo "<option value='" . $idioma->codigo . "' selected>" . $idioma->nombre . "</option>";
                } else {
                    echo "<option value='" . $idioma->codigo . "'>" . $idioma->nombre . "</option>";
                }
            }
            echo "</select>";
            ?>
        </div>  
        <div class="FormLeft">

                                        <input type="checkbox" name="chkmasch" id="chkmasch" <? echo ($VarMasch === "1") ? "checked" : ""; ?> > OEM

                                    </div>
                                    <div class="FormLeft">

                                        <input type="checkbox" name="chkoem" id="chkoem" <? echo ($VarOem === "1") ? "checked" : ""; ?> > Masch/Anlagebau

                                    </div>
                                    <div class="FormLeft">

                                        <input type="checkbox" name="chkdistri" id="chkdistri" <? echo ($VarDistri === "1") ? "checked" : ""; ?> > Distributeur

                                    </div>
    </form>
</fieldset>

<?
//var_dump($contacto);
if ($contacto != null) {
    foreach ($contacto as $row) {
        $xidcontacto = $row->idcontacto;
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

            <a class="btn" id="btnNuevo"
               href="#"
               data-toggle="modal"
               title="Nuevo"
               ><img src="<?= $this->config->base_url() ?>images/marqueting/nuevo.png" class="tamanoIconoMantenimiento"></a>
            <a class="btn" id="btnAgregar"
               href="#"
               data-toggle="modal"
               title="Agregar"
               ><img src="<?= $this->config->base_url() ?>images/marqueting/agregar.png" class="tamanoIconoMantenimiento"></a>
            <a class="btn" id="btnActualizar"
               href="#"
               data-toggle="modal"
               title="Actualizar"
               ><img src="<?= $this->config->base_url() ?>images/marqueting/actualizar.png" class="tamanoIconoMantenimiento"></a>
            <a class="btn" id="btnEliminar"
               href="#"
               data-toggle="modal"
               title="eliminar"
               ><img src="<?= $this->config->base_url() ?>images/marqueting/eliminar2.png" class="tamanoIconoMantenimiento"></a>                                        
            
        </div>   
    </div>

</fieldset>

<fieldset >
    <div class="fila">
        <label class="etiqueta" >Contact.</label>
        <input class="boxleft" type="text" name="txtidContacto" id="txtidContacto"  value="<?= $xidcontacto; ?>" readonly>
    </div>
    <div class="fila">
        <label class="etiqueta" >Nombre</label>
        <input class="box" type="text" name="txtnomContacto" value="<?= $xnombre; ?>">
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
        <select  name="cboPais" id="cboPais">
            <option></option>
        </select>
    </div>                                        
</fieldset>

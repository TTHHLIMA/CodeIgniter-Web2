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
    $xidcontacto ="";
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
    <div class="FormLeft">
        <label >Contacto</label>
    </div>
    
    <div class="FormLeft">
        <input type="text" name="txtidContacto" id="txtidContacto"  value="<?=$xidcontacto;?>">
    </div>

    <div class="FormLeft ">
        <a class="btn" id="btnPrimeroC"
           href="compania/buscar_contacto_primero"
           data-toggle="modal"
           >|<<</a>
        <a class="btn" id="btnAnteriorC"
           href="compania/buscar_contacto_anterior"
           data-toggle="modal"
           ><<</a>
        <a class="btn" id="btnSiguienteC"
           href="compania/buscar_contacto_siguiente"
           data-toggle="modal"
           >>></a>
        <a class="btn" id="btnUltimoC"
           href="compania/buscar_contacto_ultimo"
           data-toggle="modal"
           >>>|</a>
    </div>

</fieldset>

<fieldset >
    <div class="fila">
        <label class="etiqueta" >Nombre</label>
        <input class="box" type="text" name="txtnomContacto" value="<?=$xnombre;?>">
    </div>
    <div class="fila">
        <label class="etiqueta">Apellido</label>
        <input class ="box" type="text" name="txtapeContacto" value="<?=$xapellidos;?>">
    </div>
    <div class="fila">
        <label class="etiqueta">Cargo</label>
        <input class="box" type="text" name="txtcargoContacto" value="<?=$xcargo;?>">
    </div>
    <div class="fila">
        <label class="etiqueta">Dpt.</label>
        <input class="box" type="text" name="txtdepartamentoContacto" value="<?=$xdepartamento;?>">
    </div>
    <div class="fila">
        <label class="etiqueta">T&eacute;l.</label>
        <input class="box" type="text" name="txttelefonoContacto" value ="<?=$xtelefono;?>">
    </div>
    <div class="fila">
        <label class="etiqueta">Cel.</label>
        <input class="box" type="text" name="txtcelularContacto" value="<?=$xcelular;?>">
    </div>
    <div class="fila">
        <label class="etiqueta">Fax</label>
        <input class="box" type="text" name="txtfaxContacto" value="<?=$xfax;?>">
    </div>
    <div class="fila">
        <label class="etiqueta">Mail</label>
        <input class="box" type="text" name="txtmailcontacto" value="<?=$xmail;?>" >
    </div>

    <div class="fila">
        <label class="etiqueta">Idioma</label>
        <select  name="cboPais" id="cboPais">
            <option></option>
        </select>
    </div>                                        
</fieldset>

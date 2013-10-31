<?php
//var_dump($companias);
$VarIdcompania = "";
$VarNombre = "";
$VarCorreo_postal = "";
$VarCalle = "";
$VarLugar = "";
$VarCodigo = "";
$VarPais = "";
$VarTelefono = "";
$VarFax = "";
$VarMail = "";
$VarWeb = "";
$VarInteresante_link = "";
$VarPerfil_cliente = "";
$VarProductos = "";
$VarProcedencia_cliente = "";
$VarAna_abc = "";
$VarPendiente = "";
$VarDepartamento = "";
$VarIdconsorcio = "";
$VarAlias_com = "";
$VarTerminologias = "";
$VarExportado = "";
$VarNocontactar = "";
$VarParalizado = "";
$VarNota = "";
$VarOem = "";
$VarMasch = "";
$VarDistri = "";
$VarFach = "";
$VarPrivat = "";
$VarSonst = "";
$VarBedarfinZukunft = "";
$VarDict = "";
$VarFecha_dict = "";

//consola_google($compania);
if ($compania != null) {
    foreach ($compania as $c) {
        $VarIdcompania = $c->idcompania;
        $VarNombre = $c->nombre;
        $VarCorreo_postal = $c->correo_postal;
        $VarCalle = $c->calle;
        $VarLugar = $c->lugar;
        $VarCodigo = $c->Codigo;
        $VarPais = $c->pais;
        $VarTelefono = $c->telefono;
        $VarFax = $c->fax;
        $VarMail = $c->mail;
        $VarWeb = $c->web;
        $VarInteresante_link = $c->interesante_link;
        $VarPerfil_cliente = $c->perfil_cliente;
        $VarProductos = $c->productos;
        $VarProcedencia_cliente = $c->procedencia_cliente;
        $VarAna_abc = $c->ana_abc;
        $VarPendiente = $c->pendiente;
        $VarDepartamento = $c->departamento;
        $VarIdconsorcio = $c->idconsorcio;
        $VarAlias_com = $c->alias_com;
        $VarTerminologias = $c->terminologias;
        $VarExportado = $c->exportado;
        $VarNocontactar = $c->nocontactar;
        $VarParalizado = $c->paralizado;
        $VarNota = $c->nota;
        $VarOem = $c->oem;
        $VarMasch = $c->masch;
        $VarDistri = $c->distri;
        $VarFach = $c->fach;
        $VarPrivat = $c->privat;
        $VarSonst = $c->sonst;
        $VarBedarfinZukunft = $c->bedarfinZukunft;
        $VarDict = $c->dict;
        $VarFecha_dict = $c->fecha_dict;
    }
}
?>









<table>
    <tr>
        <td colspan="2" valign="top">
            <div class="contenedorFormulario well">

                <div class="FormLeft">
                    <div class="btn-group divLeft">

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
                        <a class="btn" id="btnBuscador"
                           href="#a"
                           data-toggle="modal"
                           title="Buscar"
                           ><img src="<?= $this->config->base_url() ?>images/marqueting/buscar2.png" class="tamanoIconoMantenimiento"></a>
                    </div>  
                    <div class="divLeft">
                        <div class="etiquetaCount">
                            Total de Firmas : <b><?= $countCompania ?></b>
                        </div>
                    </div>
                    <div class="divLeft">
                        <?= ($VarNocontactar === "S") ? "<div class='circuloNoContactar'></div>" : ""; ?>
                    </div>
                    <div class="divLeft">
                        <?= ($VarParalizado === "S") ? "<div class='circuloParalizado'></div>" : ""; ?>
                    </div>
                </div>


            </div>               
        </td>
    </tr>
    <tr valign="top">
        <td>
            <!-- <div class="contenedorFormulario1"> -->
            <div class="contenedorFormulario">
                <div id="formularioCompania" class="divLeft" >  
                    <form id="frmCompania" action="" method="post">
                        <div class="row-fluid">
                            <fieldset class="fieldset2columnasCabecera">

                                <div class="FormLeft">
                                    <label >Firma</label>
                                </div>
                                <div class="FormLeft">
                                    
                                    <input type="text" name="txtidcompania" id="txtidcompania"  value="<?= $VarIdcompania ?>" readonly >
                                </div>

                                <div  class="FormLeft">
                                    <input type="text" name="txtnombre" id="txtnombre" value="<?= $VarNombre ?>" <?= ($VarParalizado === "S") ? " style='background-color: #ccf;'" : ""; ?> >
                                </div>
                            </fieldset>                                        
                        </div>
                        <div class="row-fluid">
                            <fieldset class="fieldset2columnas">
                                <div class="FormLeft">

                                    <input type="checkbox" name="chkmasch" id="chkmasch" <? echo ($VarMasch === "1") ? "checked" : ""; ?> > OEM

                                </div>
                                <div class="FormLeft">

                                    <input type="checkbox" name="chkoem" id="chkoem" <? echo ($VarOem === "1") ? "checked" : ""; ?> > Masch/Anlagebau

                                </div>
                                <div class="FormLeft">

                                    <input type="checkbox" name="chkdistri" id="chkdistri" <? echo ($VarDistri === "1") ? "checked" : ""; ?> > Distributeur

                                </div>
                                <div class="FormLeft">

                                    <input type="checkbox" name="chkfach" id="chkfach" <? echo ($VarFach === "1") ? "checked" : ""; ?> > FachDienstleister

                                </div>
                                <div class="FormLeft">

                                    <input type="checkbox" name="chkprivat" id="chkprivat" <? echo ($VarPrivat === "1") ? "checked" : ""; ?> > Privat

                                </div>
                                <div class="FormLeft">

                                    <input type="checkbox" name="chksonst" id="chksonst" <? echo ($VarSonst === "1") ? "checked" : ""; ?> > Sonst.

                                </div>
                                <div class="FormLeft">

                                    <input type="checkbox" name="chkdict" id="chkdict" <? echo ($VarDict === "1") ? "checked" : ""; ?> > DICT

                                </div>
                            </fieldset>                    
                        </div>


                        <!-- primera columna -->
                        <div class="izquierdaFormulario">
                            <fieldset>
                                <div class="fila">
                                    <label class="etiqueta" >Calle</label>
                                    <input class="box" type="text" name="txtcalle" id="txtcalle" value="<?= $VarCalle ?>">
                                </div>
                                <div class="fila">
                                    <label class="etiqueta">Codigo</label>
                                    <input class ="box" type="text" name="txtcodigo" id="txtcodigo" value="<?= $VarCodigo ?>">
                                </div>
                                <div class="fila">
                                    <label class="etiqueta">Lugar</label>
                                    <input class="box" type="text" name="txtlugar" id="txtlugar" value="<?= $VarLugar ?>">
                                </div>

                                <div class="fila">
                                    <?php //consola_google($paises); //HH: verificando los datos que se trae?>
                                    <label class="etiqueta">Pa&iacute;s</label>
                                    <?php
                                    echo "<select  name='cboPais' id='cboPais'>";
                                    echo "<option value=''></option>";
                                    foreach ($paises as $pais) {
                                        if ($VarPais === $pais->codigo) {
                                            echo "<option value='" . $pais->codigo . "' selected>" . $pais->nombre . "</option>";
                                        } else {
                                            echo "<option value='" . $pais->codigo . "'>" . $pais->nombre . "</option>";
                                        }
                                    }
                                    echo "</select>";
                                    ?>




                                </div>
                            </fieldset>
                            <fieldset>
                                <div class="fila">
                                    <label class="etiqueta">Tel.</label>
                                    <input class="box" type="text" name="txttelefono" id="txttelefono" value="<?= $VarTelefono ?>">
                                </div>
                                <div class="fila">
                                    <label class="etiqueta">Fax</label>
                                    <input class="box" type="text" name="txtfax" id="txtfax" value="<?= $VarFax ?>">
                                </div>
                                <div class="fila">
                                    <label class="etiqueta">Mail</label>
                                    <input class="box" type="text" name="txtmail" id="txtmail" value="<?= $VarMail ?>">
                                </div>
                                <div class="fila">
                                    <label class="etiqueta">Web</label>
                                    <input class="box" type="text" name="txtweb" id="txtweb" value="<?= $VarWeb ?>">
                                </div>
                                <div class="fila">
                                    <label class="etiqueta">Web2</label>
                                    <input class="box" type="text" name="txtweb2" id="txtweb2"value="<?= $VarInteresante_link ?>">
                                </div>
                            </fieldset>
                            <fieldset>

                                <div class="fila">
                                    <label class="totalHorizontal">Consorcio</label>
                                    <?php
                                    echo "<select class='totalHorizontal' name='cboconsorcio' id='cboconsorcio'>";
                                    echo "<option value=''></option>";
                                    foreach ($consorcios as $consorcio) {
                                        if ($VarIdconsorcio === $consorcio->idconsorcio) {
                                            echo "<option value='" . $consorcio->idconsorcio . "' selected>" . $consorcio->nombre . "</option>";
                                        } else {
                                            echo "<option value='" . $consorcio->idconsorcio . "'>" . $consorcio->nombre . "</option>";
                                        }
                                    }
                                    echo "</select>";
                                    ?>
                                </div>
                            </fieldset>
                            <fieldset>



                                <div class="fila">
                                    <label class="totalHorizontal">Listado de Ferias</label>
                                    <?php
                                    echo "<select class='totalHorizontal' size='2' id='cboferias' name='cboferias' multiple >";
                                    foreach ($ferias as $feria) {
                                        echo "<option value=''>" . $feria->nombre . " - " . $feria->fecha_comienzo . " - " . $feria->fecha_final . "</option>";
                                    }
                                    echo "</select>";
                                    ?>
                                </div>

                            </fieldset>

                        </div>
                        <!-- fin de primera columna -->
                        <!-- segunda columna -->
                        <div class="centroFormulario">

                            <fieldset>
                                <div class="fila">
                                    <div class="izquierdaAnalisis">
                                        Analisis ABC
                                    </div>

                                    <div class="centroAnalisis">
                                        <select  name="cboAnalisis" id="cboAnalisis" >
                                            <option value=''></option>
                                            <option <? echo ($VarAna_abc === "A") ? "selected" : ""; ?>>A</option>
                                            <option <? echo ($VarAna_abc === "B") ? "selected" : ""; ?>>B</option>
                                            <option <? echo ($VarAna_abc === "C") ? "selected" : ""; ?>>C</option>
                                        </select>
                                    </div>

                                    <div class="derechaAnalisis">
                                        <label class="checkbox">
                                            <input type="checkbox"  name="chkpendiente" id="chkpendiente" <? echo ($VarPendiente === "S") ? "checked" : ""; ?> > Pendiente
                                        </label>
                                    </div>
                                </div>

                                <div class="fila">
                                    <label class="etiqueta">Procedencia</label>
                                    <select class="box" name="cboprocedencia" id="cboprocedencia">
                                        <option value=''></option>
                                        <option <? echo ($VarProcedencia_cliente === "Gelbe Seiten Buch") ? "selected" : ""; ?> >Gelbe Seiten Buch</option>
                                        <option <? echo ($VarProcedencia_cliente === "Gelbe Seiten Internet") ? "selected" : ""; ?> >Gelbe Seiten Internet</option>
                                        <option <? echo ($VarProcedencia_cliente === "Google Internet") ? "selected" : ""; ?> >Google Internet</option>
                                        <option <? echo ($VarProcedencia_cliente === "1&1 Statistiken") ? "selected" : ""; ?> >1&1 Statistiken</option>
                                        <option <? echo ($VarProcedencia_cliente === "Allg. Internet") ? "selected" : ""; ?> >Allg. Internet</option>
                                        <option <? echo ($VarProcedencia_cliente === "Telefonmarketing") ? "selected" : ""; ?> >Telefonmarketing</option>
                                    </select>
                                </div>
                                <div class="fila">
                                    <label class="totalHorizontal">Producto</label>
                                    <textarea class="totalHorizontal" name="txtproducto" id="txtproducto"><?= $VarProductos ?></textarea>
                                </div>
                                <div class="fila">
                                    <label class="totalHorizontal">Perfil del Cliente</label>
                                    <textarea class="totalHorizontal" name="txtperfilCliente" id="txtperfilCliente"><?= $VarPerfil_cliente ?></textarea>
                                </div>

                                <div class="fila">
                                    <label class="totalHorizontal">Wirtschaftslage</label>
                                    <select class="totalHorizontal" name="cboWirtschaftslage" id="cboWirtschaftslage">
                                        <option value=''></option>
                                        <option <? echo ($VarBedarfinZukunft === "Positiv+") ? "selected" : ""; ?> >Positiv+</option>
                                        <option <? echo ($VarBedarfinZukunft === "Positiv") ? "selected" : ""; ?> >Positiv</option>
                                        <option <? echo ($VarBedarfinZukunft === "Normal") ? "selected" : ""; ?> >Normal</option>
                                        <option <? echo ($VarBedarfinZukunft === "ruhig") ? "selected" : ""; ?> >ruhig</option>
                                        <option <? echo ($VarBedarfinZukunft === "Schlecht") ? "selected" : ""; ?> >Schlecht</option>
                                    </select>
                                </div>                            

                            </fieldset>
                            <fieldset>

                                <div class="fila">
                                    <label class="totalHorizontal">Listado de Categorias</label>

                                    <?php
                                    echo "<select class='totalHorizontal' size='2' id='cbocategorias' name='cbocategorias' multiple >";
                                    foreach ($categorias as $categoria) {
                                        echo "<option value=''>" . $categoria->nombre . "</option>";
                                    }
                                    echo "</select>";
                                    ?>
                                </div>
                            </fieldset>
                            <fieldset>

                                <div class="fila">
                                    <label class="totalHorizontal">Listado de Parthner</label>

                                    <?php
                                    echo "<select class='totalHorizontal' size='2' id='cboparthner' name='cboparthner' multiple >";
                                    foreach ($partner as $partne) {
                                        echo "<option value=''>" . $partne->nombre . " - " . $partne->categoria . "</option>";
                                    }
                                    echo "</select>";
                                    ?>
                                </div>    
                            </fieldset>

                        </div>
                    </form>
                </div>
            </div>

            <!-- fin de segunda columna -->

        </td>
        <td>

            <div id="formularioContacto" >
                <!-- tercera columna -->
                <!-- Formulario Contactos -->


                <!-- fin de tercera columna -->
            </div>
        </td>


    </tr>
</table>



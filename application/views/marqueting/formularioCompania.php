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









<table width="1000">
    <tr>
        <td  valign="top">
            <table width="100%">
                <tr>
                    <td width="130px">

                        <div class="btn-group">
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

                    </td>
                    <td width="170px;">
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
                    </td>
                    <td width="140">
                    <div class="etiquetaCount">
                            Total de Firmas : <b><?= $countCompania ?></b>
                        </div></td>
                    <td>
					<?= ($VarNocontactar === "S") ? "<div class='circuloNoContactar'></div>" : ""; ?></td>
                    <td>
                    <?= ($VarParalizado === "S") ? "<div class='circuloParalizado'></div>" : ""; ?>
                    </td>
                    <td>
                    <table width="100%" border="0" cellpadding="0" cellspacing="0">
                    	<tr>
                        	<td width="160"><a class="btn" id="btncompania"
                               href="#a"
                               data-toggle="modal"
                               title="Buscar"
                               >Compania y Contactos</a></td>
                            <td width="30"><a class="btn" id="btncompania"
                               href="#a"
                               data-toggle="modal"
                               title="Buscar"
                               > A </a></td>
                            <td width="30"><a class="btn" id="btncompania"
                               href="#a"
                               data-toggle="modal"
                               title="Buscar"
                               > B </a></td>
                            <td width="30"><a class="btn" id="btncompania"
                               href="#a"
                               data-toggle="modal"
                               title="Buscar"
                               > C </a></td>
                            <td width="30"><a class="btn" id="btncompania"
                               href="#a"
                               data-toggle="modal"
                               title="Buscar"
                               > D </a></td>
                            <td><a class="btn" id="btncompania"
                               href="#a"
                               data-toggle="modal"
                               title="Buscar"
                               > Pendiente </a></td>
                            <td><a class="btn" id="btncompania"
                               href="#a"
                               data-toggle="modal"
                               title="Buscar"
                               > No Contactar </a></td>
                            <td><a class="btn" id="btncompania"
                               href="#a"
                               data-toggle="modal"
                               title="Buscar"
                               > Paralizado </a></td>
                        </tr>
                    </table>
                    </td>
                </tr>
            </table>               
        </td>
    </tr>
    <tr valign="top">
        <td>

            <!-- <div class="contenedorFormulario1"> -->
            <div class="contenedorFormulario">
                <div id="formularioCompania" class="divLeft" >  
                    <form id="frmCompania" action="" method="post">
                        <table width="1000" border="0" cellpadding="0" cellspacing="0">
                            <tr>
                                <td>
                                    <table border="0" cellpadding="0" cellspacing="1">
                                        <tr>
                                            <td width="35">Firma</td>
                                            <td width="55"><input type="text" name="txtidcompania" id="txtidcompania"  value="<?= $VarIdcompania ?>" readonly ></td>
                                            <td width="450"> <input type="text" name="txtnombre" id="txtnombre" value="<?= $VarNombre ?>" <?= ($VarParalizado === "S") ? " style='background-color: #ccf;'" : ""; ?> ></td>
                                            <td><table border="0" cellspacing="1">
                                                    <tr>
                                                        <td width="80">Analisis ABC</td>
                                                        <td width="30">
                                                            <select  name="cboAnalisis" id="cboAnalisis" >
                                                                <option value=''></option>
                                                                <option <? echo ($VarAna_abc === "A") ? "selected" : ""; ?>>A</option>
                                                                <option <? echo ($VarAna_abc === "B") ? "selected" : ""; ?>>B</option>
                                                                <option <? echo ($VarAna_abc === "C") ? "selected" : ""; ?>>C</option>
                                                            </select>
                                                        </td>
                                                        <td>

                                                        </td>
                                                        <td width="18"><input type="checkbox"  name="chkpendiente" id="chkpendiente" <? echo ($VarPendiente === "S") ? "checked" : ""; ?> /></td>
                                                        <td width="60">Pendiente</td>
                                                        <td width="15">&nbsp;</td>
                                                        <td>Wirtschaftslage</td>
                                                        <td>
                                                            <select  name="cboWirtschaftslage" id="cboWirtschaftslage">
                                                                <option value=''></option>
                                                                <option <? echo ($VarBedarfinZukunft === "Positiv+") ? "selected" : ""; ?> >Positiv+</option>
                                                                <option <? echo ($VarBedarfinZukunft === "Positiv") ? "selected" : ""; ?> >Positiv</option>
                                                                <option <? echo ($VarBedarfinZukunft === "Normal") ? "selected" : ""; ?> >Normal</option>
                                                                <option <? echo ($VarBedarfinZukunft === "ruhig") ? "selected" : ""; ?> >ruhig</option>
                                                                <option <? echo ($VarBedarfinZukunft === "Schlecht") ? "selected" : ""; ?> >Schlecht</option>
                                                            </select>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0">
                                        <tr>
                                            <td width="280" valign="top"><table border="0" cellpadding="0" cellspacing="0">
                                                    <tr>
                                                        <td width="45">Calle</td>
                                                        <td><input class="box" type="text" name="txtcalle" id="txtcalle" value="<?= $VarCalle ?>"></td>
                                                    </tr>
                                                    <tr>
                                                        <td width="45">Codigo</td>
                                                        <td><input class ="box" type="text" name="txtcodigo" id="txtcodigo" value="<?= $VarCodigo ?>"></td>
                                                    </tr>
                                                    <tr>
                                                        <td width="45">Lugar</td>
                                                        <td><input class="box" type="text" name="txtlugar" id="txtlugar" value="<?= $VarLugar ?>"></td>
                                                    </tr>
                                                    <tr>
                                                        <td width="45">Pa&iacute;s</td>
                                                        <td><?php
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
                                                            ?></td>
                                                    </tr>
                                                </table></td>
                                            <td width="280" valign="top"><table width="98%" border="0" cellpadding="0" cellspacing="0">
                                                    <tr>
                                                        <td>
                                                            <table width="100%" border="0" cellpadding="0" cellspacing="0"><tr><td>Producto</td></tr><tr><td><textarea class="totalHorizontal" name="txtproducto" id="txtproducto"><?= $VarProductos ?></textarea></td></tr></table>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><table width="100%" border="0" cellpadding="0" cellspacing="0"><tr><td>Perfil del Cliente</td></tr><tr><td><textarea class="totalHorizontal" name="txtperfilCliente" id="txtperfilCliente"><?= $VarPerfil_cliente ?></textarea></td></tr></table></td>
                                                    </tr>
                                                </table>
                                            </td>
                                            <td width="349" valign="top"><table border="0" cellpadding="0" cellspacing="0">
                                                    <tr>
                                                        <td colspan="4"><table width="100%" border="0" cellpadding="0" cellspacing="0">
                                                                <tr>
                                                                    <td><span class="fila">Procedencia</span></td>
                                                                    <td><span class="fila">
                                                                            <select class="box" name="cboprocedencia" id="cboprocedencia">
                                                                                <option value=''></option>
                                                                                <option <? echo ($VarProcedencia_cliente === "Gelbe Seiten Buch") ? "selected" : ""; ?> >Gelbe Seiten Buch</option>
                                                                                <option <? echo ($VarProcedencia_cliente === "Gelbe Seiten Internet") ? "selected" : ""; ?> >Gelbe Seiten Internet</option>
                                                                                <option <? echo ($VarProcedencia_cliente === "Google Internet") ? "selected" : ""; ?> >Google Internet</option>
                                                                                <option <? echo ($VarProcedencia_cliente === "1&1 Statistiken") ? "selected" : ""; ?> >1&1 Statistiken</option>
                                                                                <option <? echo ($VarProcedencia_cliente === "Allg. Internet") ? "selected" : ""; ?> >Allg. Internet</option>
                                                                                <option <? echo ($VarProcedencia_cliente === "Telefonmarketing") ? "selected" : ""; ?> >Telefonmarketing</option>
                                                                            </select>
                                                                        </span></td>
                                                                </tr>
                                                            </table></td>
                                                    </tr>
                                                    <tr>
                                                        <td width="18"><input type="checkbox" name="chkmasch" id="chkmasch" <? echo ($VarMasch === "1") ? "checked" : ""; ?> /></td>
                                                        <td width="105">OEM</td>
                                                        <td width="18"><input type="checkbox" name="chkprivat" id="chkprivat" <? echo ($VarPrivat === "1") ? "checked" : ""; ?> /></td>
                                                        <td width="80">Privat</td>
                                                    </tr>
                                                    <tr>
                                                        <td width="18"><input type="checkbox" name="chkoem" id="chkoem" <? echo ($VarOem === "1") ? "checked" : ""; ?> /></td>
                                                        <td width="105"> Masch/Anlagebau</td>
                                                        <td width="18"><input type="checkbox" name="chksonst" id="chksonst" <? echo ($VarSonst === "1") ? "checked" : ""; ?> /></td>
                                                        <td width="80">Sonst.</td>
                                                    </tr>
                                                    <tr>
                                                        <td width="18"><input type="checkbox" name="chkdistri" id="chkdistri" <? echo ($VarDistri === "1") ? "checked" : ""; ?> /></td>
                                                        <td width="105">Distributeur</td>
                                                        <td width="18"><input type="checkbox" name="chkdict" id="chkdict" <? echo ($VarDict === "1") ? "checked" : ""; ?> /></td>
                                                        <td width="80">DICT</td>
                                                    </tr>
                                                    <tr>
                                                        <td width="18"><input type="checkbox" name="chkfach" id="chkfach" <? echo ($VarFach === "1") ? "checked" : ""; ?> /></td>
                                                        <td width="105">FachDienstleister</td>
                                                        <td width="18">&nbsp;</td>
                                                        <td width="80">&nbsp;</td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="4"></td>
                                                    </tr>
                                                </table></td>
                                            <td width="349" valign="top">&nbsp;</td>
                                        </tr>
                                    </table></td>
                            </tr>

                            <tr>
                                <td><table width="100%" border="0" cellpadding="0" cellspacing="0">
                                        <tr>
                                            <td width="280" align="left" valign="top"><table border="0" cellpadding="0" cellspacing="0">
                                                    <tr>
                                                        <td width="45">Tel.</td>
                                                        <td width="100"><input class="box" type="text" name="txttelefono" id="txttelefono" value="<?= $VarTelefono ?>"></td>
                                                    </tr>
                                                    <tr>
                                                        <td width="45">Fax</td>
                                                        <td width="100"><input class="box" type="text" name="txtfax" id="txtfax" value="<?= $VarFax ?>"></td>
                                                    </tr>
                                                    <tr>
                                                        <td width="45">Mail</td>
                                                        <td width="100"><input class="box" type="text" name="txtmail" id="txtmail" value="<?= $VarMail ?>"></td>
                                                    </tr>
                                                    <tr>
                                                        <td width="45">Web</td>
                                                        <td><input class="box" type="text" name="txtweb" id="txtweb" value="<?= $VarWeb ?>"></td>
                                                    </tr>
                                                    <tr>
                                                        <td width="45">Web2</td>
                                                        <td width="100"><input class="box" type="text" name="txtweb2" id="txtweb2"value="<?= $VarInteresante_link ?>"></td>
                                                    </tr>
                                                </table></td>
                                            <td width="250" align="left" valign="top"><table width="98%" border="0">
                                                    <tr>
                                                        <td valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0">
                                                                <tr>
                                                                    <td>Listado de Ferias</td>
                                                                </tr>
                                                                <tr>
                                                                    <td><?php
                                                                        echo "<select class='totalHorizontal' size='2' id='cboferias' name='cboferias' multiple >";
                                                                        foreach ($ferias as $feria) {
                                                                            echo "<option value=''>" . $feria->nombre . " - " . $feria->fecha_comienzo . " - " . $feria->fecha_final . "</option>";
                                                                        }
                                                                        echo "</select>";
                                                                        ?></td>
                                                                </tr>
                                                            </table></td>
                                                    </tr>
                                                    <tr>
                                                        <td valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0">
                                                                <tr>
                                                                    <td width="60">Consorcio</td>
                                                                    <td><?php
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
                                                                        ?></td>
                                                                </tr>
                                                            </table></td>
                                                    </tr>
                                                </table>
                                            </td>
                                            <td width="250" align="left" valign="top">
                                                <table width="98%" border="0" cellpadding="0" cellspacing="0">
                                                    <tr>
                                                        <td>
                                                            Listado de Categorias 
                                                            <a class="btn" id="btncompaniaRelacionadas"
                                                                href="#a"
                                                                data-toggle="modal"
                                                                title="Mostrar Companias Relacionadas"
                                                                >Mostrar Firmas</a>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>   
                                                            <?php
                                                            echo "<select class='totalHorizontal' size='2' id='cbocategorias' name='cbocategorias' multiple >";
                                                            foreach ($categorias as $categoria) {
                                                                echo "<option value=''>" . $categoria->nombre . "</option>";
                                                            }
                                                            echo "</select>";
                                                            ?>
                                                        </td>
                                                    </tr>
                                                </table>

                                            </td>
                                            <td width="250" align="left" valign="top">
                                                <table width="98%" border="0" cellpadding="0" cellspacing="0">
                                                    <tr>
                                                        <td>Listado de Parthner</td>
                                                    </tr>
                                                    <tr>
                                                        <td>   
                                                            <?php
                                                            echo "<select class='totalHorizontal' size='2' id='cboparthner' name='cboparthner' multiple >";
                                                            foreach ($partner as $partne) {
                                                                echo "<option value=''>" . $partne->nombre . " - " . $partne->categoria . "</option>";
                                                            }
                                                            echo "</select>";
                                                            ?>
                                                        </td>
                                                    </tr>
                                                </table>             
                                            </td>
                                        </tr>
                                    </table></td>
                            </tr>

                        </table>
                    </form>
                </div>
            </div>
            <!-- fin de segunda columna -->

        </td>
    </tr>


    <tr>
        <td bgcolor="#CCCC00">
            <div id="formularioContacto" >
                <!-- Formulario Contactos -->
                <!-- fin de tercera columna -->
            </div>
        </td>
    </tr>
</table>



<?php
//var_dump($companias);
$VarIdcompania = "";
$VarNombre = "";
$VarCalle = "";
$VarLugar = "";
$VarCodigo = "";
$VarTelefono = "";
$VarFax = "";
$VarMail = "";
$VarWeb = "";
$VarInteresante_link = "";
$VarAna_abc = "";
$VarPerfil_cliente = "";
$VarProductos = "";
$VarPais = "";
//consola_google($compania);
if ($compania != null) {
    foreach ($compania as $c) {
        $VarIdcompania = $c->idcompania;
        $VarNombre = $c->nombre;
        $VarCalle = $c->calle;
        $VarLugar = $c->lugar;
        $VarCodigo = $c->Codigo;
        $VarTelefono = $c->telefono;
        $VarFax = $c->fax;
        $VarMail = $c->Mail;
        $VarWeb = $c->web;
        $VarInteresante_link = $c->interesante_link;
        $VarAna_abc = $c->ana_abc;
        $VarPerfil_cliente = $c->perfil_cliente;
        $VarProductos = $c->productos;
        $VarPais = $c->pais;
    }
}
?>

<div class="">
    <div class="row-fluid">



        <div class="span12">
            <div  class="well row-fluid span12">







                <div class="contenedorFormulario well">
                    <fieldset class="fieldset2columnas">
                        <div class="FormLeft">
                            <a class="btn" id="btnPrimero"
                               href="#"
                               data-toggle="modal"
                               >|<<</a>  
                            <a class="btn" id="btnAnterior"
                               href="#"
                               data-toggle="modal" 
                               ><<</a>
                            <a class="btn" id="btnSiguiente"
                               href="#"
                               data-toggle="modal"
                               >>></a>
                            <a class="btn" id="btnUltimo"
                               href="#"
                               data-toggle="modal"
                               >>>|</a>

                            <a class="btn" id="btnNuevo"
                               href="#"
                               data-toggle="modal"
                               >Nuevo</a>
                            <a class="btn" id="btnAgregar"
                               href="#"
                               data-toggle="modal"
                               >Agregar</a>
                            <a class="btn" id="btnActualizar"
                               href="#"
                               data-toggle="modal"
                               >Actualizar</a>
                            <a class="btn" id="btnEliminar"
                               href="#"
                               data-toggle="modal"
                               >Eliminar</a>                                        
                            <a class="btn" id="btnBuscador"
                               href="#a"
                               data-toggle="modal"
                               >Buscar</a>
                        </div>

                    </fieldset>
                </div>               


                <div class="contenedorFormulario well">

                    <div id="formularioCompania" class="divLeft" >  
                        <form id="frmCompania" action="" method="post">
                            <div class="row-fluid">
                                <fieldset class="fieldset2columnasCabecera">

                                    <div class="FormLeft">
                                        <label >Firma</label>
                                    </div>
                                    <div class="FormLeft">
                                        <input type="text" name="txtidcompania" id="txtidcompania"  value="<?= $VarIdcompania ?>" disabled>
                                    </div>

                                    <div  class="FormLeft">
                                        <input type="text" name="txtnombre" id="txtnombre" value="<?= $VarNombre ?>">
                                    </div>
                                </fieldset>                                        
                            </div>
                            <div class="row-fluid">
                                <fieldset class="fieldset2columnas">
                                    <div class="FormLeft">

                                        <input type="checkbox"> OEM

                                    </div>
                                    <div class="FormLeft">

                                        <input type="checkbox"> Masch/Anlagebau

                                    </div>
                                    <div class="FormLeft">

                                        <input type="checkbox"> Distributeur

                                    </div>
                                    <div class="FormLeft">

                                        <input type="checkbox"> FachDienstleister

                                    </div>
                                    <div class="FormLeft">

                                        <input type="checkbox"> Privat

                                    </div>
                                    <div class="FormLeft">

                                        <input type="checkbox"> Sonst.

                                    </div>
                                    <div class="FormLeft">

                                        <input type="checkbox"> DICT

                                    </div>
                                </fieldset>                    
                            </div>


                            <!-- primera columna -->
                            <div class="izquierdaFormulario">
                                <fieldset>
                                    <div class="fila">
                                        <label class="etiqueta" >Calle</label>
                                        <input class="box" type="text" name="txtcalle" value="<?= $VarCalle ?>">
                                    </div>
                                    <div class="fila">
                                        <label class="etiqueta">Codigo</label>
                                        <input class ="box" type="text" name="txtcodigo" value="<?= $VarCodigo ?>">
                                    </div>
                                    <div class="fila">
                                        <label class="etiqueta">Lugar</label>
                                        <input class="box" type="text" name="txtlugar" value="<?= $VarLugar ?>">
                                    </div>

                                    <div class="fila">
                                        <?php //consola_google($paises); //HH: verificando los datos que se trae?>
                                        <label class="etiqueta">Pa&iacute;s</label>
                                        <?php
                                        echo "<select  name='cboPais' id='cboPais'>";
                                        echo "<option value=''></option>";
                                        foreach ($paises as $pais) {
                                            if ($VarPais===$pais->codigo){
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
                                        <input class="box" type="text" name="txttelefono" value="<?= $VarTelefono ?>">
                                    </div>
                                    <div class="fila">
                                        <label class="etiqueta">Fax</label>
                                        <input class="box" type="text" name="txtfax" value="<?= $VarFax ?>">
                                    </div>
                                    <div class="fila">
                                        <label class="etiqueta">Mail</label>
                                        <input class="box" type="text" name="txtmail" value="<?= $VarMail ?>">
                                    </div>
                                    <div class="fila">
                                        <label class="etiqueta">Web</label>
                                        <input class="box" type="text" name="txtweb" value="<?= $VarWeb ?>">
                                    </div>
                                    <div class="fila">
                                        <label class="etiqueta">Web2</label>
                                        <input class="box" type="text" name="txtweb2" value="<?= $VarAna_abc ?>">
                                    </div>
                                </fieldset>
                                <fieldset>

                                    <div class="fila">
                                        <label class="totalHorizontal">Consorcio</label>
                                        <select class="totalHorizontal" >

                                            <option></option>

                                        </select>
                                    </div>
                                </fieldset>
                                <fieldset>



                                    <div class="fila">
                                        <label class="totalHorizontal">Listado de Ferias</label>
                                        <select class="totalHorizontal" size="2" multiple >

                                            <option></option>

                                        </select>
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
                                                <option>A</option>
                                                <option>B</option>
                                                <option>C</option>
                                            </select>
                                        </div>

                                        <div class="derechaAnalisis">
                                            <label class="checkbox">
                                                <input type="checkbox"> Pendiente
                                            </label>
                                        </div>
                                    </div>

                                    <div class="fila">
                                        <label class="etiqueta">Procedencia</label>
                                        <select class="box" name="cboprocedencia" id="cboprocedencia">
                                            <option>Gelbe Seiten Buch</option>
                                            <option>Gelbe Seiten Internet</option>
                                            <option>Google Internet</option>
                                            <option>1&1 Statistiken</option>
                                            <option>Allg. Internet</option>
                                            <option>Telefonmarketing</option>
                                        </select>
                                    </div>
                                    <div class="fila">
                                        <label class="totalHorizontal">Producto</label>
                                        <textarea class="totalHorizontal" name="txtproducto"><?= $VarProductos ?></textarea>
                                    </div>
                                    <div class="fila">
                                        <label class="totalHorizontal">Perfil del Cliente</label>
                                        <textarea class="totalHorizontal" name="txtperfilCliente"><?= $VarPerfil_cliente ?></textarea>
                                    </div>

                                    <div class="fila">
                                        <label class="totalHorizontal">Wirtschaftslage</label>
                                        <select class="totalHorizontal" name="cboWirtschaftslage">
                                            <option>Positiv+</option>
                                            <option>Positiv</option>
                                            <option>Normal</option>
                                            <option>ruhig</option>
                                            <option>Schlecht</option>
                                        </select>
                                    </div>                            

                                </fieldset>
                                <fieldset>

                                    <div class="fila">
                                        <label class="totalHorizontal">Listado de Categorias</label>
                                        <select class="totalHorizontal" size="2" multiple >
                                            <option></option>
                                        </select>
                                    </div>
                                </fieldset>
                                <fieldset>

                                    <div class="fila">
                                        <label class="totalHorizontal">Listado de Parthner</label>
                                        <select class="totalHorizontal" size="2" multiple >
                                            <option></option>
                                        </select>
                                    </div>    
                                </fieldset>

                            </div>
                        </form>
                    </div>
                    <!-- fin de segunda columna -->




                    <div id="formularioContacto" class="divLeft">
                        <!-- tercera columna -->
                        <!-- Formulario Contactos -->


                        <!-- fin de tercera columna -->
                    </div>

                </div>

            </div><!--/row-->
        </div><!--/span-->
    </div><!--/row-->
</div>


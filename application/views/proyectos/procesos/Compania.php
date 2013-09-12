<?
require_once("../Lib/sesion.php");
require '../Lib/Db.conexion.php';
$db = DataBase::getInstance();

$xFiltro = $_GET['xFiltro'];
?>
<!DOCTYPE html >
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title>Techni-Translate (Intranet)</title>

        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
        <!-- Le styles -->
        <link href="../assets/css/bootstrap.css" rel="stylesheet">
        <link href="../css/estilosCompania.css" rel="stylesheet">
            <!--<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>-->


        <!--<link href="../assets/css/hernan.css" rel="stylesheet">-->

        <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
          <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->

        <style type="text/css">
            body {
                padding-top: 60px;
                padding-bottom: 40px;
            }
            .sidebar-nav {
                padding: 9px 0;
            }

            .sinespacio{
                padding:0px;
                margin:0px;
            }
            .titulo{
                font:12px arial,sans-serif;
            }
            .sin_margen{
                margin:0px; padding:0px; border:0px;
            }







        </style>
        <link href="../assets/css/bootstrap-responsive.css" rel="stylesheet">	






        <!-- Le fav and touch icons -->
        <link rel="shortcut icon" href="../img/favicon.ico">






    </head>
    <body>
        <div class="navbar navbar-fixed-top">
            <div class="navbar-inner">
                <div class="container-fluid">
                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </a>			
                    <a class="brand" href="">Bienvenidos a Techni-Translate</a>
                    <!-- botton de sesion -->
                    <div class="btn-group pull-right">
                        <ul class="nav">
                            <li class="active"><a href="../Lib/logout.php">Cerrar Sesion <?php echo $xxxnombre; ?></a></li>
                            <li><a href="#about"></a></li>
                        </ul>
                    </div>				  


                    <div class="nav-collapse">
                        <ul class="nav">
                            <li ><a href="listar.php">Home</a></li>
                            <li ><a href="test.php">Reporte de Cambios de Estados</a></li>
                            <li class="active"><a href="compania.php">Mantenimiento de Firmas</a></li>
                            <li><a href="#about"></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>




        <?php
        $xSql = "";
        $xSql = "select * from compania where idcompania ='" . $xFiltro . "'";
        $db->setQuery($xSql);
        $RsSql = $db->loadObjectList();
        $NrRes = "";
        $NrRes = count($RsSql);
        if ($NrRes > 0) { // imprimo los datos  
            foreach ($RsSql as $Col) {
                $Cidcompania = "";
                $Cidcompania = $Col->idcompania;
                $Cnombre = "";
                $Cnombre = $Col->nombre;
            }
        } else {
            $Cnombre = "";
        }
        ?>





        <div class="">
            <div class="row-fluid">



                <div class="span12">
                    <div class="well row-fluid span12">
                        <form>






                            <div class="contenedorFormulario well">
                                <fieldset class="fieldset2columnas">

                                    <div class="FormLeft">
                                        <label >Firma</label>
                                    </div>
                                    <div class="FormLeft">
                                        <input type="text" name="txtidcompania" id="txtidcompania"  value="<?php echo $Cidcompania; ?>">
                                    </div>

                                    <div class="FormLeft">

                                        <a href="" class="btn">Buscar</a>

                                        <?php
                                        $xSql = "";
                                        $xSql = "SELECT idcompania FROM compania WHERE idcompania > '" . $Cidcompania . "' ORDER BY idcompania asc LIMIT 1";
                                        //echo $xSql;
                                        $db->setQuery($xSql);
                                        $RsSql = $db->loadObjectList();
                                        $NrRes = "";
                                        $NrRes = count($RsSql);
                                        $xCidcompania = "";
                                        if ($NrRes > 0) { // imprimo los datos 
                                            foreach ($RsSql as $Col) {
                                                $xCidcompania = $Col->idcompania;
                                            }
                                        }
                                        ?>
                                        <a href="http://localhost/html5/modulos/compania.php?xFiltro=<? echo $xCidcompania; ?>" class="btn">Siguiente</a>

                                        <?php
                                        $xSql = "";
                                        $xSql = "SELECT idcompania FROM compania WHERE idcompania < '" . $Cidcompania . "' ORDER BY idcompania DESC LIMIT 1";
                                        $db->setQuery($xSql);
                                        $RsSql = $db->loadObjectList();
                                        $NrRes = "";
                                        $NrRes = count($RsSql);
                                        $xCidcompania = "";
                                        if ($NrRes > 0) { // imprimo los datos 
                                            foreach ($RsSql as $Col) {
                                                $xCidcompania = $Col->idcompania;
                                            }
                                        }
                                        ?>
                                        <a href="http://localhost/html5/modulos/compania.php?xFiltro=<? echo $xCidcompania; ?>" class="btn">Anterior</a>

                                        <a href="" class="btn">Actualizar</a>


                                    </div>
                                    <div >
                                        <input type="text" name="txtnombre" id="txtnombre" value="<?php echo $Cnombre; ?>">
                                    </div>
                                </fieldset>
                            </div>               


                            <div class="contenedorFormulario well">

                                <div class="divLeft" >  
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
                                                <input class="box" type="text" name="txtcalle">
                                            </div>
                                            <div class="fila">
                                                <label class="etiqueta">Codigo</label>
                                                <input class ="box" type="text" name="txtcodigo">
                                            </div>
                                            <div class="fila">
                                                <label class="etiqueta">Lugar</label>
                                                <input class="box" type="text" name="txtlugar">
                                            </div>
                                            <?php
                                            $xSql = "";
                                            $xSql = "Select codigo , nombre from pais order by nombre";
                                            $db->setQuery($xSql);
                                            $RsSql = $db->loadObjectList();
                                            $NrRes = "";
                                            $NrRes = count($RsSql);
                                            $xCidcompania = "";
                                            ?>                              
                                            <div class="fila">
                                                <label class="etiqueta">Pa&iacute;s</label>
                                                <select  name="cboPais" id="cboPais">
                                                    <?php
                                                    if ($NrRes > 0) { // imprimo los datos 
                                                        foreach ($RsSql as $Col) {
                                                            echo "<option value='" . $Col->codigo . "'>" . $Col->nombre . "</option>";
                                                        }
                                                    }
                                                    ?>  
                                                </select>
                                            </div>
                                        </fieldset>
                                        <fieldset>
                                            <div class="fila">
                                                <label class="etiqueta">Tel.</label>
                                                <input class="box" type="text" name="txttelefono">
                                            </div>
                                            <div class="fila">
                                                <label class="etiqueta">Fax</label>
                                                <input class="box" type="text" name="txtfax">
                                            </div>
                                            <div class="fila">
                                                <label class="etiqueta">Mail</label>
                                                <input class="box" type="text" name="txtmail">
                                            </div>
                                            <div class="fila">
                                                <label class="etiqueta">Web</label>
                                                <input class="box" type="text" name="txtweb">
                                            </div>
                                            <div class="fila">
                                                <label class="etiqueta">Web2</label>
                                                <input class="box" type="text" name="txtweb2">
                                            </div>
                                        </fieldset>
                                        <fieldset>
                                            <?php
                                            $xSql = "";
                                            $xSql = "select idconsorcio , nombre from consorcio";
                                            $db->setQuery($xSql);
                                            $RsSql = $db->loadObjectList();
                                            $NrRes = "";
                                            $NrRes = count($RsSql);
                                            ?>                             
                                            <div class="fila">
                                                <label class="totalHorizontal">Consorcio</label>
                                                <select class="totalHorizontal" >
                                                    <?php
                                                    if ($NrRes > 0) { // imprimo los datos 
                                                        foreach ($RsSql as $Col) {
                                                            echo "<option value='" . $Col->idconsorcio . "'>" . $Col->nombre . "</option>";
                                                        }
                                                    }
                                                    ?>  
                                                </select>
                                            </div>
                                        </fieldset>
                                        <fieldset>

                                            <?php
                                            $xSql = "";
                                            $xSql = "select feria.nombre , feria.fecha_comienzo , feria.fecha_final from feria , feria_compania where feria.idferia=feria_compania.idferia and feria_compania.idcompania= '" . $Cidcompania . "'";
                                            $db->setQuery($xSql);
                                            $RsSql = $db->loadObjectList();
                                            $NrRes = "";
                                            $NrRes = count($RsSql);
                                            $xCidcompania = "";
                                            ?>                            

                                            <div class="fila">
                                                <label class="totalHorizontal">Listado de Ferias</label>
                                                <select class="totalHorizontal" size="2" multiple >
                                                    <?php
                                                    if ($NrRes > 0) { // imprimo los datos 
                                                        foreach ($RsSql as $Col) {
                                                            $xfecha = "";
                                                            $xfecha1 = "";

                                                            $xfecha = $Col->fecha_comienzo;
                                                            $xfecha1 = $Col->fecha_final;
                                                            if ($xfecha <> "") {
                                                                $xfecha = date("d-m-Y", strtotime($xfecha));
                                                            }
                                                            if ($xfecha1 <> "") {
                                                                $xfecha1 = date("d-m-Y", strtotime($xfecha1));
                                                            }

                                                            echo "<option>" . $Col->nombre . " -- " . $xfecha . " " . $xfecha1 . "</option>";
                                                        }
                                                    }
                                                    ?>   
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
                                                <textarea class="totalHorizontal" name="txtproducto"></textarea>
                                            </div>
                                            <div class="fila">
                                                <label class="totalHorizontal">Perfil del Cliente</label>
                                                <textarea class="totalHorizontal" name="txtperfilCliente"></textarea>
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
                                            <?php
                                            $xSql = "";
                                            $xSql = "select sonts_categoria.nombre from sonts_categoria , sonts_categoria_compania where sonts_categoria.idsonst = sonts_categoria_compania.idsonst and sonts_categoria_compania.idcompania= '" . $Cidcompania . "' order by sonts_categoria_compania.prioridad";
                                            $db->setQuery($xSql);
                                            $RsSql = $db->loadObjectList();
                                            $NrRes = "";
                                            $NrRes = count($RsSql);
                                            ?>                              
                                            <div class="fila">
                                                <label class="totalHorizontal">Listado de Categorias</label>
                                                <select class="totalHorizontal" size="2" multiple >
                                                    <?php
                                                    if ($NrRes > 0) { // imprimo los datos 
                                                        foreach ($RsSql as $Col) {
                                                            echo "<option>" . $Col->nombre . "</option>";
                                                        }
                                                    }
                                                    ?>   
                                                </select>
                                            </div>
                                        </fieldset>
                                        <fieldset>
                                            <?php
                                            $xSql = "";
                                            $xSql = "select compania.nombre , (select distinct sonts_categoria.nombre from sonts_categoria , sonts_categoria_compania  where sonts_categoria.idsonst = sonts_categoria_compania.idsonst and sonts_categoria_compania.prioridad = '1' and sonts_categoria_compania.idcompania = compania.idcompania  limit 1) as categoria  from compania , partner_compania  where  compania.nocontactar ='N' and compania.paralizado = 'N' and  compania.idcompania = partner_compania.partner and partner_compania.idcompania= '" . $Cidcompania . "' order by compania.nombre";
                                            $db->setQuery($xSql);
                                            $RsSql = $db->loadObjectList();
                                            $NrRes = "";
                                            $NrRes = count($RsSql);
                                            ?>                              
                                            <div class="fila">
                                                <label class="totalHorizontal">Listado de Parthner</label>
                                                <select class="totalHorizontal" size="2" multiple >
                                                    <?php
                                                    if ($NrRes > 0) { // imprimo los datos 
                                                        foreach ($RsSql as $Col) {
                                                            echo "<option>" . $Col->nombre . " -- " . $Col->categoria . "</option>";
                                                        }
                                                    }
                                                    ?>   
                                                </select>
                                            </div>    
                                        </fieldset>

                                    </div>
                                </div>
                                <!-- fin de segunda columna -->




                                <div class="divLeft">
                                    <!-- tercera columna -->

                                    <fieldset class="marginCero">
                                        <div class="FormLeft">
                                            <label >Contacto</label>
                                        </div>
                                        <div class="FormLeft">
                                            <input type="text" name="txtidcontcato" id="txtidcompania"  value="<?php echo $Cidcompania; ?>">
                                        </div>

                                        <div class="FormLeft marginCero">
                                            <a href="#" class="btn marginCero">|<</a>
                                            <a href="#" class="btn marginCero">>></a>
                                            <a href="#" class="btn marginCero"><<</a>
                                            <a href="#" class="btn marginCero">>|</a>
                                        </div>

                                    </fieldset>

                                    <fieldset >
                                        <div class="fila">
                                            <label class="etiqueta" >Nombre</label>
                                            <input class="box" type="text" name="txtnomContacto">
                                        </div>
                                        <div class="fila">
                                            <label class="etiqueta">Apellido</label>
                                            <input class ="box" type="text" name="txtcodigo">
                                        </div>
                                        <div class="fila">
                                            <label class="etiqueta">Cargo</label>
                                            <input class="box" type="text" name="txtlugar">
                                        </div>
                                        <div class="fila">
                                            <label class="etiqueta">Dpt.</label>
                                            <input class="box" type="text" name="txtlugar">
                                        </div>
                                        <div class="fila">
                                            <label class="etiqueta">T&eacute;l.</label>
                                            <input class="box" type="text" name="txtlugar">
                                        </div>
                                    <div class="fila">
                                        <label class="etiqueta">Cel.</label>
                                        <input class="box" type="text" name="txtlugar">
                                    </div>
                                    <div class="fila">
                                        <label class="etiqueta">Fax</label>
                                        <input class="box" type="text" name="txtlugar">
                                    </div>
                                    <div class="fila">
                                        <label class="etiqueta">Mail</label>
                                        <input class="box" type="text" name="txtlugar">
                                    </div>
                                            <?php
                                            $xSql = "";
                                            $xSql = "Select codigo , nombre from pais order by nombre";
                                            $db->setQuery($xSql);
                                            $RsSql = $db->loadObjectList();
                                            $NrRes = "";
                                            $NrRes = count($RsSql);
                                            $xCidcompania = "";
                                            ?>                              
                                            <div class="fila">
                                                <label class="etiqueta">Idioma</label>
                                                <select  name="cboPais" id="cboPais">
                                                    <?php
                                                    if ($NrRes > 0) { // imprimo los datos 
                                                        foreach ($RsSql as $Col) {
                                                            echo "<option value='" . $Col->codigo . "'>" . $Col->nombre . "</option>";
                                                        }
                                                    }
                                                    ?>  
                                                </select>
                                            </div>                                        
                                    </fieldset>

                                    <!-- fin de tercera columna -->
                                </div>

                            </div>
                        </form>
                    </div><!--/row-->
                </div><!--/span-->
            </div><!--/row-->
        </div>










        <footer>
            <hr>
            Techni-translate 2013
        </footer>







        <!-- Le javascript
        ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
            <!--<script src="../assets/js/jquery.js"></script>-->
        <!--<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>-->
        <script src="../assets/js/bootstrap-transition.js"></script>
        <script src="../assets/js/bootstrap-alert.js"></script>


        <script src="../assets/js/bootstrap-dropdown.js"></script>
        <script src="../assets/js/bootstrap-scrollspy.js"></script>
        <script src="../assets/js/bootstrap-tab.js"></script>
        <script src="../assets/js/bootstrap-tooltip.js"></script>
        <script src="../assets/js/bootstrap-popover.js"></script>
        <script src="../assets/js/bootstrap-button.js"></script>
        <script src="../assets/js/bootstrap-collapse.js"></script>
        <!--<script src="../assets/js/bootstrap-carousel.js"></script>-->
        <script src="../assets/js/bootstrap-typeahead.js"></script>

    </body>
</html>
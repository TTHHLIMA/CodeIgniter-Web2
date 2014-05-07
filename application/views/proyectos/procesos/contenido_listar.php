<?PHP
$pm = &get_instance();
$pm->load->model("procesos_model");
?>
<div class="container-fluid">
    <div class="row-fluid">




        <div class="span12">
            <div class="row-fluid">







                <?php
                if ($xxxnivel == "1") {
                    // echo "Dato:" . $xCoord;
                    if ($xCoord == 'JSM') {
                        $xCoordJSM = " selected";
                        $xCoordFSM = "";
                        $xCoordTodos = "";
                    }
                    if ($xCoord == 'FSM') {
                        $xCoordJSM = "";
                        $xCoordFSM = " selected";
                        $xCoordTodos = "";
                    }
                    if ($xCoord == 'Todos') {
                        $xCoordJSM = "";
                        $xCoordFSM = "";
                        $xCoordTodos = " selected";
                    }
                    if ($xCoord === '') {
                        $xCoordJSM = "";
                        $xCoordFSM = "";
                        $xCoordTodos = " selected";
                    }



                    $xrbUsuarioCheked1 = "";
                    $xrbUsuarioCheked2 = "";
                    $xrbUsuarioCheked3 = "";
                    $xrbUsuarioCheked4 = "";
                    $xrbUsuarioCheked5 = "";
                    $xrbUsuarioCheked6 = "";
                    $xrbUsuarioCheked7 = "";
                    $xrbUsuarioCheked13 = "";
                    switch ($xFiltro) {
                        case "5":
                            $xrbUsuarioCheked1 = " checked ";
                            break;
                        case "13":
                            $xrbUsuarioCheked13 = " checked ";
                            break;                        
                        case "4":
                            $xrbUsuarioCheked2 = " checked ";
                            break;
                        case "10":
                            $xrbUsuarioCheked3 = " checked ";
                            break;
                        case "12":
                            $xrbUsuarioCheked4 = " checked ";
                            break;
                        case "11":
                            $xrbUsuarioCheked5 = " checked ";
                            break;
                        case "3":
                            $xrbUsuarioCheked6 = " checked ";
                            break;
                        case "0":
                            $xrbUsuarioCheked7 = " checked ";
                            break;
                        default:
                            $xrbUsuarioCheked7 = " checked ";
                    }
                    ?>

                    <table >
                        <tr>
                            <td width="20"></td>
                            <td width="220">
                                <table>
                                    <tr>
                                        <td><label for="CboCoordinadorCab">Coordinador</label></td>
                                        <td>
                                            <select name="CboCoordinadorCab" id="CboCoordinadorCab" style="width:80px;">

                                                <option value="JSM" <?= $xCoordJSM ?> >JSM</option>
                                                <option value="FSM" <?= $xCoordFSM ?> >FSM</option>
                                                <option value="Todos" <?= $xCoordTodos ?> >Todos</option>
                                            </select>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                            <!-- id_usuarios de la tabla usuarios -->
                            <!-- Filtra los usuarios  -->
                            <td width="60"><input type="radio" name="rbUsuario" value="5" onChange="llamaUsuario();"  <?PHP echo $xrbUsuarioCheked1; ?> /> AG</td>
                            <td width="60"><input type="radio" name="rbUsuario" value="13" onChange="llamaUsuario();"  <?PHP echo $xrbUsuarioCheked13; ?> /> BM</td>
                            <td width="60"><input type="radio" name="rbUsuario" value="4" onChange="llamaUsuario();" <?PHP echo $xrbUsuarioCheked2; ?> /> FDM</td>
                            <td width="60"><input type="radio" name="rbUsuario" value="7" onChange="llamaUsuario();" <?PHP echo $xrbUsuarioCheked3; ?> /> FM</td>
                            <td width="60"><input type="radio" name="rbUsuario" value="6" onChange="llamaUsuario();" <?PHP echo $xrbUsuarioCheked4; ?> /> FSM</td>
                            <td width="60"><input type="radio" name="rbUsuario" value="8" onChange="llamaUsuario();"  <?PHP echo $xrbUsuarioCheked5; ?> /> JSM</td>
                            <td width="60"><input type="radio" name="rbUsuario" value="3" onChange="llamaUsuario();" <?PHP echo $xrbUsuarioCheked6; ?> /> YSO</td>
                            <td width="80"><input type="radio" name="rbUsuario" value="0" onChange="llamaUsuario();" <?PHP echo $xrbUsuarioCheked7; ?> /> Todos</td>
                            <td><input class='btn btn-mini' type='button' value='Refresh' onclick='llamaUsuario();'></td>                    
                        </tr>

                    </table>	

                    <?php
                }

                if ($xxxnivel == "1") {
                    $Sql = "";
                    //echo "controller: xCoord=" . $xCoord . "  - xFiltro=" . $xFiltro;
                    if ($xFiltro === "0") {
                        $proceso = $pm->procesos_model->busca_listar_procesos_admin_todos($xCoord);
                    } else {
                        if ($xFiltro === "") {
                            $proceso = $pm->procesos_model->busca_listar_procesos_admin_todos($xCoord);
                        } else {
                            $proceso = $pm->procesos_model->busca_listar_procesos_admin_filtro($xFiltro, $xCoord);
                        }
                    }
                }

                if ($xxxnivel == "2") {
                    $proceso = $pm->procesos_model->busca_listar_procesos_usuario_todos($xxxiduser);
                }
                ?>		
                <table class="table" id="datatables" >
                    <thead>
                        <tr>
                            <th>Item</th>
                            <th>Prioridad</th>
                            <th>Pedido</th>
                            <th>Compania</th>
                            <th>Coordinador</th>
                            <th>Fecha Entrega</th>
                            <th>Idioma de Origen</th>
                            <th>Idioma Finales</th>
                            <th>Salto de Linea</th>
                            <th>Formateo</th>
                            <th>Pre-Traduci&oacute;n</th>
                            <th>Traducci&oacute;n</th>
                            <th>Correci&oacute;n</th>
                            <th>Traduci&oacute;n Final</th>
                            <th>Formato Final</th>

                            <th>Formularios</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $cont = 1;


// HH: BUSCO PROCESOS DONDE INTERVIENE EL USUARIO
// foreach de ka consulta principal
                        //var_dump($proceso);
                        if ($proceso != null) {
                            foreach ($proceso as $Columna) {

                                $interviene = 0; // saber si interviene acumulador
                                if ($xxxnivel == '2') {


                                    $intervieneUser = 0; // saber si interviene acumulador

                                    if ($Columna->user_salto_linea == $xxxiduser) { // si interviene AG en el proceso
                                        if ($Columna->estado_salto_linea == "3") {  // si es = a ok
                                            //echo "Antes Proc Salto de Linea ".$Columna->proc_conf_salto_linea;
                                            if ($Columna->proc_conf_salto_linea != "S") {
                                                $intervieneUser++; // si es diferente interviene
                                            }
                                        } else { // quiere decir k es diferente
                                            $intervieneUser++;
                                        }
                                    }

                                    if ($Columna->user_formateo == $xxxiduser) {
                                        if ($Columna->estado_formateo == "3") {
                                            if ($Columna->proc_conf_formateo != "S") {
                                                $intervieneUser++;
                                            }
                                        } else {
                                            $intervieneUser++;
                                        }
                                    }
                                    if ($Columna->user_pre_traduccion == $xxxiduser) {
                                        if ($Columna->estado_pre_traduccion == "3") {
                                            if ($Columna->proc_conf_pre_traduccion <> "S") {
                                                $intervieneUser++;
                                            }
                                        } else {
                                            $intervieneUser++;
                                        }
                                    }


                                    if ($Columna->user_traduccion == $xxxiduser) {
                                        if ($Columna->estado_traduccion == "3") {
                                            if ($Columna->proc_conf_traduccion <> "S") {
                                                $intervieneUser++;
                                            }
                                        } else {
                                            $intervieneUser++;
                                        }
                                    }

                                    if ($Columna->user_correccion == $xxxiduser) {
                                        if ($Columna->estado_correccion == "3") {
                                            if ($Columna->proc_conf_correccion <> "S") {
                                                $intervieneUser++;
                                            }
                                        } else {
                                            $intervieneUser++;
                                        }
                                    }
                                    if ($Columna->user_traduccion_final == $xxxiduser) {
                                        if ($Columna->estado_traduccion_final == "3") {
                                            if ($Columna->proc_conf_traduccion_final <> "S") {
                                                $intervieneUser++;
                                            }
                                        } else {
                                            $intervieneUser++;
                                        }
                                    }
                                    if ($Columna->user_formato_final == $xxxiduser) {
                                        if ($Columna->estado_formato_final == "3") {
                                            if ($Columna->proc_conf_formato_final <> "S") {
                                                $intervieneUser++;
                                            }
                                        } else {
                                            $intervieneUser++;
                                        }
                                    }
                                    $interviene = $intervieneUser;  // paso los valores encontrados
                                } else {
                                    $interviene = 1; // si admin lo visualiza
                                }

                                if ($interviene > 0) {  // si interviene en algun proceso
                                    ?>





                                    <tr>
                                        <!-- nombre del fomulario 'P100011' -> idpedido + el contador para que no se repita -->
                                <form name="frm<? echo $Columna->idpedido . $cont; ?>" method="POST" action="saveCoordinacion.php">
                                    <td>

                                        <?
                                        echo "<a class='btn btn-mini' href='#" . $Columna->idpedido . "x' 
															onclick='$(\"#" . $Columna->idpedido . "0\").toggle(200);
																	 $(\"#" . $Columna->idpedido . "1\").toggle(200);
																	 $(\"#" . $Columna->idpedido . "2\").toggle(200);
																	 $(\"#" . $Columna->idpedido . "3\").toggle(200);
																	 $(\"#" . $Columna->idpedido . "4\").toggle(200);
																	 $(\"#" . $Columna->idpedido . "5\").toggle(200);
																	 $(\"#" . $Columna->idpedido . "6\").toggle(200);
																	 $(\"#" . $Columna->idpedido . "7\").toggle(200);'>
																	 
																	 <i class='icon-arrow-right'></i></a>";
                                        ?>                                 
                                    </td>


                                    <? echo "<td></td>"; ?>




                                    <td>
                                        <? echo $Columna->idpedido; ?>
                                        <input type="hidden" name="pedido" id="pedido" value="<? echo $Columna->idpedido; ?>"/>
                                    </td>
                                    <td><? echo $Columna->alias_com; ?></td>
                                    <td><? echo $Columna->coordinador ?></td>
                                    <td><? echo $Columna->fechaentrega; ?></td>
                                    <td><? echo $Columna->idioma_origen; ?></td>
                                    <td style="width:200px;"><? echo $Columna->idioma_final; ?></td>

                                    <?php
                                    $Color_Salto_Linea = ponerColorEstados($Columna->salto_linea);
                                    $Color_formateo = ponerColorEstados($Columna->formateo);
                                    $Color_pre_traduccion = ponerColorEstados($Columna->pre_traduccion);
                                    $Color_traduccion = ponerColorEstados($Columna->traduccion);
                                    $Color_correccion = ponerColorEstados($Columna->correccion);
                                    $Color_traduccion_final = ponerColorEstados($Columna->traduccion_final);
                                    $Color_formato_final = ponerColorEstados($Columna->formato_final);
                                    ?>

                                    <td <?= $Color_Salto_Linea ?>><b><? echo mostrarInicialEstado($Columna->salto_linea); ?></b></td>
                                    <td <?= $Color_formateo ?>><b><? echo mostrarInicialEstado($Columna->formateo); ?></b></td>
                                    <td <?= $Color_pre_traduccion ?>><b><? echo mostrarInicialEstado($Columna->pre_traduccion); ?></b></td>
                                    <td <?= $Color_traduccion ?>><b><? echo mostrarInicialEstado($Columna->traduccion); ?></b></td>
                                    <td <?= $Color_correccion ?>><b><? echo mostrarInicialEstado($Columna->correccion); ?></b></td>
                                    <td <?= $Color_traduccion_final ?>><b><? echo mostrarInicialEstado($Columna->traduccion_final); ?></b></td>
                                    <td <?= $Color_formato_final ?>><b><? echo mostrarInicialEstado($Columna->formato_final); ?></b></td>
                                </form>





                                <td style="padding:0px">

                                    <table >
                                        <!-- datos que se ocultan -->
                                        <tr>
                                            <td colspan="7" id="<? echo $Columna->idpedido; ?>0" style="display:none; margin:0px; padding:0px; border:0px;"  >

                                                <span style="background: #EFEFFB;">


                                                    <?php
                                                    echo "<a class='btn btn-mini' href='#" . $Columna->idpedido . "x' 
                                                                                                               onclick='$(\"#" . $Columna->idpedido . "0\").toggle(200);
                                                                                                                                $(\"#" . $Columna->idpedido . "1\").toggle(200);
                                                                                                                                $(\"#" . $Columna->idpedido . "2\").toggle(200);
                                                                                                                                $(\"#" . $Columna->idpedido . "3\").toggle(200);
                                                                                                                                $(\"#" . $Columna->idpedido . "4\").toggle(200);
                                                                                                                                $(\"#" . $Columna->idpedido . "5\").toggle(200);
                                                                                                                                $(\"#" . $Columna->idpedido . "6\").toggle(200);
                                                                                                                                $(\"#" . $Columna->idpedido . "7\").toggle(200);'>

                                                                                                                                <i class=' icon-arrow-left'></i>&nbsp;Cerrar</a>";
                                                    ?>

                                                </span>
                                                <strong style="font-size: 16px;">
                                                <span style="background: #EFEFFB;"><b>Pedido:&nbsp;</b><? echo $Columna->idpedido; ?>&nbsp;</span>
                                                <span style="background: #EFEFFB;"><b>Alias:&nbsp;</b><? echo $Columna->alias_com; ?>&nbsp;</span>
                                                <span style="background: #EFEFFB;"><b>Coordinador:&nbsp;</b><? echo $Columna->coordinador ?>&nbsp;</span>
                                                <span style="background: #EFEFFB;"><b>Fecha de entrega:&nbsp;</b><? echo $Columna->fechaentrega; ?>&nbsp;</span>
                                                <span style="background: #EFEFFB;"><b>Idioma de origen:&nbsp;</b><? echo $Columna->idioma_origen; ?>&nbsp;</span>
                                                <span style="background: #EFEFFB;"><b>Idioma final:&nbsp;</b><? echo $Columna->idioma_final; ?>&nbsp;</span>
                                                </strong>

                                            </td>
                                        </tr>
                                        <!-- fin de datos que se ocultan -->

                                        <tr>
                                            <td colspan="4" style="background-color: #A9BCF5; padding:0px;"><h5 class="titulo">Preparaci&oacute;n</h4></td>
                                            <td colspan="3" style="background-color: #F6CEEC; padding:0px;"><h5 class="titulo">Versi&oacute;n Final</h4></td>
                                        </tr>

                                        <tr class="sin_margen" >
                                            <? include("userformPrepSalto.php"); ?>
                                            <? include("userformPrepFormateo.php"); ?>
                                            <? include("userformPrepPreTrad.php"); ?>
                                            <? include("userformPrepTrad.php"); ?>
                                            <? include("userformPrepCorre.php"); ?>
                                            <? include("userformVerFinTrad.php"); ?>
                                            <? include("userformVerFinFormFin.php"); ?>

                                        </tr>
                                    </table>
                                </td>

                                </tr>

                                <?php
                                $cont++;
                            } // fin si interviene en algun proceso
                            // fin del foreach principal
                        }
                    }
                    ?>








                    <!-- datos de la fila en blanco -->

                    <tr>
                        <!-- nombre del fomulario 'P100011' -> idpedido + el contador para que no se repita -->
                    <form name="frm0" method="POST" action="">
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </form>

                    <td style="padding:0px">
                        <table >
                            <!-- datos que se ocultan -->
                            <tr>
                                <td colspan="7" id="0" style="display:none; margin:0px; padding:0px; border:0px;"  ></td>
                            </tr>
                            <!-- fin de datos que se ocultan -->

                            <tr>
                                <td colspan="4" ></td>
                                <td colspan="3" ></td>
                            </tr>

                            <tr class="sin_margen" ></tr>
                        </table>
                    </td>

                    </tr>                                
                    <!-- fin de la fila en blanco-->                              






                    </tbody>
                </table>

            </div><!--/row-->

        </div><!--/span-->
    </div><!--/row-->

</div>
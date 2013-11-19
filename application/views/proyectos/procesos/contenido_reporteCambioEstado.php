<div class="container-fluid">
    <div class="row-fluid">
        <div class="span12">
            <div class="row-fluid">
                <table >
                    <tr>
                        <td width="100">Administradores</td>
                        <td width="60"><input type="radio" name="rbUsuario" value="FSM" onChange="listaPorCoordinador();" <?PHP echo $xrbUsuarioCheked1; ?> /> FSM</td>
                        <td width="60"><input type="radio" name="rbUsuario" value="JSM" onChange="listaPorCoordinador();"  <?PHP echo $xrbUsuarioCheked2; ?> /> JSM</td>
                        <td width="60"><input type="radio" name="rbUsuario" value="" onChange="listaPorCoordinador();"  <?PHP echo $xrbUsuarioCheked3; ?> /> Todos</td>
                        <td><input class='btn btn-mini' type='button' value='Refresh' 
                                   onclick='listaPorCoordinador();'></td>                    
                    </tr>

                </table>	

                <table class="table" id="datatables" >
                    <thead>
                        <tr>
                            <th>Item</th>
                            <th>Pedido</th>
                            <th>NAS</th>
                            <th>DIR</th>
                            <th>Alias</th>
                            <th>Coordinador</th>
                            <th>Proceso</th>

                            <th>Estado</th>
                            <th>Fecha</th>
                            <th>Hora</th>
                            <th>Estado</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $cont = 1;
                        $r_estado = "";
                        $r_usuario = "";
                        //var_dump($procesos);
                        if ($procesos != null) {
                            foreach ($procesos as $proceso) {

                                if ($r_estado <> $proceso->estado) {

                                    $tipoBoton = "btn btn-danger";
                                    $textoBoton = "No Visto";
                                    $fuente = "font-weight: bold; color:red;";
                                    $icono = "icon-white";

                                    if ($proceso->visto == "S") {
                                        $tipoBoton = "btn";
                                        $textoBoton = "Ya visto";
                                        $fuente = "";
                                        $icono = "";
                                    }
                                    ?>


                                    <tr style="background-color: #FAFAFA; <? echo $fuente; ?>" id="<? echo $proceso->id; ?>">
                                        <!-- nombre del fomulario 'P100011' -> idpedido + el contador para que no se repita -->
                                <form name="frm<? echo $proceso->pedido . $cont; ?>" method="POST" action="">
                                    <td><? echo $proceso->id; ?></td>
                                    <td>
                                        <a href='<?= $this->config->base_url() ?>proyectos/procesos/proceso/panel/<? echo $proceso->pedido; ?>' >
                                            <? echo $proceso->pedido; ?>
                                        </a>
                                    </td>
                                    <td><a class="btn btn-mini" href="ftp://admin:techni_lima@190.41.47.93/ADMIN/red/Editacion/Proyectos_actuales/<? echo $proceso->pedido; ?>_<? echo $proceso->alias; ?>/" target="_blank">NAS-PERU</a></td>
                                    <!--<td><a class="btn btn-mini" href="file://c:/" target="_blank">DIR</a></td>-->
                                    <td><input  type="button" onClick="CallMe()" value="Open C" /></td>

                                    <td><? echo $proceso->alias; ?></td>
                                    <td><? echo $proceso->coordinador; ?></td>
                                    <td><? echo $proceso->proceso; ?></td>

                                    <td><? echo $proceso->estado; ?></td>
                                    <td>
                                        <?
                                        //echo $fecha1 = $proceso->fecha;
                                        //$fecha2 = date("d-m-Y", strtotime($fecha1));
                                        //El nuevo valor de la variable: $fecha2="20-10-2008"
                                        echo $proceso->fecha;
                                        echo xFecha($proceso->fecha);
                                        ?>
                                    </td>

                                    <td><? echo $proceso->hora; ?></td>
                                    <td><button class="btn btn-mini <? echo $tipoBoton; ?>" 
                                                onclick="getVista('<? echo $proceso->id; ?>', this);" 
                                                type="button"
                                                id="btn<? echo $proceso->id; ?>">
                                            <i class="icon-hand-left <? echo $icono; ?>"></i> <? echo $textoBoton; ?>
                                        </button>
                                    </td>
                                </form>
                                </tr>

                                <?php
                                $cont++;
                                $r_estado = $proceso->estado;
                            } else {
                                $r_estado = $proceso->estado;
                            }
                        }
                    }
                    ?>

                    </tbody>
                </table>

            </div><!--/row-->

        </div><!--/span-->
    </div><!--/row-->




</div>


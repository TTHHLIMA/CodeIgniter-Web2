<!-- <div class="wrapper">	-->
<div class="container-fluid">
    <div class="row-fluid">
        <div class="span12">
            <div class="row-fluid">
                <?php
                $cont = 1;
                // HH: BUSCO PROCESOS DONDE INTERVIENE EL USUARIO
                // foreach de ka consulta principal
                foreach ($proceso as $Columna) {
                    $interviene = 0; // saber si interviene acumulador
                    $interviene = 1; // si admin lo visualiza
                    if ($interviene > 0) {  // si interviene en algun proceso
                        ?>
                        <table >
                            <!-- datos que se ocultan -->
                            <tr>
                                <td colspan="7" id="<? echo $Columna->idpedido; ?>0" style="display:none; margin:0px; padding:0px; border:0px;"  >


                                    <span style="background: #EFEFFB;"><b>Pedido:&nbsp;</b><? echo $Columna->idpedido; ?>&nbsp;</span>
                                    <span style="background: #EFEFFB;"><b>Alias:&nbsp;</b><? echo $Columna->alias_com; ?>&nbsp;</span>
                                    <span style="background: #EFEFFB;"><b>Coordinador:&nbsp;</b><? echo $Columna->coordinador ?>&nbsp;</span>
                                    <span style="background: #EFEFFB;"><b>Fecha de entrega:&nbsp;</b><? echo $Columna->fechaentrega; ?>&nbsp;</span>
                                    <span style="background: #EFEFFB;"><b>Idioma de origen:&nbsp;</b><? echo $Columna->idioma_origen; ?>&nbsp;</span>
                                    <span style="background: #EFEFFB;"><b>Idioma final:&nbsp;</b><? echo $Columna->idioma_final; ?>&nbsp;</span>
                                    <span style="background: #EFEFFB;">


                                </td>
                            </tr>
                            <!-- fin de datos que se ocultan -->

                            <tr>
                                <td colspan="4" style="background-color: #A9BCF5; padding:0px;"><h5 class="titulo">Preparaci&oacute;n</h4></td>
                                <td colspan="3" style="background-color: #F6CEEC; padding:0px;"><h5 class="titulo">Versi&oacute;n Final</h4></td>
                            </tr>

                            <tr class="sin_margen" style="vertical-align: top;"  >
                                <?php 
                                $pm = &get_instance();
                                $pm->load->model("procesos_model");
                                ?>
                                <? include("userformPrepSalto.php"); ?>
                                <? include("userformPrepFormateo.php"); ?>
                                <? include("userformPrepPreTrad.php"); ?>
                                <? include("userformPrepTrad.php"); ?>
                                <? include("userformPrepCorre.php"); ?>
                                <? include("userformVerFinTrad.php"); ?>
                                <? include("userformVerFinFormFin.php"); ?>

                            </tr>
                        </table>

        <?php
        $cont++;
    } // fin si interviene en algun proceso
    // fin del foreach principal
}
?>
            </div><!--/row-->
        </div><!--/span-->
    </div><!--/row-->
</div>

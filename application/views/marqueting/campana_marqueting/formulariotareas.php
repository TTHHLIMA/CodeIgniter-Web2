<table width="100%" border="0" cellpadding="0" cellspacing="0" style="border:1px solid #333333;">
    <tr>
        <td width="400" height="500" align="left" valign="top">
            <table width="100%" border="0" cellpadding="0" cellspacing="0" >
                <tr>
                    <td valign="top" style="padding:5px;">
                        <?php
                        if ($tareas != null) {
                            echo "<b>Tarea</b> [ " . count($tareas) . " Firmas ]";
                        } else {
                            echo "<b>Tarea</b> [ 0 Firmas ]";
                        }
                        ?>                        
                    </td>
                </tr>
                <tr>
                    <td style="padding:5px;">
                        <select name="lsttareas" id="lsttareas" size="2" multiple style="width:400px; height:440px;">
                            <?php
                            if ($tareas != null) {
                                foreach ($tareas as $row) {
                                    echo "<option value='" . $row->idcompania . "'>" . $row->firma . "</option>";
                                }
                            }
                            ?>
                        </select>          
                    </td>
                </tr>
            </table>

        </td>
        <td width="100" height="500" align="left" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0">
                <tr>
                    <td height="70" align="center">&nbsp;</td>
                </tr>
                <tr>
                    <td height="40" align="center">
                        <a class="btn" id="btngrupo1_ida"
                           href="#"
                           data-toggle="modal"
                           ><i class="icon-chevron-right"></i></a>          
                    </td>
                </tr>
                <tr>
                    <td height="40" align="center">
                        <a class="btn" id="btngrupo1_regreso"
                           href="#"
                           data-toggle="modal"
                           ><i class="icon-chevron-left"></i></a>          
                    </td>
                </tr>
                <tr>
                    <td height="180" align="center">&nbsp;</td>
                </tr>
                <tr>
                    <td height="40" align="center">
                        <a class="btn" id="btngrupo2_ida"
                           href="#"
                           data-toggle="modal"
                           ><i class="icon-chevron-right"></i></a>          
                    </td>
                </tr>
                <tr>
                    <td height="40" align="center">
                        <a class="btn" id="btngrupo2_regreso"
                           href="#"
                           data-toggle="modal"
                           ><i class="icon-chevron-left"></i></a>          
                    </td>
                </tr>
            </table></td>
        <td width="400" height="500" align="left" valign="top">
            <table width="100%" border="0" cellpadding="0" cellspacing="0" >
                <tr>
                    <td valign="top" style="padding:5px;">
                        <?php
                        if ($pendientes != null) {
                            echo "<b>Pendiente</b> [ " . count($pendientes) . " Firmas ]";
                        } else {
                            echo "<b>Pendiente</b> [ 0 Firmas ]";
                        }
                        ?>
                    </td>
                </tr>
                <tr>
                    <td style="padding:5px;">
                        <select name="lstpendientes" id="lstpendientes" size="2" multiple style="width:400px; height:200px;">
                            <?php
                            if ($pendientes != null) {
                                foreach ($pendientes as $row) {
                                    echo "<option value='" . $row->idcompania . "'>" . $row->firma . "</option>";
                                }
                            }
                            ?>


                        </select>
                    </td>
                </tr>
                <tr>
                    <td style="padding:5px;">
                        <table width="350" border="0" cellpadding="0" cellspacing="0">
                            <tr>
                                <td width="200">
                        <?php
                        if ($finalizados != null) {
                            echo "<b>Finalizado</b> [ " . count($finalizados) . " Firmas ]";
                        } else {
                            echo "<b>Pendiente</b> [ 0 Firmas ]";
                        }
                        ?>
                                </td>
                                <td width="50"><a class="btn" id="btngrupo3_ida"
                                                  href="#"
                                                  ><i class="icon-chevron-down"></i></a></td>

                                <td width="100"><a class="btn" id="btngrupo3_regreso"
                                                   href="#"
                                                   ><i class="icon-chevron-up"></i></a> </td>
                            </tr>
                        </table></td>
                </tr>
                <tr>
                    <td style="padding:5px;">
                        <select name="lstfinalizado" id="lstfinalizado" size="2" multiple style="width:400px; height:200px;">
                            <?php
                            if ($finalizados != null) {
                                foreach ($finalizados as $row) {
                                    echo "<option value='" . $row->idcompania . "'>" . $row->firma . "</option>";
                                }
                            }
                            ?>
                        </select></td>
                </tr>
            </table>      
        </td>
    </tr>
</table>
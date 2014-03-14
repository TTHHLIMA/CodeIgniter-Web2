<container>
    <div class="row-fluid">
        <table border="0">
            <tr><td >
                    <b>Firma:</b> &nbsp; <?php echo $nombreCompania; ?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td width="130">
                    Ansicht nach Jahren &nbsp;
                </td>
                <td width="100">
                    <?php
                    echo "<select name='selectFecha' size='1' id='selectFecha' onchange=\"filtrar('selectFecha','".$idcompania."');\">";
                    if ($Filtrofecha == "") {
                        $Filtrofecha = "";
                    }
                    ?>
            <option value='all' <?php echo ($Filtrofecha == "all") ? " selected" : " "; ?> >   Alle   </option>
            <option value='2014'  <?php echo ($Filtrofecha == "2014") ? " selected" : " "; ?> >2014</option>
            <option value='2013'  <?php echo ($Filtrofecha == "2013") ? " selected" : " "; ?> >2013</option>
            <option value='2012'  <?php echo ($Filtrofecha == "2012") ? " selected" : " "; ?> >2012</option>
            <option value='2011'  <?php echo ($Filtrofecha == "2011") ? " selected" : " "; ?> >2011</option>
            <option value='2010'  <?php echo ($Filtrofecha == "2010") ? " selected" : " "; ?> >2010</option>
            <option value='2009'  <?php echo ($Filtrofecha == "2009") ? " selected" : " "; ?> >2009</option>
            <option value='2008'  <?php echo ($Filtrofecha == "2008") ? " selected" : " "; ?> >2008</option>
            <option value='2007'  <?php echo ($Filtrofecha == "2007") ? " selected" : " "; ?> >2007</option>
            <option value='2006'  <?php echo ($Filtrofecha == "2006") ? " selected" : " "; ?> >2006</option>
            <option value='2005'  <?php echo ($Filtrofecha == "2005") ? " selected" : " "; ?> >2005</option>
            <option value='2004'  <?php echo ($Filtrofecha == "2004") ? " selected" : " "; ?> >2004</option>
            </select>
            </td>
            </tr>
            <tr>
                <td colspan="3" height="20"></td>
            </tr>
        </table>

    </div>
    <div class="row-fluid">
        <table class="table table-hover">
            <thead>
                <tr  bgcolor='#4a7ac9' style="color: #fff">
                    <th align='center'>Nr.</th><!--Nr.-->
                    <th align='center'>Anfrage-Nr.Kunde</th> <!-- Anfrage-Nr.Kunde-->
                    <th  align='center'>Datum der Anfrage Kunde</th> <!--Datum der Anfrage Kunde-->
                    <th align='center'>Ansprechpartner Kunde</th> <!--Ansprechpartner Kunde-->
                    <th align='center'>Angebots-Nr. T-T</th> <!--Angebots-Nr. T-T-->
                    <th align='center'>Bestellungs-Nr. Kunde</th> <!--Bestellungs-Nr. Kunde-->
                    <th  align='center'>Bestelldatum Kunde</th> <!--Datum der Bestellung Kunde-->
                    <th  align='center'>Vereinbarter Liefertermin</th> <!--Datum der Lieferung T-T-->
                    <th align='center'>Lieferdatum T-T</th> <!-- fecha de envio-->
                    <th align='center'>Ausgangssprache</th> <!-- idioma original-->
                    <th  align='center'>Zielsprache</th><!--idiomas finales-->
                    <th  align='center'>Format</th><!--formato-->
                    <th align='center'>Gesamtpreis EUR</th><!--precio total EUR-->
                </tr>
            </thead>
            <tbody>
                <?php
                $k = 1;
                $xMontoTotal = 0;
                if ($xReporte != NULL) {
                    foreach ($xReporte as $row1) {
                        echo "<tr>";
                        echo "<td align='center'>" . $k . "</td>";
                        echo "<td align='left'>" . $row1->numero_req_cli . "</td>"; // numero de requermiento
                        echo "<td align='left'>" . fecha_calendario(strftime($row1->fecha)) . "</td>"; // fecha de requerimiento
                        echo "<td align='left'>" . $row1->nombre . "</td>"; //nombre del contacto
                        echo "<td align='left'>" . $row1->idcotizacion . "</td>"; // codigo de la cotizacion
                        echo "<td align='left'>" . $row1->numero_ped_cli . "</td>"; // numero de pedido que envia el cliente
                        echo "<td align='left'>" . fecha_calendario(strftime($row1->fecha_ped_cli)) . "</td>"; //fecha del pedido del cliente
                        echo "<td align='left'>" . fecha_calendario(strftime($row1->fechaentrega)) . "</td>"; // fecha de entrega
                        echo "<td align='left'>" . fecha_calendario(strftime($row1->fecha_envio)) . "</td>"; // fecha de envio
                        echo "<td align='left'>" . $row1->idioma_origen . "</td>"; //idioma de origen
                        echo "<td align='left'>" . $row1->idioma_final . "</td>"; // idioma final
                        $formatox = "";
                        If ($row1->word == "N") {
                            $formatox = $formatox;
                        } else {
                            $formatox = "Word";
                        }
                        If ($row1->excel == "N") {
                            $formatox = $formatox;
                        } else {
                            $formatox = $formatox . ", Excel";
                        }
                        If ($row1->ppt == "N") {
                            $formatox = $formatox;
                        } else {
                            $formatox = $formatox . ", PPT";
                        }
                        If (trim($row1->formato) == "") {
                            $formatox = $formatox;
                        } else {
                            $formatox = $formatox . ", " . trim($row1->formato);
                        }

                        echo "<td align='left'>" . $formatox . "</td>"; //formato
                        $xValMonto = 0;
                        foreach ($montos as $monto_key => $monto_value) {
                            for ($i = 0; $i < count($monto_value); $i++) {
                                if ($row1->idpedido === $monto_value[$i]['idpedido']) {
                                    if (!(is_numeric($monto_value[$i]['total'])) || trim($monto_value[$i]['total']) == "") {
                                        $xValMonto = floatval($xValMonto) + 0;
                                    } else {
                                        $xValMonto = floatval($xValMonto) + floatval($monto_value[$i]['total']);
                                    }
                                }
                            }
                        }
                        //HH: acumulo el monto total
                        $xMontoTotal = floatval($xMontoTotal) + floatval($xValMonto);

                        $xValMonto = str_replace(",", ".", $xValMonto);
                        $numero_formato_ingles = 0;
                        $numero_formato_ingles = number_format($xValMonto, 2, '.', ',');
                        echo "<td style='text-align: right'>" . $numero_formato_ingles . "</td>"; //monto calculado en la suma de facturas de un pedido
                        echo "</tr>";
                        $k++;
                    }
                }
                ?>
            </tbody>
        </table >
        <?php
        $xMontoTotal = str_replace(",", ".", $xMontoTotal);
        $numero_formato_ingles2 = 0;
        $numero_formato_ingles2 = number_format($xMontoTotal, 2, '.', ',');
        echo "<h4><b>Monto Total:</b> " . $numero_formato_ingles2 . "</h4>";
        ?>

    </div >
</container>
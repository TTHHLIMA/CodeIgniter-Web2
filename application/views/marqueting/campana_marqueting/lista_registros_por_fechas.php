<?php
//var_dump($registrosPorFechas);
?>
<table class="table " >
    <tr>
        <td>
            <table class="table table-bordered" id="tablaRegistros">
                <thead>
                    <tr>
                        <th style="width: 80px;" >Item</th>
                        <th style="width: 120px;">Fecha</th>
                        <th style="width: 100px;">Hora Inicio</th>
                        <th style="width: 100px;">Hora Final</th>
                        <th style="width: 120px;">Total de Horas</th>
                        <th style="width: 100px;">Llamadas</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($registrosPorFechas != null) {
                        $i = 1;
                        $acumulador = "";
                        $acumulador1 = "";
                        foreach ($registrosPorFechas as $item) {
                            echo "<tr>";
                            echo "<td>" . $i . "</td>";
                            echo "<td>" . $item->fecha_ingreso . "</td>";
                            echo "<td>" . $item->hora_inicio. "</td>";
                            echo "<td>" . $item->hora_final. "</td>";
                            if ($item->sumatoria_horas == "00:00:00"){
                                echo "<td style='color:red;'>" . $item->sumatoria_horas. "</td>";
                            } else {
                                echo "<td>" . $item->sumatoria_horas. "</td>";
                            }
                            
                            echo "<td>" . $item->llamadas. "</td>";

                            echo "</tr>";
                            $i++;
                            $acumulador = $acumulador + hora_convertido_segundos($item->sumatoria_horas);
                            $acumulador1 = $acumulador1 + intval($item->llamadas);
                        }
                    } else {
                        $acumulador=0;
                        $acumulador1=0;
                    }
                    ?>
                    <tr>

                        <th ></th>
                        <th ></th>
                        <th ></th>
                        <th ></th>
                        <th ></th>
                        <th ></th>
                    </tr>

                </tbody>
            </table>
        </td>
    </tr>
    <tr>
        <td> 
            <?php
           // echo "Total de Segundos: " . $acumulador. "<br>";
            echo "Total de Horas: <b>" . hora_a_segundos($acumulador). "</b>&nbsp;&nbsp; Total de llamadas: <b>" . $acumulador1. "</b><br>";

            /* De segundo a hora */

            function segundos_a_hora($hora) {
                list($h, $m, $s) = explode(':', $hora);
                return ($h * 3600) + ($m * 60) + $s;
            }

            function hora_convertido_segundos($hora) {
                if (strlen($hora) == 8) { //00:00:00
                    list($h, $m, $s) = explode(':', $hora);
                    return ($h * 3600) + ($m * 60) + $s;
                }
                if (strlen($hora) == 4 || strlen($hora) == 5) { //00:00   0:00
                    list($h, $m) = explode(':', $hora);
                    return ($h * 3600) + ($m * 60);
                }
                if (strlen($hora) < 4) { //0:00
                    return 0;
                }
            }

            /* De hora a segundos */

            function hora_a_segundos($segundos) {
                $h = floor($segundos / 3600);
                $m = floor(($segundos % 3600) / 60);
                $s = $segundos - ($h * 3600) - ($m * 60);
                return sprintf('%02d:%02d:%02d', $h, $m, $s);
            }

            $h = ' - hora';
            $s = ' - segundos';

            //echo segundos_a_hora("50:20:10") . $h;
            //echo '<br />';
            //echo hora_a_segundos(66451) . $s;

            /* Obtienes la Salida: 
              66451
              18:27:31
             */
            ?>

            <?php
            /* $horaInicial = "14:00";
              $minutoAnadir = "02:10";

              $segundos_horaInicial = strtotime($horaInicial);
              $segundos_horaInicial1 = strtotime($minutoAnadir);

              $segundos_minutoAnadir = $minutoAnadir * 60;

              $nuevaHora = date("H:i", $segundos_horaInicial + $segundos_horaInicial1);

              echo "<br>" . $nuevaHora; */
            ?>

        </td>
    </tr>
</table>

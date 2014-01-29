<?php
//var_dump($registrosPorFechas);
?>
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
            foreach ($registrosPorFechas as $item) {
                echo "<tr>";
                echo "<td>" . $i . "</td>";
                echo "<td>" . $item->fecha . "</td>";
                echo "<td>" . $item->hora_inicio;
                echo "<td>" . $item->hora_final;
                echo "<td>" . $item->sumatoria_horas;
                echo "<td>" . $item->llamadas;

                echo "</tr>";
                $i++;
            }
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

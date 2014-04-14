<?php
echo(rand(10, 100));
?>
<?PHP
$pa = &get_instance();
$pa->load->model("traductor_model");
?>
<table class="table table-hover">
     <thead>
    <tr>
        <th>idcompania</th>
        <th>alias_com</th>
        <th>idcontacto</th>
        <th>idrequerimiento</th>
        <th>idcotizacion</th>
        <th>idpedido</th>
    </tr>
     </thead>
     <tbody>
    <?php
    if ($pedidos != null) {
        foreach ($pedidos as $columna) {
            echo "<tr>";
            echo "<td>" . $columna->idcompania . "</td>";
            echo "<td>" . $columna->alias_com . "</td>";
            echo "<td>" . $columna->idcontacto . "</td>";
            echo "<td>" . $columna->idrequerimiento . "</td>";
            echo "<td>" . $columna->idcotizacion . "</td>";
            echo "<td>" . $columna->idpedido . "</td>";
            echo "</tr>";
            echo "<tr>";
            echo "<td colspan='6'>";
            $traducciones = $pa->traductor_model->listar_traducciones($columna->idpedido);
            $correcciones = $pa->traductor_model->listar_correciones($columna->idpedido);
            
                echo "<table class='table table-hover'>";
                    echo "<tr>";
                        echo "<td>";
                        
                           
                                if ($traducciones <> FALSE) {
                                     echo "<table class='table table-bordered tablaTraduccion' >";
                                echo "<thead>";
                                    echo "<tr>";
                                        echo "<th>Idproyecto</th>";
                                        echo "<th>Idioma</th>";
                                        echo "<th>Traductor</th>";
                                        echo "<th>Estado</th>";
                                        echo "<th>Ftp Zip</th>";
                                    echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                foreach ($traducciones as $traduccion) {
                                    echo "<tr >";
                                    echo "<td >" . $traduccion->idproyecto . "</td>";
                                    echo "<td>" . $traduccion->idiomaorigen ." - ". $traduccion->idioma_final . "</td>";
                                    echo "<td>" . $traduccion->traductor . "</td>";
                                    switch ($traduccion->estado) {
                                        case "":
                                            $estado = "";
                                            break;
                                        case "Por confirmar":  // naranja
                                            $estado = "<span class='label label-warning'>Por confirmar</span>";
                                            break;
                                        case "Declinado": //rojo
                                            $estado = "<span class='label label-important'>Declinado</span>";
                                            break;
                                        case "i.B.": // azul
                                            $estado = "<span class='label label-info'>i.B.</span>";
                                            break;
                                        case "Traducido":
                                            $estado = "";
                                            break;
                                        case "Terminado": //verde
                                            $estado = "<span class='label label-success'>Terminado</span>";
                                            break;
                                    }
                                    echo "<td>" . $estado . "</td>";
                                    if ($traduccion->ftp_zip == "S"){
                                        $ftp_zip = "<i class='icon-ok'></i>";
                                    } else {
                                        $ftp_zip = "";
                                    }
                                    echo "<td>" . $ftp_zip . "</td>";
                                    echo "</tr>";
                                }
                                
                                echo "</tbody>";
                            echo "</table>";
                                
                                }
                                
                        echo "</td>";
                        echo "<td>";
                            
                                if ($correcciones <> FALSE){
                                    echo "<table class='table table-bordered tablaCorreccion' >";
                                echo "<thead>";
                                    echo "<tr>";
                                        echo "<th>Idproyecto</th>";
                                        echo "<th>Idioma</th>";
                                        echo "<th>Corrector</th>";
                                        echo "<th>Estado</th>";
                                        echo "<th>Ftp Zip</th>";
                                    echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                foreach ($correcciones as $correccion) {
                                    echo "<tr >";
                                    echo "<td >" . $correccion->idproyecto . "</td>";
                                    echo "<td>" . $correccion->idiomaorigen ." - ". $correccion->idioma_final . "</td>";
                                    echo "<td>" . $correccion->traductor . "</td>";
                                    switch ($correccion->estado) {
                                        case "":
                                            $estado = "";
                                            break;
                                        case "Por confirmar":  // naranja
                                            $estado = "<span class='label label-warning'>Por confirmar</span>";
                                            break;
                                        case "Declinado": //rojo
                                            $estado = "<span class='label label-important'>Declinado</span>";
                                            break;
                                        case "i.B.": // azul
                                            $estado = "<span class='label label-info'>i.B.</span>";
                                            break;
                                        case "Traducido":
                                            $estado = "";
                                            break;
                                        case "Terminado": //verde
                                            $estado = "<span class='label label-success'>Terminado</span>";
                                            break;
                                    }
                                    echo "<td>" . $estado . "</td>";
                                    if ($correccion->ftp_zip == "S"){
                                        $ftp_zip = "<i class='icon-ok'></i>";
                                    } else {
                                        $ftp_zip = "";
                                    }
                                    echo "<td>" . $ftp_zip . "</td>";
                                    echo "</tr>";
                                }
                                echo "</tbody>";
                            echo "</table>";
                                }
                                
                        echo "</td>";
                    echo "</tr>";
                echo "</table>";
            
            echo "</td>";
            echo "</tr>";
        }
    }
    ?>
         </tbody>
</table>


                <table class="table" >
                    <thead>
                        <tr>
                            <td>Id Compania</td>
                            <td>Nombre</td>
                            <td>Calle</td>
                            <td>Lugar</td>
                            <td>Codigo</td>
                            <td>Pa&iacute;s</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if ($lista_companias != null) {
                            foreach ($lista_companias as $item) {
                                echo "<tr>";
                                echo "<td>
                                         <a href='#' class='btn' name='btntest' id='$item->idcompania'
                                           data-toggle='modal' onclick=\"dato('".$item->idcompania."')\">".$item->idcompania."</a>    
                                      </td>";
                                echo "<td>".$item->nombre."</td>";
                                echo "<td>".$item->calle;
                                echo "<td>".$item->lugar;
                                echo "<td>".$item->Codigo;
                                echo "<td>".$item->pais;
                               
                                echo "</tr>";
                            }
                        }
                        ?>
                    </tbody>
                </table>
            

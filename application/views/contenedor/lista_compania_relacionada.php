<table class="table" >
                    <thead>
                        <tr>
                            
                            <td><b>Nombre</b></td>
                            <td><b>Web</b></td>
                            <td><b>Categoria</b></td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        //var_dump($lista_companias_relacionadas);
                        if ($lista_companias_relacionadas != null) {
                            foreach ($lista_companias_relacionadas as $item) {
                                echo "<tr>";
                                echo "<td>".$item->Firma."</td>";
                                echo "<td>".$item->Web;
                                echo "<td>".$item->nombre;
                                echo "</tr>";
                            }
                        }
                        ?>
                    </tbody>
                </table>
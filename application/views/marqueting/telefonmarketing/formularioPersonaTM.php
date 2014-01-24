<?PHP
if ($operador != null) {
    foreach ($operador as $row) {
        $xcodigo = $row->codigo;
        $xpronombre = $row->pronombre;
        $xnombre = $row->nombre;
        $xapellidos = $row->apellidos;
        $xdireccion = $row->direccion;
        $xtelefono = $row->telefono;
        $xcelular = $row->celular;
        $xfax = $row->fax;
        $xmail = $row->mail;
        $xfecha = $row->fecha;
    }
} else {
        $xcodigo = $row->codigo;
        $xpronombre = $row->pronombre;
        $xnombre = $row->nombre;
        $xapellidos = $row->apellidos;
        $xdireccion = $row->direccion;
        $xtelefono = $row->telefono;
        $xcelular = $row->celular;
        $xfax = $row->fax;
        $xmail = $row->mail;
        $xfecha = $row->fecha;
}
?>
<table width="900" border="0" cellpadding="0" cellspacing="0">
    <tr>
        <td valign="bottom"><table border="0" align="left" cellpadding="0" cellspacing="0">
                <tr>
                    <td><table width="100%">
                            <tr>
                                <td width="130px">

                                    <div class="btn-group">
                                        <a class="btn" id="btnPrimero"
                                           href="#"
                                           data-toggle="modal"
                                           ><i class="icon-fast-backward"></i></a>  
                                        <a class="btn" id="btnAnterior"
                                           href="#"
                                           data-toggle="modal" 
                                           ><i class="icon-backward"></i></a>
                                        <a class="btn" id="btnSiguiente"
                                           href="#"
                                           data-toggle="modal"
                                           ><i class="icon-forward"></i></a>
                                        <a class="btn" id="btnUltimo"
                                           href="#"
                                           data-toggle="modal"
                                           ><i class="icon-fast-forward"></i></a>
                                    </div>

                                </td>
                                <td width="80">
                                    <div class="etiquetaCount">
                                        Total : <b><?= $countOperador;?></b>
                                    </div></td>


                            </tr>
                        </table>
                    </td>
                    <td align="left" valign="middle">&nbsp;Codigo:&nbsp;</td>
                    <td align="left" valign="bottom"><input type="text" name="txtcodigo" id="txtcodigo"  value="<?= $xcodigo; ?>"  readonly  style="width:40px; margin-top:7px;"></td>
                    <td align="left" valign="middle">&nbsp;Nombre:&nbsp;</td>
                    <td align="left" valign="bottom"><input type="text" name="txtnombre" id="txtnombre" value="<?= $xpronombre . " " . $xnombre . " " . $xapellidos; ?>"  readonly  style="width:200px; margin-top:7px;"></td>
                    <td align="left" valign="middle">&nbsp;Email:&nbsp;</td>
                    <td align="left" valign="middle"><input type="text" name="txtemail" id="txtemail"  value="<?= $xmail; ?>"  readonly  style="width:200px; margin-top:7px;"></td>                   
                </tr>

            </table></td>
    </tr>
    <tr>
        <td><table border="0" cellpadding="0" cellspacing="0">
                <td align="left" valign="top">&nbsp;Dirección:&nbsp;</td>
                <td align="left" valign="top"><input type="text" name="txtdireccion" id="txtdireccion"  value="<?= $xdireccion; ?>"  readonly  style="width:250px;"></td>
                <td align="left" valign="top">&nbsp;Telefono:&nbsp;</td>
                <td align="left" valign="top"><input type="text" name="txttelefono" id="txttelefono"  value="<?= $xtelefono; ?>"  readonly  style="width:100px; "></td>
                <td align="left" valign="top">&nbsp;Cel:&nbsp;</td>
                <td align="left" valign="top"><input type="text" name="txtcel" id="txtcel"  value="<?= $xcelular; ?>"  readonly  style="width:100px;"></td>

                <td align="left" valign="top">&nbsp;Fax:&nbsp;</td>
                <td align="left" valign="top"><input type="text" name="txtfax" id="txtfax"  value="<?= $xfax; ?>"  readonly  style="width:100px; "></td>

            </table></td>
    </tr>
    <tr>
        <td>

            <div id="tabs" style="width: 100%;">
                <ul>
                    <li><a href="#panelllamadas">Persona TM</a></li>
                    <li><a href="#tabs-2">Tiempo</a></li>
                    <li><a href="#tabs-3">Estadisticas</a></li>
                </ul>
                <div id="panelllamadas" style="background-color:#FFC" >



                </div>

                <div id="tabs-2">

                </div>
                <div id="tabs-3">

                </div>
            </div>

        </td>
    </tr>
</table>
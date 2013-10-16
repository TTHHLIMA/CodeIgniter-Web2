<?
if ($xxxnivel == "1") {
    $userFormateo = $pm->procesos_model->consultar_user("1", "");
    if ($userFormateo != null) {
        echo "<select name='Cbo" . $Columna->idpedido . "2' id='Cbo" . $Columna->idpedido . "2' style='width:80px;'>";
        echo "<option value=''></option>";
        foreach ($userFormateo as $Col1) {
            if ($Col1->idusuarios_estado == $Columna->formateo) {
                echo "<option value='" . $Col1->idusuarios_estado . "' SELECTED>" . $Col1->descripcion . "</option>";
            } else {
                echo "<option value='" . $Col1->idusuarios_estado . "'>" . $Col1->descripcion . "</option>";
            }
        }
        echo "</select>";
    } else {
        echo "<select name='Cbo" . $Columna->idpedido . "2' id='Cbo' style='width:100px;'>";
        echo "<option value=''></option>";
        echo "</select>";
    }
}

if ($xxxnivel == "2") {
    $xuserSaltoLinea = $pm->procesos_model->buscar_userFormateo($xxxiduser, $Columna->idpedido);
    
    //var_dump($xuserSaltoLinea);
    if ($xuserSaltoLinea != null) {
        /* $SQL="";
          //$SQL="select id_usuario , estado from usuario_estado where estado like '".$xxxnombre."%' order by estado ";
          $SQL="select ue.id_usuarios ,ue.idusuarios_estado , ue.descripcion ,ue.idestado , e.orden  from usuarios_estado ue, estado e where e.idestado = ue.idestado and ue.id_usuarios ='".$xxxiduser."' order by ue.id_usuarios, e.orden ";
          $db->setQuery($SQL);
          $Rs1 = $db->loadObjectList();
          $Nr="";
          $Nr = count($Rs1);
         * 
         */
        $userFormateo = $pm->procesos_model->consultar_user("2", $xxxiduser);

        if ($userFormateo != null) {
            echo "<select name='Cbo" . $Columna->idpedido . "2' id='Cbo" . $Columna->idpedido . "2' style='width:80px;'>";
            //echo "<option value=''></option>";
            foreach ($userFormateo as $Col1) {
                if ($Col1->idusuarios_estado == $Columna->formateo) {
                    echo "<option value='" . $Col1->idusuarios_estado . "' SELECTED>" . $Col1->descripcion . "</option>";
                } else {
                    echo "<option value='" . $Col1->idusuarios_estado . "'>" . $Col1->descripcion . "</option>";
                }
            }
            echo "</select>";
        } else {
            echo "<select name='Cbo" . $Columna->idpedido . "2' id='Cbo' style='width:100px;'>";
            echo "<option value=''></option>";
            echo "</select>";
        }
    } else {
        echo mostrarInicialEstado($Columna->formateo);
    }
}
?>
<?
require_once("../Lib/sesion.php");
require '../Lib/Db.conexion.php';
$db = DataBase::getInstance();

$xFiltro = $_GET['xFiltro'];
$xCoord = $_GET['xCoord'];
?>
<!DOCTYPE html >
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title>Techni-Translate (Intranet)</title>

        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
        <!-- Le styles -->
        <link href="../assets/css/bootstrap.css" rel="stylesheet">
        <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
          <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->

        <style type="text/css">
            body {
                padding-top: 60px;
                padding-bottom: 40px;
            }
            .sidebar-nav {
                padding: 9px 0;
            }
            form {
                padding:500px;
            }
            .sinespacio{
                padding:0px;
                margin:0px;
            }
            .titulo{
                font:12px arial,sans-serif;
            }
            .sin_margen{
                margin:0px; padding:0px; border:0px;
            }
        </style>
        <link href="../assets/css/bootstrap-responsive.css" rel="stylesheet">	

        <!-- estilos de dataTable -->
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <script src="media/js/jquery.js" type="text/javascript"></script>
        <script src="media/js/jquery.dataTables.js" type="text/javascript"></script>
        <!-- archivo ajax -->
        <script src="../js/ajax.js" type="text/javascript"></script>
        <script src="js/updTermStrac.js" type="text/javascript"></script>
        <!-- fin archivo ajax -->
        
        
        
        <style type="text/css">
            <!--  @import "media/css/demo_table_jui.css";
            @import "media/themes/smoothness/jquery-ui-1.8.4.custom.css"; -->

        </style>

        <script type="text/javascript" charset="utf-8">
            $(document).ready(function(){
                $('#datatables').dataTable({
                    "sPaginationType":"full_numbers",
                    "aaSorting":[[0, "desc"]],
                    "bJQueryUI":true
                });
            })
        </script>      


        <script type="text/javascript" charset="utf-8">
            function llamaUsuario(){ 
            valRadio=getRadioVal("rbUsuario");
            
            var i = document.getElementById("CboAdministrador").selectedIndex;
            valCboCoordinador = document.getElementById("CboAdministrador").options[i].value;
            //alert("dato="+valCboCoordinador);
            window.location = location.pathname + "?xFiltro=" + valRadio + "&xCoord=" + valCboCoordinador;
            } 


            function getRadioVal(radioName) {
              var rads = document.getElementsByName(radioName);

              for(var rad in rads) {
                if(rads[rad].checked)
                  return rads[rad].value;
              }

              return null;
            }            
        </script>        
        
        
        
        <!-- Le fav and touch icons -->
        <link rel="shortcut icon" href="../img/favicon.ico">

  
    </head>
    <body>
        <div class="navbar navbar-fixed-top">
            <div class="navbar-inner">
                <div class="container-fluid">
                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </a>			
                    <a class="brand" href="">Bienvenidos a Techni-Translate</a>
                    <!-- botton de sesion -->
                    <div class="btn-group pull-right">
                        <ul class="nav">
                            <li class="active"><a href="../Lib/logout.php">Cerrar Sesion <?php echo $xxxiniciales; ?></a></li>
                            <li><a href="#about"></a></li>
                        </ul>
                    </div>				  


                    <div class="nav-collapse">
                        <ul class="nav">
                            <li ><a href="reporteCambioEstado.php">Reporte de Cambios de Estados</a></li>
                            <li ><a href="listar.php">Control de Procesos</a></li>
                            <li class="active"><a href="termstrac.php">Term Strac</a></li>
                            <li><a href="#about"></a></li>
                        </ul>
                    </div><!--/.nav-collapse -->


                </div>

            </div>
        </div>

        <!-- <div class="wrapper">	-->
        <div class="container-fluid">
            <div class="row-fluid">


                <div class="span12">
                    <div class="row-fluid">

                        <?php
                        if ($xxxnivel == "1") {

                            $Sql = "";
                            if ($xCoord<>"") {
                                            
                                    $xCriterio = ($xFiltro=="") ? "":" and t.realizado in (select idusuarios_estado from usuarios_estado where id_usuarios ='".$xFiltro."') ";
                                    $xCriterio1 = ($xCoord=="") ? "":" and t.revisado in (select idusuarios_estado from usuarios_estado where id_usuarios ='".$xCoord."') ";
                                    $Sql = "SELECT 
                                            distinct p.idpedido, 
                                                            t.idtermextrac as idterm,
                                                            c.alias_com as firma_alias, 
                                                            c.web as web , 
                                                            Coalesce((select iniciales from coordinador where coordinador.nombre = p.coordinador limit 0,1 ),'') as coordinador ,
                                                            m.idioma_origen , 
                                                            m.idioma_final, 
                                                            t.totpal ,
                                                            t.realizado ,
                                                            t.revisado,
                                                            t.terminado,
                                                            t.informado
                                            FROM  
                                                    compania c, 
                                                    contacto k, 
                                                    requerimientos r, 
                                                    cotizacion m, 
                                                    pedido p ,
                                                    term_extrac t
                                            Where 
                                                    c.idcompania = k.idcompania AND 
                                                    k.idcontacto = r.id_contacto AND 
                                                    r.idrequerimiento = m.idrequerimiento AND 
                                                    m.idcotizacion = p.idcotizacion AND 
                                                    p.idpedido = t.idpedido ".$xCriterio." ".$xCriterio1." 
                                            order by p.idpedido ";
                            }
                             else {
                                     $xCriterio = ($xFiltro=="") ? "":" and t.realizado in (select idusuarios_estado from usuarios_estado where id_usuarios ='".$xFiltro."') ";      
                                     
                                    $Sql = "SELECT 
                                            distinct p.idpedido, 
                                                            t.idtermextrac as idterm,
                                                            c.alias_com as firma_alias, 
                                                            c.web as web , 
                                                            Coalesce((select iniciales from coordinador where coordinador.nombre = p.coordinador limit 0,1 ),'') as coordinador ,
                                                            m.idioma_origen , 
                                                            m.idioma_final, 
                                                            t.totpal ,
                                                            t.realizado ,
                                                            t.revisado,
                                                            t.terminado,
                                                            t.informado
                                            FROM  
                                                    compania c, 
                                                    contacto k, 
                                                    requerimientos r, 
                                                    cotizacion m, 
                                                    pedido p ,
                                                    term_extrac t
                                            Where 
                                                    c.idcompania = k.idcompania AND 
                                                    k.idcontacto = r.id_contacto AND 
                                                    r.idrequerimiento = m.idrequerimiento AND 
                                                    m.idcotizacion = p.idcotizacion AND 
                                                    p.idpedido = t.idpedido ".$xCriterio."
                                            order by p.idpedido ";
                            }
                        } else {
                            $Sql = "SELECT 
                                            distinct p.idpedido, 
                                                            t.idtermextrac as idterm,
                                                            c.alias_com as firma_alias, 
                                                            c.web as web , 
                                                            Coalesce((select iniciales from coordinador where coordinador.nombre = p.coordinador limit 0,1 ),'') as coordinador ,
                                                            m.idioma_origen , 
                                                            m.idioma_final, 
                                                            t.totpal ,
                                                            t.realizado ,
                                                            t.revisado,
                                                            t.terminado,
                                                            t.informado
                                            FROM  
                                                    compania c, 
                                                    contacto k, 
                                                    requerimientos r, 
                                                    cotizacion m, 
                                                    pedido p ,
                                                    term_extrac t
                                            Where 
                                                    c.idcompania = k.idcompania AND 
                                                    k.idcontacto = r.id_contacto AND 
                                                    r.idrequerimiento = m.idrequerimiento AND 
                                                    m.idcotizacion = p.idcotizacion AND 
                                                    p.idpedido = t.idpedido 
                                            order by p.idpedido ";
                        }
                        //echo $Sql;
                        ?>


                        <table >
                            <tr>
                                <td width="200">Mostrar Pedidos  Revisados por : </td>
                                <td width="100" style="text-align:left;" >
                                    <select name="CboAdministrador" id="CboAdministrador" style="width:80px;" >
                                        <option value="">Todos</option>
                                        <? 
                                            $SqlUser ="";
                                            $SqlUser ="SELECT id_usuario, nombres , iniciales FROM `usuarios` WHERE coordinador = '1'";
                                            $db->setQuery($SqlUser);
                                            $RsUser = $db->loadObjectList();
                                            foreach ($RsUser as $ColUser){
                                              if ($xCoord===$ColUser->id_usuario)
                                                {
                                                    echo "<option value='".$ColUser->id_usuario."' selected>".$ColUser->iniciales."</option>";
                                                } 
                                                else {
                                                    echo "<option value='".$ColUser->id_usuario."'>".$ColUser->iniciales."</option>";
                                                }
                                            }
                                        ?>
                                    </select>
                                </td>
                                <td width="100">En extracci&oacute;n</td>
                                <td width="60"><input type="radio" name="rbUsuario" value="5" onChange="llamaUsuario();"  <?= ($xFiltro=="5") ? " checked":""; ?> /> AG</td>
                                <td width="60"><input type="radio" name="rbUsuario" value="4" onChange="llamaUsuario();"  <?= ($xFiltro=="4") ? " checked":""; ?> /> FDM</td>
                                <td width="60"><input type="radio" name="rbUsuario" value="7" onChange="llamaUsuario();" <?= ($xFiltro=="7") ? " checked":""; ?> /> FM</td>
                                <td width="60"><input type="radio" name="rbUsuario" value="12" onChange="llamaUsuario();" <?= ($xFiltro=="12") ? " checked":""; ?> /> FSM</td>
                                <td width="60"><input type="radio" name="rbUsuario" value="11" onChange="llamaUsuario();" <?= ($xFiltro=="11") ? " checked":""; ?> /> JSM</td>
                                <td width="60"><input type="radio" name="rbUsuario" value="3" onChange="llamaUsuario();"  <?= ($xFiltro=="3") ? " checked":""; ?> /> YSO</td>
                                <td width="80"><input type="radio" name="rbUsuario" value="" onChange="llamaUsuario();"   <?= ($xFiltro=="") ? " checked":""; ?> /> Todos</td>
                                <td><input class='btn btn-mini' type='button' value='Refresh' onclick='llamaUsuario();'></td>                    
                            </tr>

                        </table>	

                        <?
                        $db->setQuery($Sql);
                        $Rs = $db->loadObjectList();
                        ?>
                        
                        <table class="table" id="datatables" >
                            <thead>
                                <tr>
                                    <th>Item</th>
                                    <th>Pedido</th>
                                    <th>Alias</th>
                                    <th>Coordinador</th>
                                    <th>Idioma de Origen</th>
                                    <th>Combinaciones</th>
                                    <th>Total Palabras</th>
                                    <th>En extracci&oacute;n</th>
                                    <th>Revisado</th>
                                    <th>Terminado</th>
                                    <th>Opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $cont = 1;
                                foreach ($Rs as $Columna) {

                                    ?>
                                    <tr style="background-color: #FAFAFA; <?echo $fuente;?>" id="<? echo $Columna->idterm; ?>">
                                        <!-- nombre del fomulario 'P100011' -> idpedido + el contador para que no se repita -->
                                <form name="frm<? echo $Columna->idterm . $cont; ?>" method="POST" action="">
                                    <td><? echo $Columna->idterm; ?></td>
                                    <td><? echo $Columna->idpedido; ?></td>
                                    <td><? echo $Columna->firma_alias; ?></td>
                                    <td><? echo $Columna->coordinador; ?></td>
                                    <td>
                                        <? echo $Columna->idioma_origen; ?>
                                        <input type="hidden" name="txtidiomaOrigen<?=$Columna->idterm;?>" id="txtidiomaOrigen<?=$Columna->idterm;?>" value="<?=$Columna->idioma_origen;?>"/>
                                    </td>
                                    <td>
                                        <? echo $Columna->idioma_final; ?>
                                        <input type="hidden" name="txtidiomaFinal<?=$Columna->idterm;?>" id="txtidiomaFinal<?=$Columna->idterm;?>" value="<?=$Columna->idioma_final;?>"/>
                                    </td>
                                    <td><input type="text" name="txtTot<? echo $Columna->idterm; ?>" id="txtTot<? echo $Columna->idterm; ?>" value="<? echo $Columna->totpal; ?>" style='width:90px;'/></td>
                                    <td><? include 'userRealizadoTermStrac.php'; ?>
                                    
                                    </td>
                                    <td><? include 'userRevisadoTermStrac.php' ?></td>
                                    <td>
                                        <? if ($Columna->terminado==="S")
                                            {
                                                echo "<input type='checkbox' name='ChkTer".$Columna->idterm."' id='ChkTer".$Columna->idterm."' value='S' checked>";
                                            } else {
                                                echo "<input type='checkbox' name='ChkTer".$Columna->idterm."' id='ChkTer".$Columna->idterm."' value='N' >";
                                            } 
                                        ?>
                                    </td>
                                    <td>
                                        
                                            <?

                                        $textoBoton="Informar";
                                        if ($Botondisable=="1"){
                                            $tipoBoton=" btn btn-mini";
                                            $tipoBoton_G=" btn btn-mini";
                                        } else {
                                            $tipoBoton="btn btn-danger btn-mini";
                                            $tipoBoton_G="btn btn-mini btn-primary";
                                            if ($Columna->informado=="S") {
                                                $tipoBoton="btn btn-success btn-mini";
                                                $textoBoton="Ya informado";								
                                            }
                                        }                                 

                                        ?>                

                                        <p>

                                        <!-- donde se guarda el idtermstrac -->
                                             <input type="hidden" name="termstrac<?=$Columna->idterm;?>" id="termstrac<?=$Columna->idterm;?>" value="<?=$Columna->idterm;?>"/>
                                             <button <? echo $activo;?> 
                                                     onclick="upd_termStrac('<?=$Columna->idterm;?>','<?=$xxxnivel;?>');" 
                                                     type="button" class="<? echo $tipoBoton_G;?>">
                                                      Guardar
                                             </button>  
                                             
                                                                      
                                             <button <? echo $activo;?> onclick="agregar_reporte('<? echo $Columna->idterm; ?>','7',this,this.id);" type="button" 
                                                             id="btnR<? echo $Columna->idterm; ?>" class="<? echo $tipoBoton;?>">
                                                     <i class="icon-envelope icon-white"></i> <? echo $textoBoton?> 
                                             </button>  

                                                                                
                                        </p>                                        
                                        
                                    </td>
                                </form>
                                </tr>

    <?php
    $cont++;
}
?>









                            </tbody>
                        </table>

                    </div><!--/row-->

                </div><!--/span-->
            </div><!--/row-->



            <footer>
                <hr>
                Techni-translate 2013
            </footer>

        </div>





        <!-- Le javascript
        ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
            <!--<script src="../assets/js/jquery.js"></script>-->
        <!--<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>-->
        <script src="../assets/js/bootstrap-transition.js"></script>
        <script src="../assets/js/bootstrap-alert.js"></script>


        <script src="../assets/js/bootstrap-dropdown.js"></script>
        <script src="../assets/js/bootstrap-scrollspy.js"></script>
        <script src="../assets/js/bootstrap-tab.js"></script>
        <script src="../assets/js/bootstrap-tooltip.js"></script>
        <script src="../assets/js/bootstrap-popover.js"></script>
        <script src="../assets/js/bootstrap-button.js"></script>
        <script src="../assets/js/bootstrap-collapse.js"></script>
        <!--<script src="../assets/js/bootstrap-carousel.js"></script>-->
        <script src="../assets/js/bootstrap-typeahead.js"></script>
<?php 

                        
?>
    </body>
</html>
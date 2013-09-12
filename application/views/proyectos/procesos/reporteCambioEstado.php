<?
require_once("../Lib/sesion.php");
require '../Lib/Db.conexion.php';
$db = DataBase::getInstance();

$xFiltro = $_GET['xFiltro'];
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
            <!--<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>-->


        <!--<link href="../assets/css/hernan.css" rel="stylesheet">-->

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
					"aLengthMenu": [[25, 50, 75, -1], [25, 50, 75, "Todos"]],
                    "iDisplayLength": -1,					
                    "bJQueryUI":true
                });
            })
            


        </script>      


        <!-- Le fav and touch icons -->
        <link rel="shortcut icon" href="../img/favicon.ico">

        <script>
            function listaPorCoordinador(){ 
                valRadio=getRadioVal("rbUsuario");
                window.location = location.pathname + "?xFiltro=" + valRadio;
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




<script >
    
    

    
    
    
function visto(xid,celda){

	//alert("vista de : " + xid);
	
        //celda.style.backgroundColor = "blue";
        //celda.style.color="red";
		celda.className ='btn btn-mini ';
		document.getElementById(xid).style.fontWeight= "100";
        //celda.getElementsByTagName("A")[0].style.color = "yellow";	
	
	
}


       function getVista(xid,obj){

	//var contenedor;
        var dato;
	// lista = document.getElementById("palabras");
	//indice = lista.selectedIndex;
	//valor = lista.options[indice].value;

	//contenedor = document.getElementById('contenedor');
        //elemento=document.getElementById("btn"+xid);
        
	ajax=nuevoAjax();
        //alert("ok");
	ajax.open("GET", "upd_adminReporteProceso.php?xid=" + xid,true);
	ajax.onreadystatechange=function() {
            if (ajax.readyState==1){
                // Mientras carga elimino la opcion "Elige" y pongo una que dice "Cargando"
               
                //elemento.innerHTML="Cargando...";
                obj.value="Cargando";
                //
                //elemento.length=0;
                //var opcionCargando=document.createElement("option"); opcionCargando.value=0; opcionCargando.innerHTML="Cargando...";
                //elemento.appendChild(opcionCargando); elemento.disabled=true;	
            }
            if (ajax.readyState==4) {
		//contenedor.innerHTML = ajax.responseText
                dato = ajax.responseText;
                if (dato =="1"){
                    
                    obj.className ='btn btn-mini ';
                    document.getElementById(xid).style.fontWeight= "100";
                    document.getElementById(xid).style.color= "black";
                    obj.value="Ya visto";
                    obj.getElementsByTagName("i")[0].className="icon-hand-left";
                    
                } else {
                    alert("error: no se realizo los cambios");
                }
            }

	}
	ajax.send(null)
}


</script>


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
                        <!--<a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
                          <i class="icon-user"></i> <?php //echo $xxxnombre;    ?>
                          <span class="caret"></span>
                        </a> -->
                        <!--<ul class="dropdown">
                          <li><a href="#"></a></li>
                          <li class="divider"></li>
                          <li><a href="../Lib/logout.php">Cerrar Sesion <?php echo $xxxiniciales; ?></a></li>
                        </ul>-->
                        <ul class="nav">
                            <li class="active"><a href="../Lib/logout.php">Cerrar Sesion <?php echo $xxxiniciales; ?></a></li>
                            <li><a href="#about"></a></li>
                        </ul>
                    </div>				  


                    <div class="nav-collapse">
                        <ul class="nav">
                            <li class="active"><a href="reporteCambioEstado.php">Reporte de Cambios de Estados</a></li>
                            <li ><a href="listar.php">Control de Procesos</a></li>
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
                            switch ($xFiltro) {
                                case "FSM":
                                    $xrbUsuarioCheked1 = " checked ";
                                    $Sql = "SELECT r.id, r.pedido,
								r.alias,
								r.coordinador,
								r.proceso,
								r.usuario,
								(select usuarios_estado.descripcion from usuarios_estado where usuarios_estado.idusuarios_estado = r.estado ) as estado,
								r.fecha,
								r.hora,
								r.proyecto_terminado, 
                                                                r.visto 
                                                                FROM  `r_cambios_estados` as r , pedido as p 
                                                                where r.pedido = p.idpedido and p.proyectoterminado ='N' and
								r.coordinador='" . $xFiltro . "' 
                                                                order by r.fecha desc, r.hora desc";
                                    break;
                                case "JSM":
                                    $xrbUsuarioCheked2 = " checked ";
                                    $Sql = "SELECT r.id, r.pedido,
								r.alias,
								r.coordinador,
								r.proceso,
								r.usuario,
								(select usuarios_estado.descripcion from usuarios_estado where usuarios_estado.idusuarios_estado = r.estado ) as estado,
								r.fecha,
								r.hora,
								r.proyecto_terminado, 
                                                                r.visto 
                                                                FROM  `r_cambios_estados` as r , pedido as p 
                                                                where r.pedido = p.idpedido and p.proyectoterminado ='N' and
                                                                r.coordinador='" . $xFiltro . "' 
                                                                order by r.fecha desc, r.hora desc";
                                    break;
                                default:
                                    $xrbUsuarioCheked3 = " checked ";
                                    $Sql = "SELECT r.id, r.pedido,
								r.alias,
								r.coordinador,
								r.proceso,
								r.usuario,
								(select usuarios_estado.descripcion from usuarios_estado where usuarios_estado.idusuarios_estado = r.estado ) as estado,
								r.fecha,
								r.hora,
								r.proyecto_terminado, 
                                                                r.visto 
                                                                FROM  `r_cambios_estados` as r , pedido as p 
                                                                where r.pedido = p.idpedido and p.proyectoterminado ='N'
                                                                order by r.fecha desc, r.hora desc";
                            }
                        }
                        ?>


                        <table >
                            <tr>
                                <td width="100">Administradores</td>
                                <td width="60"><input type="radio" name="rbUsuario" value="FSM" onChange="listaPorCoordinador();" <?PHP echo $xrbUsuarioCheked1; ?> /> FSM</td>
                                <td width="60"><input type="radio" name="rbUsuario" value="JSM" onChange="listaPorCoordinador();"  <?PHP echo $xrbUsuarioCheked2; ?> /> JSM</td>
                                <td width="60"><input type="radio" name="rbUsuario" value="" onChange="listaPorCoordinador();"  <?PHP echo $xrbUsuarioCheked3; ?> /> Todos</td>
                                <td><input class='btn btn-mini' type='button' value='Refresh' 
                                           onclick='listaPorCoordinador();'></td>                    
                            </tr>

                        </table>	

                        <?
                        $db->setQuery($Sql);
                        $Rs = $db->loadObjectList();
                        
                        
                        
                        //echo xFecha("2013/05/27");
                        
                        /* $array_dias['Sunday'] = "Domingo";
                        $array_dias['Monday'] = "Lunes";
                        $array_dias['Tuesday'] = "Martes";
                        $array_dias['Wednesday'] = "Miercoles";
                        $array_dias['Thursday'] = "Jueves";
                        $array_dias['Friday'] = "Viernes";
                        $array_dias['Saturday'] = "Sabado";
                        
                        
                        echo $array_dias[date('l', strtotime("2013-05-27"))]." ";
                        */
                         ?>
                        
                        <table class="table" id="datatables" >
                            <thead>
                                <tr>
                                    <th>Item</th>
                                    <th>Pedido</th>
                                    <th>Alias</th>
                                    <th>Coordinador</th>
                                    <th>Proceso</th>
                                    
                                    <th>Estado</th>
                                    <th>Fecha</th>
                                    <th>Hora</th>
                                    <th>Estado</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $cont = 1;
                                foreach ($Rs as $Columna) {



                                    $tipoBoton = "btn btn-danger";
                                    $textoBoton = "No Visto";
                                    $fuente = "font-weight: bold; color:red;";
                                    $icono ="icon-white";
                                    
                                    if ($Columna->visto == "S") {
                                        $tipoBoton = "btn";
                                        $textoBoton = "Ya visto";
                                        $fuente = "";
                                        $icono ="";
                                    }
                                    ?>
                                    <tr style="background-color: #FAFAFA; <?echo $fuente;?>" id="<? echo $Columna->id; ?>">
                                        <!-- nombre del fomulario 'P100011' -> idpedido + el contador para que no se repita -->
                                <form name="frm<? echo $Columna->idpedido . $cont; ?>" method="POST" action="">
                                    <td><? echo $Columna->id; ?></td>
                                    <td>
									<a href='procesos.php?xIdP=<? echo $Columna->pedido; ?>' >
									<? echo $Columna->pedido; ?>
                                    </a>
                                    </td>
                                    <td><? echo $Columna->alias; ?></td>
                                    <td><? echo $Columna->coordinador; ?></td>
                                    <td><? echo $Columna->proceso; ?></td>
                                    
                                    <td><? echo $Columna->estado; ?></td>
                                    <td>
                                        <?
                                        //echo $fecha1 = $Columna->fecha;
                                        //$fecha2 = date("d-m-Y", strtotime($fecha1));
                                        //El nuevo valor de la variable: $fecha2="20-10-2008"
                                        echo xFecha($Columna->fecha);
                                        ?>
                                    </td>

                                    <td><? echo $Columna->hora; ?></td>
                                    <td><button class="btn btn-mini <? echo $tipoBoton;?>" 
                                                onclick="getVista('<? echo $Columna->id; ?>',this);" 
                                                type="button"
                                                id="btn<? echo $Columna->id; ?>">
                                            <i class="icon-hand-left <?echo $icono;?>"></i> <? echo $textoBoton; ?>
                                        </button>
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
function xFecha($mifecha){
    setlocale(LC_TIME,"esp");
    //$fecha="2013-05-27"; // fecha de una variable
    //$fecha=Date("Y/m/d"); // fecha del sistema
   // $fecha=$mifecha; // fecha del sistema
    $dia_let= ucwords(strftime("%A",strtotime($mifecha))); 
    //ucwords convierte la primera letra a mayuscula
    $dia_num= strftime("%d",strtotime($mifecha));
    $mes_let= ucwords(strftime("%B",strtotime($mifecha)));
    //$ano_let= ucwords(strftime("%Y",strtotime($mifecha)));
    //$fecha_letras= $dia_let." ".$dia_num." de ".$mes_let." del ".$ano_let;
    $fecha_letras= $dia_let." ".$dia_num." de ".$mes_let;
    return htmlentities($fecha_letras);
}
                        
?>
    </body>
</html>
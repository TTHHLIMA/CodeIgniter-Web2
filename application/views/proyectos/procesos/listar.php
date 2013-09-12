<? 
require_once("../Lib/sesion.php");
require '../Lib/Db.conexion.php'; 
$db = DataBase::getInstance();

$xFiltro=$_GET['xFiltro'];
$xCoord=$_GET['xCoord'];

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
	<script src="../assets/js/jquery.js"></script>
<script src="../assets/js/bootstrap-modal.js"></script>
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
      
      .well{
          margin: 0px;
          padding: 7px;
      }
      
      .sidebar-nav {
        padding: 9px 0;
      }
	  form {
		padding:500px;
                height: 480px;
                border: 0px;
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
        
        <style type="text/css">
          <!--  @import "media/css/demo_table_jui.css";
            @import "media/themes/smoothness/jquery-ui-1.8.4.custom.css"; -->

        </style>
   
        <script type="text/javascript" charset="utf-8">
          /*  $(document).ready(function(){
                $('#datatables').dataTable({
                    "sPaginationType":"full_numbers",
                    "aaSorting":[[1, "desc"]],
                    "bJQueryUI":true
                });
            })
            */
			$(document).ready(function() {
				oTable = $('#datatables').dataTable({
					"fnDrawCallback": function ( oSettings ) {
						if ( oSettings.aiDisplay.length == 0 )
						{
							return;
						}
						
						var nTrs = $('#datatables tbody tr');
						var iColspan = nTrs[1].getElementsByTagName('td').length;
						var sLastGroup = "";
						for ( var i=0 ; i<nTrs.length ; i++ ) // muestra el total de registros 
						{
							var iDisplayIndex = oSettings._iDisplayStart + i;
							var sGroup = oSettings.aoData[ oSettings.aiDisplay[iDisplayIndex] ]._aData[15]; // en esta lina paso la informacion de la columna que va a mostrarse en la segunda fila
							if ( sGroup != sLastGroup )
							{
								var nGroup = document.createElement( 'tr' );
								var nCell = document.createElement( 'td' );
								nCell.colSpan = iColspan;
								nCell.className = "group";
								nCell.innerHTML = sGroup; // paso los datos html de la columna 14
								nGroup.appendChild( nCell );
								nTrs[i].parentNode.insertBefore( nGroup, nTrs[i] );
								sLastGroup = sGroup;
							}
						}
					},
					"aoColumnDefs": [
						{ "bVisible": false, "aTargets": [ 15 ] } // esta linea sirve para visualizar las columnas pueden ser varias separadas por comas
					],
					"sPaginationType":"full_numbers",
                    "aaSorting":[[0, "desc"]],
					"aLengthMenu": [[25, 50, 75, -1], [25, 50, 75, "Todos"]],
                    "iDisplayLength": -1,					
                    "bJQueryUI":true
				});
			} );

        </script>      
<!-- fin de estilo dataTable -->
	
    <!-- Le fav and touch icons -->
    <link rel="shortcut icon" href="../img/favicon.ico">


<!-- funciones -->
<script>
function enviar_parametro(valor){
	location = location.pathname + "?xFiltro=" + valor;
}

	window.onload = function(){
		document.getElementById('CboUsuarios').onchange = function(){
		enviar_parametro(this.value);
		}
	} 
</script>

<script>
function consultarUsuario(obj) {
var valorSeleccionado = obj.options[obj.selectedIndex].value; 
	location = location.pathname + "?xFiltro="+ valorSeleccionado;
}


function llamaUsuario(){ 
valRadio=getRadioVal("rbUsuario");
//alert("dato="+valRadio);
var i = document.getElementById("CboCoordinadorCab").selectedIndex;
valCboCoordinador = document.getElementById("CboCoordinadorCab").options[i].text;

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
<!-- fin de funciones -->




<!-- archivo ajax -->
<script src="../js/ajax.js" type="text/javascript"></script>
<script src="js/updProcesos.js" type="text/javascript"></script>
<!-- fin archivo ajax -->
<script>
function agregar_reporte(pedido, proceso, obj , ObjId){
       var dato;
       var buttonId = document.getElementById(ObjId);
	ajax=nuevoAjax();
	ajax.open("GET", "ins_userReporteProceso.php?xpedido=" + pedido + "&xproceso=" + proceso,true);
	ajax.onreadystatechange=function() {
            if (ajax.readyState==1){
                obj.value="Cargando";
            }
            if (ajax.readyState==4) {
                dato = ajax.responseText;
                //alert(dato.length);
                if (dato =="ok"){
                            obj.className ='btn btn-success btn-mini';
                            buttonId.innerHTML="<i class='icon-envelope icon-white'></i> Ya informado";
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
				  <i class="icon-user"></i> <?php //echo $xxxnombre;?>
				  <span class="caret"></span>
				</a> -->
				<!--<ul class="dropdown">
				  <li><a href="#"></a></li>
				  <li class="divider"></li>
				  <li><a href="../Lib/logout.php">Cerrar Sesion <?php echo $xxxiniciales;?></a></li>
				</ul>-->
				<ul class="nav">
				  <li class="active"><a href="../Lib/logout.php">Cerrar Sesion <?php echo $xxxiniciales;?></a></li>
				  <li><a href="#about"></a></li>
				</ul>
			  </div>				  
			  
			  
			  <div class="nav-collapse">
				<ul class="nav">
                                  <?php 
			if ($xxxnivel=="1"){ 
                                    echo "<li><a href='reporteCambioEstado.php'>Reporte de Cambios de Estados</a></li>";
                        }
                        ?>
                                    <li class="active"><a href="listar.php">Control de Procesos</a></li>
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
			if ($xxxnivel=="1"){ 
			
                            if ($xCoord=='JSM'){
                                $xCoordJSM=" selected";
                                $xCoordValue=" and pedido.coordinador='Juan Salas Marin' ";
                            }
                            if ($xCoord=='FSM'){
                                $xCoordFSM=" selected";
                                $xCoordValue=" and pedido.coordinador='Flormira Salas Marin' ";
                            }
                            if ($xCoord==''){
                                $xCoordTodos=" selected";
                                $xCoordValue="";
                            }

                            
                            
                            
				switch ($xFiltro) {
					case "5":
						$xrbUsuarioCheked1=" checked ";
						break;
					case "4":
						$xrbUsuarioCheked2=" checked ";
						break;
					case "10":
						$xrbUsuarioCheked3=" checked ";
						break;
					case "12":
						$xrbUsuarioCheked4=" checked ";
						break;
					case "11":
						$xrbUsuarioCheked5=" checked ";
						break;
					case "3":
						$xrbUsuarioCheked6=" checked ";
						break;
					case "":
						$xrbUsuarioCheked7=" checked ";
						break;																		
					default:
					   $xrbUsuarioCheked7=" checked ";
				}
			?>
				
	            <table >
            	<tr>
                	<td width="320"><h1>Proyectos Abiertos</h1></td>
                        <td width="220">
                            <label for="CboCoordinadorCab">Coordinador</label>
                            <select name="CboCoordinadorCab" id="CboCoordinadorCab" style="width:80px;">
                                
                                <option value="JSM" <?=$xCoordJSM?> >JSM</option>
                                <option value="FSM" <?=$xCoordFSM?> >FSM</option>
                                <option value="" <?=$xCoordTodos?> >Todos</option>
                            </select>
                        </td>
                        
            	    <td width="60"><input type="radio" name="rbUsuario" value="5" onChange="llamaUsuario();"  <?PHP echo $xrbUsuarioCheked1; ?> /> AG</td>
                    <td width="60"><input type="radio" name="rbUsuario" value="4" onChange="llamaUsuario();" <?PHP echo $xrbUsuarioCheked2; ?> /> FDM</td>
                    <td width="60"><input type="radio" name="rbUsuario" value="7" onChange="llamaUsuario();" <?PHP echo $xrbUsuarioCheked3; ?> /> FM</td>
                    <td width="60"><input type="radio" name="rbUsuario" value="6" onChange="llamaUsuario();" <?PHP echo $xrbUsuarioCheked4; ?> /> FSM</td>
                    <td width="60"><input type="radio" name="rbUsuario" value="8" onChange="llamaUsuario();"  <?PHP echo $xrbUsuarioCheked5; ?> /> JSM</td>
                    <td width="60"><input type="radio" name="rbUsuario" value="3" onChange="llamaUsuario();" <?PHP echo $xrbUsuarioCheked6; ?> /> YSO</td>
                    <td width="80"><input type="radio" name="rbUsuario" value="" onChange="llamaUsuario();" <?PHP echo $xrbUsuarioCheked7; ?> /> Todos</td>
                    <td><input class='btn btn-mini' type='button' value='Refresh' onclick='llamaUsuario();'></td>                    
                </tr>

           </table>	
			
			<?php }	
			?>   
            
            
            
            
       
            
            
                     
			<?
			
			if ($xxxnivel=="1"){
				$Sql="";

				if ($xFiltro<>""){
				$Sql="SELECT  pedido.idpedido ,
                                                compania.alias_com , 
						(select iniciales from coordinador where coordinador.nombre = pedido.coordinador limit 0,1 ) as coordinador , 
						DATE_FORMAT(pedido.fechaentrega, '%d/%m/%Y') AS fechaentrega, 
                                                pedido.realizadopor1 as salto_linea, 
                                                pedido.realizadopor2 as formateo,  
						pedido.realizadopor3 as pre_traduccion, 
                                                pedido.realizadopor7 as traduccion , 
                                                cotizacion.cant_combinaciones ,
                                                cotizacion.idioma_origen , 
                                                cotizacion.idioma_final , 
                                                pedido.realizadopor4 as traduccion_final , 
                                                pedido.realizadopor5 as formato_final , 
                                                pedido.realizadopor6 ,  
                                                pedido.realizadopor8 as correccion                                                
                                                                 FROM compania, contacto, requerimientos, cotizacion,  pedido where compania.idcompania = contacto.idcompania and 
								 contacto.idcontacto = requerimientos.id_contacto and requerimientos.idrequerimiento = cotizacion.idrequerimiento and cotizacion.idcotizacion = pedido.idcotizacion and 
								 pedido.proyectoterminado='N' ".$xCoordValue."
								 and
								(pedido.`realizadopor1` IN (select ue.idusuarios_estado from usuarios_estado ue, estado e where e.idestado = ue.idestado and ue.id_usuarios ='".$xFiltro."' order by ue.id_usuarios, e.orden ) or
								pedido.`realizadopor2` IN (select ue.idusuarios_estado from usuarios_estado ue, estado e where e.idestado = ue.idestado and ue.id_usuarios ='".$xFiltro."' order by ue.id_usuarios, e.orden ) or
								pedido.`realizadopor3` IN (select ue.idusuarios_estado from usuarios_estado ue, estado e where e.idestado = ue.idestado and ue.id_usuarios ='".$xFiltro."' order by ue.id_usuarios, e.orden ) or
								pedido.`realizadopor4` IN (select ue.idusuarios_estado from usuarios_estado ue, estado e where e.idestado = ue.idestado and ue.id_usuarios ='".$xFiltro."' order by ue.id_usuarios, e.orden ) or
								pedido.`realizadopor5` IN (select ue.idusuarios_estado from usuarios_estado ue, estado e where e.idestado = ue.idestado and ue.id_usuarios ='".$xFiltro."' order by ue.id_usuarios, e.orden ) or
								pedido.`realizadopor7` IN (select ue.idusuarios_estado from usuarios_estado ue, estado e where e.idestado = ue.idestado and ue.id_usuarios ='".$xFiltro."' order by ue.id_usuarios, e.orden ) or
								pedido.`realizadopor8` IN (select ue.idusuarios_estado from usuarios_estado ue, estado e where e.idestado = ue.idestado and ue.id_usuarios ='".$xFiltro."' order by ue.id_usuarios, e.orden )  )
								 order by  pedido.fechaentrega";				 			 
				 } else {
				 $Sql="SELECT  pedido.idpedido ,
                                                compania.alias_com , 
						(select iniciales from coordinador where coordinador.nombre = pedido.coordinador limit 0,1 ) as coordinador , 
                                                 DATE_FORMAT(pedido.fechaentrega, '%d/%m/%Y') AS fechaentrega, 
                                                 pedido.realizadopor1 as salto_linea, 
                                                 pedido.realizadopor2 as formateo,  
                                                 pedido.realizadopor3 as pre_traduccion, 
                                                 pedido.realizadopor7 as traduccion , 
                                                 cotizacion.cant_combinaciones ,
                                                 cotizacion.idioma_origen , 
                                                 cotizacion.idioma_final , 
                                                 pedido.realizadopor4 as traduccion_final , 
                                                 pedido.realizadopor5 as formato_final , 
                                                 pedido.realizadopor6 ,  
                                                 pedido.realizadopor8 as correccion                                                
                                                         FROM compania, contacto, requerimientos, cotizacion,  pedido where compania.idcompania = contacto.idcompania and 
							 contacto.idcontacto = requerimientos.id_contacto and requerimientos.idrequerimiento = cotizacion.idrequerimiento and cotizacion.idcotizacion = pedido.idcotizacion and 
							 pedido.proyectoterminado='N' ".$xCoordValue." order by  pedido.fechaentrega";
				 }
			} 
			
			if ($xxxnivel=="2"){
				$Sql="";
				$Sql="SELECT distinct pedido.idpedido ,
                                        compania.alias_com , 
							(select iniciales from coordinador where coordinador.nombre = pedido.coordinador limit 0,1 ) as coordinador , 
							DATE_FORMAT(pedido.fechaentrega, '%d/%m/%Y') AS fechaentrega, 
                                                        pedido.realizadopor1 as salto_linea, 
                                                        pedido.realizadopor2 as formateo,  
							pedido.realizadopor3 as pre_traduccion, 
                                                        pedido.realizadopor7 as traduccion , 
                                                        cotizacion.cant_combinaciones ,
                                                        cotizacion.idioma_origen , 
							cotizacion.idioma_final , 
                                                        pedido.realizadopor4 as traduccion_final , 
                                                        pedido.realizadopor5 as formato_final , 
                                                        pedido.realizadopor6 , 
                                                        pedido.realizadopor8 as correccion,
                                                proc_conf_salto_linea,
                                                proc_conf_formateo,
                                                proc_conf_pre_traduccion,
                                                proc_conf_traduccion,
                                                proc_conf_correccion,
                                                proc_conf_traduccion_final,
                                                proc_conf_formato_final,   
                                                Coalesce((select id_usuarios from usuarios_estado where idusuarios_estado = realizadopor1), 0) as user_salto_linea,
                                                Coalesce((select id_usuarios from usuarios_estado where idusuarios_estado = realizadopor2), 0) as user_formateo,
                                                Coalesce((select id_usuarios from usuarios_estado where idusuarios_estado = realizadopor3), 0) as user_pre_traduccion,
                                                Coalesce((select id_usuarios from usuarios_estado where idusuarios_estado = realizadopor7), 0) as user_traduccion,
                                                Coalesce((select id_usuarios from usuarios_estado where idusuarios_estado = realizadopor8), 0) as user_correccion,
                                                Coalesce((select id_usuarios from usuarios_estado where idusuarios_estado = realizadopor4), 0) as user_traduccion_final,
                                                Coalesce((select id_usuarios from usuarios_estado where idusuarios_estado = realizadopor5), 0) as user_formato_final,
                                                Coalesce((select idestado from usuarios_estado where idusuarios_estado = realizadopor1), 0) as estado_salto_linea,
                                                Coalesce((select idestado from usuarios_estado where idusuarios_estado = realizadopor2), 0) as estado_formateo,
                                                Coalesce((select idestado from usuarios_estado where idusuarios_estado = realizadopor3), 0) as estado_pre_traduccion,
                                                Coalesce((select idestado from usuarios_estado where idusuarios_estado = realizadopor7), 0) as estado_traduccion,
                                                Coalesce((select idestado from usuarios_estado where idusuarios_estado = realizadopor8), 0) as estado_correccion,
                                                Coalesce((select idestado from usuarios_estado where idusuarios_estado = realizadopor4), 0) as estado_traduccion_final,
                                                Coalesce((select idestado from usuarios_estado where idusuarios_estado = realizadopor5), 0) as estado_formato_final	                                                
										FROM  compania, contacto, requerimientos, cotizacion,  pedido where compania.idcompania = contacto.idcompania and contacto.idcontacto = requerimientos.id_contacto and 
										requerimientos.idrequerimiento = cotizacion.idrequerimiento and  cotizacion.idcotizacion = pedido.idcotizacion and pedido.proyectoterminado='N' and
										(
										pedido.`realizadopor1` IN (select ue.idusuarios_estado from usuarios_estado ue, estado e where e.idestado = ue.idestado and ue.id_usuarios ='".$xxxiduser."' order by ue.id_usuarios, e.orden ) or
										pedido.`realizadopor2` IN (select ue.idusuarios_estado from usuarios_estado ue, estado e where e.idestado = ue.idestado and ue.id_usuarios ='".$xxxiduser."' order by ue.id_usuarios, e.orden ) or
										pedido.`realizadopor3` IN (select ue.idusuarios_estado from usuarios_estado ue, estado e where e.idestado = ue.idestado and ue.id_usuarios ='".$xxxiduser."' order by ue.id_usuarios, e.orden ) or
										pedido.`realizadopor4` IN (select ue.idusuarios_estado from usuarios_estado ue, estado e where e.idestado = ue.idestado and ue.id_usuarios ='".$xxxiduser."' order by ue.id_usuarios, e.orden ) or
										pedido.`realizadopor5` IN (select ue.idusuarios_estado from usuarios_estado ue, estado e where e.idestado = ue.idestado and ue.id_usuarios ='".$xxxiduser."' order by ue.id_usuarios, e.orden ) or
										pedido.`realizadopor7` IN (select ue.idusuarios_estado from usuarios_estado ue, estado e where e.idestado = ue.idestado and ue.id_usuarios ='".$xxxiduser."' order by ue.id_usuarios, e.orden ) or
										pedido.`realizadopor8` IN (select ue.idusuarios_estado from usuarios_estado ue, estado e where e.idestado = ue.idestado and ue.id_usuarios ='".$xxxiduser."' order by ue.id_usuarios, e.orden )      
																	)
										order by  pedido.fechaentrega";
					
                        }
			//echo $Sql;
                       
			 $db->setQuery($Sql);  
				$Rs = $db->loadObjectList();
			?>		
				<table class="table" id="datatables" >
					<thead>
						<tr>
							<th>Item</th>
							<th>Prioridad</th>
							<th>Pedido</th>
							<th>Compania</th>
							<th>Coordinador</th>
							<th>Fecha Entrega</th>
							<th>Idioma de Origen</th>
							<th>Idioma Finales</th>
							<th>Salto de Linea</th>
							<th>Formateo</th>
							<th>Pre-Traduci&oacute;n</th>
							<th>Traducci&oacute;n</th>
							<th>Correci&oacute;n</th>
							<th>Traduci&oacute;n Final</th>
							<th>Formato Final</th>
							
							<th>Formularios</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$cont=1;
					
						
						// HH: BUSCO PROCESOS DONDE INTERVIENE EL USUARIO
						// foreach de ka consulta principal
						foreach($Rs as $Columna){
						
						$interviene=0; // saber si interviene acumulador
						if($xxxnivel=='2'){	
						
							 /*$SqlAviso="";
							 $SqlAviso="select 
											idpedido , 
											proc_conf_salto_linea,
											proc_conf_formateo,
											proc_conf_pre_traduccion,
											proc_conf_traduccion,
											proc_conf_correccion,
											proc_conf_traduccion_final,
											proc_conf_formato_final,
											realizadopor1,
											realizadopor2,
											realizadopor3,
											realizadopor7,
											realizadopor8,
											realizadopor4,
											realizadopor5
										from 
											pedido
										where 
											idpedido ='".$Columna->idpedido."'
										limit 0,1	";	
							 //echo "<br>".$SqlAviso."<br>";
							 $db->setQuery($SqlAviso);  
							 $RsAviso = $db->loadObjectList();	*/					
								//foreach($RsAviso as $ColAviso){

										$intervieneUser=0; // saber si interviene acumulador
										
                                                                                /*$proc_user_salto_linea= buscar($ColAviso->realizadopor1) ;
										$proc_user_formateo=  buscar($ColAviso->realizadopor2);
										$proc_user_pre_traduccion=  buscar($ColAviso->realizadopor3);
										$proc_user_traduccion=  buscar($ColAviso->Cborealizadopor7);
										$proc_user_correccion=  buscar($ColAviso->realizadopor8);
										$proc_user_traduccion_final=  buscar($ColAviso->realizadopor4);
										$proc_user_formato_final=  buscar($ColAviso->realizadopor5);
                                                                                                                                                                 * 
                                                                                 
                                                 user_salto_linea,
                                                 user_formateo,
                                                 user_pre_traduccion,
                                                 user_traduccion,
                                                 user_correccion,
                                                 user_traduccion_final,
                                                 user_formato_final,
                                                 estado_salto_linea,
                                                 estado_formateo,
                                                 estado_pre_traduccion,
                                                 estado_traduccion,
                                                 estado_correccion,
                                                 estado_traduccion_final,
                                                 estado_formato_final,
                                                 proc_conf_salto_linea,
                                                 proc_conf_formateo,
                                                 proc_conf_pre_traduccion,
                                                 proc_conf_traduccion,
                                                 proc_conf_correccion,
                                                 proc_conf_traduccion_final,
                                                 proc_conf_formato_final,
                                                                                 * 
                                                                                 */   
                                                                                
                                                                //echo "<br>prueba:".$xxxiduser."".$Columna->idpedido."".$intervieneUser."";                  
										if ($Columna->user_salto_linea==$xxxiduser){ // si interviene AG en el proceso
											if ($Columna->estado_salto_linea=="3"){  // si es = a ok
											//echo "Antes Proc Salto de Linea ".$Columna->proc_conf_salto_linea;
												if ($Columna->proc_conf_salto_linea!="S"){
													$intervieneUser++; // si es diferente interviene
												}
											} else { // quiere decir k es diferente
													$intervieneUser++;
											}
										} 

										//echo "Salto de Linea ".$Columna->user_salto_linea;
										//echo "Proc Salto de Linea ".$Columna->proc_conf_salto_linea;
										if ($Columna->user_formateo==$xxxiduser){										
											if ($Columna->estado_formateo=="3"){
												if ($Columna->proc_conf_formateo!="S"){
													$intervieneUser++;
												}
											} else {
												$intervieneUser++;
											}
										}
										if ($Columna->user_pre_traduccion==$xxxiduser){
											if ($Columna->estado_pre_traduccion=="3"){
												if ($Columna->proc_conf_pre_traduccion<>"S"){
													$intervieneUser++;
												}
											} else {
												$intervieneUser++;
											}
										}
										 										
										
										if ($Columna->user_traduccion==$xxxiduser){
											if ($Columna->estado_traduccion=="3"){
												if ($Columna->proc_conf_traduccion<>"S"){
													$intervieneUser++;
												}
											} else {
												$intervieneUser++;
											}
										}
										
										if ($Columna->user_correccion==$xxxiduser){
											if ($Columna->estado_correccion=="3"){
												if ($Columna->proc_conf_correccion<>"S"){
													$intervieneUser++;
												}
											} else {
												$intervieneUser++;
											}
										}
										if ($Columna->user_traduccion_final==$xxxiduser){
											if ($Columna->estado_traduccion_final=="3"){
												if ($Columna->proc_conf_traduccion_final<>"S"){
													$intervieneUser++;
												}
											} else {
												$intervieneUser++;
											}
										}
										if ($Columna->user_formato_final==$xxxiduser){
											if ($Columna->estado_formato_final=="3"){
												if ($Columna->proc_conf_formato_final<>"S"){
													$intervieneUser++;
												}
											} else {
												$intervieneUser++;
											}
										}
								//}
							// FIN DE BUSCAR PROCESOS DONDE INTERVIENE EL USUARIO	
								$interviene = $intervieneUser;  // paso los valores encontrados
							} else {
								$interviene = 1; // si admin lo visualiza
							}
							//echo "hernan: ".$intervieneUser."<br>";
					/*		
							?>
								
<!-- datos de la fila en blanco -->

							<tr>
								<td colspan="16">
                                <?
                                echo $Columna->idpedido."<br>".$interviene;
								?>
                                </td>
							</tr>                                
<!-- fin de la fila en blanco--> 


							<?
						*/	
							if ($interviene>0){	 // si interviene en algun proceso
							?>





							<tr>
								<!-- nombre del fomulario 'P100011' -> idpedido + el contador para que no se repita -->
								<form name="frm<? echo $Columna->idpedido.$cont; ?>" method="POST" action="saveCoordinacion.php">
								<td>
									
                             		<?                                                          
										echo "<a class='btn btn-mini' href='#".$Columna->idpedido."x' 
															onclick='$(\"#".$Columna->idpedido."0\").toggle(200);
																	 $(\"#".$Columna->idpedido."1\").toggle(200);
																	 $(\"#".$Columna->idpedido."2\").toggle(200);
																	 $(\"#".$Columna->idpedido."3\").toggle(200);
																	 $(\"#".$Columna->idpedido."4\").toggle(200);
																	 $(\"#".$Columna->idpedido."5\").toggle(200);
																	 $(\"#".$Columna->idpedido."6\").toggle(200);
																	 $(\"#".$Columna->idpedido."7\").toggle(200);'>
																	 
																	 <i class='icon-arrow-right'></i></a>";
									?>                                 
                                </td>
								
								
								<?
								if($xxxnivel=='2'){
									//echo $Sql;
									$xSql="";
									$xSql="select distinct prioridades.prioridad 
											from prioridades , usuario_estado
											where 
											prioridades.id_usuario = usuario_estado.id_usuario and
											usuario_estado.nombre ='".$xxxnombre."' and 
											prioridades.id_pedido ='".$Columna->idpedido."'";
									$db->setQuery($xSql);  
									$RsSql = $db->loadObjectList();
									$NrRes="";
									$NrRes = count($RsSql);
									if ($NrRes > 0) { // imprimo los datos 	
										foreach($RsSql as $Col){
											$prioridad="";
											$prioridad=$Col->prioridad;
										}
									} else {
											$prioridad="";
									}
									
									echo "<td>".$prioridad."</td>";
								} else {
									echo "<td></td>";
								}
								
								?>
								
								
								
								
								<td>
									<? echo $Columna->idpedido; ?>
                                    <input type="hidden" name="pedido" id="pedido" value="<? echo $Columna->idpedido; ?>"/>
                                </td>
								<td><? echo $Columna->alias_com; ?></td>
								<td><? echo $Columna->coordinador ?></td>
								<td><? echo $Columna->fechaentrega; ?></td>
								<td><? echo $Columna->idioma_origen; ?></td>
								<td style="width:200px;"><? echo $Columna->idioma_final; ?></td>
                                                                
                                                                <?php 
                                                               
                                                                $Color_Salto_Linea = ponerColorEstados($Columna->salto_linea);
                                                                $Color_formateo = ponerColorEstados($Columna->formateo);
								$Color_pre_traduccion = ponerColorEstados($Columna->pre_traduccion);
                                                                $Color_traduccion = ponerColorEstados($Columna->traduccion);
								$Color_correccion = ponerColorEstados($Columna->correccion);
                                                                $Color_traduccion_final = ponerColorEstados($Columna->traduccion_final);
								$Color_formato_final = ponerColorEstados($Columna->formato_final);
                                                                ?>
                                                                
								<td <?=$Color_Salto_Linea?>><b><?echo mostrarInicialEstado($Columna->salto_linea);  ?></b></td>
								<td <?=$Color_formateo?>><b><?  echo mostrarInicialEstado($Columna->formateo);  ?></b></td>
								<td <?=$Color_pre_traduccion?>><b><?  echo mostrarInicialEstado($Columna->pre_traduccion);  ?></b></td>
                                                                <td <?=$Color_traduccion?>><b><?  echo mostrarInicialEstado($Columna->traduccion);  ?></b></td>
								<td <?=$Color_correccion?>><b><?  echo mostrarInicialEstado($Columna->correccion); ?></b></td>
                                                                <td <?=$Color_traduccion_final?>><b><?  echo mostrarInicialEstado($Columna->traduccion_final);  ?></b></td>
								<td <?=$Color_formato_final?>><b><?  echo mostrarInicialEstado($Columna->formato_final);  ?></b></td>
								</form>
                                
 
                                
                                
                                
								<td style="padding:0px">
										
										<table >
											<!-- datos que se ocultan -->
											<tr>
												<td colspan="7" id="<? echo $Columna->idpedido; ?>0" style="display:none; margin:0px; padding:0px; border:0px;"  >
														
												<span style="background: #EFEFFB;">
                                                                                                    
                                                            
                                                                                                    <?php             
                                                                                                        echo "<a class='btn btn-mini' href='#".$Columna->idpedido."x' 
                                                                                                               onclick='$(\"#".$Columna->idpedido."0\").toggle(200);
                                                                                                                                $(\"#".$Columna->idpedido."1\").toggle(200);
                                                                                                                                $(\"#".$Columna->idpedido."2\").toggle(200);
                                                                                                                                $(\"#".$Columna->idpedido."3\").toggle(200);
                                                                                                                                $(\"#".$Columna->idpedido."4\").toggle(200);
                                                                                                                                $(\"#".$Columna->idpedido."5\").toggle(200);
                                                                                                                                $(\"#".$Columna->idpedido."6\").toggle(200);
                                                                                                                                $(\"#".$Columna->idpedido."7\").toggle(200);'>

                                                                                                                                <i class=' icon-arrow-left'></i>&nbsp;Cerrar</a>";                                    
                                                                                                        ?>
                                                                         
															</span>
															<span style="background: #EFEFFB;"><b>Pedido:&nbsp;</b><? echo $Columna->idpedido; ?>&nbsp;</span>
															<span style="background: #EFEFFB;"><b>Alias:&nbsp;</b><? echo $Columna->alias_com; ?>&nbsp;</span>
															<span style="background: #EFEFFB;"><b>Coordinador:&nbsp;</b><? echo $Columna->coordinador ?>&nbsp;</span>
															<span style="background: #EFEFFB;"><b>Fecha de entrega:&nbsp;</b><? echo $Columna->fechaentrega; ?>&nbsp;</span>
															<span style="background: #EFEFFB;"><b>Idioma de origen:&nbsp;</b><? echo $Columna->idioma_origen; ?>&nbsp;</span>
															<span style="background: #EFEFFB;"><b>Idioma final:&nbsp;</b><? echo $Columna->idioma_final; ?>&nbsp;</span>
															
														
												</td>
											</tr>
											<!-- fin de datos que se ocultan -->
											
											<tr>
												<td colspan="4" style="background-color: #A9BCF5; padding:0px;"><h5 class="titulo">Preparaci&oacute;n</h4></td>
												<td colspan="3" style="background-color: #F6CEEC; padding:0px;"><h5 class="titulo">Versi&oacute;n Final</h4></td>
											</tr>
											
											<tr class="sin_margen" >
													<?  include("userformPrepSalto.php");  ?>
													<?  include("userformPrepFormateo.php");  ?>
													<?  include("userformPrepPreTrad.php");  ?>
													<?  include("userformPrepTrad.php");  ?>
													<?  include("userformPrepCorre.php");  ?>
													<?  include("userformVerFinTrad.php");  ?>
													<?  include("userformVerFinFormFin.php");  ?>

											</tr>
										</table>
								</td>
								
							</tr>
							
							<?php
							
							$cont++;
							} // fin si interviene en algun proceso
							
						// fin del foreach principal
						}
						
						?>
                        
                        
                        
                        
                        
                        
                        
                        
<!-- datos de la fila en blanco -->

							<tr>
								<!-- nombre del fomulario 'P100011' -> idpedido + el contador para que no se repita -->
								<form name="frm0" method="POST" action="">
								<td></td>
								
								
									<td></td>
								
								
								
								
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
                                <td></td>
								<td></td>
                                <td></td>
								<td></td>
								

                                </form>
                                
								<td style="padding:0px">
										<table >
											<!-- datos que se ocultan -->
											<tr>
												<td colspan="7" id="0" style="display:none; margin:0px; padding:0px; border:0px;"  ></td>
											</tr>
											<!-- fin de datos que se ocultan -->
											
											<tr>
												<td colspan="4" ></td>
												<td colspan="3" ></td>
											</tr>
											
											<tr class="sin_margen" ></tr>
										</table>
								</td>
							
							</tr>                                
<!-- fin de la fila en blanco-->                              
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
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
function buscar($palabra){
        $cadEspacio=" "; // espacio en blanco
        $pos = strpos(trim($palabra), $cadEspacio);// la posicion

        // Nótese el uso de ===. Puesto que == simple no funcionará como se espera
        if ($pos === false) {
                //echo "La cadena '$findme' no fue encontrada en la cadena '$mystring'";
                return $palabra;
        } else {
                //echo "La cadena '$findme' fue encontrada en la cadena '$mystring'";
                //echo " y existe en la posición $pos";
                $xpalabra=strstr(trim($palabra)," ",true );
                return strtoupper($xpalabra);
        }    
}


function ponerColorEstados($estado){
$base = DataBase::getInstance();    
$xSql="";
$xSql="select ue.idestado  from usuarios_estado ue where  ue.idusuarios_estado = '".$estado."'";
$base->setQuery($xSql);  
$RsSql = $base->loadObjectList();
$NrRes="";
$NrRes = count($RsSql);
if ($NrRes > 0) { // imprimo los datos 	
        foreach($RsSql as $Col){
                $xxEstado="";
                $xxEstado=$Col->idestado;
        }  
}   
    
    if ($xxEstado==="1"){
        $xxColor="style='color:red;'";
    }
    if ($xxEstado==="2"){
        $xxColor="style='color:blue;'";
    }
    if ($xxEstado==="3"){
        $xxColor="style='color:green;'";
    }    
    return $xxColor;
}


function mostrarInicialEstado($estado){
$base = DataBase::getInstance();      
$xSql="";
$xSql="select ue.descripcion  from usuarios_estado ue where  ue.idusuarios_estado = '".$estado."'";
$base->setQuery($xSql);  
$RsSql = $base->loadObjectList();
$NrRes="";
$NrRes = count($RsSql);
if ($NrRes > 0) { // imprimo los datos 	
        foreach($RsSql as $Col){
                $xxDescripcion="";
                $xxDescripcion=$Col->descripcion;
        }  
}   
    return $xxDescripcion;
}


?>
    
    
  </body>
</html>
<?
require_once("../Lib/sesion.php");
require '../Lib/Db.conexion.php'; 
$db = DataBase::getInstance();

$xFiltro=$_GET['xFiltro'];
$xCoord=$_GET['xCoord'];
$xIdP=$_GET['xIdP'];
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

<script>
   $(document).ready(miFuncion);
   
   function miFuncion()
{
    //alert("Hola Mundo");
    $("#<?=$xIdP?>0").toggle(200);
    $("#<?=$xIdP?>1").toggle(200);
    $("#<?=$xIdP?>2").toggle(200);
    $("#<?=$xIdP?>3").toggle(200);
    $("#<?=$xIdP?>4").toggle(200);
    $("#<?=$xIdP?>5").toggle(200);
    $("#<?=$xIdP?>6").toggle(200);
    $("#<?=$xIdP?>7").toggle(200);
}
</script>

<!-- fin archivo ajax -->
<script>
    
function agregar_reporte(pedido, proceso, obj , ObjId){
       var dato;
       var buttonId = document.getElementById(ObjId);
	//alert (ObjId);
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
			
            


            
            
            
                        
                        
            
            
              
            
                     
			<?
			
			if ($xxxnivel=="1"){
				$Sql="";

				 $Sql="SELECT  pedido.idpedido ,compania.alias_com , 
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
							 pedido.proyectoterminado='N' and pedido.idpedido='".$xIdP."' order by  pedido.fechaentrega limit 0,1";
				
			} 
			
		
			//echo $Sql;
                       
			 $db->setQuery($Sql);  
				$Rs = $db->loadObjectList();
			?>		

						<?php
						$cont=1;
					
						
						// HH: BUSCO PROCESOS DONDE INTERVIENE EL USUARIO
						// foreach de ka consulta principal
						foreach($Rs as $Columna){
						
						$interviene=0; // saber si interviene acumulador
						$interviene = 1; // si admin lo visualiza
						
							if ($interviene>0){	 // si interviene en algun proceso
							?>
			
										<table >
											<!-- datos que se ocultan -->
											<tr>
												<td colspan="7" id="<? echo $Columna->idpedido; ?>0" style="display:none; margin:0px; padding:0px; border:0px;"  >
														
												
															<span style="background: #EFEFFB;"><b>Pedido:&nbsp;</b><? echo $Columna->idpedido; ?>&nbsp;</span>
															<span style="background: #EFEFFB;"><b>Alias:&nbsp;</b><? echo $Columna->alias_com; ?>&nbsp;</span>
															<span style="background: #EFEFFB;"><b>Coordinador:&nbsp;</b><? echo $Columna->coordinador ?>&nbsp;</span>
															<span style="background: #EFEFFB;"><b>Fecha de entrega:&nbsp;</b><? echo $Columna->fechaentrega; ?>&nbsp;</span>
															<span style="background: #EFEFFB;"><b>Idioma de origen:&nbsp;</b><? echo $Columna->idioma_origen; ?>&nbsp;</span>
															<span style="background: #EFEFFB;"><b>Idioma final:&nbsp;</b><? echo $Columna->idioma_final; ?>&nbsp;</span>
															<span style="background: #EFEFFB;">
                                                            	
														
												</td>
											</tr>
											<!-- fin de datos que se ocultan -->
											
											<tr>
												<td colspan="4" style="background-color: #A9BCF5; padding:0px;"><h5 class="titulo">Preparaci&oacute;n</h4></td>
												<td colspan="3" style="background-color: #F6CEEC; padding:0px;"><h5 class="titulo">Versi&oacute;n Final</h4></td>
											</tr>
											
											<tr class="sin_margen" style="vertical-align: top;"  >
													<?  include("userformPrepSalto.php");  ?>
													<?  include("userformPrepFormateo.php");  ?>
													<?  include("userformPrepPreTrad.php");  ?>
													<?  include("userformPrepTrad.php");  ?>
													<?  include("userformPrepCorre.php");  ?>
													<?  include("userformVerFinTrad.php");  ?>
													<?  include("userformVerFinFormFin.php");  ?>

											</tr>
										</table>
								
							<?php
							
							$cont++;
							} // fin si interviene en algun proceso
							
						// fin del foreach principal
						}
						
						?>


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
?>
    
    
  </body>
</html>
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
        <link href="<?= $this->config->base_url() ?>assets/css/bootstrap.css" rel="stylesheet">
        <link href="<?= $this->config->base_url() ?>css/menu_superior.css" rel="stylesheet">
        <!--<script src=" http://code.jquery.com/jquery-1.9.1.js"></script>-->
        <!--<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>-->
        <!--<link href="../assets/css/hernan.css" rel="stylesheet">-->

        <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
          <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->

        <link href="<?= $this->config->base_url() ?>assets/css/bootstrap-responsive.css" rel="stylesheet">	
        <script src="<?= $this->config->base_url() ?>JQuery/datatable/js/jquery.js" type="text/javascript"></script>
        <script src="<?= $this->config->base_url() ?>JQuery/datatable/js/jquery.dataTables.js" type="text/javascript"></script>
        <!-- archivo ajax -->
        <script src="<?= $this->config->base_url() ?>js/ajax.js" type="text/javascript"></script>
        <!-- fin archivo ajax -->



        <style type="text/css">
            <!--  @import "<?= $this->config->base_url() ?>JQuery/datatable/css/demo_table_jui.css";
            @import "<?= $this->config->base_url() ?>JQuery/datatable/themes/smoothness/jquery-ui-1.8.4.custom.css"; -->

        </style>

        
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
        
        <script type="text/javascript" charset="utf-8">
            $(document).ready(function() {
                oTable = $('#datatables').dataTable({
                    "fnDrawCallback": function(oSettings) {
                        if (oSettings.aiDisplay.length == 0)
                        {
                            return;
                        }

                        var nTrs = $('#datatables tbody tr');
                        var iColspan = nTrs[1].getElementsByTagName('td').length;
                        var sLastGroup = "";
                        for (var i = 0; i < nTrs.length; i++) // muestra el total de registros 
                        {
                            var iDisplayIndex = oSettings._iDisplayStart + i;
                            var sGroup = oSettings.aoData[ oSettings.aiDisplay[iDisplayIndex] ]._aData[15]; // en esta lina paso la informacion de la columna que va a mostrarse en la segunda fila
                            if (sGroup != sLastGroup)
                            {
                                var nGroup = document.createElement('tr');
                                var nCell = document.createElement('td');
                                nCell.colSpan = iColspan;
                                nCell.className = "group";
                                nCell.innerHTML = sGroup; // paso los datos html de la columna 14
                                nGroup.appendChild(nCell);
                                nTrs[i].parentNode.insertBefore(nGroup, nTrs[i]);
                                sLastGroup = sGroup;
                            }
                        }
                    },
                    "aoColumnDefs": [
                        {"bVisible": false, "aTargets": [15]} // esta linea sirve para visualizar las columnas pueden ser varias separadas por comas
                    ],
                    "sPaginationType": "full_numbers",
                    "aaSorting": [[0, "desc"]],
                    "bJQueryUI": true
                });
                
            });



            function enviar_parametro(valor) {
                location = location.pathname + "?xFiltro=" + valor;
            }

            window.onload = function() {
                document.getElementById('CboUsuarios').onchange = function() {
                    enviar_parametro(this.value);
                }
            }


            function consultarUsuario(obj) {
                var valorSeleccionado = obj.options[obj.selectedIndex].value;
                location = location.pathname + "?xFiltro=" + valorSeleccionado;
            }


            function llamaUsuario() {
                valRadio = getRadioVal("rbUsuario");
                var i = document.getElementById("CboCoordinadorCab").selectedIndex;
                valCboCoordinador = document.getElementById("CboCoordinadorCab").options[i].text;

                window.location = location.pathname + "?xFiltro=" + valRadio + "&xCoord=" + valCboCoordinador;
            }


            function getRadioVal(radioName) {
                var rads = document.getElementsByName(radioName);

                for (var rad in rads) {
                    if (rads[rad].checked)
                        return rads[rad].value;
                }

                return null;
            }


            $(document).ready(miFuncion);

            function miFuncion()
            {
            
                $("#<?= $xIdP ?>0").toggle(200);
                $("#<?= $xIdP ?>1").toggle(200);
                $("#<?= $xIdP ?>2").toggle(200);
                $("#<?= $xIdP ?>3").toggle(200);
                $("#<?= $xIdP ?>4").toggle(200);
                $("#<?= $xIdP ?>5").toggle(200);
                $("#<?= $xIdP ?>6").toggle(200);
                $("#<?= $xIdP ?>7").toggle(200);
                
            }



            function agregar_reporte(pedido, proceso, obj, ObjId) {
                //var dato;
                var buttonId = document.getElementById(ObjId);
                    $.ajax({
                    url: '<?= $this->config->base_url() ?>proyectos/procesos/proceso/proceso_ins_userReporteProceso/' + pedido + '/' + proceso,
                    success: function(resp) {
                        if (resp == "") { //HH: pregunto si no hay ningun mensaje de error 
                            console.log(resp);  //HH: verificamos los datos que se esta enviando al servidor
                            obj.className = 'btn btn-success btn-mini';
                            buttonId.innerHTML = "<i class='icon-envelope icon-white'></i> Ya informado";
                        } else {
                            alert("error: no se realizo los cambios");
                        }
                    },
                    error: function(resp) {
                        console.log(resp);
                        alert("error: no se realizo los cambios");
                    }
                }); 
                        
        
      /*  ajax = nuevoAjax();
                ajax.open("GET", "ins_userReporteProceso.php?xpedido=" + pedido + "&xproceso=" + proceso, true);
                ajax.onreadystatechange = function() {
                    if (ajax.readyState == 1) {
                        obj.value = "Cargando";
                    }
                    if (ajax.readyState == 4) {
                        dato = ajax.responseText;
                        //alert(dato.length);
                        if (dato == "ok") {
                            obj.className = 'btn btn-success btn-mini';
                            buttonId.innerHTML = "<i class='icon-envelope icon-white'></i> Ya informado";
                        } else {
                            alert("error: no se realizo los cambios");
                        }
                    }
                }
                ajax.send(null)
                */
            }




        </script>  

        <script src="<?= $this->config->base_url() ?>js/proyecto/proceso/updProcesos.js" type="text/javascript"></script>

    </head>
    <body>
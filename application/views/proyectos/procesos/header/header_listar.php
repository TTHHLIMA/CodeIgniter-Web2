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

        <script src="<?= $this->config->base_url() ?>JQuery/datatable/js/jquery.js" type="text/javascript"></script>
       

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
        <link href="<?= $this->config->base_url() ?>assets/css/bootstrap-responsive.css" rel="stylesheet">	

        <!-- estilos de dataTable -->
        <script src="<?= $this->config->base_url() ?>JQuery/datatable/js/jquery.dataTables.js" type="text/javascript"></script>

        <style type="text/css">
            <!--  @import "<?= $this->config->base_url() ?>JQuery/datatable/css/demo_table_jui.css";
            @import "<?= $this->config->base_url() ?>JQuery/datatable/themes/smoothness/jquery-ui-1.8.4.custom.css"; -->

        </style>

        <script type="text/javascript" charset="utf-8">
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
                alert(valRadio);
                if (valCboCoordinador=="Todos" && valRadio==""){
                    window.location = "<?= $this->config->base_url() ?>proyectos/procesos/proceso/listar";
                } else {
                    window.location = "<?= $this->config->base_url() ?>proyectos/procesos/proceso/listar/" + valRadio + "/" + valCboCoordinador;
                } 
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





        <script src="<?= $this->config->base_url() ?>js/proyecto/proceso/updProcesos.js" type="text/javascript"></script>
        <!-- fin archivo ajax -->
        <script>
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
            }

        </script>





    </head>
    <body>
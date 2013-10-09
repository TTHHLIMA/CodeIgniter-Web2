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
        <link href="<?= $this->config->base_url() ?>css/estilosMarqueting.css" rel="stylesheet">
        <link href="<?= $this->config->base_url() ?>css/estilosCompania.css" rel="stylesheet">
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

        <script type="text/javascript" charset="utf-8">
            $(document).ready(function() {
                $('#datatables').dataTable({
                    "sPaginationType": "full_numbers",
                    "aaSorting": [[0, "desc"]],
                    "aLengthMenu": [[25, 50, 75, -1], [25, 50, 75, "Todos"]],
                    "iDisplayLength": -1,
                    "bJQueryUI": true
                });
            })

            function listaPorCoordinador() {
                valRadio = getRadioVal("rbUsuario");
                //window.location = location.pathname + "" + valRadio;
                window.location = "<?= $this->config->base_url() ?>proyectos/procesos/proceso/consultar/" + valRadio;
            }

            function getRadioVal(radioName) {
                var rads = document.getElementsByName(radioName);

                for (var rad in rads) {
                    if (rads[rad].checked)
                        return rads[rad].value;
                }

                return null;
            }

            function visto(xid, celda) {
                celda.className = 'btn btn-mini ';
                document.getElementById(xid).style.fontWeight = "100";
            }


            function getVista(xid, obj) {
                var dato;
                
                
                
                $.ajax({
                    url: '<?= $this->config->base_url() ?>proyectos/procesos/proceso/proceso_mantenimiento_reporte/'+xid,
                    success: function(resp) {
                        if (resp == "") { //HH: pregunto si no hay ningun mensaje de error 
                            console.log(resp);  //HH: verificamos los datos que se esta enviando al servidor
                            obj.className = 'btn btn-mini ';
                            document.getElementById(xid).style.fontWeight = "100";
                            document.getElementById(xid).style.color = "black";
                            obj.value = "Ya visto";
                            obj.getElementsByTagName("i")[0].className = "icon-hand-left";
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
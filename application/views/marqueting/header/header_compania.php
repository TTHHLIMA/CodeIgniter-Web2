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
        <link href="<?= $this->config->base_url() ?>assets/css/docs1.css" rel="stylesheet">
        <link href="<?= $this->config->base_url() ?>css/estilosMarqueting.css" rel="stylesheet">
        <link href="<?= $this->config->base_url() ?>css/estilosCompania.css" rel="stylesheet">
        <link href="<?= $this->config->base_url() ?>css/menu_superior.css" rel="stylesheet">
        <script src="<?= $this->config->base_url() ?>JQuery/jquery-1.9.1.js"></script>
        <!--<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>-->
        <!--<link href="../assets/css/hernan.css" rel="stylesheet">-->

        <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
          <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->

        <link href="<?= $this->config->base_url() ?>assets/css/bootstrap-responsive.css" rel="stylesheet">	

        <!-- Le fav and touch icons -->
        <link rel="shortcut icon" href="<?= $this->config->base_url() ?>img/favicon.ico">


        <script type="text/javascript">
            //HH: LLamos a los formularios al momento de cargar la pagina
            $(document).ready(function(){
                $("#CompaniaContactos").load("<?= $this->config->base_url() ?>marqueting/compania/buscar_compania_primero",
                function(){
                    var idcompania = $("#txtidcompania").attr("value");
                    $("#formularioContacto").load("<?= $this->config->base_url() ?>marqueting/compania/buscar_contacto_primero/"+idcompania);
                }
            );
            });
            
            //HH: Cargo el div para filtrar los datos de tipo modal
            $(document).ready(function(){
                $("#Resultados").load("<?= $this->config->base_url() ?>marqueting/compania/filtrar_compania_nombre/");
                $("#txtbuscar").keyup (function (e) {
                    id=$(this).val();
                    var href = "<?= $this->config->base_url() ?>marqueting/compania/filtrar_compania_nombre/"+id;
                    $("#Resultados").load(href);
                });
            });            
            
            
            //HH: eventos de los botones de navegacion compania

            $(document).on("click", "#btnSiguiente", function(e){
                e.preventDefault();
                var href = $("#btnSiguiente").attr("href");
                var idcompania = $("#txtidcompania").attr("value");
                $("#CompaniaContactos").load(href+"/"+idcompania,
                function(){
                    var xidcompania = $("#txtidcompania").attr("value");
                    $("#formularioContacto").load("<?= $this->config->base_url() ?>marqueting/compania/buscar_contacto_primero/"+xidcompania);
                }
            );
            }); 
            $(document).on("click", "#btnAnterior", function(e){
                e.preventDefault();
                var href = $("#btnAnterior").attr("href");
                var idcompania = $("#txtidcompania").attr("value");
                $("#CompaniaContactos").load(href+"/"+idcompania,
                function(){
                    var xidcompania = $("#txtidcompania").attr("value");
                    $("#formularioContacto").load("<?= $this->config->base_url() ?>marqueting/compania/buscar_contacto_primero/"+xidcompania);
                }
            );
            });                 
            $(document).on("click", "#btnUltimo", function(e){
                e.preventDefault();
                var href = $(this).attr("href");
                $("#CompaniaContactos").load(href,
                function(){
                    var xidcompania = $("#txtidcompania").attr("value");
                    $("#formularioContacto").load("<?= $this->config->base_url() ?>marqueting/compania/buscar_contacto_primero/"+xidcompania);
                }
            );
            });   
            $(document).on("click", "#btnPrimero", function(e){
                e.preventDefault();
                var href = $(this).attr("href");
                $("#CompaniaContactos").load(href,
                function(){
                    var xidcompania = $("#txtidcompania").attr("value");
                    $("#formularioContacto").load("<?= $this->config->base_url() ?>marqueting/compania/buscar_contacto_primero/"+xidcompania);
                }
            );
            });   

            //HH: eventos de los botones de navegacion contacto

            $(document).on("click", "#btnSiguienteC", function(e){
                e.preventDefault();
                var href = $("#btnSiguienteC").attr("href");
                var idcompania = $("#txtidcompania").attr("value");
                var idcontacto = $("#txtidContacto").attr("value");
                //alert(href+"/"+idcompania+"/"+idcontacto);
                $("#formularioContacto").load(href+"/"+idcompania+"/"+idcontacto);
            }); 

             $(document).on("click", "#btnAnteriorC", function(e){
                e.preventDefault();
                var href = $("#btnAnteriorC").attr("href");
                var idcompania = $("#txtidcompania").attr("value");
                var idcontacto = $("#txtidContacto").attr("value");
                //alert(href+"/"+idcompania);
                $("#formularioContacto").load(href+"/"+idcompania+"/"+idcontacto);
            });           
             $(document).on("click", "#btnPrimeroC", function(e){
                e.preventDefault();
                var href = $("#btnPrimeroC").attr("href");
                var idcompania = $("#txtidcompania").attr("value");
                $("#formularioContacto").load(href+"/"+idcompania);
            });  
             $(document).on("click", "#btnUltimoC", function(e){
                e.preventDefault();
                var href = $("#btnUltimoC").attr("href");
                var idcompania = $("#txtidcompania").attr("value");
                $("#formularioContacto").load(href+"/"+idcompania);
            });              
            
            // HH: cargando datos de consulta tipo modal
            $(document).on("click", "#btnBuscador", function(e){
                $('#test_modal').modal('show');
            }); 
            
            //HH: llamando a cargar la compania en el formulario de compania
            function dato(id){
                var idcompania = id;
                $("#CompaniaContactos").load("<?= $this->config->base_url() ?>marqueting/compania/buscar_compania_idcompania/"+idcompania,
                function(){
                    var xidcompania = $("#txtidcompania").attr("value");
                    $("#formularioContacto").load("<?= $this->config->base_url() ?>marqueting/compania/buscar_contacto_primero/"+xidcompania);
                }
            );
                $('#test_modal').modal('hide') //HH:cierro el modal
            }            
            //HH: se cierra el modal
            $('#test_modal').modal('hide')
        </script>       


    </head>
    <body>
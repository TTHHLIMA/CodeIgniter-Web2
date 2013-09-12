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
        <link href="<?=$this->config->base_url()?>assets/css/bootstrap.css" rel="stylesheet">
        <link href="<?=$this->config->base_url()?>assets/css/docs1.css" rel="stylesheet">
        <link href="<?=$this->config->base_url()?>css/estilosMarqueting.css" rel="stylesheet">
        <link href="<?=$this->config->base_url()?>css/estilosCompania.css" rel="stylesheet">
        <link href="<?=$this->config->base_url()?>css/menu_superior.css" rel="stylesheet">
        <script src=" http://code.jquery.com/jquery-1.9.1.js"></script>
        <!--<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>-->
        <!--<link href="../assets/css/hernan.css" rel="stylesheet">-->

        <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
          <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->

        <link href="<?=$this->config->base_url()?>assets/css/bootstrap-responsive.css" rel="stylesheet">	
        
        <!-- Le fav and touch icons -->
        <link rel="shortcut icon" href="<?=$this->config->base_url()?>img/favicon.ico">
        
      
         <script type="text/javascript">
            $(document).ready(function(){
                $("#CompaniaContactos").load("<?=$this->config->base_url()?>marqueting/compania/lista");

               
                $(document).on("click", "#btnSiguiente", function(e){
                    e.preventDefault();
                    var href = $("#btnSiguiente a").attr("href");
                    $("#CompaniaContactos").load(href);
                }); 
                $(document).on("click", "#btnAnterior a", function(e){
                    e.preventDefault();
                    var href = $(this).attr("href");
                    $("#CompaniaContactos").load(href);
                });                 
                $(document).on("click", "#btnUltimo a", function(e){
                    e.preventDefault();
                    var href = $(this).attr("href");
                    $("#CompaniaContactos").load(href);
                });   
                $(document).on("click", "#btnPrimero a", function(e){
                    e.preventDefault();
                    var href = $(this).attr("href");
                    $("#CompaniaContactos").load(href);
                });   

               $(document).on("click", "#buscador a", function(e){
                    e.preventDefault();
                    var href = $(this).attr("href");
                    $("#CompaniaContactos").load(href);
                    $('#test_modal').modal('hide')
                });            


            });
            
            
            $(document).ready(function(){
                $("#Resultados").load("<?=$this->config->base_url()?>marqueting/compania/buscar/");
                $("#txtbuscar").keyup (function (e) {
                    //alert ($(this).val());
                    id=$(this).val();
                    var href = "<?=$this->config->base_url()?>marqueting/compania/buscar/"+id;
                    $("#Resultados").load(href);
                });
            });            
            
        </script>       

<script type="text/javascript">
                $(document).on("click", "#btnBuscador", function(e){
                    $('#test_modal').modal('show');
                }); 
</script>        

<script type="text/javascript">
$('#test_modal').modal('hide')
</script>



    </head>
    <body>
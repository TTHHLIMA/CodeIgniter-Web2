<!DOCTYPE html >
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title>Techni-Translate (Intranet)</title>

        <!-- Le styles -->

        <link href="<?= $this->config->base_url() ?>assets/css/bootstrap.css" rel="stylesheet">
        <link href="<?= $this->config->base_url() ?>assets/css/bootstrap-responsive.css" rel="stylesheet">
        <link href="<?= $this->config->base_url() ?>css/menu_superior.css" rel="stylesheet">
        <link href="<?= $this->config->base_url() ?>css/estilos.css" rel="stylesheet">
        <link href="<?= $this->config->base_url() ?>css/estilosProyectos.css" rel="stylesheet">
        <script src="<?= $this->config->base_url() ?>JQuery/jquery-1.10.2.js"></script>
        

        <script type="text/javascript" charset="utf-8">
            //$(document).ready(function() {
                setInterval(function() {
                $("#DivPedidos").load("<?= $this->config->base_url() ?>proyectos/traductores/traductor/listar");
                }, 1000); // HH: se actualiza cada 1 segundo
            //});
              
        </script>


    </head>
    <body>
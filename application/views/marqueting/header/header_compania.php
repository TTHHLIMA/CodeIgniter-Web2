<!DOCTYPE html >
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title>Techni-Translate (Intranet)</title>

        <!-- Le styles -->
        <link href="<?= $this->config->base_url() ?>assets/css/bootstrap.css" rel="stylesheet">
        <link href="<?= $this->config->base_url() ?>assets/css/bootstrap-responsive.css" rel="stylesheet">	
        <link href="<?= $this->config->base_url() ?>css/estilosMarqueting.css" rel="stylesheet">
        <link href="<?= $this->config->base_url() ?>css/estilos.css" rel="stylesheet">
        <link href="<?= $this->config->base_url() ?>assets/css/datepicker.css" rel="stylesheet">
        <link href="<?= $this->config->base_url() ?>css/estilosCompania.css" rel="stylesheet">
        <link href="<?= $this->config->base_url() ?>css/menu_superior.css" rel="stylesheet">
        <script src="<?= $this->config->base_url() ?>JQuery/jquery-1.9.1.js"></script>
        <!--<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>-->
        <!--<link href="../assets/css/hernan.css" rel="stylesheet">-->

        <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
          <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->



        <!-- Le fav and touch icons -->
        <link rel="shortcut icon" href="<?= $this->config->base_url() ?>img/favicon.ico">
        <!-- Zebra_modal  -->
        <script type="text/javascript" src="<?= $this->config->base_url() ?>JQuery/Modal_Zebra/public/javascript/zebra_dialog.js"></script>
        <link rel="stylesheet" href="<?= $this->config->base_url() ?>JQuery/Modal_Zebra/public/css/default/zebra_dialog.css" type="text/css">
        <!-- fin Zebra modal -->
        <script type="text/javascript">
            //HH: LLamos a los formularios al momento de cargar la pagina
            $(document).ready(function() {
                $("#CompaniaContactos").load("<?= $this->config->base_url() ?>marqueting/compania/buscar_compania_primero",
                        function() {
                            var idcompania = $("#txtidcompania").attr("value");
                            $("#formularioContacto").load("<?= $this->config->base_url() ?>marqueting/compania/buscar_contacto_primero/" + idcompania,
                                    function() {
                                        $("#btnAgregarC").attr('disabled', 'disabled');
                                        var idcontacto = $("#txtidContacto").attr("value");
                                        $("#formularioLlamadas").load("<?= $this->config->base_url() ?>marqueting/compania/buscar_llamada_ultimo/" + idcontacto);
                                    }
                            );
                            $("#btnAgregar").attr('disabled', 'disabled'); //HH: inicializo mostrando el formulario sin el biton agregar
                        }
                );

                $('.datepicker').datepicker()
            });

            //HH: Cargo el div para filtrar los datos de tipo modal
            $(document).ready(function() {
                $("#Resultados").load("<?= $this->config->base_url() ?>marqueting/compania/filtrar_compania_nombre/");
                $("#txtbuscar").keyup(function(e) {
                    var cadena = $(this).val();
                    //cadena = cadena.replace(' ', '_');
                    for (var i = 0; i < cadena.length; i++) {
                        cadena = cadena.replace(" ", "_");
                    }
                    var href = "<?= $this->config->base_url() ?>marqueting/compania/filtrar_compania_nombre/" + cadena;
                    console.log(href);
                    $("#Resultados").load(href);
                });
            });


            //HH: eventos de los botones de navegacion compania

            $(document).on("click", "#btnSiguiente", function(e) {
                e.preventDefault();
                //var href = $("#btnSiguiente").attr("href");
                var idcompania = $("#txtidcompania").attr("value");
                $("#CompaniaContactos").load("<?= $this->config->base_url() ?>marqueting/compania/buscar_compania_siguiente/" + idcompania,
                        function() {
                            var xidcompania = $("#txtidcompania").attr("value");
                            var xcount = 0;
                            $.ajax({
                                url: "<?= $this->config->base_url() ?>marqueting/compania/count_contacto/" + xidcompania,
                                success: function(datos) {
                                    xcount = datos;
                                    if (xcount === "0") {
                                        $("#formularioContacto").load("<?= $this->config->base_url() ?>marqueting/compania/buscar_contacto_primero/" + xidcompania,
                                                function() {
                                                    $("#btnNuevoC").click();
                                                }
                                        );
                                    } else {
                                        $("#formularioContacto").load("<?= $this->config->base_url() ?>marqueting/compania/buscar_contacto_primero/" + xidcompania,
                                                function() {
                                                    //HH: formulario de llamadas
                                                    var xidcontacto = $("#txtidContacto").attr("value");
                                                    var xxcount = 0;
                                                    $.ajax({
                                                        url: "<?= $this->config->base_url() ?>marqueting/compania/count_llamadas/" + xidcontacto,
                                                        success: function(datos) {
                                                            xxcount = datos;
                                                            if (xxcount === "0") {
                                                                $("#formularioLlamadas").load("<?= $this->config->base_url() ?>marqueting/compania/buscar_llamada_ultimo/" + xidcontacto,
                                                                        function() {
                                                                            $("#btnNuevoL").click();
                                                                        }
                                                                );
                                                            } else {
                                                                $("#formularioLlamadas").load("<?= $this->config->base_url() ?>marqueting/compania/buscar_llamada_ultimo/" + xidcontacto,
                                                                        function() {
                                                                            $("#btnAgregarL").attr('disabled', 'disabled');
                                                                        }
                                                                );

                                                            }
                                                        }
                                                    });
                                                    //HH: formulario de llamadas
                                                    $("#btnAgregarC").attr('disabled', 'disabled');
                                                }
                                        );

                                    }
                                }
                            });


                            $("#btnAgregar").attr('disabled', 'disabled');

                        }
                );
            });
            $(document).on("click", "#btnAnterior", function(e) {
                e.preventDefault();
                //var href = $("#btnAnterior").attr("href");
                var idcompania = $("#txtidcompania").attr("value");
                $("#CompaniaContactos").load("marqueting/compania/buscar_compania_anterior/" + idcompania,
                        function() {
                            var xidcompania = $("#txtidcompania").attr("value");
                            var xcount = 0;
                            $.ajax({
                                url: "<?= $this->config->base_url() ?>marqueting/compania/count_contacto/" + xidcompania,
                                success: function(datos) {
                                    xcount = datos;
                                    if (xcount === "0") {
                                        $("#formularioContacto").load("<?= $this->config->base_url() ?>marqueting/compania/buscar_contacto_primero/" + xidcompania,
                                                function() {
                                                    $("#btnNuevoC").click();
                                                }
                                        );
                                    } else {
                                        $("#formularioContacto").load("<?= $this->config->base_url() ?>marqueting/compania/buscar_contacto_primero/" + xidcompania,
                                                function() {
                                                    //HH: formulario de llamadas
                                                    var xidcontacto = $("#txtidContacto").attr("value");
                                                    var xxcount = 0;
                                                    $.ajax({
                                                        url: "<?= $this->config->base_url() ?>marqueting/compania/count_llamadas/" + xidcontacto,
                                                        success: function(datos) {
                                                            xxcount = datos;
                                                            if (xxcount === "0") {
                                                                $("#formularioLlamadas").load("<?= $this->config->base_url() ?>marqueting/compania/buscar_llamada_ultimo/" + xidcontacto,
                                                                        function() {
                                                                            $("#btnNuevoL").click();
                                                                        }
                                                                );
                                                            } else {
                                                                $("#formularioLlamadas").load("<?= $this->config->base_url() ?>marqueting/compania/buscar_llamada_ultimo/" + xidcontacto,
                                                                        function() {
                                                                            $("#btnAgregarL").attr('disabled', 'disabled');
                                                                        }
                                                                );

                                                            }
                                                        }
                                                    });
                                                    //HH: formulario de llamadas
                                                    $("#btnAgregarC").attr('disabled', 'disabled');
                                                }
                                        );

                                    }
                                }
                            });

                            $("#btnAgregar").attr('disabled', 'disabled');
                        }
                );
            });
            $(document).on("click", "#btnUltimo", function(e) {
                e.preventDefault();
                var href = $(this).attr("href");
                $("#CompaniaContactos").load("<?= $this->config->base_url() ?>marqueting/compania/buscar_compania_ultimo",
                        function() {
                            var xidcompania = $("#txtidcompania").attr("value");
                            var xcount = 0;
                            $.ajax({
                                url: "<?= $this->config->base_url() ?>marqueting/compania/count_contacto/" + xidcompania,
                                success: function(datos) {
                                    xcount = datos;
                                    if (xcount === "0") {
                                        $("#formularioContacto").load("<?= $this->config->base_url() ?>marqueting/compania/buscar_contacto_primero/" + xidcompania,
                                                function() {
                                                    $("#btnNuevoC").click();
                                                }
                                        );
                                    } else {
                                        $("#formularioContacto").load("<?= $this->config->base_url() ?>marqueting/compania/buscar_contacto_primero/" + xidcompania,
                                                function() {
                                                    //HH: formulario de llamadas
                                                    var xidcontacto = $("#txtidContacto").attr("value");
                                                    var xxcount = 0;
                                                    $.ajax({
                                                        url: "<?= $this->config->base_url() ?>marqueting/compania/count_llamadas/" + xidcontacto,
                                                        success: function(datos) {
                                                            xxcount = datos;
                                                            if (xxcount === "0") {
                                                                $("#formularioLlamadas").load("<?= $this->config->base_url() ?>marqueting/compania/buscar_llamada_ultimo/" + xidcontacto,
                                                                        function() {
                                                                            $("#btnNuevoL").click();
                                                                        }
                                                                );
                                                            } else {
                                                                $("#formularioLlamadas").load("<?= $this->config->base_url() ?>marqueting/compania/buscar_llamada_ultimo/" + xidcontacto,
                                                                        function() {
                                                                            $("#btnAgregarL").attr('disabled', 'disabled');
                                                                        }
                                                                );

                                                            }
                                                        }
                                                    });
                                                    //HH: formulario de llamadas
                                                    $("#btnAgregarC").attr('disabled', 'disabled');
                                                }
                                        );

                                    }
                                }
                            });

                            $("#btnAgregar").attr('disabled', 'disabled');
                        }
                );

            });
            $(document).on("click", "#btnPrimero", function(e) {
                e.preventDefault();
                var href = $(this).attr("href");
                $("#CompaniaContactos").load("<?= $this->config->base_url() ?>marqueting/compania/buscar_compania_primero",
                        function() {
                            var xidcompania = $("#txtidcompania").attr("value");
                            var xcount = 0;
                            $.ajax({
                                url: "<?= $this->config->base_url() ?>marqueting/compania/count_contacto/" + xidcompania,
                                success: function(datos) {
                                    xcount = datos;
                                    if (xcount === "0") {
                                        $("#formularioContacto").load("<?= $this->config->base_url() ?>marqueting/compania/buscar_contacto_primero/" + xidcompania,
                                                function() {
                                                    $("#btnNuevoC").click();
                                                }
                                        );
                                    } else {
                                        $("#formularioContacto").load("<?= $this->config->base_url() ?>marqueting/compania/buscar_contacto_primero/" + xidcompania,
                                                function() {
                                                    //HH: formulario de llamadas
                                                    var xidcontacto = $("#txtidContacto").attr("value");
                                                    var xxcount = 0;
                                                    $.ajax({
                                                        url: "<?= $this->config->base_url() ?>marqueting/compania/count_llamadas/" + xidcontacto,
                                                        success: function(datos) {
                                                            xxcount = datos;
                                                            if (xxcount === "0") {
                                                                $("#formularioLlamadas").load("<?= $this->config->base_url() ?>marqueting/compania/buscar_llamada_ultimo/" + xidcontacto,
                                                                        function() {
                                                                            $("#btnNuevoL").click();
                                                                        }
                                                                );
                                                            } else {
                                                                $("#formularioLlamadas").load("<?= $this->config->base_url() ?>marqueting/compania/buscar_llamada_ultimo/" + xidcontacto,
                                                                        function() {
                                                                            $("#btnAgregarL").attr('disabled', 'disabled');
                                                                        }
                                                                );

                                                            }
                                                        }
                                                    });
                                                    //HH: formulario de llamadas
                                                    $("#btnAgregarC").attr('disabled', 'disabled');
                                                }
                                        );

                                    }
                                }
                            });
                            $("#btnAgregar").attr('disabled', 'disabled');

                        }
                );

            });

            //HH: eventos de los botones de navegacion contacto

            $(document).on("click", "#btnSiguienteC", function(e) {
                e.preventDefault();
                //var href = $("#btnSiguienteC").attr("href");
                var idcompania = $("#txtidcompania").attr("value");
                var idcontacto = $("#txtidContacto").attr("value");
                //alert(idcontacto);
                var xcount = 0;
                $.ajax({
                    url: "<?= $this->config->base_url() ?>marqueting/compania/count_contacto/" + idcompania,
                    success: function(datos) {
                        xcount = datos;
                        if (xcount === "0") {
                            $("#formularioContacto").load("<?= $this->config->base_url() ?>marqueting/compania/formulario_contacto/" + idcompania,
                                    function() {
                                        limpiaFormulario($("#frmContacto"));
                                        $("#btnActualizarC").attr('disabled', 'disabled');
                                        $("#btnEliminarC").attr('disabled', 'disabled');
                                        $('#btnAgregarC').removeAttr("disabled");
                                        $('#txtnomContacto').focus();
                                    }
                            );
                        } else {
                            $("#formularioContacto").load("<?= $this->config->base_url() ?>marqueting/compania/buscar_contacto_siguiente/" + idcompania + "/" + idcontacto,
                                    function() {
                                        //HH: formulario de llamadas
                                        var xidcontacto = $("#txtidContacto").attr("value");
                                        var xxcount = 0;
                                        $.ajax({
                                            url: "<?= $this->config->base_url() ?>marqueting/compania/count_llamadas/" + xidcontacto,
                                            success: function(datos) {
                                                xxcount = datos;
                                                if (xxcount === "0") {
                                                    $("#formularioLlamadas").load("<?= $this->config->base_url() ?>marqueting/compania/buscar_llamada_ultimo/" + xidcontacto,
                                                            function() {
                                                                $("#btnNuevoL").click();
                                                            }
                                                    );
                                                } else {
                                                    $("#formularioLlamadas").load("<?= $this->config->base_url() ?>marqueting/compania/buscar_llamada_ultimo/" + xidcontacto,
                                                            function() {
                                                                $("#btnAgregarL").attr('disabled', 'disabled');
                                                            }
                                                    );

                                                }
                                            }
                                        });
                                        //HH: formulario de llamadas
                                        $("#btnAgregarC").attr('disabled', 'disabled');
                                    }
                            );

                        }
                    }
                });

            });

            $(document).on("click", "#btnAnteriorC", function(e) {
                e.preventDefault();
                //var href = $("#btnAnteriorC").attr("href");
                var idcompania = $("#txtidcompania").attr("value");
                var idcontacto = $("#txtidContacto").attr("value");


                var xcount = 0;
                $.ajax({
                    url: "<?= $this->config->base_url() ?>marqueting/compania/count_contacto/" + idcompania,
                    success: function(datos) {
                        xcount = datos;
                        if (xcount === "0") {
                            $("#formularioContacto").load("<?= $this->config->base_url() ?>marqueting/compania/formulario_contacto/" + idcompania,
                                    function() {
                                        limpiaFormulario($("#frmContacto"));
                                        $("#btnActualizarC").attr('disabled', 'disabled');
                                        $("#btnEliminarC").attr('disabled', 'disabled');
                                        $('#btnAgregarC').removeAttr("disabled");
                                        $('#txtnomContacto').focus();
                                    }
                            );
                        } else {
                            $("#formularioContacto").load("<?= $this->config->base_url() ?>marqueting/compania/buscar_contacto_anterior/" + idcompania + "/" + idcontacto,
                                    function() {
                                        //HH: formulario de llamadas
                                        var xidcontacto = $("#txtidContacto").attr("value");
                                        var xxcount = 0;
                                        $.ajax({
                                            url: "<?= $this->config->base_url() ?>marqueting/compania/count_llamadas/" + xidcontacto,
                                            success: function(datos) {
                                                xxcount = datos;
                                                if (xxcount === "0") {
                                                    $("#formularioLlamadas").load("<?= $this->config->base_url() ?>marqueting/compania/buscar_llamada_ultimo/" + xidcontacto,
                                                            function() {
                                                                $("#btnNuevoL").click();
                                                            }
                                                    );
                                                } else {
                                                    $("#formularioLlamadas").load("<?= $this->config->base_url() ?>marqueting/compania/buscar_llamada_ultimo/" + xidcontacto,
                                                            function() {
                                                                $("#btnAgregarL").attr('disabled', 'disabled');
                                                            }
                                                    );

                                                }
                                            }
                                        });
                                        //HH: formulario de llamadas                                        
                                        $("#btnAgregarC").attr('disabled', 'disabled');
                                    }
                            );

                        }
                    }
                });


            });

            $(document).on("click", "#btnPrimeroC", function(e) {
                e.preventDefault();

                var idcompania = $("#txtidcompania").attr("value");
                var xcount = 0;
                $.ajax({
                    url: "<?= $this->config->base_url() ?>marqueting/compania/count_contacto/" + idcompania,
                    success: function(datos) {
                        xcount = datos;
                        if (xcount === "0") {
                            $("#formularioContacto").load("<?= $this->config->base_url() ?>marqueting/compania/formulario_contacto/" + idcompania,
                                    function() {
                                        limpiaFormulario($("#frmContacto"));
                                        $("#btnActualizarC").attr('disabled', 'disabled');
                                        $("#btnEliminarC").attr('disabled', 'disabled');
                                        $('#btnAgregarC').removeAttr("disabled");
                                        $('#txtnomContacto').focus();
                                    }
                            );
                        } else {
                            $("#formularioContacto").load("<?= $this->config->base_url() ?>marqueting/compania/buscar_contacto_primero/" + idcompania,
                                    function() {
                                        //HH: formulario de llamadas
                                        var xidcontacto = $("#txtidContacto").attr("value");
                                        var xxcount = 0;
                                        $.ajax({
                                            url: "<?= $this->config->base_url() ?>marqueting/compania/count_llamadas/" + xidcontacto,
                                            success: function(datos) {
                                                xxcount = datos;
                                                if (xxcount === "0") {
                                                    $("#formularioLlamadas").load("<?= $this->config->base_url() ?>marqueting/compania/buscar_llamada_ultimo/" + xidcontacto,
                                                            function() {
                                                                $("#btnNuevoL").click();
                                                            }
                                                    );
                                                } else {
                                                    $("#formularioLlamadas").load("<?= $this->config->base_url() ?>marqueting/compania/buscar_llamada_ultimo/" + xidcontacto,
                                                            function() {
                                                                $("#btnAgregarL").attr('disabled', 'disabled');
                                                            }
                                                    );

                                                }
                                            }
                                        });
                                        //HH: formulario de llamadas                                        
                                        $("#btnAgregarC").attr('disabled', 'disabled');
                                    }
                            );

                        }
                    }
                });


            });

            $(document).on("click", "#btnUltimoC", function(e) {
                e.preventDefault();
                var idcompania = $("#txtidcompania").attr("value");
                var xcount = 0;
                $.ajax({
                    url: "<?= $this->config->base_url() ?>marqueting/compania/count_contacto/" + idcompania,
                    success: function(datos) {
                        xcount = datos;
                        if (xcount === "0") {
                            $("#formularioContacto").load("<?= $this->config->base_url() ?>marqueting/compania/formulario_contacto/" + idcompania,
                                    function() {
                                        limpiaFormulario($("#frmContacto"));
                                        $("#btnActualizarC").attr('disabled', 'disabled');
                                        $("#btnEliminarC").attr('disabled', 'disabled');
                                        $('#btnAgregarC').removeAttr("disabled");
                                        $('#txtnomContacto').focus();
                                    }
                            );
                        } else {
                            $("#formularioContacto").load("<?= $this->config->base_url() ?>marqueting/compania/buscar_contacto_ultimo/" + idcompania,
                                    function() {
                                        //HH: formulario de llamadas
                                        var xidcontacto = $("#txtidContacto").attr("value");
                                        var xxcount = 0;
                                        $.ajax({
                                            url: "<?= $this->config->base_url() ?>marqueting/compania/count_llamadas/" + xidcontacto,
                                            success: function(datos) {
                                                xxcount = datos;
                                                if (xxcount === "0") {
                                                    $("#formularioLlamadas").load("<?= $this->config->base_url() ?>marqueting/compania/buscar_llamada_ultimo/" + xidcontacto,
                                                            function() {
                                                                $("#btnNuevoL").click();
                                                            }
                                                    );
                                                } else {
                                                    $("#formularioLlamadas").load("<?= $this->config->base_url() ?>marqueting/compania/buscar_llamada_ultimo/" + xidcontacto,
                                                            function() {
                                                                $("#btnAgregarL").attr('disabled', 'disabled');
                                                            }
                                                    );

                                                }
                                            }
                                        });
                                        //HH: formulario de llamadas
                                        $("#btnAgregarC").attr('disabled', 'disabled');
                                    }
                            );

                        }
                    }
                });

            });




            //HH: eventos de los botones de navegacion Llamada

            $(document).on("click", "#btnSiguienteL", function(e) {
                e.preventDefault();
                var idllamada = $("#txtidLlamada").attr("value");
                var idcontacto = $("#txtidContacto").attr("value");
                //alert("idllamada: " + idllamada + " idcontacto: " + idcontacto);
                var xcount = 0;
                $.ajax({
                    url: "<?= $this->config->base_url() ?>marqueting/compania/count_llamadas/" + idcontacto,
                    success: function(datos) {
                        xcount = datos;
                        //alert(xcount);
                        if (xcount === "0") {
                            $("#formularioLlamadas").load("<?= $this->config->base_url() ?>marqueting/compania/formulario_llamadas/" + idcontacto,
                                    function() {
                                        limpiaFormulario($("#frmLlamada"));
                                        $("#btnActualizarL").attr('disabled', 'disabled');
                                        $("#btnEliminarL").attr('disabled', 'disabled');
                                        $('#btnAgregarL').removeAttr("disabled");
                                        $('#cbousuario1').focus();
                                    }
                            );
                        } else {
                            if (idllamada ==""){
                                idllamada=0;
                            }
                            $("#formularioLlamadas").load("<?= $this->config->base_url() ?>marqueting/compania/buscar_llamada_siguiente/" + idllamada + "/" + idcontacto,
                                    function() {
                                        $("#btnAgregarL").attr('disabled', 'disabled');
                                    }
                            );

                        }
                    }
                });

            });

            $(document).on("click", "#btnAnteriorL", function(e) {
                e.preventDefault();
                var idllamada = $("#txtidLlamada").attr("value");
                var idcontacto = $("#txtidContacto").attr("value");


                var xcount = 0;
                $.ajax({
                    url: "<?= $this->config->base_url() ?>marqueting/compania/count_llamadas/" + idcontacto,
                    success: function(datos) {
                        xcount = datos;
                        if (xcount === "0") {
                            $("#formularioLlamadas").load("<?= $this->config->base_url() ?>marqueting/compania/formulario_llamadas/" + idcontacto,
                                    function() {
                                        limpiaFormulario($("#frmLlamada"));
                                        $("#btnActualizarL").attr('disabled', 'disabled');
                                        $("#btnEliminarL").attr('disabled', 'disabled');
                                        $('#btnAgregarL').removeAttr("disabled");
                                        $('#cbousuario1').focus();
                                    }
                            );
                        } else {
                            if (idllamada ==""){
                                idllamada=0;
                            }
                            $("#formularioLlamadas").load("<?= $this->config->base_url() ?>marqueting/compania/buscar_llamada_anterior/" + idllamada + "/" + idcontacto,
                                    function() {
                                        $("#btnAgregarL").attr('disabled', 'disabled');
                                    }
                            );

                        }
                    }
                });


            });

            $(document).on("click", "#btnPrimeroL", function(e) {
                e.preventDefault();

                var idcontacto = $("#txtidContacto").attr("value");
                var xcount = 0;
                $.ajax({
                    url: "<?= $this->config->base_url() ?>marqueting/compania/count_llamadas/" + idcontacto,
                    success: function(datos) {
                        xcount = datos;
                        if (xcount === "0") {
                            $("#formularioLlamadas").load("<?= $this->config->base_url() ?>marqueting/compania/formulario_llamadas/" + idcontacto,
                                    function() {
                                        limpiaFormulario($("#frmLlamada"));
                                        $("#btnActualizarL").attr('disabled', 'disabled');
                                        $("#btnEliminarL").attr('disabled', 'disabled');
                                        $('#btnAgregarL').removeAttr("disabled");
                                        $('#cbousuario1').focus();
                                    }
                            );
                        } else {
                            $("#formularioLlamadas").load("<?= $this->config->base_url() ?>marqueting/compania/buscar_llamada_primero/" + idcontacto,
                                    function() {
                                        $("#btnAgregarL").attr('disabled', 'disabled');
                                    }
                            );

                        }
                    }
                });


            });

            $(document).on("click", "#btnUltimoL", function(e) {
                e.preventDefault();
                var idcontacto = $("#txtidContacto").attr("value");
                var xcount = 0;
                $.ajax({
                    url: "<?= $this->config->base_url() ?>marqueting/compania/count_llamadas/" + idcontacto,
                    success: function(datos) {
                        xcount = datos;
                        if (xcount === "0") {
                            $("#formularioLlamadas").load("<?= $this->config->base_url() ?>marqueting/compania/formulario_llamadas/" + idcontacto,
                                    function() {
                                        limpiaFormulario($("#frmLlamada"));
                                        $("#btnActualizarL").attr('disabled', 'disabled');
                                        $("#btnEliminarL").attr('disabled', 'disabled');
                                        $('#btnAgregarL').removeAttr("disabled");
                                        $('#cbousuario1').focus();
                                    }
                            );
                        } else {
                            $("#formularioLlamadas").load("<?= $this->config->base_url() ?>marqueting/compania/buscar_llamada_ultimo/" + idcontacto,
                                    function() {
                                        $("#btnAgregarL").attr('disabled', 'disabled');
                                    }
                            );

                        }
                    }
                });

            });






            //HH: botones de compania    
            $(document).on("click", "#btnNuevo", function(e) {
                e.preventDefault();
                $("#CompaniaContactos").load("<?= $this->config->base_url() ?>marqueting/compania/buscar_compania_primero", function() {
                    limpiaFormulario($("#frmCompania"));
                    limpiarCompania();
                    $("#btnActualizar").attr('disabled', 'disabled');
                    $("#btnEliminar").attr('disabled', 'disabled');
                    $('#btnAgregar').removeAttr("disabled");
                    $('#txtnombre').focus();
                });
            });



            $(document).on("click", "#btnAgregar", function(e) {
                e.preventDefault();
                if ($('#btnAgregar').attr('disabled')) {
                    return false;
                }
                $.Zebra_Dialog('¿Desea Agregar el Registro?', {
                    'type': 'question',
                    'title': 'Confirmación',
                    'buttons': ['Si', 'No', 'Cancelar'],
                    'onClose': function(caption) {
                        if (caption == "Si") {
                            $.ajax({
                                url: '<?= base_url() ?>marqueting/compania/proceso_mantenimiento/1',
                                type: 'POST',
                                data: $("#frmCompania").serializeArray(),
                                success: function(resp) {
                                    if (resp == "") { //HH: pregunto si no hay ningun mensaje de error 
                                        console.log(resp);  //HH: verificamos los datos que se esta enviando al servidor
                                        $.Zebra_Dialog('Se Agrego el Registro.', {
                                            'type': 'confirmation',
                                            'title': 'Confirmación'
                                        });
                                        $("#btnUltimo").click();
                                    } else {
                                        console.log(resp);
                                        $.Zebra_Dialog('<b>Error al Agregar el Registro. </b><br>' + resp, {
                                            'type': 'error',
                                            'title': 'Error'
                                        });
                                    }
                                },
                                error: function(resp) {
                                    //console.log(resp);
                                    $.Zebra_Dialog('<b>Error al Agregar el Registro.</b>' + resp, {
                                        'type': 'error',
                                        'title': 'Error'
                                    });
                                }
                            });
                        }

                    }


                });

                event.preventDefault();
                return false;  //stop the actual form post !important!
            });









            $(document).on("click", "#btnActualizar", function(e) {
                e.preventDefault();
                if ($('#btnActualizar').attr('disabled')) {
                    return false;
                }
                $.Zebra_Dialog('¿Desea Actualizar el Registro?', {
                    'type': 'question',
                    'title': 'Confirmación',
                    'buttons': ['Si', 'No', 'Cancelar'],
                    'onClose': function(caption) {
                        if (caption == "Si") {
                            $.ajax({
                                url: '<?= base_url() ?>marqueting/compania/proceso_mantenimiento/2',
                                type: 'POST',
                                data: $("#frmCompania").serializeArray(),
                                success: function(resp) {
                                    if (resp == "") { //HH: pregunto si no hay ningun mensaje de error 
                                        console.log(resp);  //HH: verificamos los datos que se esta enviando al servidor
                                        $.Zebra_Dialog('Se Actualizo el Registro.', {
                                            'type': 'confirmation',
                                            'title': 'Confirmación'
                                        });
                                    } else {
                                        console.log(resp);
                                        $.Zebra_Dialog('Error al actualizar el Registro.', {
                                            'type': 'error',
                                            'title': 'Error'
                                        });
                                    }
                                },
                                error: function(resp) {
                                    console.log(resp);
                                    $.Zebra_Dialog('Error al actualizar el Registro.', {
                                        'type': 'error',
                                        'title': 'Error'
                                    });
                                }
                            });
                        }

                    }


                });

                event.preventDefault();
                return false;  //stop the actual form post !important!
            });









            $(document).on("click", "#btnEliminar", function(e) {
                e.preventDefault();
                if ($('#btnEliminar').attr('disabled')) {
                    return false;
                }
                $.Zebra_Dialog('¿Desea Eliminar el Registro?', {
                    'type': 'question',
                    'title': 'Confirmación',
                    'buttons': ['Si', 'No', 'Cancelar'],
                    'onClose': function(caption) {
                        if (caption == "Si") {
                            $.ajax({
                                url: '<?= base_url() ?>marqueting/compania/proceso_mantenimiento/3',
                                type: 'POST',
                                data: $("#frmCompania").serializeArray(),
                                success: function(resp) {
                                    if (resp == "") { //HH: pregunto si no hay ningun mensaje de error 
                                        console.log(resp);  //HH: verificamos los datos que se esta enviando al servidor
                                        $.Zebra_Dialog('Se Elimino el Registro.', {
                                            'type': 'confirmation',
                                            'title': 'Confirmación'
                                        });
                                        limpiaFormulario($("#frmCompania"));
                                        limpiarCompania();
                                        $("#btnNuevo").click();
                                    } else {
                                        console.log(resp);
                                        $.Zebra_Dialog('<b>Error al Eliminar el Registro</b> <br>' + resp, {
                                            'type': 'error',
                                            'title': 'Error'
                                        });
                                    }
                                },
                                error: function(resp) {
                                    console.log(resp);
                                    $.Zebra_Dialog('Error al Eliminar el Registro.', {
                                        'type': 'error',
                                        'title': 'Error'
                                    });
                                }
                            });
                        }
                    }


                });

                event.preventDefault();
                return false;  //stop the actual form post !important!
            });




            //HH: contacto 
            $(document).on("click", "#btnNuevoC", function(e) {
                e.preventDefault();
                var idcompania = $("#txtidcompania").attr("value");
                $("#formularioContacto").load("<?= $this->config->base_url() ?>marqueting/compania/formulario_contacto/" + idcompania,
                        function() {
                            limpiaFormulario($("#frmContacto"));
                            $("#btnActualizarC").attr('disabled', 'disabled');
                            $("#btnEliminarC").attr('disabled', 'disabled');
                            $('#btnAgregarC').removeAttr("disabled");
                            $('#txtnomContacto').focus();
                        }
                );


            });


            $(document).on("click", "#btnAgregarC", function(e) {
                e.preventDefault();
                if ($('#btnAgregarC').attr('disabled')) {
                    return false;
                }
                $.Zebra_Dialog('¿Desea Agregar el Registro?', {
                    'type': 'question',
                    'title': 'Confirmación',
                    'buttons': ['Si', 'No', 'Cancelar'],
                    'onClose': function(caption) {
                        if (caption == "Si") {
                            var idcompania = $("#txtidcompania").attr("value");
                            $.ajax({
                                url: '<?= base_url() ?>marqueting/compania/proceso_mantenimiento_contacto/1/' + idcompania,
                                type: 'POST',
                                data: $("#frmContacto").serializeArray(),
                                success: function(resp) {
                                    if (resp == "") { //HH: pregunto si no hay ningun mensaje de error 
                                        //console.log(resp);  //HH: verificamos los datos que se esta enviando al servidor
                                        $.Zebra_Dialog('Se Agrego el Registro.', {
                                            'type': 'confirmation',
                                            'title': 'Confirmación'
                                        });
                                        $("#btnUltimoC").click();
                                        //HH: formulario de llamadas
                                        var xidcontacto = $("#txtidContacto").attr("value");
                                        var xxcount = 0;
                                        $.ajax({
                                            url: "<?= $this->config->base_url() ?>marqueting/compania/count_llamadas/" + xidcontacto,
                                            success: function(datos) {
                                                xxcount = datos;
                                                if (xxcount === "0") {
                                                    $("#formularioLlamadas").load("<?= $this->config->base_url() ?>marqueting/compania/buscar_llamada_ultimo/" + xidcontacto,
                                                            function() {
                                                                $("#btnNuevoL").click();
                                                            }
                                                    );
                                                } else {
                                                    $("#formularioLlamadas").load("<?= $this->config->base_url() ?>marqueting/compania/buscar_llamada_ultimo/" + xidcontacto,
                                                            function() {
                                                                $("#btnAgregarL").attr('disabled', 'disabled');
                                                            }
                                                    );

                                                }
                                            }
                                        });
                                        //HH: formulario de llamadas                                       
                                    } else {
                                        console.log(resp);
                                        $.Zebra_Dialog('Error al Agregar el Registro.', {
                                            'type': 'error',
                                            'title': 'Error'
                                        });
                                    }
                                },
                                error: function(resp) {
                                    console.log(resp);
                                    $.Zebra_Dialog('Error al Agregar el Registro.', {
                                        'type': 'error',
                                        'title': 'Error'
                                    });
                                }
                            });
                        }

                    }


                });

                event.preventDefault();
                return false;  //stop the actual form post !important!
            });









            $(document).on("click", "#btnActualizarC", function(e) {
                e.preventDefault();
                if ($('#btnActualizarC').attr('disabled')) {
                    return false;
                }
                var idcompania = $("#txtidcompania").attr("value");
                var idcontacto = $("#txtidContacto").attr("value");

                $.Zebra_Dialog('¿Desea Actualizar el Registro?', {
                    'type': 'question',
                    'title': 'Confirmación',
                    'buttons': ['Si', 'No', 'Cancelar'],
                    'onClose': function(caption) {
                        if (caption == "Si") {
                            $.ajax({
                                url: '<?= base_url() ?>marqueting/compania/proceso_mantenimiento_contacto/2',
                                type: 'POST',
                                data: $("#frmContacto").serializeArray(),
                                success: function(resp) {
                                    if (resp == "") { //HH: pregunto si no hay ningun mensaje de error 
                                        console.log(resp);  //HH: verificamos los datos que se esta enviando al servidor
                                        $.Zebra_Dialog('Se Actualizo el Registro.', {
                                            'type': 'confirmation',
                                            'title': 'Confirmación'
                                        });
                                        $("#formularioContacto").load("<?= $this->config->base_url() ?>marqueting/compania/buscar_contacto_idcontacto/" + idcontacto + "/" + idcompania,
                                                function() {
                                                    //HH: formulario de llamadas
                                                    var xidcontacto = $("#txtidContacto").attr("value");
                                                    var xxcount = 0;
                                                    $.ajax({
                                                        url: "<?= $this->config->base_url() ?>marqueting/compania/count_llamadas/" + xidcontacto,
                                                        success: function(datos) {
                                                            xxcount = datos;
                                                            if (xxcount === "0") {
                                                                $("#formularioLlamadas").load("<?= $this->config->base_url() ?>marqueting/compania/buscar_llamada_ultimo/" + xidcontacto,
                                                                        function() {
                                                                            $("#btnNuevoL").click();
                                                                        }
                                                                );
                                                            } else {
                                                                $("#formularioLlamadas").load("<?= $this->config->base_url() ?>marqueting/compania/buscar_llamada_ultimo/" + xidcontacto,
                                                                        function() {
                                                                            $("#btnAgregarL").attr('disabled', 'disabled');
                                                                        }
                                                                );

                                                            }
                                                        }
                                                    });
                                                    //HH: formulario de llamadas                                                    
                                                    $("#btnAgregarC").attr('disabled', 'disabled');
                                                }
                                        );

                                    } else {
                                        console.log(resp);
                                        $.Zebra_Dialog('Error al actualizar el Registro.', {
                                            'type': 'error',
                                            'title': 'Error'
                                        });
                                    }
                                },
                                error: function(resp) {
                                    console.log(resp);
                                    $.Zebra_Dialog('Error al actualizar el Registro.', {
                                        'type': 'error',
                                        'title': 'Error'
                                    });
                                }
                            });
                        }

                    }


                });

                event.preventDefault();
                return false;  //stop the actual form post !important!
            });









            $(document).on("click", "#btnEliminarC", function(e) {
                e.preventDefault();
                if ($('#btnEliminarC').attr('disabled')) {
                    return false;
                }
                $.Zebra_Dialog('¿Desea Eliminar el Registro?', {
                    'type': 'question',
                    'title': 'Confirmación',
                    'buttons': ['Si', 'No', 'Cancelar'],
                    'onClose': function(caption) {
                        if (caption == "Si") {
                            $.ajax({
                                url: '<?= base_url() ?>marqueting/compania/proceso_mantenimiento_contacto/3',
                                type: 'POST',
                                data: $("#frmContacto").serializeArray(),
                                success: function(resp) {
                                    if (resp == "") { //HH: pregunto si no hay ningun mensaje de error 
                                        console.log(resp);  //HH: verificamos los datos que se esta enviando al servidor
                                        $.Zebra_Dialog('Se Elimino el Registro.', {
                                            'type': 'confirmation',
                                            'title': 'Confirmación'
                                        });
                                        limpiaFormulario($("#frmContacto"));
                                        $("#btnNuevoC").click();
                                        //$("#panelContacto").removeAttr("style");
                                    } else {
                                        console.log(resp);
                                        $.Zebra_Dialog('<b>Error al Eliminar el Registro</b> <br>' + resp, {
                                            'type': 'error',
                                            'title': 'Error'
                                        });
                                    }
                                },
                                error: function(resp) {
                                    console.log(resp);
                                    $.Zebra_Dialog('Error al Eliminar el Registro.', {
                                        'type': 'error',
                                        'title': 'Error'
                                    });
                                }
                            });
                        }
                    }


                });

                event.preventDefault();
                return false;  //stop the actual form post !important!
            });






            //HH: llamadas 
            $(document).on("click", "#btnNuevoL", function(e) {
                e.preventDefault();
                var xidcontacto = $("#txtidContacto").attr("value");
                $("#formularioLlamadas").load("<?= $this->config->base_url() ?>marqueting/compania/formulario_llamadas/" + xidcontacto,
                        function() {
                            limpiaFormulario($("#frmLlamada"));
                            $("#btnActualizarL").attr('disabled', 'disabled');
                            $("#btnEliminarL").attr('disabled', 'disabled');
                            $('#btnAgregarL').removeAttr("disabled");
                            $('#cbousuario1').focus();
                        }
                );


            });


            $(document).on("click", "#btnAgregarL", function(e) {
                e.preventDefault();
                if ($('#btnAgregarL').attr('disabled')) {
                    return false;
                }
                $.Zebra_Dialog('¿Desea Agregar el Registro?', {
                    'type': 'question',
                    'title': 'Confirmación',
                    'buttons': ['Si', 'No', 'Cancelar'],
                    'onClose': function(caption) {
                        if (caption == "Si") {
                            var xidcontacto = $("#txtidContacto").attr("value");
                            //alert(xidcontacto);
                            $.ajax({
                                url: '<?= base_url() ?>marqueting/compania/proceso_mantenimiento_llamada/1/' + xidcontacto,
                                type: 'POST',
                                data: $("#frmLlamada").serializeArray(),
                                success: function(resp) {
                                    if (resp == "") { //HH: pregunto si no hay ningun mensaje de error 
                                        //console.log(resp);  //HH: verificamos los datos que se esta enviando al servidor
                                        $.Zebra_Dialog('Se Agrego el Registro.', {
                                            'type': 'confirmation',
                                            'title': 'Confirmación'
                                        });
                                        $("#btnUltimoL").click();
                                    } else {
                                        console.log(resp);
                                        $.Zebra_Dialog('Error al Agregar el Registro.', {
                                            'type': 'error',
                                            'title': 'Error'
                                        });
                                    }
                                },
                                error: function(resp) {
                                    console.log(resp);
                                    $.Zebra_Dialog('Error al Agregar el Registro.', {
                                        'type': 'error',
                                        'title': 'Error'
                                    });
                                }
                            });
                        }

                    }


                });

                event.preventDefault();
                return false;  //stop the actual form post !important!
            });









            $(document).on("click", "#btnActualizarL", function(e) {
                e.preventDefault();
                if ($('#btnActualizarL').attr('disabled')) {
                    return false;
                }
                var idllamada = $("#txtidLlamada").attr("value");
                var idcontacto = $("#txtidContacto").attr("value");

                $.Zebra_Dialog('¿Desea Actualizar el Registro?', {
                    'type': 'question',
                    'title': 'Confirmación',
                    'buttons': ['Si', 'No', 'Cancelar'],
                    'onClose': function(caption) {
                        if (caption == "Si") {
                            $.ajax({
                                url: '<?= base_url() ?>marqueting/compania/proceso_mantenimiento_llamada/2',
                                type: 'POST',
                                data: $("#frmLlamada").serializeArray(),
                                success: function(resp) {
                                    if (resp == "") { //HH: pregunto si no hay ningun mensaje de error 
                                        console.log(resp);  //HH: verificamos los datos que se esta enviando al servidor
                                        $.Zebra_Dialog('Se Actualizo el Registro.', {
                                            'type': 'confirmation',
                                            'title': 'Confirmación'
                                        });
                                        $("#formularioLlamadas").load("<?= $this->config->base_url() ?>marqueting/compania/buscar_llamadas_idllamada/" + idcontacto + "/" + idllamada,
                                                function() {
                                                    $("#btnAgregarL").attr('disabled', 'disabled');
                                                }
                                        );

                                    } else {
                                        console.log(resp);
                                        $.Zebra_Dialog('Error al actualizar el Registro.', {
                                            'type': 'error',
                                            'title': 'Error'
                                        });
                                    }
                                },
                                error: function(resp) {
                                    console.log(resp);
                                    $.Zebra_Dialog('Error al actualizar el Registro.', {
                                        'type': 'error',
                                        'title': 'Error'
                                    });
                                }
                            });
                        }

                    }


                });

                event.preventDefault();
                return false;  //stop the actual form post !important!
            });









            $(document).on("click", "#btnEliminarL", function(e) {
                e.preventDefault();
                if ($('#btnEliminarL').attr('disabled')) {
                    return false;
                }
                $.Zebra_Dialog('¿Desea Eliminar el Registro?', {
                    'type': 'question',
                    'title': 'Confirmación',
                    'buttons': ['Si', 'No', 'Cancelar'],
                    'onClose': function(caption) {
                        if (caption == "Si") {
                            $.ajax({
                                url: '<?= base_url() ?>marqueting/compania/proceso_mantenimiento_llamada/3',
                                type: 'POST',
                                data: $("#frmLlamada").serializeArray(),
                                success: function(resp) {
                                    if (resp == "") { //HH: pregunto si no hay ningun mensaje de error 
                                        console.log(resp);  //HH: verificamos los datos que se esta enviando al servidor
                                        $.Zebra_Dialog('Se Elimino el Registro.', {
                                            'type': 'confirmation',
                                            'title': 'Confirmación'
                                        });
                                        limpiaFormulario($("#frmLlamada"));
                                        $("#btnNuevoL").click();
                                        //$("#panelContacto").removeAttr("style");
                                    } else {
                                        console.log(resp);
                                        $.Zebra_Dialog('<b>Error al Eliminar el Registro</b> <br>' + resp, {
                                            'type': 'error',
                                            'title': 'Error'
                                        });
                                    }
                                },
                                error: function(resp) {
                                    console.log(resp);
                                    $.Zebra_Dialog('Error al Eliminar el Registro.', {
                                        'type': 'error',
                                        'title': 'Error'
                                    });
                                }
                            });
                        }
                    }


                });

                event.preventDefault();
                return false;  //stop the actual form post !important!
            });











            // HH: cargando datos de consulta tipo modal
            $(document).on("click", "#btnBuscador", function(e) {
                $('#test_modal').modal('show');
            });

            //HH: llamando a cargar la compania en el formulario de compania
            function dato(id) {
                var idcompania = id;
                $("#CompaniaContactos").load("<?= $this->config->base_url() ?>marqueting/compania/buscar_compania_idcompania/" + idcompania,
                        function() {
                            var xidcompania = $("#txtidcompania").attr("value");
                            $("#formularioContacto").load("<?= $this->config->base_url() ?>marqueting/compania/buscar_contacto_primero/" + xidcompania);
                            $("#btnAgregar").attr('disabled', 'disabled');
                        }
                );
                $('#test_modal').modal('hide') //HH:cierro el modal
            }

            //HH: Funcion para limpiar los formularios
            function limpiaFormulario(miFormulario) {
                // recorremos todos los campos que tiene el formulario
                $(':input', miFormulario).each(function() {
                    var type = this.type;
                    var tag = this.tagName.toLowerCase();
                    //limpiamos los valores de los campos…
                    if (type == 'text' || type == 'password' || tag == 'textarea')
                        this.value = "";
                    // excepto de los checkboxes y radios, le quitamos el checked
                    // pero su valor no debe ser cambiado
                    else if (type == 'checkbox' || type == 'radio')
                        this.checked = false;
                    // los selects le ponesmos el indice a -
                    else if (tag == 'select')
                        this.selectedIndex = -1;
                });
            }

            function limpiarCompania() {
                $("#cboferias option").each(function() {
                    $(this).remove(); //or whatever else
                });
                $("#cbocategorias option").each(function() {
                    $(this).remove(); //or whatever else
                });
                $("#cboparthner option").each(function() {
                    $(this).remove(); //or whatever else
                });
            }

        </script>       


    </head>
    <body>
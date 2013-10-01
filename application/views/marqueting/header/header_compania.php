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
        <link href="<?= $this->config->base_url() ?>css/estilos.css" rel="stylesheet">
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
                            $("#formularioContacto").load("<?= $this->config->base_url() ?>marqueting/compania/buscar_contacto_primero/" + idcompania);
                            $("#btnAgregar").attr('disabled', 'disabled'); //HH: inicializo mostrando el formulario sin el biton agregar
                        }
                );
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
                            $("#formularioContacto").load("<?= $this->config->base_url() ?>marqueting/compania/buscar_contacto_primero/" + xidcompania);
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
                            $("#formularioContacto").load("<?= $this->config->base_url() ?>marqueting/compania/buscar_contacto_primero/" + xidcompania);
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
                            $("#formularioContacto").load("<?= $this->config->base_url() ?>marqueting/compania/buscar_contacto_primero/" + xidcompania);
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
                            $("#formularioContacto").load("<?= $this->config->base_url() ?>marqueting/compania/buscar_contacto_primero/" + xidcompania);
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
                //alert(href+"/"+idcompania+"/"+idcontacto);
                $("#formularioContacto").load("<?= $this->config->base_url() ?>marqueting/compania/buscar_contacto_siguiente/" + idcompania + "/" + idcontacto);
            });

            $(document).on("click", "#btnAnteriorC", function(e) {
                e.preventDefault();
                //var href = $("#btnAnteriorC").attr("href");
                var idcompania = $("#txtidcompania").attr("value");
                var idcontacto = $("#txtidContacto").attr("value");
                //alert(href+"/"+idcompania);
                $("#formularioContacto").load("<?= $this->config->base_url() ?>marqueting/compania/buscar_contacto_anterior/" + idcompania + "/" + idcontacto);
            });
            $(document).on("click", "#btnPrimeroC", function(e) {
                e.preventDefault();
                //var href = $("#btnPrimeroC").attr("href");
                var idcompania = $("#txtidcompania").attr("value");
                $("#formularioContacto").load("<?= $this->config->base_url() ?>marqueting/compania/buscar_contacto_primero/" + idcompania);
            });
            $(document).on("click", "#btnUltimoC", function(e) {
                e.preventDefault();
                //var href = $("#btnUltimoC").attr("href");
                var idcompania = $("#txtidcompania").attr("value");
                $("#formularioContacto").load("<?= $this->config->base_url() ?>marqueting/compania/buscar_contacto_ultimo/" + idcompania);
            });

            $(document).on("click", "#btnNuevo", function(e) {
                e.preventDefault();
                $("#CompaniaContactos").load("<?= $this->config->base_url() ?>marqueting/compania/buscar_compania_primero", function() {
                    limpiaFormulario($("#frmCompania"));
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
                limpiaFormulario($("#frmContacto"));
                $("#btnActualizarC").attr('disabled', 'disabled');
                $("#btnEliminarC").attr('disabled', 'disabled');
                $('#btnAgregarC').removeAttr("disabled");
                $('#txtnomContacto').focus();
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

        </script>       


    </head>
    <body>
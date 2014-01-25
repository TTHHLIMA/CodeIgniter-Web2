<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title>Techni-Translate (Intranet)</title>

        <!-- Le styles -->
        <link href="<?= $this->config->base_url() ?>assets/css/bootstrap.css" rel="stylesheet">
        <link href="<?= $this->config->base_url() ?>assets/css/bootstrap-responsive.css" rel="stylesheet">	
        <link href="<?= $this->config->base_url() ?>css/estilos.css" rel="stylesheet">
        <link href="<?= $this->config->base_url() ?>css/menu_superior.css" rel="stylesheet">
        <script src="<?= $this->config->base_url() ?>JQuery/jquery-1.10.2.js"></script>

        <!-- HH: JQ UI -->
        <script src="<?= $this->config->base_url() ?>JQuery/jquery-ui-1.10.3.custom/js/jquery-ui-1.10.3.custom.js"></script>
        <link href="<?= $this->config->base_url() ?>JQuery/jquery-ui-1.10.3.custom/css/ui-lightness/jquery-ui-1.10.3.custom.css" rel="stylesheet">
        <script src="<?= $this->config->base_url() ?>JQuery/jquery-ui-1.10.3.custom/js/jquery-ui-1.10.3.custom.js"></script>
        <script src="<?= $this->config->base_url() ?>JQuery/jquery-ui-timepicker-0.3.3/jquery.ui.timepicker.js"></script>
        <link rel="stylesheet" href="<?= $this->config->base_url() ?>JQuery/jquery-ui-timepicker-0.3.3/jquery.ui.timepicker.css" type="text/css">        
        <!-- HH: JQ UI -->

        <!-- Le fav and touch icons -->
        <link rel="shortcut icon" href="<?= $this->config->base_url() ?>img/favicon.ico">

        <!-- Zebra_modal  -->
        <script type="text/javascript" src="<?= $this->config->base_url() ?>JQuery/Modal_Zebra/public/javascript/zebra_dialog.js"></script>
        <link rel="stylesheet" href="<?= $this->config->base_url() ?>JQuery/Modal_Zebra/public/css/default/zebra_dialog.css" type="text/css">        

        <script type="text/javascript">
            $(function() {
                $("#txtllamFecha").datepicker();

            });

            function calendarios_llamada() {
                $("#txtllamFecha").datepicker({dateFormat: "dd-mm-yy"});
                $('#txtllamHoraInicio').timepicker({
                    minutes: {
                        interval: 15,
                        manual: [0, 1, 30, 59]
                    },
                });
                $('#txtllamHoraFinal').timepicker({
                    minutes: {
                        interval: 15,
                        manual: [0, 1, 30, 59]
                    },
                });
            }


            function activa_tabs() {
                $("#tabs").tabs({active: 0});
            }
            ;


            //HH: LLamos a los formularios al momento de cargar la pagina
            $(document).ready(function() {


                $("#panelPersona").load("<?= $this->config->base_url() ?>marqueting/telefonmarketing/operador/buscar_operador_primero",
                        function() {

                            activa_tabs();
                            var xcodigo = $("#txtcodigo").attr("value");
                            var xcount = 0;
                            $.ajax({
                                url: "<?= $this->config->base_url() ?>marqueting/telefonmarketing/operador/count_llamadas/" + xcodigo,
                                success: function(datos) {
                                    xcount = datos;
                                    if (xcount === "0") {
                                        $("#panelllamadas").load("<?= $this->config->base_url() ?>marqueting/telefonmarketing/operador/formulario_llamada/",
                                                function() {
                                                    calendarios_llamada()
                                                    $("#btnllamNuevo").click();
                                                }
                                        );
                                    } else {
                                        $("#panelllamadas").load("<?= $this->config->base_url() ?>marqueting/telefonmarketing/operador/buscar_llamada_primero/" + xcodigo,
                                                function() {
                                                    calendarios_llamada()
                                                    $("#btnllamAgregar").attr('disabled', 'disabled');
                                                }
                                        );

                                    }
                                }
                            })



                        }
                )

                //calcularHora();



            });



            $(document).on("click", "#btnSiguiente", function(e) {
                e.preventDefault();
                var codigo = $("#txtcodigo").attr("value");
                $("#panelPersona").load("<?= $this->config->base_url() ?>marqueting/telefonmarketing/operador/buscar_operador_siguiente/" + codigo,
                        function() {

                            activa_tabs();
                            var xcodigo = $("#txtcodigo").attr("value");
                            var xcount = 0;
                            $.ajax({
                                url: "<?= $this->config->base_url() ?>marqueting/telefonmarketing/operador/count_llamadas/" + xcodigo,
                                success: function(datos) {
                                    xcount = datos;
                                    if (xcount === "0") {
                                        $("#panelllamadas").load("<?= $this->config->base_url() ?>marqueting/telefonmarketing/operador/formulario_llamada/",
                                                function() {
                                                    calendarios_llamada()
                                                    $("#btnllamNuevo").click();
                                                }
                                        );
                                    } else {
                                        $("#panelllamadas").load("<?= $this->config->base_url() ?>marqueting/telefonmarketing/operador/buscar_llamada_primero/" + xcodigo,
                                                function() {
                                                    calendarios_llamada()
                                                    $("#btnllamAgregar").attr('disabled', 'disabled');
                                                }
                                        );

                                    }
                                }
                            });
                        }

                );
            });




            $(document).on("click", "#btnAnterior", function(e) {
                e.preventDefault();
                var codigo = $("#txtcodigo").attr("value");
                $("#panelPersona").load("<?= $this->config->base_url() ?>marqueting/telefonmarketing/operador/buscar_operador_anterior/" + codigo,
                        function() {

                            activa_tabs();
                            var xcodigo = $("#txtcodigo").attr("value");
                            var xcount = 0;
                            $.ajax({
                                url: "<?= $this->config->base_url() ?>marqueting/telefonmarketing/operador/count_llamadas/" + xcodigo,
                                success: function(datos) {
                                    xcount = datos;
                                    if (xcount === "0") {
                                        $("#panelllamadas").load("<?= $this->config->base_url() ?>marqueting/telefonmarketing/operador/formulario_llamada/",
                                                function() {
                                                    calendarios_llamada()
                                                    $("#btnllamNuevo").click();
                                                }
                                        );
                                    } else {
                                        $("#panelllamadas").load("<?= $this->config->base_url() ?>marqueting/telefonmarketing/operador/buscar_llamada_primero/" + xcodigo,
                                                function() {
                                                    calendarios_llamada()
                                                    $("#btnllamAgregar").attr('disabled', 'disabled');
                                                }
                                        );

                                    }
                                }
                            });
                        }

                );
            });





            $(document).on("click", "#btnPrimero", function(e) {
                e.preventDefault();
                $("#panelPersona").load("<?= $this->config->base_url() ?>marqueting/telefonmarketing/operador/buscar_operador_primero",
                        function() {
                            activa_tabs();
                            var xcodigo = $("#txtcodigo").attr("value");
                            var xcount = 0;
                            $.ajax({
                                url: "<?= $this->config->base_url() ?>marqueting/telefonmarketing/operador/count_llamadas/" + xcodigo,
                                success: function(datos) {
                                    xcount = datos;
                                    if (xcount === "0") {
                                        $("#panelllamadas").load("<?= $this->config->base_url() ?>marqueting/telefonmarketing/operador/formulario_llamada/",
                                                function() {
                                                    calendarios_llamada()
                                                    $("#btnllamNuevo").click();
                                                }
                                        );
                                    } else {
                                        $("#panelllamadas").load("<?= $this->config->base_url() ?>marqueting/telefonmarketing/operador/buscar_llamada_primero/" + xcodigo,
                                                function() {
                                                    calendarios_llamada()
                                                    $("#btnllamAgregar").attr('disabled', 'disabled');
                                                }
                                        );

                                    }
                                }
                            });
                        }

                );
            });



            $(document).on("click", "#btnUltimo", function(e) {
                e.preventDefault();
                $("#panelPersona").load("<?= $this->config->base_url() ?>marqueting/telefonmarketing/operador/buscar_operador_ultimo",
                        function() {
                            activa_tabs();
                            var xcodigo = $("#txtcodigo").attr("value");
                            var xcount = 0;
                            $.ajax({
                                url: "<?= $this->config->base_url() ?>marqueting/telefonmarketing/operador/count_llamadas/" + xcodigo,
                                success: function(datos) {
                                    xcount = datos;
                                    if (xcount === "0") {
                                        $("#panelllamadas").load("<?= $this->config->base_url() ?>marqueting/telefonmarketing/operador/formulario_llamada/",
                                                function() {
                                                    calendarios_llamada()
                                                    $("#btnllamNuevo").click();
                                                }
                                        );
                                    } else {
                                        $("#panelllamadas").load("<?= $this->config->base_url() ?>marqueting/telefonmarketing/operador/buscar_llamada_primero/" + xcodigo,
                                                function() {
                                                    calendarios_llamada()
                                                    $("#btnllamAgregar").attr('disabled', 'disabled');
                                                }
                                        );

                                    }
                                }
                            });
                        }

                );
            });







//HH: eventos de los botones de navegacion llamadas

            $(document).on("click", "#btnllamSiguiente", function(e) {
                e.preventDefault();
                var xcodigo = $("#txtcodigo").attr("value");
                var xidregistro = $("#txtllamCodigo").attr("value");
                var xcount = 0;
                $.ajax({
                    url: "<?= $this->config->base_url() ?>marqueting/telefonmarketing/operador/count_llamadas/" + xcodigo,
                    success: function(datos) {
                        xcount = datos;
                        if (xcount === "0") {
                            $("#panelllamadas").load("<?= $this->config->base_url() ?>marqueting/telefonmarketing/operador/formulario_llamada/",
                                    function() {
                                        limpiaFormulario($("#frmllamadas"));
                                        calendarios_llamada()
                                        $("#btnllamActualizar").attr('disabled', 'disabled');
                                        $('#btnllamAgregar').removeAttr("disabled");
                                        $('#txtllamFecha').focus();
                                    }
                            );
                        } else {
                            $("#panelllamadas").load("<?= $this->config->base_url() ?>marqueting/telefonmarketing/operador/buscar_llamada_siguiente/" + xcodigo + "/" + xidregistro,
                                    function() {
                                        calendarios_llamada()
                                        $("#btnllamAgregar").attr('disabled', 'disabled');
                                    }
                            );

                        }
                    }
                });

            });



            $(document).on("click", "#btnllamAnterior", function(e) {
                e.preventDefault();
                var xcodigo = $("#txtcodigo").attr("value");
                var xidregistro = $("#txtllamCodigo").attr("value");
                var xcount = 0;
                $.ajax({
                    url: "<?= $this->config->base_url() ?>marqueting/telefonmarketing/operador/count_llamadas/" + xcodigo,
                    success: function(datos) {
                        xcount = datos;
                        if (xcount === "0") {
                            $("#panelllamadas").load("<?= $this->config->base_url() ?>marqueting/telefonmarketing/operador/formulario_llamada/",
                                    function() {
                                        limpiaFormulario($("#frmllamadas"));
                                        calendarios_llamada()
                                        $("#btnllamActualizar").attr('disabled', 'disabled');
                                        $('#btnllamAgregar').removeAttr("disabled");
                                        $('#txtllamFecha').focus();
                                    }
                            );
                        } else {
                            $("#panelllamadas").load("<?= $this->config->base_url() ?>marqueting/telefonmarketing/operador/buscar_llamada_anterior/" + xcodigo + "/" + xidregistro,
                                    function() {
                                        calendarios_llamada()
                                        $("#btnllamAgregar").attr('disabled', 'disabled');
                                    }
                            );

                        }
                    }
                });

            });


            $(document).on("click", "#btnllamPrimero", function(e) {
                e.preventDefault();
                var xcodigo = $("#txtcodigo").attr("value");
                var xcount = 0;
                $.ajax({
                    url: "<?= $this->config->base_url() ?>marqueting/telefonmarketing/operador/count_llamadas/" + xcodigo,
                    success: function(datos) {
                        xcount = datos;
                        if (xcount === "0") {
                            $("#panelllamadas").load("<?= $this->config->base_url() ?>marqueting/telefonmarketing/operador/formulario_llamada/",
                                    function() {
                                        limpiaFormulario($("#frmllamadas"));
                                        calendarios_llamada()
                                        $("#btnllamActualizar").attr('disabled', 'disabled');
                                        $('#btnllamAgregar').removeAttr("disabled");
                                        $('#txtllamFecha').focus();

                                           
                                        
                                    }
                            );
                        } else {
                            $("#panelllamadas").load("<?= $this->config->base_url() ?>marqueting/telefonmarketing/operador/buscar_llamada_primero/" + xcodigo,
                                    function() {
                                        calendarios_llamada()
                                        $("#btnllamAgregar").attr('disabled', 'disabled');

                                       calcularHora();

                                    }
                            );

                        }
                    }
                });

            });

            $(document).on("click", "#btnllamUltimo", function(e) {
                e.preventDefault();
                var xcodigo = $("#txtcodigo").attr("value");
                var xcount = 0;
                $.ajax({
                    url: "<?= $this->config->base_url() ?>marqueting/telefonmarketing/operador/count_llamadas/" + xcodigo,
                    success: function(datos) {
                        xcount = datos;
                        if (xcount === "0") {
                            $("#panelllamadas").load("<?= $this->config->base_url() ?>marqueting/telefonmarketing/operador/formulario_llamada/",
                                    function() {
                                        limpiaFormulario($("#frmllamadas"));
                                        calendarios_llamada()
                                        $("#btnllamActualizar").attr('disabled', 'disabled');
                                        $('#btnllamAgregar').removeAttr("disabled");
                                        $('#txtllamFecha').focus();
                                    }
                            );
                        } else {
                            $("#panelllamadas").load("<?= $this->config->base_url() ?>marqueting/telefonmarketing/operador/buscar_llamada_ultimo/" + xcodigo,
                                    function() {
                                        calendarios_llamada()
                                        $("#btnllamAgregar").attr('disabled', 'disabled');
                                    }
                            );

                        }
                    }
                });

            });



            //HH: botones de compania    
            $(document).on("click", "#btnllamNuevo", function(e) {
                e.preventDefault();
                $("#panelllamadas").load("<?= $this->config->base_url() ?>marqueting/telefonmarketing/operador/formulario_llamada/", function() {
                    limpiaFormulario($("#frmllamadas"));
                    calendarios_llamada()
                    $("#btnllamActualizar").attr('disabled', 'disabled');
                    $('#btnllamAgregar').removeAttr("disabled");
                    $('#txtllamFecha').focus();
                });
            });







            $(document).on("click", "#btnllamAgregar", function(e) {
                e.preventDefault();
                if ($('#btnllamAgregar').attr('disabled')) {
                    return false;
                }
                $.Zebra_Dialog('¿Desea Agregar el Registro?', {
                    'type': 'question',
                    'title': 'Confirmación',
                    'buttons': ['Si', 'No', 'Cancelar'],
                    'onClose': function(caption) {
                        if (caption == "Si") {
                            var xcodigo = $("#txtcodigo").attr("value");
                            //alert (xcodigo);
                            $.ajax({
                                url: '<?= base_url() ?>marqueting/telefonmarketing/operador/proceso_mantenimiento/1/' + xcodigo,
                                type: 'POST',
                                data: $("#frmllamadas").serializeArray(),
                                success: function(resp) {
                                    if (resp == "") { //HH: pregunto si no hay ningun mensaje de error 
                                        console.log(resp);  //HH: verificamos los datos que se esta enviando al servidor
                                        $.Zebra_Dialog('Se Agrego el Registro.', {
                                            'type': 'confirmation',
                                            'title': 'Confirmación'
                                        });
                                        $("#btnllamUltimo").click();
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








            $(document).on("click", "#btnllamActualizar", function(e) {
                e.preventDefault();
                if ($('#btnllamActualizar').attr('disabled')) {
                    return false;
                }
                var idregistro = $("#txtllamCodigo").attr("value");
                var codigo = $("#txtxCodigo").attr("value");

                $.Zebra_Dialog('¿Desea Actualizar el Registro?', {
                    'type': 'question',
                    'title': 'Confirmación',
                    'buttons': ['Si', 'No', 'Cancelar'],
                    'onClose': function(caption) {
                        if (caption == "Si") {
                            $.ajax({
                                url: '<?= base_url() ?>marqueting/telefonmarketing/operador/proceso_mantenimiento/2',
                                type: 'POST',
                                data: $("#frmllamadas").serializeArray(),
                                success: function(resp) {
                                    if (resp == "") { //HH: pregunto si no hay ningun mensaje de error 
                                        console.log(resp);  //HH: verificamos los datos que se esta enviando al servidor
                                        $.Zebra_Dialog('Se Actualizo el Registro.', {
                                            'type': 'confirmation',
                                            'title': 'Confirmación'
                                        });
                                        $("#panelllamadas").load("<?= $this->config->base_url() ?>marqueting/telefonmarketing/operador/buscar_llamada_idregistro/" + codigo + "/" + idregistro,
                                                function() {
                                                    $("#btnllamAgregar").attr('disabled', 'disabled');
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

            function ValidaSoloNumeros() {
                if ((event.keyCode < 48) || (event.keyCode > 58))  //HH: numeros y :
                    event.returnValue = false;
            }









            function calcularHora()
            {

                var HoraInicio = $("#txtllamHoraInicio").attr("value");
                //var HoraFinal = $("#txtllamHoraFinal").attr("value");
                var HoraFinal = document.getElementsByName("txtllamHoraFinal");
                alert(HoraFinal);
                if (HoraFinal.length == 5) {
                    var horas1 = HoraInicio.split(":"); /*Mediante la función split separamos el string por ":" y lo convertimos en array. */
                    var horas2 = HoraFinal.split(":");
                    var subtraction = "";
                    var resultado_final = "";
                    console.log(HoraFinal);
                    //horas1[] = (isNaN(parseInt(horas1[a]))) ? 0 : parseInt(horas1[a]) /*si horas1[a] es NaN lo convertimos a 0, sino convertimos el valor en entero*/
                    //horas2[a] = (isNaN(parseInt(horas2[a]))) ? 0 : parseInt(horas2[a])

                    console.log(horas2[1]);
                    var h1_to_minutes = (parseInt(horas1[0]) * 60) + (parseInt(horas1[1]));
                    var h2_to_minutes = (parseInt(horas2[0]) * 60) + (parseInt(horas2[1]));
                    //console.log(h1_to_minutes);

                    console.log(horas2);
                    if (h1_to_minutes > h2_to_minutes) {
                        subtraction = h1_to_minutes - h2_to_minutes;
                    }
                    else
                    {
                        subtraction = h2_to_minutes - h1_to_minutes;
                    }

                    console.log(subtraction);
                    var resultado = subtraction / 60;

                    //if(is_float ($result) && formated){ 

                    resultado = resultado.toString();

                    var resultado_explode = resultado.split(".");

                    resultado_final = resultado_explode[0] + ":" + ((resultado_explode[1] * 60) / 10);

                    $("#txtllamTotalHoras").val(resultado_final);

                    /*Devolvemos el valor calculado en el formato hh:mm:ss*/
                } else {
                    $("#txtllamTotalHoras").val("0");
                }
            }







            function calcularHora1()
            {

                var HoraInicio = $("#txtllamHoraInicio").attr("value");
                var HoraFinal = $("#txtllamHoraFinal").attr("value");
                //alert(HoraFinal.length);
                if (HoraFinal.length == 5) {
                    horas1 = HoraInicio.split(":"); /*Mediante la función split separamos el string por ":" y lo convertimos en array. */
                    horas2 = HoraFinal.split(":");
                    horatotale = new Array();
                    for (a = 0; a < 2; a++) /*bucle para tratar la hora, los minutos y los segundos*/
                    {
                        horas1[a] = (isNaN(parseInt(horas1[a]))) ? 0 : parseInt(horas1[a]) /*si horas1[a] es NaN lo convertimos a 0, sino convertimos el valor en entero*/
                        horas2[a] = (isNaN(parseInt(horas2[a]))) ? 0 : parseInt(horas2[a])
                        alert(horas1[a]);
                        alert(horas2[a]);
                        horatotale[a] = (horas2[a] - horas1[a]);/* insertamos la resta dentro del array horatotale[a].*/
                        alert(horatotale[a]);
                    }
                    horatotal = new Date()  /*Instanciamos horatotal con la clase Date de javascript para manipular las horas*/
                    horatotal.setHours(horatotale[0]); /* En horatotal insertamos las horas, minutos y segundos calculados en el bucle*/
                    horatotal.setMinutes(horatotale[1]);
                    //horatotal.setSeconds(horatotale[2]);
                    //return horatotal.getHours() + ":" + horatotal.getMinutes() + ":" +
                    //        horatotal.getSeconds();
                    $("#txtllamTotalHoras").val(horatotal.getHours() + ":" + horatotal.getMinutes());

                    /*Devolvemos el valor calculado en el formato hh:mm:ss*/
                } else {
                    $("#txtllamTotalHoras").val("0");
                }
            }


        </script>



    </head>
    <body>
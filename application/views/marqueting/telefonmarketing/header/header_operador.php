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

        <script src="<?= $this->config->base_url() ?>JQuery/datatable/js/jquery.dataTables.js" type="text/javascript"></script>
        <style type="text/css">
            <!--  @import "<?= $this->config->base_url() ?>JQuery/datatable/css/demo_table_jui.css";-->

        </style>       

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
                            //HH: muestro los datos del panel de llamadas
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
                            //HH: Fin -> muestro los datos del panel de llamadas
                            //HH: muestro los datos del panel de Tiempo
                            $("#txtllamFechaInicio").datepicker({dateFormat: "dd-mm-yy"});
                            $("#txtllamFechaFinal").datepicker({dateFormat: "dd-mm-yy"});
                            $('#tablaRegistros').dataTable();
                            //HH: Fin -> panel Tiempo

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


                            //HH: muestro los datos del panel de Tiempo
                            $("#txtllamFechaInicio").datepicker({dateFormat: "dd-mm-yy"});
                            $("#txtllamFechaFinal").datepicker({dateFormat: "dd-mm-yy"});
                            //HH: Fin -> panel Tiempo


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


                            //HH: muestro los datos del panel de Tiempo
                            $("#txtllamFechaInicio").datepicker({dateFormat: "dd-mm-yy"});
                            $("#txtllamFechaFinal").datepicker({dateFormat: "dd-mm-yy"});
                            //HH: Fin -> panel Tiempo                      

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


                            //HH: muestro los datos del panel de Tiempo
                            $("#txtllamFechaInicio").datepicker({dateFormat: "dd-mm-yy"});
                            $("#txtllamFechaFinal").datepicker({dateFormat: "dd-mm-yy"});
                            //HH: Fin -> panel Tiempo


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

                            //HH: muestro los datos del panel de Tiempo
                            $("#txtllamFechaInicio").datepicker({dateFormat: "dd-mm-yy"});
                            $("#txtllamFechaFinal").datepicker({dateFormat: "dd-mm-yy"});
                            //HH: Fin -> panel Tiempo    


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
                                        calendarios_llamada()
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
                                                    calendarios_llamada()
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





            function prueba(x) {
                var y = document.getElementById("txtllamHoraInicio").value;
                alert(x + " - " + y);
            }



            function calcularHora()
            {
                var HoraInicio = document.getElementById("txtllamHoraInicio").value;
                var HoraFinal = document.getElementById("txtllamHoraFinal").value;

                if (HoraFinal == "" || HoraFinal == "0") {
                    return true;
                }


//HH: funcion calculo de hora

                if (HoraFinal.length == 5) {
                    var horas1 = HoraInicio.split(":"); /*Mediante la función split separamos el string por ":" y lo convertimos en array. */
                    var horas2 = HoraFinal.split(":");
                    var subtraction = "";
                    var resultado_final = "";
                    var tipo = "";
                    console.log("HoraInicio = " + HoraInicio);
                    console.log("HoraFinal = " + HoraFinal);
                    //horas1[a] = (isNaN(parseInt(horas1[a]))) ? 0 : parseInt(horas1[a]) /*si horas1[a] es NaN lo convertimos a 0, sino convertimos el valor en entero*/
                    var h1_to_minutes = ((isNaN(parseInt(horas1[0]))) ? 0 : parseInt(horas1[0]) * 60) + ((isNaN(parseInt(horas1[1]))) ? 0 : parseInt(horas1[1]));
                    var h2_to_minutes = ((isNaN(parseInt(horas2[0]))) ? 0 : parseInt(horas2[0]) * 60) + ((isNaN(parseInt(horas2[1]))) ? 0 : parseInt(horas2[1]));
                    //var h1_to_minutes = (parseInt(horas1[0]) * 60) + (parseInt(horas1[1]));
                    //var h2_to_minutes = (parseInt(horas2[0]) * 60) + (parseInt(horas2[1]));
                    console.log("h1_to_minutes = " + h1_to_minutes);
                    console.log("h2_to_minutes = " + h2_to_minutes);
                    if (h1_to_minutes < h2_to_minutes) {
                        subtraction = h2_to_minutes - h1_to_minutes;
                        tipo = "Hora 1 es menor a hora 2";
                    }
                    else
                    {
                        alert("La hora inicial debe ser menor que la hora final.");
                        $("#txtllamTotalHoras").val("0");
                        return;
                    }
                    console.log(tipo);
                    console.log("subtraction = " + subtraction);
                    var resultado = subtraction / 60;
                    resultado = resultado.toString();
                    console.log("resultado= " + resultado);
                    if (resultado.indexOf(".") != -1) { //HH: si encuentro el punto
                        var resultado_explode = resultado.split(".");
                        var Hora, Minuto, resultado_minuto;
                        Hora = resultado_explode[0];
                        resultado_minuto = ((resultado_explode[1] * 60) / 10);
                        resultado_minuto = Math.floor(resultado_minuto);
                        console.log("resultado_explode[1] = " + resultado_explode[1] + " - resultado_minuto = " + resultado_minuto);
                        Minuto = Math.round(Math.floor((resultado_explode[1] * 60) / 10))
                        console.log(Minuto);
                        resultado_final = Hora + "." + Minuto;
                        resultado_final = roundToTwo(resultado_final);
                        resultado_final = resultado_final.toString();
                        resultado_explode = "";
                        resultado_explode = resultado_final.split(".");
                        resultado_final = resultado_explode[0] + ":" + resultado_explode[1];
                        $("#txtllamTotalHoras").val(resultado_final);
                    } else {
                        resultado_final = resultado + ":00";
                        $("#txtllamTotalHoras").val(resultado_final);
                    }

                } else {
                    $("#txtllamTotalHoras").val("0");
                }
            }



            function roundToTwo(num) {
                return +(Math.round(num + "e+2") + "e-2");
            }

//HH: fin de calculo de hora


 function padNmb(nStr, nLen){
    var sRes = String(nStr);
    var sCeros = "0000000000";
    return sCeros.substr(0, nLen - sRes.length) + sRes;
   }

   function stringToSeconds(tiempo){
    var sep1 = tiempo.indexOf(":");
    var sep2 = tiempo.lastIndexOf(":");
    var hor = tiempo.substr(0, sep1);
    var min = tiempo.substr(sep1 + 1, sep2 - sep1 - 1);
    var sec = tiempo.substr(sep2 + 1);
    return (Number(sec) + (Number(min) * 60) + (Number(hor) * 3600));
   }

   function secondsToTime(secs){
    var hor = Math.floor(secs / 3600);
    var min = Math.floor((secs - (hor * 3600)) / 60);
    var sec = secs - (hor * 3600) - (min * 60);
    //return padNmb(hor, 2) + ":" + padNmb(min, 2) + ":" + padNmb(sec, 2);
    return padNmb(hor, 2) + ":"  + padNmb(sec, 2);
   }

   function substractTimes(t1, t2){
    var secs1 = stringToSeconds(t1);
    var secs2 = stringToSeconds(t2);
    var secsDif = secs1 - secs2;
    return secondsToTime(secsDif);
   }

   function calcT3(){
    //with (document.frm)
     //t3.value = substractTimes(t1.value, t2.value);
     var HoraInicio = document.getElementById("txtllamHoraInicio").value;
     var HoraFinal = document.getElementById("txtllamHoraFinal").value;
      var resultado = substractTimes(HoraFinal,HoraInicio);
     $("#txtllamTotalHoras").val(resultado);
   }






            //HH: Cargo el div para filtrar los datos de tipo modal
            $(document).on("click", "#btnBuscarTiempo", function(e) {
                e.preventDefault();
                var Codigo = document.getElementById("txtcodigo").value;
                var FechaInicial = document.getElementById("txtllamFechaInicio").value;
                var FechaFinal = document.getElementById("txtllamFechaFinal").value;
                $("#ListadoRegistrosPorFecha").load("<?= $this->config->base_url() ?>marqueting/telefonmarketing/operador/buscar_registros_por_fechas/" + Codigo + "/" + FechaInicial + "/" + FechaFinal,
                        function() {
                            $('#tablaRegistros').dataTable(
                                    {
                                        //"bPaginate": false,
                                        "sPaginationType": "full_numbers",
                                        "bFilter": false,
                                        "bInfo": false
                                    }
                            )
                                
                        }
                )

                event.preventDefault();
                return false;  //stop the actual form post !important!
            });


        </script>



    </head>
    <body>
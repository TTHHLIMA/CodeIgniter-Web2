<html>
    <head>
        <title>Resultado de Servicio Web</title>
        <script src=" http://code.jquery.com/jquery-1.9.1.js"></script>
        <script type="text/javascript">
               $(document).on("click", "#btnEnviar", function(e){
                   men=$("#txtMensaje").val();
                   //var href = $("#txtMensaje").attr("val");
                   var href = "http://localhost/html5/modulos/nusoap/mensaje.php?mensaje="+men;
                   //alert(href);
                 $("#respuesta").load(href);
                }); 
        </script>
    </head>
    <body>
        <label>Ingrese el mensaje</label>
        <br>
        <textarea name = "txtMensaje" id="txtMensaje" rows="5"></textarea>
        <br>
                <input type="button" value="Enviar" id="btnEnviar">

        <div id="respuesta">      
        </div>
    </body>

</html>



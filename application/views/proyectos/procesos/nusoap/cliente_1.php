<?php
require_once('lib/nusoap.php');
$wsdl = "http://www.techni-translate.de/cartas_tt/nusoap/server.php?wsdl";

$client = new nusoap_client($wsdl, 'wsdl');
$param = array('inversionSoles' => '100');
$response = $client->call('CalcularInteres', $param);
?>
<html>
    <head>
        <title>Resultado de Web Services</title>
        <script type="text/javascript">
        function calular(){
            //TODO: funcion ajax
        }
        </script>
    </head>
    <body>
        <label>Ingrese el monto</label>
		<input type="text" name = "txtMonto" id="txtMonto"/>
                <input type="button" value="Calcular Interes" onclick="calular();">

        <div class="">      
        	<p> 
            El interes de tu inversion es: <?php echo ($response);?>  Nuevos Soles.        
            </p>
        </div>
    </body>

</html>



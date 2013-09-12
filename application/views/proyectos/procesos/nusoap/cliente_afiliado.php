<?php

require_once('lib/nusoap.php');
// Crear un cliente apuntando al script del servidor (Creado con WSDL) 
$serverURL = 'http://www.techni-translate.de/cartas_tt/nusoap';
$serverScript = 'server_afiliado.php';
$metodoALlamar = 'getXML';

$cliente = new nusoap_client("$serverURL/$serverScript?wsdl", 'wsdl');
// Se pudo conectar? 
$error = $cliente->getError();
if ($error) {
    echo '<pre style="color: red">' . $error . '</pre>';
    echo '<p style="color:red;' > htmlspecialchars($cliente->getDebug(), ENT_QUOTES) . '</p>';
    die();
}

$id = 310; //id del afiliado 
$cpar = 0; //codigo de parentesco 0=titular 1=conyuge 2=hijo menor de 21 ... 
// 1. Llamar a la funcion getRespuesta del servidor 
$result = $cliente->call(
        "$metodoALlamar", // Funcion a llamar 
        array('id' => $id, 'cpar' => $cpar), // Parametros pasados a la funcion 
        "uri:$serverURL/$serverScript", // namespace 
        "uri:$serverURL/$serverScript/$metodoALlamar" // SOAPAction 
);
// Verificacion que los parametros estan ok, y si lo estan. mostrar rta. 
if ($cliente->fault) {
    echo '<b>Error: ';
    print_r($result);
    echo '</b>';
} else {
    $error = $cliente->getError();
    if ($error) {
        echo '<b style="color: red">-Error: ' . $error . '</b>';
    } else {
        echo base64_decode($result);
    }
}
?> 
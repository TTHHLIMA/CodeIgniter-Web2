<?php
require_once("lib/nusoap.php");
$ns= "http://www.techni-translate.de/cartas_tt/nusoap/";
$server= new soap_server();
$server->configureWSDL('Mensajeria',$ns);
$server->wsdl->schemaTargetNamespace=$ns;
$server->register('EnviarEmail',
                    array('Mensaje'=>'xsd:string'),
                    array('return'=>'xsd:string'),
                    $ns);

function EnviarEmail($Mensaje){

$destino= "hernanhuar@techni-translate.com";
$asunto= "Prueba de envio desde Servidor Local";

$encabezados = "From: info@techni-translate.com\nReply-To: info@techni-translate.com\nContent-Type: text/html; charset=iso-8859-1";

if (mail($destino, $asunto, $Mensaje, $encabezados)){
    $confirmacion="Enviado";
}else {
    $confirmacion="No Enviado";
}
    
    return new soapval('return',
                        'xsd:string',
                        $confirmacion);
}

$server->service($HTTP_RAW_POST_DATA);

?>
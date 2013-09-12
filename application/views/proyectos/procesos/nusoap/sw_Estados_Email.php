<?php
require_once("lib/nusoap.php");
$ns= "http://www.techni-translate.de/cartas_tt/nusoap/";
$server= new soap_server();
$server->configureWSDL('ConfirmacionProcesos',$ns);
$server->wsdl->schemaTargetNamespace=$ns;
$server->register('ConfirmarSaltoLinea',
                    array('user'=>'xsd:string'),
                    array('return'=>'xsd:string'),
                    $ns);

function CalculateOntarioTax($user){
    if ($user=="HH"){
        $xConfirmacion="Se envio el Email";
    }else{
        $xConfirmacion="No se envio el Email";
    } 
    
    
    return new soapval('return',
                        'xsd:string',
                        $xConfirmacion);
    
}

$server->service($HTTP_RAW_POST_DATA);

?>

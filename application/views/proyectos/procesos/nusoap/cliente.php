<?php
require_once('lib/nusoap.php');
$wsdl="http://www.techni-translate.de/cartas_tt/nusoap/sw_Estados_Email?wsdl";

$client=new nusoap_client($wsdl,'wsdl');
$param= array('user'=>'HH');
$response = $client->call('ConfirmarSaltoLinea',$param);

echo "<pre>";
print_r($response);
//print_r("holaaa");
echo "</pre>";
?>
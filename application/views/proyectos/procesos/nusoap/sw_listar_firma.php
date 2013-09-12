<?php
require_once 'lib/nusoap.php';
include 'DB/conexion.php';

$server = new soap_server;
$ns = "http://www.techni-translate.de/cartas_tt/nusoap";
$server->configureWSDL("obtenerFirmas",$ns);
$server->wsdl->schematargetnamespace=$ns;

$server->wsdl->addComplexType('RenglonFirma','complexType','struct','all','',
                                array(
                                    'id_com'=>array('name'=>'id_com','type'=>'xsd:string'),
                                    'idcompania'=>array('name'=>'idcompania','type'=>'xsd:string'),
                                    'alias_com'=>array('name'=>'alias_com','type'=>'xsd:string'),
                                    'nombre'=>array('name'=>'nombre','type'=>'xsd:string')
                                     )
                             );

$server->wsdl->addComplexType ('ArrayOfRenglonFirma','complexType','array','','SOAP-ENC:Array',
                               array(),
                               array(
                                   array(
                                         'ref'=>'SOAP-ENC:arraytype',
                                         'wsdl:arrayType'=>'tns:RenglonFirma[]'
                                        )
                                    ),
                              'tns:RenglonFirma'
                              );
  
        
        
        
function obtenerFirmas($id=false){
    
    $query = "SELECT Id_Com , idcompania, alias_com,  nombre  FROM `Compania` order by nombre ";
    $cn = Conectar();
    $rs = mysql_query($query, $cn);
    $cont = 0;
    $html = array();
    while ($row = mysql_fetch_array($rs)) {
        $html[$cont]['id_com']=$row['Id_Com'];
        $html[$cont]['idcompania']=$row['idcompania'];
        $html[$cont]['alias_com']=$row['alias_com'];
        $html[$cont]['nombre']=$row['nombre'];
    }
    return $html;    
    
}        
        


$server->xml_encoding="utf_8";
$server->soap_defencoding="utf_8";
$server->register('obtenerFirmas',
                  array('codigo'=>'xsd:int'),
                  array('return'=>'tns:ArrayOfRenglonFirma'),
                  $ns);
$HTTP_RAW_POST_DATA = isset ($HTTP_RAW_POST_DATA) ? $HTTP_RAW_POST_DATA : '';
$server->service($HTTP_RAW_POST_DATA);

        
?>

<?php
// Pull in the NuSOAP code
require_once('lib/nusoap.php');
// Create the server instance
$server = new soap_server();
// Initialize WSDL support
$server->configureWSDL('mathwsdl', 'urn:mathwsdl');

// Register the TriangleArea method to expose it
$server->register('TriangleArea',                   // method name
    array('b' => 'xsd:int', 'h' => 'xsd:int'),   // input parameters
    array('area_t' => 'xsd:string'),                // output parameters
    'urn:mathwsdl',                                    // namespace
    'urn:mathwsdl#TriangleArea',                       // soapaction
    'rpc',                                             // style
    'encoded',                                         // use
    'Calculate a triangle area as (b*h)/2'             // documentation
);

// Register the RectangleArea method to expose it
$server->register('RectangleArea',                  // method name
    array('L' => 'xsd:int', 'l' => 'xsd:int'),   // input parameters
    array('area_r' => 'xsd:string'),                // output parameters
    'urn:mathwsdl',                                    // namespace
    'urn:RectangleAreawsdl#RectangleArea',             // soapaction
    'rpc',                                             // style
    'encoded',                                         // use
    'Calculate a rectangle area as (L*l)'              // documentation
);

// Define the TriangleArea method as a PHP function
function TriangleArea($b, $h) {
        return 'The triangle area is: ' .((b*h)/2);
}

// Define the RectangleArea method as a PHP function
function RectangleArea($L, $l) {
        return 'The rectangle area is: ' .($L*$l);
}
// Use the request to (try to) invoke the service
$HTTP_RAW_POST_DATA = isset($HTTP_RAW_POST_DATA) ? $HTTP_RAW_POST_DATA : '';
$server->service($HTTP_RAW_POST_DATA);
?>
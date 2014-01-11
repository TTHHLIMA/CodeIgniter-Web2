<?php
$dex="From: info@techni-translate.com\nContent-Type: text/html; charset=utf-8";
$para="hernanhuar@techni-translate.com";
//$para="hernanhuar@techni-translate.com";
$mensaje="<b>Mensaje de prueba de forma local</b>";
if (mail($para,"Titulo de prueba",$mensaje,$dex)){
    echo "email enviado para hernanhuar";
} else {
    echo "email no enviado";
}
?>

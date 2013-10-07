<?php
session_start();
session_unset();
session_destroy();
$_SESSION = array(); 

function session_clean($logout=false) {
  $v=array();
  foreach($_SESSION as $x=>$y)
   if($x!="redirector"&&($x!="xxxiduser"||$logout))
    $v[]=$x;

  foreach($v as $x)
   unset($_SESSION[$x]);
  return;
}

$destruye_sesion=session_clean($logout=true); 

$error= 8; //Log Out
$url= "Location: ../index.php";
header($url);
?>
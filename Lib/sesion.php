<?php
header('Content-Type: text/html; charset=utf-8');
global $xxxiduser;
global $xxxnombres;
global $xxxiniciales;
global $xxxnivel;
global $xxxactivo;
global $xxxcoordinador;

session_name();
session_start("xxxiduser");
	
//echo "Datos: ".$_SESSION['xxxiduser'];	
//echo "test:".$xxxiduser;

 if (!(isset($_SESSION['xxxiduser']))) {
	session_unset();
	session_destroy();
	die("su tiempo expiro, por favor debe <a href=\"../index.php\">Iniciar Sesion</a>!<br>");
} else { 
				$xxxiduser=$_SESSION['xxxiduser'];
				$xxxnombres=$_SESSION['xxxnombres'];
                                $xxxiniciales = $_SESSION['xxxiniciales'];
				$xxxnivel=$_SESSION['xxxnivel'];
				$xxxactivo=$_SESSION['xxxactivo'];
                                $xxxcoordinador = $_SESSION['xxxcoordinador'];
                                
                            
                                
 }
?>
<?php
require 'Db.conexion.php'; 
$db = DataBase::getInstance();

	$fecha = date("y/m/d"); 
	$hora = date("h:i:s" , time()); 

	$user=trim($_POST['txtuser']);
	$pass=trim($_POST['txtpass']);

	if (empty($user) && empty($pass)) {
		$error = 3;
	} else {
		if (empty($user)) $error = 1; //user es vacio
		if (empty($pass)) $error = 2; //password es vacio	
	}

if ($error==""){ // verifico si ya hubo error antes
	$sql="SELECT * FROM `usuarios` where usuario = '".$user."' and password = '".$pass."' limit 0,1";
	$db->setQuery($sql);  
	$Rs = $db->loadObjectList();
	$nr=count($Rs);
	if ($nr==0)
		{	
			$error = 4; // datos no existen en la tabla
		}	
 	else
		{	
			$error = "";
			 foreach($Rs as $Columna){ 
				$xxxiduser= $Columna->id_usuario;
                                $xxxnombres= $Columna->nombres." ".$Columna->apellidos;
				$xxxiniciales=strtoupper($Columna->iniciales);
				$xxxnivel=$Columna->id_nivel;
				$xxxactivo=$Columna->activo;
                                $xxxcoordinador=$Columna->coordinador;
			}
		}


//echo "Informacion: ".$xxxiduser;

	if ($xxxactivo=="0"){
		$error = 5; // No activo
	}

}// fin: verifico si ya hubo error antes





if (empty($error)) {
			session_name();
			session_start();
			$_SESSION['xxxiduser'] = $xxxiduser;
			$_SESSION['xxxnombres'] = $xxxnombres;
                        $_SESSION['xxxiniciales'] = $xxxiniciales;
			$_SESSION['xxxnivel'] = $xxxnivel;
			$_SESSION['xxxactivo'] = $xxxactivo;
                        $_SESSION['xxxcoordinador'] = $xxxcoordinador;
                        
                        
			if ($pass != '') {
				$_SESSION['password'] = $pass;
			}
				session_encode();
				
				//echo "otro dato:".$_SESSION['xxxiduser'];
				if ($xxxnivel=="3"){
					$url= "Location: ../admin/backup.php?PHPSESSID=".$session_id;
				} else {
                                    if ($xxxnivel=="1"){
                                        $url= "Location: ../modulos/reporteCambioEstado.php?PHPSESSID=".$session_id;
                                    }
                                    else {
					$url= "Location: ../modulos/listar.php?PHPSESSID=".$session_id;
                                    }
				}
	} else {
			$url= "Location: ../index.php?error=$error";
	}
header($url);
?>
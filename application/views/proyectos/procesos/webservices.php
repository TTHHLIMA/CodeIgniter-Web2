<? 
require_once("../Lib/sesion.php");
require '../Lib/Db.conexion.php'; 
$db = DataBase::getInstance();
?>
<!DOCTYPE html >
<html lang="en">
  <head>
    <meta charset="utf-8">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Techni-Translate (Intranet)</title>
    <meta name="description" content="">
    <meta name="author" content="">


</head>
<body>
<?PHP


									$xSql="";
									$xSql="select nombre from compania";
									$db->setQuery($xSql);  
									$RsSql = $db->loadObjectList();
									$NrRes="";
									$NrRes = count($RsSql);
									if ($NrRes > 0) { // imprimo los datos 	
										foreach($RsSql as $Col){
											$prioridad="";
											echo $Col->nombre."<br>";
										}
									} else {
											$prioridad="";
									}

?>

  </body>
</html>
<?php 
 class DataBase {
	private $conexion;
	private $resource;
	private $sql;
	private static $_singleton;

	public static function getInstance(){
		if (is_null (self::$_singleton)) {
			self::$_singleton = new DataBase();
		}
		return self::$_singleton;
	}

	private function __construct(){
		//$this->conexion = @mysql_connect(":/tmp/mysql5.sock","dbo393403878","Xpdwr7qY");
		//mysql_select_db("db393403878", $this->conexion);
		$this->resource = null;
		
		$this->conexion = mysql_connect("localhost","root","");
		  if(!$this->conexion){
		   echo "No se ha podido conectar a la base de datos.";
		  }
		  else{
		   mysql_select_db("modulo03",$this->conexion);
		  }		
		
		
	}

	public function execute(){
		mysql_query("SET NAMES 'utf8'");
		mysql_query("SET CHARACTER SET 'utf8'");
		if(!($this->resource = mysql_query($this->sql, $this->conexion))){
			return null;
		}
		return $this->resource;
	}

	public function alter(){
		if(!($this->resource = mysql_query($this->sql, $this->conexion))){
			return false;
		}
		return true;
	}

	public function loadObjectList(){
		if (!($cur = $this->execute())){
			return null;
		}
		$array = array();
		while ($row = @mysql_fetch_object($cur)){
			$array[] = $row;
		}
		return $array;
	}

	public function setQuery($sql){
		if(empty($sql)){
			return false;
		}
		$this->sql = $sql;
		return true;
	}

	public function freeResults(){
		@mysql_free_result($this->resource);
		return true;
	}

	public function loadObject(){
		if ($cur = $this->execute()){
			if ($object = mysql_fetch_object($cur)){
				@mysql_free_result($cur);
				return $object;
			}
			else {
				return null;
			}
		}
		else {
			return false;
		}
	}






	function __destruct(){
		@mysql_free_result($this->resource);
		@mysql_close($this->conexion);
	}
}
?>
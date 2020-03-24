<?php
class Conexion{

	private $server="AS400";
	private $user="USRW10";
	private $password="SISW10TL";
	private $db="";

	private $cn = null;
	private static $instancia = null;

	public function __construct(){
		
		if(!$this->cn)
			{	$this->dispose($this->cn);	}
			
			
		$this->cn = odbc_connect($this->server,$this->user,$this->password);
			if(!$this->cn)
				{	$this->dispose($this->cn);	}
	} 

	public static function getInstancia(){// getInstancia
		if( is_null(self::$instancia) ){
			self::$instancia = new Conexion();
		}
		return self::$instancia;
	} 

	public function ejecutarComando( $sql ){// ejecutarComando
		$rpta = null;
		$Prepare = odbc_prepare($this->cn, $sql);
		if( !odbc_execute($Prepare))
			{	$rpta = "Error: Ha ocurrido un error a nivel de la base de datos. ***Descripcion: ".odbc_errormsg();
				$invalidos = array("`", "'");
				$rpta = str_replace($invalidos,"",$rpta);
			}
		else
			{$rpta = true;}
		return $rpta;	
	}
	
	//, $this->cn
	public function iniciarTransaccion(){
		//mysql_query("SET AUTOCOMMIT=0;");
		//mysql_query("BEGIN");
	} // iniciarTransacci�n
	
	public function confirmarTransaccion(){
		//mysql_query("COMMIT");
	} // confirmarTransaccion
	
	public function cancelarTransaccion(){
		//mysql_query("ROLLBACK");
	} // cancelarTransaccion
	
	
	public function dispose(){
		if( $this->cn ) 
			{	odbc_close( $this->cn );
				$this->cn = null;
			}
	}

	public function __destruct(){// __destruct
		if($this->cn) {
			$this->cancelarTransaccion();
			$this->dispose();
		}
	} 


	public function consultar($sql){ // consultar
		$lista = array();
		$rs = odbc_exec( $this->cn, $sql);
		if($rs){
					while( $fila = odbc_fetch_array($rs) )
						{	$lista[] = $fila;}

					odbc_free_result( $rs );
				}
		return $lista;
	} 


	public function isConnected(){ // isConnected
		$rpta = FALSE;
		if( $this->cn) $rpta = TRUE;
		return $rpta;
	} 
	
	public function lastID()  //ultimo Id
	 	{ 	return mysql_insert_id($this->link);  } 
			
} // class
?>
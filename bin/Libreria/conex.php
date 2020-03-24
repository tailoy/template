<?php

/*
$instancia=ConexionDB::getInstancia();


print_r($instancia->ejecutarComando("SELECT id,mensaje FROM mensajes"));*/
class Conexion{

    protected $conexion_db;

	private $cn = null;
    private static $instancia = null;
    private $host="";
    private $root="";
    private $pass="";
    private $db="";

    public function __construct(){
        /*$this->host="us-cdbr-iron-east-04.cleardb.net:3306";
        $this->root="bf51309df18a48";
        $this->pass="1f3e4435";
        $this->db="heroku_180496abfb86e77";*/

        $this->host="localhost";
        $this->root="root";
        $this->pass="";
        $this->db="tailoy";
        $this->conexion = mysqli_connect($this->host,$this->root,$this->pass,$this->db);

    }
    public static function getInstancia(){// getInstancia
		if( is_null(self::$instancia) ){
			self::$instancia = new Conexion();
		}
		return self::$instancia;
    } 
    /*public function ejecutarComando( $sql ){// ejecutarComando
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
    }*/
    
	public function ejecutarComando($sql){// ejecutarComando
        $rpta = 'null';
        if ($stmt = $this->conexion->prepare($sql)) {
            $stmt->execute();
            //$stmt->bind_result($id, $mensaje);
            /*while ($stmt->fetch()) {
                print_r($id);
                echo "<br>";
                print_r($mensaje);
                echo "<br>";
            }*/
            $rpta = 'true';
        }else{
            $rpta = 'null';
        }
        return $rpta;
    }
    public function consultar($sql){ // consultar
        $lista = array();
        $resultado=mysqli_query($this->conexion,$sql);
        while ($rowwe=mysqli_fetch_array($resultado)){
            $lista[] = $rowwe;
        }
        return $lista;
	} 
    
}


?>
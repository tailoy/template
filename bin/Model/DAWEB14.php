<?php

class DAWEB14 {

    public function Insertar(WEB14 $obj){
        $mysql=Conexion::getInstancia();
        $consulta="INSERT INTO WEB14 (
                TIAPC, TISER, TICOR, TIFCR, TIVAL, TIFUM, TIHUM) VALUES (
		'".$obj->obtener('TIAPC')."', '".$obj->obtener('TISER')."', '".$obj->obtener('TICOR')."', '" .$obj->obtener('TIFCR'). "', '" .$obj->obtener('TIVAL'). "', '" .$obj->obtener('TIFUM'). "', '" .$obj->obtener('TIHUM'). "') ";
        $msg=$mysql->ejecutarcomando($consulta);
		//echo $consulta;
	return $msg; 

	}
    

	public function RegistroTicket($id_facebook, $ser, $correlativo, $fecha, $valido){
	$mysql=Conexion::getInstancia();
	
	
	
	$Sql="INSERT INTO WEB14 (TIAPC,  TISER, TICOR, TIFCR, TIVAL, TIFUM, TIHUM) VALUES
		('".$id_facebook."', '".$ser."', '".$correlativo."','".$fecha."','".$valido."','".date("Ymd")."','".date("His")."')";
	//echo $Sql;
	
	
	echo $msg=$mysql->ejecutarcomando($Sql);
	}
	
	
	
	/*
	public function TraerNoVerificados(){
	$mysql=Conexion::getInstancia();
	//$Sql="SELECT TIAPC, TISER, TICOR, TIVAL FROM WEB14 WHERE WHERE TIVAL='99'";
	$Sql="SELECT 
		WEB14.TIAPC AS TIAPC, WEB13.APNOM AS APNOM, 
		WEB14.TISER AS TISER, WEB14.TICOR AS TICOR, 
		WEB14.TIVAL AS TIVAL
		FROM WEB14
		LEFT JOIN WEB13 ON WEB14.TIAPC = WEB13.APCOD
		WHERE WEB14.TIVAL='99' ORDER BY TIAPC ASC";
	$array =$mysql->consultar($Sql);
	return $array;
	}
	*/
	
	
	public function TraerNoVerificados($fecha){
	$mysql=Conexion::getInstancia();
	//$Sql="SELECT TIAPC, TISER, TICOR, TIVAL FROM WEB14 WHERE WHERE TIVAL='99'";
	$Sql="SELECT 
		WEB14.TIAPC AS TIAPC, WEB13.APNOM AS APNOM, 
		WEB14.TISER AS TISER, WEB14.TICOR AS TICOR, 
		WEB14.TIVAL AS TIVAL
		FROM WEB14
		LEFT JOIN WEB13 ON WEB14.TIAPC = WEB13.APCOD
		WHERE WEB14.TIVAL='99' AND WEB13.APLIC='RetosHasbro' AND WEB14.TIFCR<'".$fecha."' ORDER BY TIAPC ASC";
	//echo $Sql;
	$array =$mysql->consultar($Sql);
	return $array;
	}
	
	
	public function VerificarValidado($usuario){
	$mysql=Conexion::getInstancia();
	$Sql="SELECT TIAPC FROM WEB14 WHERE TIVAL='1' AND TIAPC='".$usuario."' ";
	//echo $Sql;
	//$array = $mysql->consultar($Sql);
	
	//$array =$mysql->consultar($Sql);
	//return $array;
	
	//if(count($array)==1) {return $array;}
	//else {return false;}
	//return count($array);
	
	
	$array = $mysql->consultar($Sql);
	return $array;

	
	
	}
	
	
	
	public function TicketNoValido($usuario,$serie,$correlativo){
	$mysql=Conexion::getInstancia();
	$Sql="UPDATE WEB14 SET TIVAL='0', TIFUM='".date("Ymd")."', TIHUM='".date("His")."' WHERE TIAPC='".$usuario."' AND TISER='".$serie."' AND TICOR='".$correlativo."' ";
	//echo $Sql;
	//$array =$mysql->consultar($Sql);
	$msg=$mysql->ejecutarcomando($Sql);
	return $msg;
	//return $array;
	}

	public function TicketValido($usuario,$serie,$correlativo, $puntos){
	$mysql=Conexion::getInstancia();
	$Sql="UPDATE WEB14 SET TIVAL='1', TIPTS='".$puntos."', TIFUM='".date("Ymd")."', TIHUM='".date("His")."' WHERE TIAPC='".$usuario."' AND TISER='".$serie."' AND TICOR='".$correlativo."' ";
	//echo $Sql;
	//$array =$mysql->consultar($Sql);
	$msg=$mysql->ejecutarcomando($Sql);
	return $msg;
	//return $array;
	}
	
	
	/*
	public function ExisteTICKET($serie,$correlativo){
	$mysql=Conexion::getInstancia();
	$Sql="SELECT TIAPC, TISER, TICOR 
		FROM WEB14
		WHERE TISER='".$serie."' AND TICOR='".$correlativo."' ";
	//echo $Sql;
	
	$array = $mysql->consultar($Sql);
	return $array;
	
	//$array = $mysql->consultar($Sql);
	//if(count($array)==1) {return $array;}
	//else {return false;}
	//return count($array);
	
	}
	*/
	
	
	
	public function ExisteTICKET($serie,$correlativo){
	$mysql=Conexion::getInstancia();
	$Sql="SELECT TIAPC, TISER, TICOR 
		FROM WEB14
		LEFT JOIN WEB13 ON WEB14.TIAPC=WEB13.APCOD
		WHERE TISER='".$serie."' AND TICOR='".$correlativo."'
		AND WEB13.APLIC='TL2020-PILOT' ";
	//echo $Sql;
	
	$array = $mysql->consultar($Sql);
	return $array;
	
	//$array = $mysql->consultar($Sql);
	//if(count($array)==1) {return $array;}
	//else {return false;}
	//return count($array);
	
	}
	
	
	
    
}?>

<?php

class DAWEB13 {


	public function Insertar(WEB13 $obj) {
		
        $mysql = Conexion::getInstancia();
        $consulta = "INSERT INTO WEB13 (
		APCOD, APFER, APNOM, APAPP, 
		APNDO, APFEN, APTF1, APTF2,
		APLIC, APUBG, APDIR, APSEX,
		APMAI, APOP1, APOP2, APPTJ,
		APRNK, APRRK, APEST, APFID, 
		APCES, APHCR, APPR6,APPR7,
		APPR8, APPR9) VALUES (
		'" . $obj->obtener('APCOD') . "', '" . $obj->obtener('APFER') . "', '" . $obj->obtener('APNOM') . "', '" . $obj->obtener('APAPP') . "',
		'" . $obj->obtener('APNDO') . "', '" . $obj->obtener('APFEN') . "',	'" . $obj->obtener('APTF1') . "', '" . $obj->obtener('APTF2') . "',
		'" . $obj->obtener('APLIC') . "', '" . $obj->obtener('APUBG') . "',	'" . $obj->obtener('APDIR') . "', '" . $obj->obtener('APSEX') . "', 
		'" . $obj->obtener('APMAI') . "', '" . $obj->obtener('APOP1') . "', '" . $obj->obtener('APOP2') . "', '" . $obj->obtener('APPTJ') . "',
		'" . $obj->obtener('APRNK') . "', '" . $obj->obtener('APRRK') . "', '" . $obj->obtener('APEST') . "', '" . $obj->obtener('APFID') . "',
		'" . $obj->obtener('APCES') . "', '" . $obj->obtener('APHCR') . "', '" . $obj->obtener('APPR6') . "', '" . $obj->obtener('APPR7') . "', '" . $obj->obtener('APPR8') . "', '" . $obj->obtener('APPR9') . "') ";
		$msg = $mysql->ejecutarcomando($consulta);
		
        //echo $consulta;
        return $msg;
    }
	
	public function NuevoCodigoParticipante(){
		$mysql=Conexion::getInstancia();
		$Sql="SELECT IFNULL(MAX(APCOD),0) AS APCOD FROM WEB13";
		$array =$mysql->consultar($Sql);
		return $array;
	}
	
	public function ExisteUsuario($dni){
	$mysql=Conexion::getInstancia();
	$Sql="SELECT APCOD, APNOM, APAPP, APNDO, APSEX, APPTJ, APRRK, APEST, APFID 
		FROM WEB13
		WHERE APLIC='C2020-BD' AND APNDO='".$dni."' ";
	//echo $Sql;
	$array = $mysql->consultar($Sql);
	if(count($array)==1) {return $array;}
	else {return false;}
	//return count($array);
	
	}
	
	
	public function TraerEstado($dni){
	$mysql=Conexion::getInstancia();
	$Sql="SELECT APEST FROM WEB13 WHERE APCOD='".$dni."' ";
	$array =$mysql->consultar($Sql);
	return $array;
	}
	
	
	
	public function TraerRP($dni){
	$mysql=Conexion::getInstancia();
	$Sql="SELECT APPTJ, APRRK FROM WEB13 WHERE APCOD='".$dni."' ";
	$array =$mysql->consultar($Sql);
	return $array;
	}
	

	
	public function TraerNoVerificados(){
	$mysql=Conexion::getInstancia();
	$Sql="SELECT APCOD, APNOM, APNDO, APMAI, APEST FROM WEB13 WHERE APLIC='CopaAmerica2015' and APEST!='2' ";
	$array =$mysql->consultar($Sql);
	return $array;
	}
	
	
	public function ESTADO1($usuario){
	$mysql=Conexion::getInstancia();
	$Sql="UPDATE WEB13 SET APEST='1' WHERE APCOD='".$usuario."' ";
	//echo $Sql;
	$msg=$mysql->ejecutarcomando($Sql);
	return $msg;
	//return $array;

	}
	
	public function ESTADO2($usuario){
	$mysql=Conexion::getInstancia();
	$Sql="UPDATE WEB13 SET APEST='2' WHERE APCOD='".$usuario."' ";
	//echo $Sql;
	//$array =$mysql->consultar($Sql);
	$msg=$mysql->ejecutarcomando($Sql);
	return $msg;
	//return $array;

	}
	
	
	public function EstadoParticipante($usuario){
	$mysql=Conexion::getInstancia();
	$Sql="SELECT APCOD, APEST FROM WEB13 WHERE APCOD='".$usuario."' ";
	$array =$mysql->consultar($Sql);
	return $array;
	}
	
	
	public function NuevoTicket($usuario){
	$mysql=Conexion::getInstancia();
	$Sql="UPDATE WEB13 SET APEST='0' WHERE APCOD='".$usuario."' ";
	echo $Sql;
	//$array =$mysql->consultar($Sql);
	$msg=$mysql->ejecutarcomando($Sql);
	return $msg;
	//return $array;

	}
	

	
	public function CantidadTotal(){
	$mysql=Conexion::getInstancia();
	$Sql="SELECT 
		COUNT(1) AS USUARIOS,
		WEB13.APUBG AS UBIGEO,
		TL02R.UBCOR AS UBCOR
		FROM WEB13
		LEFT JOIN TL02R ON WEB13.APUBG=TL02R.UBCOD
		WHERE WEB13.APLIC='CopaAmerica2015'
		GROUP BY WEB13.APUBG, TL02R.UBCOR
		ORDER BY COUNT(1) DESC ";
		//echo $Sql;
	$array =$mysql->consultar($Sql);
	return $array;
	}
	
	
	public function CantidadxFecha(){
	$mysql=Conexion::getInstancia();
	$Sql="SELECT 
			COUNT(1) AS USUARIOS, APFER
			FROM WEB13
			WHERE APLIC='CopaAmerica2015'
			GROUP BY APFER
			ORDER BY APFER ";
			//echo $Sql;
	$array =$mysql->consultar($Sql);
	return $array;
	}
	
	public function TraerDatos($dni){
		
        $mysql=Conexion::getInstancia();


        $NroReg = "SELECT COUNT(1) AS NRO FROM WEB13
		WHERE APLIC='C2020-BD' AND APNDO='".$dni."'  ";

        $array=$mysql->consultar($NroReg);
        foreach($array as $Item){
            $nroReg = $Item['NRO'];
        }
        if($nroReg!=0){

            $Sql="SELECT APCOD, UPPER(APNOM) AS APNOM, UPPER(APAPP) AS APAPP, APMAI, APNDO, APSEX, APTF1, APTF2, APUBG, APDIR, APRNK, APEST, APFID, APCES, APOP1,APPR6,APPR7,APPR8,APPR9
			FROM WEB13
			WHERE APLIC='C2020-BD' AND APNDO='".$dni."' ";
			
			$array2=$mysql->consultar($Sql);
			
            $results = array();
            //$Email="";
            foreach($array2 as $item){
                //$MKDES = trim($item["MKDES"]);
                //$Email = substr($Email,0,2).str_pad("*", strlen($Email)-2-4-1 , "*").substr($Email,-4);
                //$results[] = $array2;
                //$results[] = array("value"=>$item['MKDES'],"label"=>$item['MKDES']);

                $nom = trim(utf8_encode($item['APNOM']));
                $ape = trim(utf8_encode($item['APAPP']));
                $cor = trim($item['APMAI']);
                $tel = trim($item['APTF1']);
                $sex = trim($item['APSEX']);
                $ubi = trim($item['APUBG']);
				$tie = trim($item['APCES']);
				$rrss = trim($item['APOP1']);
				$prov = trim(utf8_encode($item['APPR6'])); //PROVINCIA
				$cat = trim(utf8_encode($item['APPR8'])); //CATEGORIA DE INTERES
				$fch = trim(utf8_encode($item['APPR9'])); //FECHA NACIMIENTO

                $results[] = array("nombre" => $nom, "apellido" => $ape,"correo" => $cor,"telefono" => $tel,"sexo" => $sex,"ubigeo" => $ubi,"provincia" => $prov, "tienda" => $tie, "rrss" => $rrss, "categoria" => $cat, "fecha" => $fch);

                break;
			}
			
			
            return json_encode(array('existe'=>'1','datos'=>$results));

        }else{
			//return $Email;
			//print_r("asd");
            return json_encode(array('existe'=>'0','datos'=>''));

        }

    }
	
	
	
	
	
	public function Traer_unoE(WEB13 $obj){
	$mysql=Conexion::getInstancia();
	/*
	$SQL = "SELECT 
			CCRUC,
			CCALI,
			CCNOM,
			CCPTS
		FROM CLC02
		WHERE CCRUC='".$obj->obtener('CCRUC')."' ";
	*/
	$SQL = "SELECT APCOD, UPPER(APNOM) AS APNOM, UPPER(APAPP) AS APAPP, APMAI, APNDO, APSEX, APTF1, APTF2, APUBG, APDIR, APRNK, APEST, APFID 
		FROM WEB13
		WHERE APLIC='SLibros2017' AND APNDO='".$obj->obtener('APNDO')."' ";
	//echo $SQL;
	$array =$mysql->consultar($SQL);
	return $array;
}
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
}    
?>
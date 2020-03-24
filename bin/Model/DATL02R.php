<?php
class DATL02R
{

public function TraerDepartamento()
{	$mysql=Conexion::getInstancia();
	$Sql="SELECT UBCOD, UBLAR FROM TL02R WHERE UBCOD LIKE '%000000' AND UBCOD BETWEEN 1000000 AND 99000000 ORDER BY UBLAR";
	$array =$mysql->consultar($Sql);
	return $array;
}



public function TraerProvincias($Departamento)
{	$mysql=Conexion::getInstancia();
	$Departamento = substr($Departamento, 0, -6);
	
	$Sql="SELECT UBCOD, UBLAR FROM TL02R WHERE UBCOD LIKE '%0000' AND UBCOD BETWEEN ".$Departamento."000001 AND ".$Departamento."999999 GROUP BY UBCOD, UBLAR ORDER BY UBLAR";
	
	if($Departamento==7)
	{$Sql="SELECT UBCOD, UBLAR FROM TL02R WHERE UBCOD LIKE '%0000' AND UBCOD BETWEEN ".$Departamento."000000 AND ".$Departamento."999999 GROUP BY UBCOD, UBLAR ORDER BY UBLAR";}
	
	$array =$mysql->consultar($Sql);
	return $array;
}


public function TraerDistritos($Provincia)
{	$mysql=Conexion::getInstancia();
        if($Provincia!=1501){
            $Provincia = substr($Provincia, 0, -4);
        }
		
	$sql="SELECT UBCOD, UBLAR FROM TL02R WHERE UBCOD LIKE '%00' AND UBCOD BETWEEN ".$Provincia."0001 AND ".$Provincia."9999 ORDER BY UBLAR";	
	$array = $mysql->consultar($sql);
	return $array;
}



public function TraerDistritosUB($Provincia)
{	$mysql=Conexion::getInstancia();
	$Provincia = substr($Provincia, 0, -2);
	//$sql="SELECT UBCOD, UBLAR FROM TL02R WHERE UBCOD LIKE '%00' AND UBCOD BETWEEN ".$Provincia."0001 AND ".$Provincia."9999 ORDER BY UBLAR";	
	$sql="SELECT TL02R.UBCOD, TL02R.UBLAR, WEBUB.UBLAR AS NUBIVOX 
			FROM TL02R
			LEFT JOIN WEBUB ON TL02R.UBCOD = WEBUB.UBCOD
			WHERE TL02R.UBCOD LIKE '%00' AND TL02R.UBCOD 
			BETWEEN ".$Provincia."00 AND ".$Provincia."99 
			ORDER BY TL02R.UBLAR ASC";
	//echo $sql;
	$array = $mysql->consultar($sql);
	return $array;
}



}?>
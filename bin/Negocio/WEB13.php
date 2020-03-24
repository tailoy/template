<?php
class WEB13 { // REGISTRO DE PARTICIPANTES
   
    //private $APCOD, $APFER, $APNOM, $APAPP, $APAPM, $APNDO, $APFEN, $APTF1, $APTF2, $APLIC;
    //private $APUBG, $APDIR, $APSEX, $APMAI, $APPTJ, $APRNK, $APEST, $APOP1, $APOP2, $APFID, $APRRK, $APPR1, $APPR4;
	
	
	private $APCOD, $APFER, $APNOM, $APAPP, $APAPM, $APNDO, $APFEN, $APTF1, $APTF2, $APLIC; 
	private $APUBG, $APDIR, $APSEX, $APMAI, $APRNK, $APEST, $APOP1, $APOP2, $APFID, $APCES; 
	private $APPTJ, $APRRK, $APPR1, $APPR2, $APPR3, $APPR4, $APPR5, $APPR6, $APPR7, $APPR8, $APPR9, $APP10, $APHCR;
	
	
             
    public function __set($valor,$dato){
		$dato = utf8_decode($dato);
		$chars = array("'", '"',  "'", "", "\'", '\"', '*');
		$dato = str_replace($chars, "",$dato);
		$dato = strip_tags($dato); 
		$dato = stripslashes($dato); 
		
		switch($valor){
			case'APCOD':$this->APCOD=$dato;break;
			case'APFER':$this->APFER=$dato;break;
			case'APNOM':$this->APNOM=$dato;break;
			case'APAPP':$this->APAPP=$dato;break;
			case'APAPM':$this->APAPM=$dato;break;
			case'APNDO':$this->APNDO=$dato;break;
			case'APFEN':$this->APFEN=$dato;break;
			case'APTF1':$this->APTF1=$dato;break;
			case'APTF2':$this->APTF2=$dato;break;
			case'APLIC':$this->APLIC=$dato;break;
			case'APUBG':$this->APUBG=$dato;break;
			case'APDIR':$this->APDIR=$dato;break;
			case'APSEX':$this->APSEX=$dato;break;
			case'APMAI':$this->APMAI=$dato;break;			
			case'APRNK':$this->APRNK=$dato;break;
			case'APEST':$this->APEST=$dato;break;
			case'APOP1':$this->APOP1=$dato;break;
			case'APOP2':$this->APOP2=$dato;break;
			case'APFID':$this->APFID=$dato;break;
			case'APCES':$this->APCES=$dato;break;
			case'APPTJ':$this->APPTJ=$dato;break;			
			case'APRRK':$this->APRRK=$dato;break;			
			case'APPR1':$this->APPR1=$dato;break;			
			case'APPR2':$this->APPR2=$dato;break;
			case'APPR3':$this->APPR3=$dato;break;
			case'APPR4':$this->APPR4=$dato;break;
			case'APPR5':$this->APPR5=$dato;break;
			case'APPR6':$this->APPR6=$dato;break;
			case'APPR7':$this->APPR7=$dato;break;
			case'APPR8':$this->APPR8=$dato;break;			
			case'APPR9':$this->APPR9=$dato;break;
			case'APP10':$this->APP10=$dato;break;
			case'APHCR':$this->APHCR=$dato;break;
			
		}
	}
	
	
       
	public function obtener($valor){
		switch($valor){
			case'APCOD': return $this->APCOD; break;
			case'APFER': return $this->APFER; break;
			case'APNOM': return $this->APNOM; break;
			case'APAPP': return $this->APAPP; break;
			case'APAPM': return $this->APAPM; break;
			case'APNDO': return $this->APNDO; break;
			case'APFEN': return $this->APFEN; break;
			case'APTF1': return $this->APTF1; break;
			case'APTF2': return $this->APTF2; break;
			case'APLIC': return $this->APLIC; break;
			case'APUBG': return $this->APUBG; break;
			case'APDIR': return $this->APDIR; break;
			case'APSEX': return $this->APSEX; break;
			case'APMAI': return $this->APMAI; break;
			case'APRNK': return $this->APRNK; break;
			case'APEST': return $this->APEST; break;
			case'APOP1': return $this->APOP1; break;
			case'APOP2': return $this->APOP2; break;
			case'APFID': return $this->APFID; break;
			case'APCES': return $this->APCES; break;			
			case'APPTJ': return $this->APPTJ; break;			
			case'APRRK': return $this->APRRK; break;
			case'APPR1': return $this->APPR1; break;			
			case'APPR2': return $this->APPR2; break;
			case'APPR3': return $this->APPR3; break;
			case'APPR4': return $this->APPR4; break;
			case'APPR5': return $this->APPR5; break;
			case'APPR6': return $this->APPR6; break;
			case'APPR7': return $this->APPR7; break;
			case'APPR8': return $this->APPR8; break;
			case'APPR9': return $this->APPR9; break;
			case'APP10': return $this->APP10; break;
			case'APHCR': return $this->APHCR; break;
		}
	}
    
    
    
}
?>

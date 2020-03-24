<?php
class APPC1 { // PARTIDOS PROGRAMADOS COPA AMERICA
   
  
    private $PANRO, $PADIA, $PAFCH, $PAMES, $PAGRU;
    private $PAPA1, $PASC1, $PAPA2, $PASC2, $PAFIN, $PAORD;
             
    public function __set($valor,$dato){
		$dato = utf8_decode($dato);
		$chars = array("'", '"',  "'", "", "\'", '\"', '*');
		$dato = str_replace($chars, "",$dato);
		$dato = strip_tags($dato); 
		$dato = stripslashes($dato); 
		
		switch($valor){
			case'PANRO':$this->PANRO=$dato;break;
			case'PADIA':$this->PADIA=$dato;break;
			case'PAFCH':$this->PAFCH=$dato;break;
			case'PAMES':$this->PAMES=$dato;break;
			case'PAGRU':$this->PAGRU=$dato;break;
			case'PAPA1':$this->PAPA1=$dato;break;
			case'PASC1':$this->PASC1=$dato;break;
			case'PAPA2':$this->PAPA2=$dato;break;
			case'PASC2':$this->PASC2=$dato;break;
			case'PAFIN':$this->PAFIN=$dato;break;
			case'PAORD':$this->PAORD=$dato;break;
		}
	}
        
	public function obtener($valor){
		switch($valor){
			case'PANRO': return $this->PANRO; break;
			case'PADIA': return $this->PADIA; break;
			case'PAFCH': return $this->PAFCH; break;
			case'PAMES': return $this->PAMES; break;
			case'PAGRU': return $this->PAGRU; break;
			case'PAPA1': return $this->PAPA1; break;
			case'PASC1': return $this->PASC1; break;
			case'PAPA2': return $this->PAPA2; break;
			case'PASC2': return $this->PASC2; break;
			case'PAFIN': return $this->PAFIN; break;
			case'PAORD': return $this->PAORD; break;
		}
	}
    
    
    
}
?>

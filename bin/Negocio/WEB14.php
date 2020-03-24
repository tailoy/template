<?php
class WEB14 { // REGISTRO DE TICKET PARTICIPANTES
   
    private $TIAPC, $TISER, $TICOR, $TIFCR, $TIVAL, $TIFUM, $TIHUM;
    
    public function __set($valor,$dato){
		$dato = utf8_decode($dato);
		$chars = array("'", '"',  "'", "", "\'", '\"', '*');
		$dato = str_replace($chars, "",$dato);
		$dato = strip_tags($dato); 
		$dato = stripslashes($dato); 
		
		switch($valor){
			case'TIAPC':$this->TIAPC=$dato;break;
			case'TISER':$this->TISER=$dato;break;
			case'TICOR':$this->TICOR=$dato;break;
			case'TIFCR':$this->TIFCR=$dato;break;
			case'TIVAL':$this->TIVAL=$dato;break;
			case'TIFUM':$this->TIFUM=$dato;break;
			case'TIHUM':$this->TIHUM=$dato;break;
		}
	}
        
  	public function obtener($valor){
		switch($valor){
			case'TIAPC': return $this->TIAPC; break;
			case'TISER': return $this->TISER; break;
			case'TICOR': return $this->TICOR; break;
			case'TIFCR': return $this->TIFCR; break;
			case'TIVAL': return $this->TIVAL; break;
			case'TIFUM': return $this->TIFUM; break;
			case'TIHUM': return $this->TIHUM; break;
		}
	}
    
    
    
}
?>

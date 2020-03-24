<?php
class TL02R { 
   
    private $UBCOD, $UBLAR, $UBCOR, $UBEST;
             
    public function __set($valor,$dato){
		$dato = utf8_decode($dato);
		$chars = array("'", '"',  "'", "", "\'", '\"', '*');
		$dato = str_replace($chars, "",$dato);
		$dato = strip_tags($dato); 
		$dato = stripslashes($dato); 
		
		switch($valor){
			case'UBCOD':$this->UBCOD=$dato;break;
			case'UBLAR':$this->UBLAR=$dato;break;
			case'UBCOR':$this->UBCOR=$dato;break;
			case'UBEST':$this->UBEST=$dato;break;
		}
	}
        
        	public function obtener($valor){
		switch($valor){
			case'UBCOD': return $this->UBCOD; break;
			case'UBLAR': return $this->UBLAR; break;
			case'UBCOR': return $this->UBCOR; break;
			case'UBEST': return $this->UBEST; break;
		}
	}
    
    
    
}
?>

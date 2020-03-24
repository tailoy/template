<?Php
class Bin{

public static function Factory($case,$clas)
	{
		switch($case)
    		{
			      	case'Lib'://Libreria
					  	if(include_once $_SERVER['DOCUMENT_ROOT'].'/basedatos/bin/Libreria/'.$clas.'.php')
							return new $clas;
						else 
	    					throw new Exception ('Clase no encontrada (Libreria).');
							break;
			
    			  	case'Mod': //Model
					  	if(include_once $_SERVER['DOCUMENT_ROOT'].'/basedatos/bin/Model/'.$clas.'.php')
							return new $clas;
						else 
				    		throw new Exception ('Clase no encontrada (Model).');
							break;
						
		    	  	case'Neg':  //Negocio
					  	if(include_once $_SERVER['DOCUMENT_ROOT'].'/basedatos/bin/Negocio/'.$clas.'.php')
							return new $clas;
						else 
				    		throw new Exception ('Clase no encontrada (Negocio).');
							break;
		
			}
		}

}
?>
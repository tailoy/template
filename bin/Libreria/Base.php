<?php
class Base{

private $llave = "993416991";

public function MenuBloque(){

	if($_SESSION["Tipo"]==""){

	}elseif($_SESSION["Tipo"]=="111"){ /* Cliente WEB */ ?>	

        <li><a class="blanco<?php if($_SESSION["PagAct"]==1){echo "Activo";} ?>"
				href="/intranet/sist/VT5/index.php">Comprobante de percepci&oacute;n</a></li>
		<li><a class="blanco" href="/intranet/Bin/Libreria/Destruir.php?x=1">Cerrar sesi&oacute;n</a></li> <?php

	}else{
	?><tr><td colspan="2" width="100%"></td></tr><?php
	}
}




public function Cargar($Tipos){
	if($Tipos=="Logeo")   //Cuando es logeo no valida sesiones
		{return 1;}
	else
		{	if($_SESSION['CODACC']=="123*yoliat*321")
				{	if($_SESSION["Codigo"]=="")    // VALIDA SI EXITE SESION
						{return 0;}
					/*elseif(($Tipos==$_SESSION['Tipo']) &&
							(($_SESSION['hora']+3600) >= time())	)  // Valida la sesion con el tipo de web y tiempo. 1200
						{	
							$_SESSION['hora']=time();
							return 1;
						}
						*/
					elseif($Tipos==$_SESSION['Tipo'])
						{return 1;}
					else
						{return 0;}
				}
			else
				{return 0;}
		}
}


public function MostrarMensaje($mensaje){
	$mensaje = utf8_decode($mensaje);
	echo "<script language=javascript>alert('".$mensaje."')</script>";
}

public function location($url){
	echo "<script language=javascript>location.href='".$url."'</script>";
}


/**GETSSS **/
public function encrypt($txt)
{	if (!$txt && $txt != "0")
		{	return false; 
			exit;
		}

   if(!$this->llave)
   		{	return false;
			exit;
		} 

   $kv = self::keyvalue(); 
   $estr = ""; 
   $enc = ""; 

   for($i=0; $i<strlen($txt); $i++)
   		{	$e = ord(substr($txt, $i, 1)); 
			//$e = $e + $kv[1]; 
			//$e = $e * $kv[2]; 
			(double)microtime()*1000000; 
			$rstr = chr(rand(65, 90)); 
			$estr .= "$rstr$e"; 
		}
	return $estr; 
}



public function decrypt($txt)
{	if(!$txt && $txt != "0")
		{	return false; 
			exit;
		} 

   	if(!$this->llave)
		{	return false;
			exit; 
   		}

	$kv = self::keyvalue();
	$estr = "";
	$tmp = "";

   for($i=0; $i<strlen($txt); $i++)
   	{	if( ord(substr($txt, $i, 1)) > 64 && ord(substr($txt,$i, 1)) < 91 )
			{ 	if ($tmp != "")
					{	//$tmp = $tmp / $kv[2]; 
						//$tmp = $tmp - $kv[1]; 
						$estr .= chr($tmp); 
						$tmp = ""; 
					}
     		}
		else
			{	$tmp .= substr($txt, $i, 1);	} 
     }
	//$tmp = $tmp / $kv[2]; 
   	//$tmp = $tmp - $kv[1]; 
	$estr .= chr($tmp);

   return $estr; 
}



public function keyvalue()
{ 
   $keyvalue = ""; 
   $keyvalue[1] = "0"; 
   $keyvalue[2] = "0"; 
   for ($i=1; $i<strlen($this->llave); $i++) { 
     $curchr = ord(substr($this->llave, $i, 1)); 
     $keyvalue[1] = $keyvalue[1] + $curchr; 
     $keyvalue[2] = strlen($this->llave); 
   } 
     return $keyvalue; 
} 



function pasarsincaracter($cadena) { 
	$cadena = strtoupper($cadena);
	$cadena = str_replace("Á", "A", $cadena); 
	$cadena = str_replace("É", "E", $cadena); 
	$cadena = str_replace("Í", "I", $cadena); 
	$cadena = str_replace("Ó", "O", $cadena); 
	$cadena = str_replace("Ú", "U", $cadena); 
	$cadena = str_replace("Ñ", "N", $cadena); 
	return ($cadena); 
}  


public function SendMAIL($para,$subject,$body){
	if($para!=""){

		require_once "Mailer/class.phpmailer.php";
		$mail = new phpmailer();

		$mail->Host = "mail.tailoy.com.pe"; // 190.223.36.133
		$mail->Username = "postmaster1";
		$mail->Password = "tl86pt56";

		$mail->From = "postmaster1@tailoy.com.pe";
		$mail->FromName = "Tai Loy - Zona Proveedores";
		$mail->AltBody = "Hola, tienes un nuevo mensaje de Tai Loy";
		$mail->Subject = utf8_decode($subject);

		$mail->Body = utf8_decode($body);
	
		
		$mail->PluginDir = "";
		$mail->Mailer = "smtp";
		$mail->SMTPAuth = true;
		$mail->Timeout=20;
		
		$mail->AddAddress($para);

		$exito = $mail->Send(); 
		$intentos=1; 
		while ((!$exito) && ($intentos < 5))
		{
			sleep(1); 
			$exito = $mail->Send();
			if($exito)
				{break;}
		   $intentos=$intentos+1;
		}
     if(!$exito)
     	{	return false;	} 
     else
	 	{	return true;	} 
	}
	else
	{ return true; }
}


public function CorreoTailoy(){
	return "postmaster1@tailoy.com.pe";
}


public function FormatoCorreo($mensaje){
	$Cuerpo1='<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"><html xmlns="http://www.w3.org/1999/xhtml"><head><meta http-equiv="Content-Type" content="text/html; charset=utf-8" /><title></title></head><body style="text-align:center; margin:0;"><table width="600px" cellpadding="0" cellspacing="0"><tr><td bgcolor="#009b48" width="100px" rowspan="2" valign="top"><img src="http://www.tailoy.com.pe/MODpercepcion/inc/img/TaiLoy.jpg" width="100" height="89" /></td><td bgcolor="#009b48" width="480px"></td><td bgcolor="#009b48" width="20px"></td></tr><tr><td style="font-family:Verdana, Geneva, sans-serif; font-size:10px; color:#333; text-align:left;"><table cellpadding="0" cellspacing="0" width="100%"><tr><td height="20" bgcolor="#009b48" colspan="2"></td></tr><tr><td width="10px" height="10px"></td><td></td></tr><tr><td></td><td>';
	$Cuerpo2='</td></tr></table></td><td bgcolor="#009b48" ></td></tr><tr>
	<td bgcolor="#ffdd00" style="color:#009b48; font-family:Verdana, Geneva, sans-serif; font-size:10px;" colspan="3">Tai Loy © Todos los derechos reservados 2013</td></tr></table></body></html>';
	return 	$Cuerpo1.$mensaje.$Cuerpo2;
}



public function sumaDia($fecha,$dia,$formato)  // FECHA = 2004-02-27
{	list($year,$mon,$day) = explode('-',$fecha);

	switch ($formato) {
    case 1:	$Fecha_Final = date('d-m-Y',mktime(0,0,0,$mon,$day+$dia,$year));	break;
    case 2:	$Fecha_Final = date('d/m/Y',mktime(0,0,0,$mon,$day+$dia,$year));	break;
    case 3:	$Fecha_Final = date('d.m.Y',mktime(0,0,0,$mon,$day+$dia,$year));	break;
	}

	
	return $Fecha_Final;		
}


function FormatoDireccion($Direccion){

	$dato_dir1 = trim(substr($Direccion,0,44));
	$dato_dir2 = " - Nro. (".trim(substr($Direccion,44,5)).")";

	if(trim(substr($Direccion,49,7))!=""){
		$dato_dir3 = " - Interior (".trim(substr($Direccion,49,7)).")";
	}else{
		$dato_dir3 = "";
	}

	if(trim(substr($Direccion,56,2))!="00"){
		$dato_dir4 = " - Piso (".trim(substr($Direccion,56,2)).")";
	}else{
		$dato_dir4 = "";
	}

	if(trim(substr($Direccion,59,1))=="S"){
		$dato_dir5 = " S/N";
	}else{
		$dato_dir5 = "";
	}

	return $dato_dir1." ".$dato_dir2.$dato_dir3.$dato_dir4.$dato_dir5;
}


function FormatoFecha($Fecha){
	if(strlen($Fecha)==8){
		$anio= substr($Fecha,0,4);
		$mes = substr($Fecha,4,2);
		$dia = substr($Fecha,6,2);
		$NuevaFecha = $dia."/".$mes."/".$anio;
	}else{
		$NuevaFecha = "";
	}
	return $NuevaFecha;
}



public function Paginacion($Actual, $total, $Amostrar, $columnas){

	$Amostrar=$Amostrar+1;
	$PagUlt=$total/$Amostrar;
 	$Res=$total%$Amostrar;
 	if($Res>0){
		$PagUlt=floor($PagUlt)+1;
		//$PagUlt=ceil($PagUlt)+1;
	}


	echo "<tr bgcolor='#E8E8E8' class='texto_tablas'>
			<td colspan='".$columnas."' height='10'>";
	echo "<b>Cant. de Registros:</b>  ".$total;		
	echo "<br><b>Nro. de P".utf8_decode("á")."ginas:</b>  ".$PagUlt;		
	echo "<br><b>P".utf8_decode("á")."ginas:&nbsp&nbsp&nbsp</b>  ";		
	
if($Actual>=2) {echo "<a class='LinkPaginado' href=# onclick=\"listar('1')\">Primero</a>&nbsp&nbsp&nbsp";}

for ( $i = ($Actual-5) ; $i < $Actual ; $i ++)
	{if($i>0)echo " <a class='LinkPaginado' href=# onclick=\"listar('$i')\">$i</a>&nbsp&nbsp";}
echo "<strong>".$Actual."&nbsp</strong>";
for ( $i = ($Actual+1) ; $i < ($Actual+6) ; $i ++)
	{if($i<=$PagUlt)echo " <a class='LinkPaginado' href=# onclick=\"listar('$i')\">$i</a>&nbsp&nbsp";}

if($Actual<$PagUlt) {echo "<a class='LinkPaginado' href=# onclick=\"listar('$PagUlt')\">Ultimo</a>&nbsp&nbsp&nbsp";}

echo "</td></tr></table>";
}




public function Paginacion2($Actual, $total, $Amostrar, $columnas){

	$Amostrar=$Amostrar+1;
	$PagUlt=$total/$Amostrar;
 	$Res=$total%$Amostrar;
 	if($Res>0){
		$PagUlt=floor($PagUlt)+1;
		//$PagUlt=ceil($PagUlt)+1;
	}


	echo "<tr bgcolor='#E8E8E8' class='texto_tablas'>
			<td colspan='".$columnas."' height='10'>";
	echo "<b>Cant. de Registros:</b>  ".$total;		
	echo "<br><b>Nro. de P".utf8_decode("á")."ginas:</b>  ".$PagUlt;		
	echo "<br><b>P".utf8_decode("á")."ginas:&nbsp&nbsp&nbsp</b>  ";		
	
if($Actual>=2) {echo "<a class='LinkPaginado' href=# onclick=\"listar('1')\">Primero</a>&nbsp&nbsp&nbsp";}

for ( $i = ($Actual-5) ; $i < $Actual ; $i ++)
	{if($i>0)echo " <a class='LinkPaginado' href=# onclick=\"listar('$i')\">$i</a>&nbsp&nbsp";}
echo "<strong>".$Actual."&nbsp</strong>";
for ( $i = ($Actual+1) ; $i < ($Actual+6) ; $i ++)
	{if($i<=$PagUlt)echo " <a class='LinkPaginado' href=# onclick=\"listar('$i')\">$i</a>&nbsp&nbsp";}

if($Actual<$PagUlt) {echo "<a class='LinkPaginado' href=# onclick=\"listar('$PagUlt')\">Ultimo</a>&nbsp&nbsp&nbsp";}

echo "</td></tr></table>";
}

function calcularEdad($fechaNac){
	
	$dias = explode("-", $fechaNac, 3);
	$DIAS = mktime(0,0,0,$dias[1],$dias[0],$dias[2]);	
	$edad = (int)((time()-$DIAS)/31556926);
	
	return $edad;
}

function diaSemana($ano, $mes, $dia){
	
	// 0->domingo	 | 6->sabado
	$dia = date("w", mktime(0, 0, 0, $mes, $dia, $ano));
		
	return $dia;
}



private $sinonimosAS4 = array(
" ACORD "," ADH "," AUTOADH "," ALFABET "," ALFAB ","ALMOH ","+ALMOH)"," AMARI "," AMARI(",")AMARI "," AMARILL(",".AMARIL ","ARCHIV ",
"ARCHIV."," ABRECART "," AUTOCOP "," AMAR ",
"BANDERIT P"," BLANC "," BLCO "," C/BLCO ","BOLIG ","+2BOLIG+",
"CALCULA "," CART ","CARTUL ","CAJA D SEGUR METAL"," CIENTIF "," CIENTIFI ","COMPAS MET "," CONS ","CUAD 180H "," CUAD UNIV ","CUAD ",
" CUADR "," T/CUAD "," CUADR."," C TAPA"," C INDICE "," C/ACC"," C/B "," C/DEPO "," C/ESPIR "," C/GRIP "," C/LIGA ","CINTA P ROTULAR",
" C/CARAT ",
" D MADERA "," DIGI ","DISPENS ","DOB ","D/T C/GUS"," D METAL ","DISCO DURO EXT ",
" EMBALAJ "," ESPIR ","ETIQ ","EMPAST ","ENGRAP ","ESPEC "," EMP ",
" FAB ","FILE MOD PRESENT ","FORM CONT ","FOTOC ","FOTOGRAF "," FOSF ","FILE MOD ORDENADOR",
" GRAP ",
" HIGIEN ",
" L/ANCHO "," L/ANCH "," L/ANGOS ","LIB ACTAS ","LIB REG ","LIB "," LIQ "," LAMIN ",
" NUM "," NUME ",
" OF ",
" PLASTIC "," PLASTIF ","PELIC FAX "," PORTAM "," PLAST "," P POST IT "," P CINTA "," PEGAFAN P IMP "," PAPEL HIG "," PERFOR "," P/GRUESA ",
" P REDON "," PORTAM ",
"RESALT "," REVIST "," RETRAC ",
"S/B "," SOL ",
"TRANSP "," TRENG "," TECN "," TRIANG ","T.T C/F","T.T C/GUS","T/LIQ","T/LAPIC P MET","TAMPON P HUELLA DIG.",
" UNIV ",
"00 TARJ"," 2 ANIL "," 3 ANIL ");


private $sinonimosWEB = array(
" ACORDEON "," ADHESIVO(A) "," AUTOADHESIVO(A) "," ALFABETICO "," ALFABETICO ","ALMOHADILLA ","+ALMOHADILLA)"," AMARILLO "," AMARILLO(",
")AMARILLO "," AMARILLO(",".AMARILLO ","ARCHIVADOR ","ARCHIVADOR."," ABRECARTA "," AUTOCOPIATIVO "," AMARILLO ",
"BANDERITAS P"," BLANCA(O) "," BLANCO "," COLOR BLANCO ","BOLIGRAFO ","+2BOLIGRAFO+",
"CALCULADORA "," CARTA ","CARTULINA ","CAJA DE SEGURIDAD DE METALICA"," CIENTIFICA "," CIENTIFICA ","COMPAS METALICO "," CONSOLA ",
" 180H "," UNIVERSAL ","CUADERNO "," CUADRICULADO "," TIPO CUADERNO "," CUADRICULADO."," CON TAPA"," CON INDICE "," CON ACCESORIOS",
" CON BORRADOR "," CON DEPOSITO "," CON ESPIRAL "," CON GRIP "," CON LIGA ","CINTA PARA ROTULAR"," CON CARATULA ",
" DE MADERA "," DIGITOS ","DISPENSADOR ","DOBLE ","DOBLE TAPA CON GUSANITO"," DE METAL ","DISCO DURO EXTERNO ",
" EMBALAJE "," ESPIRAL ","ETIQUETA(S) ","EMPASTADO ","ENGRAPADOR ","ESPECIAL "," EMPASTADA ",
" FABER CASTELL ","FILE MODELO PRESENTACION ","FORMATO CONTINUO ","FOTOCOPIA ","FOTOGRAFICO "," FOSFORESCENTE ","FILE MODELO ORDENADOR",
" GRAPADO ",
" HIGIENICO ",
" LOMO ANCHO "," LOMO ANCHO "," LOMO ANGOSTO ","LIBRO DE ACTAS ","LIBRO REGISTRO DE ","LIBRO "," LIQUID "," LAMINADA ",
" NUMERICO "," NUMERADO ",
" OFICIO ",
" PLASTICO "," PLASTIFICADO(A) ","PELICULA PARA FAX "," PORTAMINAS "," PLASTICO(A) "," PARA POST IT "," PARA CINTA "," PEGAFAN PARA IMPRESORA ",
" PAPEL HIGIENICO "," PERFORADOR "," PUNTA GRUESA "," PUNTA REDONDA ","	PORTAMINAS ",
"RESALTADOR "," REVISTERO "," RETRACTIL ",
"SIN BORRADOR "," SOLIDO ",
"TRANSPARENTE "," TRIPLE RENGLON "," TECNICO "," TRIANGULO ","TAPA TRANSPARENTE CON FASTENER","TAPA TRANSPARENTE CON GUSANITO","TAMPON PARA HUELLA DIGITAL",
"TINTA LIQUIDA","TIPO LAPICERO PUNTA METAL",
" UNIVERSAL ",
"00 TARJETAS", " 2 ANILLOS "," 3 ANILLOS ");

function sinonimos_presentacion($TEXTO){
	return str_replace($this->sinonimosAS4,$this->sinonimosWEB,$TEXTO);
}




public function SendMAILFinalizado($para,$subject,$body,$dnicesado,$nombres,$cargo,$tienda){
	if($para!=""){
	
		$nombrescorreo=utf8_decode($nombres);
	
	
		require_once "Mailer/class.phpmailer.php";
		//require_once "Mailer/PHPMailerAutoload.php";
		$mail = new phpmailer();
		

		$mail->Host = "mail.tailoy.com.pe"; // 190.223.36.133
		$mail->Username = "postmaster1";
		$mail->Password = "tl86pt56";
				
	
		$mail->From = "postmaster1@tailoy.com.pe";
		$mail->FromName = "Registro de Cese Finalizado ".$dnicesado." - ".$nombrescorreo." - ".$cargo." - ".$tienda;
		$mail->AltBody = "Hola, tienes un nuevo mensaje de Tai Loy";
		$mail->Subject = utf8_decode($subject);
		
		$mail->Body = utf8_decode($body);
				
		$mail->PluginDir = "";
		$mail->Mailer = "smtp";
		$mail->SMTPAuth = true;
		$mail->Timeout=20;
		
		$mail->AddAddress($para);
		
		$exito = $mail->Send(); 
		$intentos=1; 
		while ((!$exito) && ($intentos < 5))
		{
			sleep(1); 
			$exito = $mail->Send();
			if($exito)
				{break;}
		   $intentos=$intentos+1;
		}
     if(!$exito)
     	{	return false;	} 
     else
	 	{	return true;	} 
	}
	else
	{ return true; }


}




public function SendMAILRechazado($para,$subject,$body,$dnicesado,$nombres,$cargo,$tienda){
	if($para!=""){
	
		$nombrescorreo=utf8_decode($nombres);
	
	
		require_once "Mailer/class.phpmailer.php";
		//require_once "Mailer/PHPMailerAutoload.php";
		$mail = new phpmailer();
		

		$mail->Host = "mail.tailoy.com.pe"; // 190.223.36.133
		$mail->Username = "postmaster1";
		$mail->Password = "tl86pt56";
				
	
		$mail->From = "postmaster1@tailoy.com.pe";
		$mail->FromName = "Cese Rechazado ".$dnicesado." - ".$nombrescorreo." - ".$cargo." - ".$tienda;
		$mail->AltBody = "Hola, tienes un nuevo mensaje de Tai Loy";
		$mail->Subject = utf8_decode($subject);
		
		$mail->Body = utf8_decode($body);
				
		$mail->PluginDir = "";
		$mail->Mailer = "smtp";
		$mail->SMTPAuth = true;
		$mail->Timeout=20;
		
		$mail->AddAddress($para);
		
		$exito = $mail->Send(); 
		$intentos=1; 
		while ((!$exito) && ($intentos < 5))
		{
			sleep(1); 
			$exito = $mail->Send();
			if($exito)
				{break;}
		   $intentos=$intentos+1;
		}
     if(!$exito)
     	{	return false;	} 
     else
	 	{	return true;	} 
	}
	else
	{ return true; }


}









public function SendMAILSolicitudAceptada($para,$subject,$body,$dnicesado,$nombres,$cargo,$tienda){
	if($para!=""){
	
		$nombrescorreo=utf8_decode($nombres);
	
	
		require_once "Mailer/class.phpmailer.php";
		//require_once "Mailer/PHPMailerAutoload.php";
		$mail = new phpmailer();
		

		$mail->Host = "mail.tailoy.com.pe"; // 190.223.36.133
		$mail->Username = "postmaster1";
		$mail->Password = "tl86pt56";
				
	
		$mail->From = "postmaster1@tailoy.com.pe";
		$mail->FromName = "Solicitud de Modificacion Aceptada ".$dnicesado." - ".$nombrescorreo." - ".$cargo." - ".$tienda;
		$mail->AltBody = "Hola, tienes un nuevo mensaje de Tai Loy";
		$mail->Subject = utf8_decode($subject);
		
		$mail->Body = utf8_decode($body);
				
		$mail->PluginDir = "";
		$mail->Mailer = "smtp";
		$mail->SMTPAuth = true;
		$mail->Timeout=20;
		
		$mail->AddAddress($para);
		
		$exito = $mail->Send(); 
		$intentos=1; 
		while ((!$exito) && ($intentos < 5))
		{
			sleep(1); 
			$exito = $mail->Send();
			if($exito)
				{break;}
		   $intentos=$intentos+1;
		}
     if(!$exito)
     	{	return false;	} 
     else
	 	{	return true;	} 
	}
	else
	{ return true; }


}









public function SendMAILEncuestaSalidaTodos($para,$subject,$body,$dnicesado,$nombres,$cargo,$tienda){
	if($para!=""){
	
		$nombrescorreo=utf8_decode($nombres);
	
	
		require_once "Mailer/class.phpmailer.php";
		//require_once "Mailer/PHPMailerAutoload.php";
		$mail = new phpmailer();
		
/*
		$mail->Host = "mail.tailoy.com.pe"; // 190.223.36.133
		$mail->Username = "postmaster1";
		$mail->Password = "tl86pt56";
	*/
 
		$mail->Host = "mail.trabajaentailoy.com.pe"; // 190.223.36.133
		$mail->Username = "contactenos@trabajaentailoy.com.pe";
		$mail->Password = "Pwtac17";
	
	
		$mail->From = "contactenos@tailoy.com.pe";
		$mail->FromName = "Encuesta de Salida ".$dnicesado." - ".$nombrescorreo." - ".$cargo." - ".$tienda;
		$mail->AltBody = "Hola, tienes un nuevo mensaje de Tai Loy";
		$mail->Subject = utf8_decode($subject);
		
		$mail->Body = utf8_decode($body);
				
		$mail->PluginDir = "";
		$mail->Mailer = "smtp";
		$mail->SMTPAuth = true;
		$mail->Timeout=20;
		
		$mail->AddAddress($para);
		
		$exito = $mail->Send(); 
		$intentos=1; 
		while ((!$exito) && ($intentos < 5))
		{
			sleep(1); 
			$exito = $mail->Send();
			if($exito)
				{break;}
		   $intentos=$intentos+1;
		}
     if(!$exito)
     	{	return false;	} 
     else
	 	{	return true;	} 
	}
	else
	{ return true; }


}







public function MAILCUPON($para,$subject,$body){
	if($para!=""){
	
		$nombrescorreo=utf8_decode($nombres);
	
	
		require_once "Mailer/class.phpmailer.php";
		//require_once "Mailer/PHPMailerAutoload.php";
		$mail = new phpmailer();
		
/*
		$mail->Host = "mail.tailoy.com.pe"; // 190.223.36.133
		$mail->Username = "postmaster1";
		$mail->Password = "tl86pt56";
	*/
 
		$mail->Host = "mail.trabajaentailoy.com.pe"; // 190.223.36.133
		$mail->Username = "contactenos@trabajaentailoy.com.pe";
		$mail->Password = "Pwtac17";
	
	
		$mail->From = "contactenos@tailoy.com.pe";
		$mail->FromName = "Feliz dia de la Mujer";
		$mail->AltBody = "Hola, tienes un nuevo mensaje de Tai Loy";
		$mail->Subject = utf8_decode($subject);
		
		$mail->Body = utf8_decode($body);
				
		$mail->PluginDir = "";
		$mail->Mailer = "smtp";
		$mail->SMTPAuth = true;
		$mail->Timeout=20;
		
		$mail->AddAddress($para);
		
		$exito = $mail->Send(); 
		$intentos=1; 
		while ((!$exito) && ($intentos < 5))
		{
			sleep(1); 
			$exito = $mail->Send();
			if($exito)
				{break;}
		   $intentos=$intentos+1;
		}
     if(!$exito)
     	{	return false;	} 
     else
	 	{	return true;	} 
	}
	else
	{ return true; }


}















public function ENVIARPORBLUE($para,$subject,$body){
	if($para!=""){
	
		include "Mailer/Mailin.php";
		$mailin = new Mailin("jadrianzen@tailoy.com.pe", "4yJISjXrcDm8BVMz");
		$mailin->
		//addTo("slash_07_25@hotmail.com", "Jhon Adrianzen")->
		addTo($para)->
		//addCc($para)-> 
		setFrom("notificaciones-rrhh@tailoy.com.pe", "Tai Loy")->
		//setReplyTo("postmaster1@tailoy.com.pe","Tai Loy")->
		setSubject($subject)->
		setHtml($body);
		$res = $mailin->send();

}


}


public function EnviarConfirmacion2($para,$subject,$body){
	if($para!=""){
	
		include "Mailer/Mailin.php";
		$mailin = new Mailin("jadrianzen@tailoy.com.pe", "4yJISjXrcDm8BVMz");
		$mailin->
		//addTo("slash_07_25@hotmail.com", "Jhon Adrianzen")->
		addTo($para)->
		//addCc($para)-> 
		setFrom("contactenos@tailoy.com.pe", "Tai Loy")->
		//setReplyTo("postmaster1@tailoy.com.pe","Tai Loy")->
		setSubject($subject)->
		setHtml($body);
		$res = $mailin->send();

}


}







}?>
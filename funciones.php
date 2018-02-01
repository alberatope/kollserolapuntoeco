<?php

	function pintarform($tema, $variables)
	{
		//var_dump($variables);
		extract($variables);
		eval("?>".$tema."<?");
	}

	function pintar($tema, $variables)
	{
		//var_dump($variables);
		extract($variables);
		eval("?>".$tema."<?");
	}

	/*FUNCIONES FORO*/

	function parsearTags($mensaje)
	{
		$mensaje = str_replace("[citar]", "<blockquote><hr width='100%' size='2'>", $mensaje);
		$mensaje = str_replace("[/citar]", "<hr width='100%' size='2'></blockquote>", $mensaje);
		return $mensaje;
	}


	function leerlafecha($fechaentrada, $idioma) {

		//El programa interpreta la variable $fechaentrada que ha de venir en formato : aaaa-mm-dd
		//devuelve variables en el idioma dado por la variable $idioma que puede valer 'cas' o 'cat'
		//Así podremos leer la fecha en formato humanoide.
		
		date_default_timezone_set('Europe/Madrid');	//Esta definicion de la zona horaria me la pide el php del hosting en freehostia.com para dejarme usar strtotime en el script
		
		//Dependiendo del idioma definimos los nombres de los meses del año y los dias de la semana
		if ($idioma == 'cat' or empty($idioma)) {$anno = array ("gener", "febrer", "març", "abril", "maig", "juny", "juliol", "agost", "setembre", "octubre", "novembre", " desembre "); $dias = array ('', 'Dilluns', 'Dimarts', 'Dimecres', 'Jueves', 'Divendres', 'Dissabte', 'Diumenge');}
		else if ($idioma == 'cas') {$anno = array("enero", "febrero", "marzo", "abril","mayo","junio","julio","agosto","septiembre","octubre","noviembre","diciembre"); $dias = array('','Lunes','Martes','Miercoles','Jueves','Viernes','Sabado','Domingo');}
		
		if (empty($fechaentrada)==false){
			$dia = substr ($fechaentrada, 8 , 2  );                  //número del dia
			$mesnumerico = substr($fechaentrada,5,2);                //número del mes
			$ano = substr ($fechaentrada,0,4);                       //número del año
			$indicemes = intval($mesnumerico) - 1;
			$nombremes = $anno[$indicemes];                                      //nombre del mes en el idioma escojido
			$nombredia = $dias[date('N', strtotime($fechaentrada))]; //nombre del dia en el idioma elejido
		}
		
		  return array ($dia,$mesnumerico,$ano,$nombremes,$nombredia);
		
	}
	
?>

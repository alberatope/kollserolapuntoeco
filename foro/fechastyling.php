<?	
	//El programa interpreta la variable $fecha, definida con formato : "aaaa-mm-dd hh:mm:ss"
	//y devuelve todas estas variables para poder leer la fecha en formato humanoide.
	//Si se le envía vía php una variable $_POST['idioma']=cas/cat/eng devolverá los campos linguisticos en castellano/catalán/inglés
	
	//Esta idiotilla definicion de la zona horaria me la pide el php del hosting en freehostia.com
	//para dejarme usar strtotime en el script
	date_default_timezone_set('Europe/Madrid');
	
	//Dependiendo del idioma definimos los nombres de los meses del año y los dias de la semana
	if ($_POST['idioma'] == cas or empty($_POST["idioma"])) {$anno = array("enero", "febrero", "marzo", "abril","mayo","junio","julio","agosto","septiembre","octubre","noviembre","diciembre"); $dias = array('','Lunes','Martes','Miercoles','Jueves','Viernes','Sabado','Domingo');}
	else if ($_POST["idioma"] == cat ) {$anno = array ("gener", "febrer", "març", "abril", "maig", "juny", "juliol", "agost", "setembre", "octubre", "novembre", " desembre "); $dias = array ('', 'Dilluns', 'Dimarts', 'Dimecres', 'Jueves', 'Divendres', 'Dissabte', 'Diumenge');}
	else if ($_POST['idioma'] == eng) {$anno = array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"); $dias = array ('', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday');}
	
	if (empty($fecha)==false){
		$dia = substr ($fecha, 8 , 2  );                  //número del dia
		$mesnumerico = substr($fecha,5,2);                //número del mes
		$ano = substr ($fecha,0,4);                       //número del año
		$hora = substr ($fecha,11,2);                     //número de la hora (formato 24)
		$minutos = substr ($fecha,14,2);                  //número de minutos
		$segundos = substr ($fecha,17,2);                 //número de segundos
		$indicemes = intval($mesnumerico) - 1;
		$mes = $anno[$indicemes];                         //nombre del mes en el idioma escojido
		$nombredia = $dias[date('N', strtotime($fecha))]; //nombre del dia en el idioma elejido
	}

	//formato 1: '18 de diciembre a las 17:00'
	$fechaformato1 = $dia.' de '.$mes.' a las '.$hora.':'.$minutos;
?>



<!--*alber' script-->
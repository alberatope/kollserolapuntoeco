//DICCIONARIO castellano-catalá para Kollserola.eco


//PREPARACIÓN:...............................................................................................................

	//Numero total de textitos: ¡Cada vez que añadamos un textito habrá que cambiar la variable total!
	var total = 52;
	
	//Cada lengua un array:
	txtcas = new Array(total); txtcat = new Array(total);
	
	//FUNCIONES TRADUCTORAS:

	function alcas(){
		//Maneja botones
		document.getElementById('botoncas').style.border = '1px solid #cddc39';
		document.getElementById('botoncat').style.border = '1px solid grey';

		//Traduce todo al castellano
		for(var i=1; i<=total; i++) {
		if (document.getElementById('txt'+i) != null) document.getElementById('txt'+i).innerHTML = txtcas[i];
		}
		
		//deja constancia del idioma elejido para que pueda ser enviado desde formularios y se mantenga tras la recarga.
		//intenté hacerlo con getElementsByclass pero no me salió. Sería bueno re-intentarlo.
		//document.getElementById('marcadorLengua1').value = 'cas';
		//document.getElementById('marcadorLengua2').value = 'cas';
	}

	function alcat(){
		//Botones
		document.getElementById('botoncat').style.border = '1px solid #cddc39';
		document.getElementById('botoncas').style.border = '1px solid grey';
		
		//Traducció al catalá
		for(var i=1; i<=total; i++) {
		if (document.getElementById('txt'+i) != null) document.getElementById('txt'+i).innerHTML = txtcat[i];
		}	
		
		//deja constancia del idioma elejido para que pueda ser enviado desde formularios y se mantenga tras la recarga
		//document.getElementById('marcadorLengua1').value = 'cat';
		//document.getElementById('marcadorLengua2').value = 'cat';
	}
	
	
//DICCIONARIO:..................................................................................................................

	//cabeceraweb.php
	
		txtcas[1] = 'Red de Autogestión de Collserola'; txtcat[1] = 'Xarxa d´Autogestió de Collserola';
		txtcas[2] = 'info-kollserola'; txtcat[2] = 'info-kollserola';
		txtcas[3] = 'foro'; txtcat[3] = 'foro';
		txtcas[4] = 'Publicar info:'; txtcat[4] = 'Publicar info:';
		txtcas[5] = 'Añadir<br><font size="-1">punto a la red</font>'; txtcat[5] = 'Afegir<br><font size="-1">punt a la xarxa</font>';
	
	//index.php
	
		txtcas[49] = "Ver y contribuir al código"; txtcat[49] = 'Veure i contribuir al codi';
		txtcas[50] = "El código de la página es abierto y está en Github:"; txtcat[50] = 'El codi de la pàgina és obert i està en Github:';
		txtcas[51] = "Estamos trabajando en la página: cualquier feedback es bienvenido en kollserola@openmailbox.org"; txtcat[51] = 'Estem treballant a la pàgina: qualsevol feedback és benvingut a kollserola@openmailbox.org';

	
	//semanario

		txtcas[6] = 'Eventos y convocatorias'; txtcat[6] = 'Esdeveniments i convocatòries';
		txtcas[7] = 'Imprimir<font size="-1"><br> en papel o pdf</font>'; txtcat[7] = 'Imprimir<font size="-1"><br> en paper o pdf</font>';
		txtcas[9] = 'Otros colectivos, comunidades, y contactos de la Asamblea de Kollserola'; txtcat[9] = 'Altres col·lectius, comunitats i contactes de l´Assemblea de Kollserola';
		txtcas[52] = 'Actividades de periocidad semanal'; txtcat[52] = 'Activitats de periodicitat setmanal';
	
	//fichakolectivo
	
		txtcas[10] = 'Actividades en la semana'; txtcat[10] = 'Activitats a la setmana';
		txtcas[11] = 'Descripción o manifiesto'; txtcat[11] = 'Descripció o manifiesto';
		txtcas[12] = 'Datos generales'; txtcat[12] = 'Dades generals';
		txtcas[42] = 'Publicar evento'; txtcat[42] = 'Publicar esdeveniment';
		
		
		txtcas[13] = "Cerrar<br><font size='-1'>sesión</font>"; txtcat[13] = "Tancar<br><font size='-1'>sessió</font>";
		txtcas[14] = 'Añadir Colectivo / Comunidad / Contacto a la red de autogestión de Kollserola:'; txtcat[14] = 'Afegir Col·lectiu / Comunitat / Contacte a la xarxa d´autogestió de Kollserola:';
		txtcas[38] = "Colectivos, comunidades y personas que estamos apostando por la autonomía, la autogestión, la okupación y la vida comunitaria en Collserola publicamos aquí jornadas, comunicados y actividades.";
			txtcat[38] = "Col·lectius, comunitats i persones que estem apostant per l'autonomia, l'autogestió, l'okupació i la vida comunitària a Collserola publiquem aquí jornades, comunicats i activitats.";
		txtcas[15] = 'password (será necesario para editar estos datos y las publicaciones)'; txtcat[15] = 'password (serà necessari per a editar aquestes dades i les publicacions)';
		
		txtcas[16] = 'lunes'; txtcat[16] = 'dilluns';
		txtcas[17] = 'martes'; txtcat[17] = 'dimarts';
		txtcas[18] = 'miercoles'; txtcat[18] = 'dimercres';
		txtcas[19] = 'jueves'; txtcat[19] = 'dijous';
		txtcas[20] = 'viernes'; txtcat[20] = 'divendres';
		txtcas[21] = 'sabado'; txtcat[21] = 'dissabte';
		txtcas[22] = 'domingo'; txtcat[22] = 'diumenge';
		txtcas[23] = 'lunes'; txtcat[23] = 'dilluns';
		txtcas[24] = 'martes'; txtcat[24] = 'dimarts';
		txtcas[25] = 'miercoles'; txtcat[25] = 'dimercres';
		txtcas[26] = 'jueves'; txtcat[26] = 'dijous';
		txtcas[27] = 'viernes'; txtcat[27] = 'divendres';
		txtcas[28] = 'sabado'; txtcat[28] = 'dissabte';
		txtcas[29] = 'domingo'; txtcat[29] = 'diumenge';

		txtcas[30] = 'Flyers'; txtcat[30] = 'Flyers';
		txtcas[31] = 'Flyers'; txtcat[31] = 'Flyers';
		txtcas[32] = 'Flyers'; txtcat[32] = 'Flyers';
		
		
		txtcas[39] = 'un día'; txtcat[39] = 'un dia';
		txtcas[40] = 'dos días'; txtcat[40] = 'dos dies';
		txtcas[41] = 'varios días'; txtcat[41] = 'diversos dies';
		txtcas[43] = 'y'; txtcat[43] = 'i';
		txtcas[44] = 'del'; txtcat[44] = 'del';
		txtcas[45] = 'al'; txtcat[45] = 'al';
		
		
		
		
	//flyers

		txtcas[8] = 'flyers'; txtcat[8] = 'flyers';
		txtcas[33] = 'filtrar por colectivo'; txtcat[33] = 'filtrar per col·lectiu';
		txtcas[34] = 'No hay ningún evento publicado... ¿Sabes de alguno? ¡Haznoslo saber!'; txtcat[34] = 'No hi ha cap esdeveniment publicat ... Saps d`algun? ¡Fes-nos-ho saber!';
		txtcas[35] = 'lo que va a pasar'; txtcat[35] = 'el que passarà';
		txtcas[36] = 'lo que ya fué'; txtcat[36] = 'el que ja va ser';
		txtcas[37] = 'filtrar por colectivo:'; txtcat[37] = 'filtrar per col·lectiu:';
		
		txtcas[46] = 'del'; txtcat[46] = 'del';
		txtcas[47] = 'al'; txtcat[47] = 'al';
		txtcas[48] = 'y'; txtcat[48] = 'i';

		//Si añades algun texto, no olvides cambiar la variable <<total>>!!
		

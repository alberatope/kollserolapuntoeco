<?
	//Corremos el script solo si existe el archivo a subir
	
	if (empty($_FILES["archivofly"]["tmp_name"]) == false){
	
		//DATOS DEL ARCHIVO QUE SE VA A SUBIR
		
			$local = $_FILES["archivofly"]["name"];//nombre del archivo flyer en el ordenador local del usuario		
			$remoto = $_FILES["archivofly"]["tmp_name"]; //nombre temporal del archivo en el servidor (tras ser elejido via input type=file)
			$tama = $_FILES["archivofly"]["size"];// El tamaño del archivo
			$extension = end(explode(".", $local));//la extensión del archivo (gif, jpg, etc)

				//COMPROVACIONES:
				
				//Extensión correcta?
				$mensa="<link rel='stylesheet' type='text/css' href='/supercss.css'/><div class='cabeceragrande' align='center'><h3>No se ha podido publicar:</h3>El archivo del flyer debe ser una imagen con una extensi&oacute;n .jpg, .jpeg, .gif o .png<br><br><a href='/?d=ficha'>Volver</a></div>";
				if (!in_array($extension, array('jpg','jpeg','gif','png'))){print $mensa ; exit;}
				
				//Mientras estemos en freehostia las imagenes tendran que ser inferiores a 500kb
				$pesomaxdearchivo = 499000;
				$mensa="<link rel='stylesheet' type='text/css' href='/supercss.css'/><div class='cabeceragrande'><h3>No se ha podido publicar:</h3>El archivo del flyer tiene que ser menor de 500kb. Son exijencias del servidor gratix que usamos. Lo arreglaremos pronto pero, por ahora, bájale un poco la resolución, porfa...<br><br><a href='/?d=ficha'>Volver</a></div>";
				if ($tama > $pesomaxdearchivo){print $mensa; exit;}
				
				//Otra cosa que aconsejan comprobar
				$mensa="<link rel='stylesheet' type='text/css' href='/supercss.css'/><div class='cabeceragrande'><h3>No se ha podido publicar:</h3>El archivo ".$local." parece haberse perdido...<br><br><a href='/?d=ficha'>Volver</a></div>";
				if (!is_uploaded_file($remoto)){print $mensa; exit;}


		//DATOS DEL ARCHIVO DESTINO		
			$ruta ="/home/www/kollserola.eco/nubedeflyers";
			$rutacorta="kollserola.eco/nubedeflyers";
			$rutaantiguos="kollserola.eco/nubedeflyers/antiguos";
	
			$flyytituloytexto = file_get_contents($local) . $_POST['titulodelflyer'] . $_POST['infodelflyer'];//texto para hacer el hash que será el nombre del archivo que almacenemos:
			$hashi = hash('md5', $flyytituloytexto);//hash
			$nombrito = $hashi . '.' . $extension;//nombre del archivo que guardaremos
			$futuro =$ruta . "/" . $nombrito;//ruta y nombre de archivo a guardar



			//CONEXION FTP		
			
			require('../configuracionftp.php');//conexión con la ftp


			//SUBIMOS EL FLYER AL FTP:

					copy($remoto,$futuro); //sobre-escribimos, por cierto.

				//cerramos la conexión FTP
				
					ftp_close($cid);	
					
			
		//DATOS A SUBIR A LA MYSQL
			
			require '../configuracion.php';
			
			$fechainicio = $_POST['fechainicio'];	
			$fechacaducidad = $_POST['fechacaducidad'];	
			$titulodelflyer = securite_bdd($_POST['titulodelflyer']);	
			$infodelflyer = securite_bdd($_POST['infodelflyer']);
			$undosvariosdias = $_POST['undosvariosdias'];
			
			//el kolectivo que está loggeado será el publicador:
			session_start(); $publicador = securite_bdd($_SESSION['kol']);
			
			//SUBIMOS LOS DATOS DEL FLYER A LA MYSQL:

			
			$orden="INSERT INTO flyers (publicador, fechaInicio, fechaCaducidad, unDosVariosDias, titulo, masInfo, archivoFlyer) VALUES ('$publicador', '$fechainicio', '$fechacaducidad','$undosvariosdias','$titulodelflyer',	'$infodelflyer','$nombrito')";
			
				/*orden a la base de datos*/
				$rs = mysql_query($orden, $con) or die("Hubo un error y la cosa no se publicó. Please feedback webmaster.");

	}
	
/*Salimos airosos*/
print "<h3>Evento publicado con éxito!</h3>";
Header("Refresh:1;url=../index.php?d=semana");
	
?>

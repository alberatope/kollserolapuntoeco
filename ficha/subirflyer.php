<?
	//El name del input type=file desde el que queremos subir el archivo es:
	$flyerasubir='archivoflyer'.$s;
	
	//Corremos el script solo si lo pide el user y existe el archivo a subir	
	if (empty($_FILES[$flyerasubir]["tmp_name"]) == false){
	
		//DATOS DEL ARCHIVO QUE SE VA A SUBIR
		
			$local = $_FILES[$flyerasubir]["name"];//nombre del archivo flyer en el ordenador local del usuario		
			$remoto = $_FILES[$flyerasubir]["tmp_name"]; //nombre temporal del archivo en el servidor (tras ser elejido via input type=file)
			$tama = $_FILES[$flyerasubir]["size"];// El tamaño del archivo
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
			$ruta ="/home/www/kollserola.eco/kolectivos/".$_SESSION['idkol']."/flyers";
			$rutacorta="kollserola.eco/kolectivos/".$_SESSION['idkol']."/flyers";
			$rutaantiguos="kollserola.eco/kolectivos/".$_SESSION['idkol']."/flyers/antiguos";
			$futuro =$ruta."/".$local;


			//CONEXION FTP		
			
			require('../configuracionftp.php');//conexión con la ftp		


			// DATOS DEL ARCHIVO DEL ANTERIOR FLYER-

				$flyercaducado = $variables['flyer'.$s];			
				$files = ftp_nlist($cid, $rutacorta);
				$caducadoconruta = $rutacorta."/".$flyercaducado;
				$caducadoenantiguos = $rutaantiguos."/".$flyercaducado;

			//con esto BORRARIAMOS el anterior flyer
			//if (in_array($flyercaducado, $files)) ftp_delete($cid, $caducadoconruta);
			
																				//print "local:";print $local; print"<br>";print "<br>";print "caducado:";print $flyercaducado;
																				//print "<br>"; var_dump($variables);
																				//print "<br>"; var_dump($files);
																				//print "<br>---------------<br>";
																			//	print $remoto;print"<br>";
																		//		print $futuro;exit;
			
				
				//MOVEMOS el antiguo flyer a antiguos, renombrándolo si es necesario:
				
					if (in_array($flyercaducado, $files) == true and !file_exists($caducadoenantiguos)) ftp_rename($cid,$caducadoconruta,$caducadoenantiguos);
					if (in_array($flyercaducado, $files) == true and file_exists($caducadoenantiguos)) ftp_rename($cid,$caducadoconruta,$caducadoenantiguos.'+');

				//SUBIMOS EL FLYER:

					copy($remoto,$futuro); //sobre-escribimos, por cierto.

				//declaramos que hemos subido el flyer para incluirlo en la orden mysql
				$recuerdoelflyer = ", flyer".$s."='".$local."'";
			
				//cerramos la conexión FTP
			ftp_close($cid);	
			
	}
	?>
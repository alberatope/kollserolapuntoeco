<?
	/*Carga variables necesarias*/
	$variables = $_POST;/*necesario pues no es legal indexar con variables la superglobal $_POST*/
	$s = $_POST['s'];
	/*Carga tambien las variables de sesion*/
	session_start();
	
		//DATOS DE LA ruta a borrar		
			$ruta ="/home/www/kollserola.eco/kolectivos/".$_SESSION['idkol']."/flyers";
			$rutacorta="kollserola.eco/kolectivos/".$_SESSION['idkol']."/flyers";
			$rutaantiguos="kollserola.eco/kolectivos/".$_SESSION['idkol']."/flyers/antiguos";
			$futuro =$ruta."/".$local;


			//CONEXION FTP		
			
			require('../configuracionftp.php');//conexión con la ftp		


			// DATOS DEl recuerdo en mysql

				$flyercaducado = $variables['flyer'.$s];			
				$files = ftp_nlist($cid, $rutacorta);
				$caducadoconruta = $rutacorta."/".$flyercaducado;
				$caducadoenantiguos = $rutaantiguos."/".$flyercaducado;

				
				//MOVEMOS el antiguo flyer a antiguos, renombrándolo si es necesario:
				
					if (in_array($flyercaducado, $files) == true and !file_exists($caducadoenantiguos)) ftp_rename($cid,$caducadoconruta,$caducadoenantiguos);
					if (in_array($flyercaducado, $files) == true and file_exists($caducadoenantiguos)) ftp_rename($cid,$caducadoconruta,$caducadoenantiguos.'+');

				//QUITAMOS EL FLYER de la carpeta de flyers actuales
				
					if (in_array($flyercaducado, $files)) ftp_delete($cid, $caducadoconruta);

				//cerramos la conexión FTP
				
					ftp_close($cid);		


			
			

				//QUITAMOS EL FLYER del recuerdo mysql
					$recuerdoelflyer = ", flyer".$s."=''";

			
					/*Carga la base de datos*/
						require ('../configuracion.php');

						/*Editar la mysql*/
						$edi = "UPDATE semanario SET ";

						$edi .= "flyer".$s."=''";

						$edi .= " WHERE id = '".$_SESSION['idkol']."' ";

						/*orden a la base de datos*/
						$rs = mysql_query($edi, $con) or die("No se pudo editar. ".mysql_error);


/*Salimos airosos*/
Header("Location: /index.php?d=ficha");
			
			
			
	?>
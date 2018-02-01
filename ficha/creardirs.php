<?
print 'estamos en creardirs.php';

	//Obtenemos la id que le ha sido otorgada al nuevo kolectivo
	$sql = "SELECT id, kolectivo FROM semanario WHERE kolectivo = '".$_POST['kolectivo']."';";
	$rs = mysql_query($sql, $con);$row = mysql_fetch_assoc($rs);
	extract($row);
	
	$id = $row['id'];
	
	

//Creamos su directorio ftp

			//CONEXION FTP		
			
			require('../configuracionftp.php');//conexión con la ftp		

			
			//Creamos el arbol de directorios del kolectivo:
				$rutatierra="kollserola.eco/kolectivos";
				$nuevoraiz=$rutatierra."/".$id;
				$nuevoflyers=$nuevoraiz."/flyers";
				$nuevoantiguos=$nuevoflyers."/antiguos";
				
				ftp_mkdir ($cid , $nuevoraiz); ftp_mkdir ($cid , $nuevoflyers);	ftp_mkdir ($cid , $nuevoantiguos);

			//cerramos la conexión FTP
			
				ftp_close($cid);	

?>
<?
	// Primero creamos un ID de conexión a nuestro servidor
	$cid = ftp_connect("localhost");	

	// Luego creamos un login al mismo con nuestro usuario y contraseña
	$resultado = ftp_login($cid, "***","***");

																				// Con esto comprobamos que se creo el Id de conexión y se pudo hacer el login
																				//if ((!$cid) || (!$resultado)) {
																				//	echo "Fallo en la conexión"; die;
																				//} else {
																				//	echo "Conectado.";
																				//}

	// Cambiamos a modo pasivo, esto es importante porque, de esta manera le decimos al 
	//servidor que seremos nosotros quienes comenzaremos la transmisión de datos.
	ftp_pasv ($cid, true) ;	
?>
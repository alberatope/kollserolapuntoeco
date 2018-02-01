<?//En este script comprobamos el pass y si todo está en orden logeamos al kolectivo:

//1) Recibimos las entradas del formulario de log:

	$kolectivo = $_POST["kolectivo"];
	$pazz = $_POST["pazzinside"];
	
	
//2) Buscamos los datos del colectivo en la SQL:

	require('../configuracion.php');
	$sql = "SELECT id, kolectivo, pazz FROM semanario WHERE kolectivo = '".$kolectivo."';";
	$kk = mysql_query($sql, $con);
	$row = mysql_fetch_assoc($kk);
	

//3a) Si el pass resultó correcto, definimos la session y vamos a la ficha del colectivo:

		if ($pazz == $row[pazz]) {	
			
				session_start();
				$_SESSION['kol'] = $kolectivo;
				$_SESSION['idkol']=$row['id'];

				Header("Location: /index.php?d=ficha");
		}
		
//3b) Caso contrario devolvemos pass error y retornamos al formulario de log:
		
		else {
			print "<script>javascript:alert('el pass no parece correcto!');window.location='/index.php?d=log';</script>";
		}

?>

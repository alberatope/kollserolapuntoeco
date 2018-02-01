<?
	session_start();
	if (isset($_SESSION['idkol'])) {
		$kolectivo=$_SESSION['kol'];
		$id=$_SESSION['idkol'];
			
		/* Ejecutamos la ejecución*/
		require('../configuracion.php');
		$rip = "DELETE FROM semanario WHERE id='".$id."' AND kolectivo='".$kolectivo."';";
		$kk = mysql_query($rip, $con);
		
		/*Deslogeamos el kolectivo eliminado:*/
		unset($_SESSION['idkol']);
		unset($_SESSION['kol']);
	}


/*Salimos airosos*/
Header("Location: /index.php");
?>
<?
require ('../configuracion.php');

//securización entradas:
$kolectivo = securite_bdd($_POST['kolectivo']);
$web = securite_bdd($_POST['web']);
$email = securite_bdd($_POST['email']);
$direccion = securite_bdd($_POST['direccion']);
$mensaje = securite_bdd($_POST['mensaje']);
$comunicado = securite_bdd($_POST['comunicado']);
$pazz= securite_bdd($_POST['pazz']);


// subida a la mysql:

$nue = "INSERT INTO semanario (kolectivo, web, email, direccion, mensaje, comunicado, pazz) VALUES ('$kolectivo','$web','$email','$direccion','$mensaje', '$comunicado', '$pazz')";
$rs = mysql_query($nue, $con);

if ($rs == true) {
	//creamos el arbol de directorios para el nuevo colectivo	
	include 'creardirs.php';
	
	//sesionizamos al nuevo colectivo
	$sql = "SELECT id, kolectivo, pazz FROM semanario WHERE kolectivo = '$kolectivo'";
	$kk = mysql_query($sql, $con); $row = mysql_fetch_assoc($kk);
	session_start(); $_SESSION['kol'] = $kolectivo; $_SESSION['idkol']=$row['id'];

	//Entramos sesionizados a la ficha del colectivo
	print "<h3>Benvingut, $kolectivo!</h3>";
	Header("Refresh:2;url=../index.php?d=ficha");	
	
}
else Header("Location: /index.php?d=semana");
?>
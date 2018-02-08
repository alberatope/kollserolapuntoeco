<?
session_start();//Carga las variables de sesión
require ('../configuracion.php');//Carga la base de datos Y la funcion securite_dbb

//securización entradas:

	$kolectivo = securite_bdd($_POST['kolectivo']);
	$web = securite_bdd($_POST['web']);
	$email = securite_bdd($_POST['email']);
	$direccion = securite_bdd($_POST['direccion']);
	$mensaje = securite_bdd($_POST['mensaje']);
	$idkol = $_SESSION['idkol'];
	$comprobarpazz = $_POST['oldpazz'];
	

//Si se está editando el password, comprobamos que todo está en orden:

if ($_POST['newpazz'] != '') {
	if (securite_bdd($_POST['newpazz']) == $_POST['newpazz']) {
		
		//buscamos el password antiguo
		$sql = "SELECT id, kolectivo, pazz FROM semanario WHERE kolectivo = '$kolectivo'";
		$kk = mysql_query($sql, $con); $row = mysql_fetch_assoc($kk); $pazzactivo = $row['pazz'];
		
		//Si coincide con el password suministrado y no contiene código extraño (securite_bdd) damos el visto bueno.
		if ($comprobarpazz == $row['pazz']){
			$pazz = $_POST['newpazz'];
			$msg='';print "El nuevo pass para $kolectivo es: <b>$pazz</b>";
		}
		else {$msg='';print "No se editó el password porque <b> $comprobarpazz </b> no es el password actual.<br>";}
	}
	else {$msg='';print 'No se editó el password porque el propuesto contiene caracteres extraños.<br>';}
}


// Updatamos la mysql:

	$edi = "UPDATE semanario SET ";
	$edi .= "kolectivo = '$kolectivo', web = '$web', email= '$email', direccion= '$direccion', mensaje= '$mensaje'";

	if (isset ($pazz)) $edi .= ", pazz ='$pazz'";//Si se cambió el password, lo añadimos a la orden mysql

	$edi .= " WHERE id = '$idkol'";
	$rs = mysql_query($edi, $con) or die("Por alguna razón, no se pudo editar. Porfa, contacta ave@openmailbox.org ".mysql_error);

	
//Volvemos a la ficha:

$_SESSION['kol'] = $kolectivo;//Si se editó el nombre del colectivo, lo actualizamos para abrir sesión con el nuevo nombre

if (isset ($msg)) Header("Refresh:3;url=../index.php?d=ficha");//Si hay mensajes para el usuario le damos tiempo de leerlos
else Header("Location: /index.php?d=ficha");		
?>
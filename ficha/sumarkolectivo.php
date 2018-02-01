<?

require ('../configuracion.php');


//Evitamos que el usuario ingrese HTML
$mensaje = htmlentities($mensaje);


/* Código de la edicion*/

$nue = "INSERT INTO semanario (kolectivo, web, email, direccion, mensaje, pazz) ";
$nue .= "VALUES ('".$_POST['kolectivo']."','".$_POST['web']."','".$_POST['email']."','".$_POST['direccion']."','".$_POST['mensaje']."','".$_POST['pazz']."')";

/*orden a la base de datos*/
$rs = mysql_query($nue, $con);
if ($rs == true) include 'creardirs.php';

//Abrimos la sesion del nuevo kolectivo
include 'toctoc.php';

?>
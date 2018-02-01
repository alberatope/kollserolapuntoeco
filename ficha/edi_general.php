<?

/*Carga la base de datos*/
require ('../configuracion.php');

/*Carga las variables de sesión*/
session_start();

/* Código sql de la edicion*/

$edi = "UPDATE semanario SET ";

$edi .= "kolectivo = '".$_POST['kolectivo']."'";
$edi .= ", web = '".$_POST['web']."'";
$edi .= ", email= '".$_POST['email']."'";
$edi .= ", direccion= '".$_POST['direccion']."'";
$edi .= ", mensaje= '".$_POST['mensaje']."'";
$edi .= ", pazz= '".$_POST['pazz']."'";

$edi .= " WHERE id = '".$_SESSION['idkol']."' ";

/*orden a la base de datos*/
$rs = mysql_query($edi, $con) or die("No se pudo editar. ".mysql_error);

/*definimos la nueva session 
(esto será necesario en el caso de que hay sido editado el nombre del kolectivo*/

include 'toctoc.php';

?>
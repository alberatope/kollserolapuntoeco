<?
/*Carga la base de datos*/
require ('../configuracion.php');

/*Carga las variables de sesión*/
session_start();

/* Código sql de la edicion*/

$edi = "UPDATE semanario SET comunicado= '".$_POST['comunicado']."'";

$edi .= " WHERE id = '".$_SESSION['idkol']."' ";

/*orden a la base de datos*/
$rs = mysql_query($edi, $con) or die("No se pudo editar. ".mysql_error);

/*Salimos airosos*/
Header("Location: /index.php?d=ficha");
?>
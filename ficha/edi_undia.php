<?
/*Carga la base de datos*/
require ('../configuracion.php');

/*Carga variables necesarias*/
$variables = $_POST;/*necesario pues no es legal indexar con variables la superglobal $_POST*/
$s = $_POST['s'];
/*Carga tambien las variables de sesion*/
session_start();


/*Subir el FLYER*/
include 'subirflyer.php';


/*Editar la mysql*/
$edi = "UPDATE semanario SET ";

$edi .= $s."= '".$variables[$s]."'";
$edi .= ", h".$s."= '".$variables['h'.$s]."'";
$edi .= ", ".$s."2= '".$variables[$s.'2']."'";
$edi .= ", h".$s."2= '".$variables['h'.$s.'2']."'";

if (empty($local) == false) $edi .= ", flyer".$s."='".$local."'";

$edi .= " WHERE id = '".$_SESSION['idkol']."' ";

/*orden a la base de datos*/
$rs = mysql_query($edi, $con) or die("No se pudo editar. ".mysql_error);


/*Salimos airosos*/
Header("Location: /index.php?d=ficha");

?>
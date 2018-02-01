<?
/*Carga la base de datos*/
require ('../configuracion.php');

/*Carga las variables de sesión*/
session_start();


/*Subir los flyers*/
//include 'subirflyers.php';


/* Código sql de la edicion*/

$edi = "UPDATE semanario SET ";

$edi .= "L= '".$_POST['L']."'";
$edi .= ", hL= '".$_POST['hL']."'";
$edi .= ", L2= '".$_POST['L2']."'";
$edi .= ", hL2= '".$_POST['hL2']."'";

$edi .= ", M= '".$_POST['M']."'";
$edi .= ", hM= '".$_POST['hM']."'";
$edi .= ", M2= '".$_POST['M2']."'";
$edi .= ", hM2= '".$_POST['hM2']."'";

$edi .= ", X= '".$_POST['X']."'";
$edi .= ", hX= '".$_POST['hX']."'";
$edi .= ", X2= '".$_POST['X2']."'";
$edi .= ", hX2= '".$_POST['hX2']."'";

$edi .= ", J= '".$_POST['J']."'";
$edi .= ", hJ= '".$_POST['hJ']."'";
$edi .= ", J2= '".$_POST['J2']."'";
$edi .= ", hJ2= '".$_POST['hJ2']."'";

$edi .= ", V= '".$_POST['V']."'";
$edi .= ", hV= '".$_POST['hV']."'";
$edi .= ", V2= '".$_POST['V2']."'";
$edi .= ", hV2= '".$_POST['hV2']."'";

$edi .= ", S= '".$_POST['S']."'";
$edi .= ", hS= '".$_POST['hS']."'";
$edi .= ", S2= '".$_POST['S2']."'";
$edi .= ", hS2= '".$_POST['hS2']."'";

$edi .= ", D= '".$_POST['D']."'";
$edi .= ", hD= '".$_POST['hD']."'";
$edi .= ", D2= '".$_POST['D2']."'";
$edi .= ", hD2= '".$_POST['hD2']."'";

$edi .= " WHERE id = '".$_SESSION['idkol']."' ";

/*orden a la base de datos*/
$rs = mysql_query($edi, $con) or die("No se pudo editar. ".mysql_error);


/*Salimos airosos*/
Header("Location: /index.php?d=semana");

?>
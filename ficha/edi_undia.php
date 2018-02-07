<?
//Alquimia de variables

	require ('../configuracion.php');//Carga la base de datos
	session_start();//Carga variables de sesión
	$variables = $_POST;//Carga variables del formulario con otro nombre; esto es necesario pues no es legal indexar con variables la superglobal $_POST
	$variables = array_map("securite_bdd", $variables);//Securiza las entradas (le pasa securite_bdd a cada una)
	$s = $_POST['s'];//de este dia de la semana se trata


//Subir el FLYER
	include 'subirflyer.php';


//Editar la mysql

	$edi = "UPDATE semanario SET ";
	$edi .= $s."= '".$variables[$s]."'";
	$edi .= ", h".$s."= '".$variables['h'.$s]."'";
	$edi .= ", ".$s."2= '".$variables[$s.'2']."'";
	$edi .= ", h".$s."2= '".$variables['h'.$s.'2']."'";

	if (empty($local) == false) $edi .= ", flyer".$s."='".$local."'";

	$edi .= " WHERE id = '".$_SESSION['idkol']."' ";

	/*orden a la base de datos*/
	$rs = mysql_query($edi, $con) or die("No se pudo editar por alguna razón. Porfa, contacta ave@openmailbox.org ".mysql_error);


/*Salimos airosos*/
Header("Location: /index.php?d=ficha");

?>
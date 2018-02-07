<?
//Carga la base de datos
require ('../configuracion.php');
require ('../funciones.php');

//Carga las variables de sesión
session_start();

//securizamos las cadenas entrantes (salto de comillas, etc)
$comunicado = securite_bdd($_POST['comunicado']);
$idcol = securite_bdd($_SESSION['idkol']);

//Código sql de la edicion
$edi = "UPDATE semanario SET comunicado= '$comunicado' WHERE id = '$idcol'";

//orden a la base de datos
$rs = mysql_query($edi, $con) or die("No se pudo editar por alguna razón. Porfa, contacta ave@openmailbox.org!".mysql_error);

//Salimos airosos
Header("Location: /index.php?d=ficha");
?>
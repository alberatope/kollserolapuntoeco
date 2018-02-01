<link rel="stylesheet" type="text/css" href="/supercss.css"/>
<body style="background-image:url('/serra.jpg'); background-size:cover; background-repeat: no-repeat;">
<?php
require('../funciones.php');
$id = $_GET["id"];
$citar = $_GET["citar"];
$row = array("id" => $id);
if($citar==1)
{
	require('../configuracion.php');
	$sql = "SELECT titulo, mensaje, identificador AS id FROM foro WHERE id='$id'";
	$rs = mysql_query($sql, $con);
	if(mysql_num_rows($rs)==1) $row = mysql_fetch_assoc($rs);
	$titulooriginal = $row['titulo'];
	$row["titulo"] = "Re: ".$row["titulo"];
	$row["mensaje"] = "";
	if($row["id"]==0) $row["id"]=$id;
}
$template = implode("", file('formulario.html'));
include('header.html');

include('aquienresponde.php');

pintar($template, $row);
include('footer.html');
?>
</body>
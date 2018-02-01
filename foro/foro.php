<link rel="stylesheet" type="text/css" href="/supercss.css"/>
<body style="background-image:url('/serra.jpg'); background-size:cover; background-repeat: no-repeat;">
<?php
require('../configuracion.php');
require('../funciones.php');
$id = $_GET["id"];
if(empty($id)) Header("Location: index.php");

$sql = "SELECT id, autor, titulo, mensaje, ";
$sql.= "DATE_FORMAT(fecha, '%d/%m/%Y %H:%i:%s') as enviado FROM foro ";
$sql.= "WHERE id='$id' OR identificador='$id' ORDER BY fecha ASC";
$rs = mysql_query($sql, $con);
include('header.html');

if(mysql_num_rows($rs)>0)
{
	include('titulos_post.html');
	$template = implode("", file('post.html'));
	while($row = mysql_fetch_assoc($rs))
	{
		$fila1="#66bb6a";
		$fila2="#9ccc65";
		$color=($color==$fila1?$fila2:$fila1);
		
		$row["color"] = $color;
		//manipulamos el mensaje
		$row["mensaje"] = nl2br($row["mensaje"]);
		$row["mensaje"] = parsearTags($row["mensaje"]);
		pintar($template, $row);
	}
}
include('footer.html');
?>
</body>
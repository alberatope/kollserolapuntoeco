<?php
include('header.html');
/* Pedimos todos los temas iniciales (identificador==0)
* y los ordenamos por ult_respuesta */
$sql = "SELECT id, autor, titulo, fecha, respuestas, ult_respuesta ";
$sql.= "FROM foro WHERE identificador=0 ORDER BY ult_respuesta DESC";
$rs = mysql_query($sql, $con);
if(mysql_num_rows($rs)>0)
{
	// Leemos el contenido de la plantilla de temas
	$template = implode("", file("temas.html"));
	include('titulos.html');
	while($row = mysql_fetch_assoc($rs))
	{
		//editamos un poco el formato de las fechas:

		$fecha = $row['fecha']; include('fechastyling.php'); $row['fecha'] = $fechaformato1;
		$fecha = $row['ult_respuesta']; include('fechastyling.php'); $row['ult_respuesta'] = $fechaformato1;
		
		//colores de las filas de temas
		$fila1="#66bb6a";
		$fila2="#9ccc65";
		$color=($color==$fila1?$fila2:$fila1);
		$row["color"] = $color;
		pintar($template, $row);
	}
}
include('footer.html');
?>
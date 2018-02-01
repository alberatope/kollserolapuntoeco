<?
/*pedimos a la mysql o los flyers del futuro o los del pasado------------------------------*/

	$sql = "SELECT id, publicador, fechaPublicacion, fechaInicio, fechaCaducidad, titulo, masInfo, horizontalVertical, unDosVariosDias, archivoFlyer FROM flyers ";
	if ($_POST['t'] =='futuro' or empty($_POST['t']) ) $sql .= "WHERE fechaCaducidad >= curdate() ORDER BY FechaCaducidad ASC";
	if ($_POST['t'] =='pasado' ) $sql .= "WHERE fechaCaducidad < curdate() ORDER BY FechaCaducidad DESC";

	$rs = mysql_query($sql, $con);

/*PINTAMOS CABECERA-------------------------------------------*/	
	
	include 'cabeceraflyers.html';
?>

<div id='cajadeflyers'>
<?
/*PINTAMOS LOS FLYERS--------------------------------*/

	$template = implode("", file("flyer.html"));
	$n = 0;			

	while($row = mysql_fetch_assoc($rs)){
		
			$anchura ='200px';
			$n++;			
			pintar($template, $row);
			
		}
	if ($n < 1) print "<text id='txt34' class='descripciones avisobusqueda'></text>";//Caso de que no haya flyers en la búsqueda
?>
</div>

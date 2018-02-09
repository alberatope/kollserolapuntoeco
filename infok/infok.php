<!--infok.php : Archivo troncal del info-kollserola

	0) impresión: cabecera del docu kollserola.eco cuando es imprimido. 
	1) eventos: Lista cronológica de eventos futuros.
	2) semanario: Una fila por colectivo. Cada casilla muestra su programación para cada día de la semana.
	3) lista de colectivos: Links a las fichas de los colectivos que no tienen programación semanal.
	4) pantallas emergentes:
		4a) ficha de cada colectivo
		4b) ficha de cada día de la semana y colectivo
-->

<!--0) IMPRESIÓN --------------------------------------------------------------------------------------->

	<?include 'cabeceraimpresion.html';//Cabecera en el modo impresión?>

<!--1) EVENTOS --------------------------------------------------------------------------------------->
	
	<!--encabezado eventos-->
	
	<table width="1024px" border="0" class='tablamedia cabeceragrande' align="center" cellpadding="" cellspacing="1"><tr>
	<td><text id='txt6'></text></td>
	</tr></table>

	<!--fichas eventos-->
	
	<table width="1024px" style="border-collapse:collapse;" align="center" cellpadding="2" cellspacing="2"><tr><td class='cajadinamica'>

		<?
		//pedimos a la mysql los eventos ---------------------------------------------------------------------------
		
			$sql = "SELECT id, publicador, fechaPublicacion, fechaInicio, fechaCaducidad, titulo, masInfo, unDosVariosDias, archivoFlyer FROM flyers WHERE fechaCaducidad >= curdate() ORDER BY FechaCaducidad ASC";
			$rs = mysql_query($sql, $con);
			
		//pintamos las fichas de los eventos---------------------------------------------------------------------

			$template = implode("", file("flyer.html"));
			$n = 0;			

			while($row = mysql_fetch_assoc($rs)){
				
					$anchura ='200px';					
					$n++;			
					pintar($template, $row);
					
				}
			if ($n < 1) print "<text id='txt34' class='descripciones avisobusqueda'></text>";//Caso de que no haya flyers en la búsqueda
		?>
		
		
	</td></tr></table>

<!--2) SEMANARIO-------------------------------------------------------------------------------------->

	<!--encabezado semanario-->

		<table width="1024px" border="0" class='tablamedia cabeceragrande' align="center" cellpadding="" cellspacing="1">
			<tr><td><text id='txt52'></text></td></tr>
		</table>
		
	<!--Filas arcoiris (programación semanal de cada colectivo)-->

		<div id="semanariok">
			<table id="tablak" width="1024px" border="1 black" style="border-collapse:collapse" align="center" cellpadding="2" cellspacing="2"><tr>

				<?
				//Cargamos la tabla:			
					$sql = "SELECT id, kolectivo, web, email, direccion, mensaje, comunicado, L, hL, L2, hL2, flyerL, M, hM, M2, hM2, flyerM, X, hX, X2, hX2, flyerX, J, hJ, J2, hJ2, flyerJ, V, hV, V2, hV2, flyerV, S, hS, S2, hS2, flyerS, D, hD, D2, hD2, flyerD FROM semanario ORDER BY kolectivo ASC;";
					$rs = mysql_query($sql, $con);					
				
				//Fila de índices con los días de la semana:
					print "<td align='center' class='cabecerapeque'></td>";
					foreach ($semana as $s)	print "<td width='11%' align='center' class='cabecerapeque'>$losdias[$s]</td>";
					
				//Filas de kolectivos:					
					$template = implode("", file("filaconkolectivo.html"));//cargamos la plantilla html
					
					if(mysql_num_rows($rs)>0){//Si no existen colectivos no pintamos nada

						while($row = mysql_fetch_assoc($rs)){//Recorremos las filas pintándolas
						
							//no pintaremos calendario de los kolectivos que no tienen programación:
							if ((empty($row['L'])==false) || (empty($row['M'])==false) || (empty($row['X'])==false) || (empty($row['J'])==false) ||(empty($row['V'])==false) ||(empty($row['S'])==false) || (empty($row['D'])==false))
							
							pintar($template, $row);
						}
					}
					else echo 'error: '.mysql_num_rows($rs);
				?>
				
			</tr></table>
		</div>

<!--3) LISTA DE LOS KOLECTIVOS QUE NO TIENEN PROGRAMACION SEMANAL--------------------------------------------->

	<!--encabezado-->

	<table width="1024px" border="0" class='tablamedia cabeceragrande' align="center" cellpadding="" cellspacing="1"><tr>
		<tr><td><text id='txt9'></text></td></tr>
	</table>
	
	<!--caja de colectivos--->

	<table width="1024px" border="0" align="center" cellpadding="" cellspacing="1">
	<tr><td class='cajadinamica'>
	
		<?
			/* Cargamos la tabla*/
			$sql = "SELECT id, kolectivo, web, email, direccion, mensaje, comunicado, L, hL, L2, hL2, flyerL, M, hM, M2, hM2, flyerM, X, hX, X2, hX2, flyerX, J, hJ, J2, hJ2, flyerJ, V, hV, V2, hV2, flyerV, S, hS, S2, hS2, flyerS, D, hD, D2, hD2, flyerD FROM semanario";
			$rs = mysql_query($sql, $con);

			if(mysql_num_rows($rs)>0)
			{
				// Pintamos las fichas con la info general de los kolectivos
				$template = implode("", file("cadakolectivo.html"));

				while($row = mysql_fetch_assoc($rs)){
					
					//no pintaremos en la lista los kolectivos que tienen programación y por lo tanto ya salen en el semanario:
					if ((empty($row['L'])==true) && (empty($row['M'])==true) && (empty($row['X'])==true) && (empty($row['J'])==true) &&(empty($row['V'])==true) &&(empty($row['S'])==true) && (empty($row['D'])==true))

					pintar($template, $row);
				}
				
			}
		?>
		
	</td></tr></table>

<!--4) PANTALLITAS EMERGENTES DE KOLECTIVOS Y DE CASILLAS------------------------------------------------------------------------>

	<?				
		$sql = "SELECT id, kolectivo, web, email, direccion, mensaje, comunicado, L, hL, L2, hL2, flyerL, M, hM, M2, hM2, flyerM, X, hX, X2, hX2, flyerX, J, hJ, J2, hJ2, flyerJ, V, hV, V2, hV2, flyerV, S, hS, S2, hS2, flyerS, D, hD, D2, hD2, flyerD FROM semanario";
		$rs = mysql_query($sql, $con);
		
		while($row = mysql_fetch_assoc($rs)){
			
			extract ($row);
			$template = implode("", file("pantallitak.html"));
			eval("?>".$template."<?");//ficha del colectivo
			
				foreach ($semana as $s) {
								
				$template = implode("", file("pantallita.html"));
				eval("?>".$template."<?");//fichas de cada día de la semana de cada colectivo
				}
		}
	?>	

<!--5) PANTALLITAS EMERGENTES DE EVENTOS-->

	<?
		$sql = "SELECT id, publicador, fechaPublicacion, fechaInicio, fechaCaducidad, titulo, masInfo, unDosVariosDias, archivoFlyer FROM flyers WHERE fechaCaducidad >= curdate() ORDER BY FechaCaducidad ASC";
		$rs = mysql_query($sql, $con);
		
		while($row = mysql_fetch_assoc($rs)){
		
			$template = implode("", file("pantallitaevents.html"));
			pintar($template,$row);
		}
	?>

	
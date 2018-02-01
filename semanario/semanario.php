<?
/* Cargamos la tabla*/
$sql = "SELECT id, kolectivo, web, email, direccion, mensaje, comunicado, L, hL, L2, hL2, flyerL, M, hM, M2, hM2, flyerM, X, hX, X2, hX2, flyerX, J, hJ, J2, hJ2, flyerJ, V, hV, V2, hV2, flyerV, S, hS, S2, hS2, flyerS, D, hD, D2, hD2, flyerD FROM semanario ORDER BY kolectivo ASC;";
$rs = mysql_query($sql, $con);
?>


<!--SEMANARIO-------------------------------------------------------------------------------------->

<?//CABECERAS
//cabecera del semanario en la web
include 'cabecerasemanario.html';
//cabecera en el modo impresión
include 'cabeceraimpresion.html';?>


<div id="semanariok">
	<table id="tablak" width="1024px" border="1 black" style="border-collapse:collapse;" align="center" cellpadding="2" cellspacing="2"><tr>

		<?
		//Fila de índices con los días de la semana:
			print "<td align='center' class='leyendadias'></td>";
			foreach ($semana as $s)	print "<td width='11%' align='center' class='leyendadias'>$losdias[$s]</td>";
			
		//Filas de kolectivos:	
			//cargamos la plantilla html
			$template = implode("", file("filaconkolectivo.html"));
			//Si no existen colectivos no pintamos nada
			if(mysql_num_rows($rs)>0){
			//Recorremos las filas pintándolas

			while($row = mysql_fetch_assoc($rs)){
			
				//no pintaremos calendario de los kolectivos que no tienen programación:
				if ((empty($row['L'])==false) || (empty($row['M'])==false) || (empty($row['X'])==false) || (empty($row['J'])==false) ||(empty($row['V'])==false) ||(empty($row['S'])==false) || (empty($row['D'])==false))
				
				pintar($template, $row);
			}
		}
		else echo 'error: '.mysql_num_rows($rs);
		?>
		
	</tr></table>
</div>



<!--LISTA DE LOS KOLECTIVOS QUE NO TIENEN PROGRAMACION SEMANAL------------------------------------------------------------------------->

<table width="90%" border="0" style="border-collapse:collapse;min-height:60px;border:1px solid black;margin-top:40px;max-width:1024px" align="center" cellpadding="" cellspacing="1">
    <tr><td class="cabeceragrande"><text id='txt9'></text></td></tr>
</table>
	
<table width="90%" border="0" style="border-collapse:collapse;min-height:60px;max-width:1024px" align="center" cellpadding="" cellspacing="1">
<tr><td style="display:flex;flex-wrap:wrap;">
		<?
		/* Cargamos la tabla*/
		$sql = "SELECT id, kolectivo, web, email, direccion, mensaje, comunicado, L, hL, L2, hL2, flyerL, M, hM, M2, hM2, flyerM, X, hX, X2, hX2, flyerX, J, hJ, J2, hJ2, flyerJ, V, hV, V2, hV2, flyerV, S, hS, S2, hS2, flyerS, D, hD, D2, hD2, flyerD FROM semanario";
		$rs = mysql_query($sql, $con);

		if(mysql_num_rows($rs)>0)
		{
			// Pintamos las filas con la info general de los kolectivos
			$template = implode("", file("cadakolectivo.html"));

			while($row = mysql_fetch_assoc($rs)){
				
				//no pintaremos en la lista los kolectivos que tienen programación y por lo tanto ya salen en el semanario:
				if ((empty($row['L'])==true) && (empty($row['M'])==true) && (empty($row['X'])==true) && (empty($row['J'])==true) &&(empty($row['V'])==true) &&(empty($row['S'])==true) && (empty($row['D'])==true))

				pintar($template, $row);
			}
			
		}

		?>
</td></tr></table>

<!--PANTALLITAS EMERGENTES DE KOLECTIVOS Y DE CASILLAS------------------------------------------------------------------------>

		<?				
				$sql = "SELECT id, kolectivo, web, email, direccion, mensaje, comunicado, L, hL, L2, hL2, flyerL, M, hM, M2, hM2, flyerM, X, hX, X2, hX2, flyerX, J, hJ, J2, hJ2, flyerJ, V, hV, V2, hV2, flyerV, S, hS, S2, hS2, flyerS, D, hD, D2, hD2, flyerD FROM semanario";
				$rs = mysql_query($sql, $con);
				
				while($row = mysql_fetch_assoc($rs)){
					
					extract ($row);
					$template = implode("", file("pantallitak.html"));
					eval("?>".$template."<?");
					
						foreach ($semana as $s) {
										
						$template = implode("", file("pantallita.html"));
						eval("?>".$template."<?");
						}
				}
		?>	

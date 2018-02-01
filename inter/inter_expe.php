<title>Kollserola</title>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="Content-Style-Type" content="text/css"/>

<!--Estilos-->
<link rel="stylesheet" type="text/css" href="/supercss.css"/>

<!--Scripts java-->
<SCRIPT Language=Javascript SRC="kollserola.js"></SCRIPT>
<SCRIPT Language=Javascript SRC="babel.js"></SCRIPT>
</head>

<body style='background-image:none;'>

<?
/*Archivos necesarios*/
require('../configuracion.php');
require('../funciones.php');
require('../constantes.php');

/* Cargamos la fila del kolectivo (where id = talpascual)*/
$sql = "SELECT id, kolectivo, web, email, direccion, mensaje, comunicado, L, hL, L2, hL2, flyerL, M, hM, M2, hM2, flyerM, X, hX, X2, hX2, flyerX, J, hJ, J2, hJ2, flyerJ, V, hV, V2, hV2, flyerV, S, hS, S2, hS2, flyerS, D, hD, D2, hD2, flyerD FROM semanario WHERE id = 1";
$rs = mysql_query($sql, $con);

/*Cargamos el directorio inter*/
$dir=getcwd();
chdir($dir.'/inter'); 
?>
<script>
	function abrirEnPestana(url) {
		var a = document.createElement("a");
		a.target = "_blank";
		a.href = url;
		a.click();
	}
</script>

		<table id="tablainter" onclick="abrirEnPestana('http://www.kollserola.eco?d=semana');" width="820px" border="1 black" style="border-collapse:collapse;" align="center" cellpadding="2" cellspacing="2"><tr>

			<?
			//Fila de índices con los días de la semana:

				foreach ($semana as $s)	print "<td width='11%' align='center' class='leyendadias'>$losdiasplural[$s]</td>";
				
			//Filas de kolectivos:	
				//cargamos la plantilla html
				$template = implode("", file("filadelkolectivo.html"));
				//Si no existen colectivos no pintamos nada
				if(mysql_num_rows($rs)>0){
				//Recorremos las filas pintándolas

				while($row = mysql_fetch_assoc($rs)){
				
					pintar($template, $row);
				}
			}
			else echo 'error: '.mysql_num_rows($rs);
			?>
			
		</tr></table>

</body>
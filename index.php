<head>
<title>Kollserola</title>

<!--Contenidos-->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

<!--Estilos-->
<link rel="stylesheet" type="text/css" href="supercss.css"/>

<!--Scripts java-->
<SCRIPT Language=Javascript SRC="kollserola.js"></SCRIPT>
<SCRIPT Language=Javascript SRC="babel.js"></SCRIPT>
</head>

<!--Cargamos archivos generales-->
<?
require('configuracion.php');//conexión con la mysql
require('funciones.php');//funciones php
require('constantes.php');//constantes php
if (isset($_POST['lengua'])) $lengua = $_POST['lengua']; else $lengua = 'cat';
if (isset($_GET['d'])) $focus = $_GET['d']; else $focus = 'semana';
?>

<!--Al cargar el body, escribimos los textos en catalán por defecto y mostramos la pestaña especificada en $_GET['d']-->
<body onload="javascript:<?if ($lengua == 'cas') print 'alcas()'; else print 'alcat()';?>;carga('<?=$focus?>');">

	<!--1) CABECERA-->
	<?include 'cabeceraweb.html';?>

	<!--2) CONTENIDOS-->
	<?$dir=getcwd();//almacenamos el directorio raiz de la web: nos hace falta para gestionar los cambios de directorio?>
	
	<div id="cuadrolog" style="display:none"><?include('logkolectivo.html');?></div>

	<div id="cuadronuevo" style="display:none"><?include('nuevokolectivo.html');?></div>

	<div id="cuadrosemana" style="display:none"><?chdir($dir.'/infok'); include('infok.php');?></div>

	<div id="cuadroficha" style="display:none"><?chdir($dir.'/ficha');if (isset($_SESSION['idkol']) and isset($_SESSION['kol'])) include ('fichakolectivo.php');?></div>

	<!--3) Links a Github y Feedback-->
	<?include 'agithub.html';?>
	
</body>

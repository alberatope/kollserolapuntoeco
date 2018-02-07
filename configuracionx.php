<?php
$bd_host = "***";
$bd_usuario = "***";
$bd_password = "***";
$bd_base = "***";

$con = mysql_connect($bd_host, $bd_usuario, $bd_password);
mysql_select_db($bd_base, $con);

// securite_bdd : Esta función php formatea cadenas string para poder introducirlas en la mysql (maravilloso).

	function securite_bdd($string)	{	
		
		$bd_host = "***"; $bd_usuario = "***"; $bd_password = "***"; $bd_base = "***";
		
		$string = mysqli_real_escape_string(mysqli_connect($bd_host, $bd_usuario, $bd_password), $string);
		$string = addcslashes($string, '%_');
			
		return $string;
	}
?>
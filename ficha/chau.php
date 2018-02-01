<?
session_start();
			unset($_SESSION['kol']);
			unset($_SESSION['idkol']);

//Salimos airosos
Header("Location: /index.php");
?>
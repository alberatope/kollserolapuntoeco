<?

session_start();//Carga las variables de sesión
require ('../configuracion.php');//Carga la base de datos Y la funcion securite_dbb

//securización entradas:
$kolectivo = securite_bdd($_POST['kolectivo']);
$web = securite_bdd($_POST['web']);
$email = securite_bdd($_POST['email']);
$direccion = securite_bdd($_POST['direccion']);
$mensaje = securite_bdd($_POST['mensaje']);
$pazz = securite_bdd($_POST['pazz']);
$idkol = $_SESSION['idkol'];


// Código sql de la edicion:
$edi = "UPDATE semanario SET ";
$edi .= "kolectivo = '$kolectivo', web = '$web', email= '$email', direccion= '$direccion', mensaje= '$mensaje', pazz= '$pazz' ";
$edi .= "WHERE id = '$idkol'";
$rs = mysql_query($edi, $con) or die("No se pudo editar. ".mysql_error);

//Re-sesionizamos
$_SESSION['kol'] = $kolectivo;
Header("Location: /index.php?d=semana");

?>
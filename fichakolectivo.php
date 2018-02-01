<?
	/*CARGAMOS LAS VARIABLES CON LOS DATOS DEL KOLECTIVO*/

	session_start();
	$kolectivo = $_SESSION['kol'];
	$sql = "SELECT id, kolectivo, web, email, direccion, mensaje, comunicado, pazz, L, hL, L2, hL2, flyerL, M, hM, M2, hM2, flyerM, X, hX, X2, hX2, flyerX, J, hJ, J2, hJ2, flyerJ, V, hV, V2, hV2, flyerV, S, hS, S2, hS2, flyerS, D, hD, D2, hD2, flyerD FROM semanario WHERE kolectivo = '".$kolectivo."';";
	$rs = mysql_query($sql, $con);$row = mysql_fetch_assoc($rs);

	/*extraemos las variables para que estén el el ámbito*/
	extract($row);

?>


<!--0) Cabecera de la ficha del colectivo--------------------------------------->

<table width="92%" border="0" class="tablacabeza" style="border-bottom:1px solid black;" align="center" cellpadding="" cellspacing="1">
  <tr>
    <td class="cabeceragrande"><h3><?=$kolectivo;?></h3>
		<a href="javascript:trirruptor('f1','f2','f3','f4');">[ <text id="txt10"></text> ] </a>
		<a href="javascript:trirruptor('f2','f1','f3','f4');">[ <text id="txt11"></text> ] </a>
		<a href="javascript:trirruptor('f3','f1','f2','f4');">[ <text id="txt12"></text> ] </a>
		<a href="javascript:trirruptor('f4','f1','f2','f3');">[ <text id="txt42"></text> ] </a>
	</td>
  </tr>
</table>

<!--A) Edicion del Semanario------------------------------------------------------->

<div id="f1" style="display:block">
	
	<!--Fila en el semanario ( la actualmente publicada)-->

		<?include ('misemana.html');?>

	<!--Fichas de edición de dias: (contruimos todas pero solo las mostraremos de una en una)-->
	
		<?
			foreach ($semana as $s) {
				
				$template = implode("", file("fichaeditarundia.html"));
				eval("?>".$template."<?");
			}
		?>


</div>

<!--B) Edicion del Comunicado------------------------------------------------------->
<form id="f2" action="/ficha/edi_comunicado.php" style="display:none" method="post">

	<table width="92%" border="0" class="tablacabeza" align="center" cellpadding="2" cellspacing="1">
		<tr>
			<td class="cabeceragrande">¿Algún detalle o circunstancia que hacer saber a la comunidad?</td>
			<td class="cabeceragrande" width="20%"><button class="botonseleccion" style="float:right;border:0;" type="submit" value="Publicar cambios">Publicar <font size="-1">cambios</font></button></td>
		</tr>
	</table>
	
	<table width="92%" border="0" class="tablapie" align="center" cellpadding="2" cellspacing="1">
		<tr class="colorfondoformu"><td colspan="2" class="cabeceragrande">
				<textarea name="comunicado" style="width:100%;" rows="8" class="inputtransparente"><?=$comunicado?></textarea>
		</td></tr>
	</table>

</form>


<!--C) Edicion de la Info general ---------------------------------------------------->
<form id="f3" action="/ficha/edi_general.php"style="display:none" method="post">

	<table width="92%" border="0" class="tablacabeza" align="center" cellpadding="2" cellspacing="1">
		<tr>
			<td class="cabeceragrande">	Otra información:</td>
			<td class="cabeceragrande" width="20%"><button class="botonseleccion" style="float:right;border:0;" type="submit" value="Publicar cambios">Publicar <font size="-1">cambios</font></button></td>
		</tr>
	</table>
	<table width="92%" border="0" class="tablapie" align="center" cellpadding="2" cellspacing="1">
		
		<tr class="colorfondoformu"> 
			<td><text class="detallepazz">Nombre del colectivo:</text><input type="text" id ="inputkolectivo" name="kolectivo" class="inputtransparente" value="<?=$kolectivo?>" maxlength="40"></td>
			<td rowspan="2" width="30%">
				<table width="100%">
					<tr><td><text class="detallepazz">web:</text><input type="text" name="web" class="inputtransparente" value="<?=$web?>"></td></tr>
					<tr><td><text class="detallepazz">email:</text><input type="text" name="email" class="inputtransparente" value="<?=$email?>" maxlength="80"></td></tr>
					<tr><td><text class="detallepazz">direcci&oacute;n:</text><input type="text" name="direccion" class="inputtransparente" value="<?=$direccion?>" maxlength="80"></td></tr>
				</table>
			</td>
			
			<td>
				<table width="100%">
					<tr><td>
						<text class="detallepazz">cambiar password</text><br>
						<input id="inputpazz" type="text" name="pazz" class="inputpazz" style="width:100%;" placeholder="pass antiguo(campo necesario)" maxlength="30"><br>
						<input id="inputnewpazz" type="text" name="newpazz" class="inputpazz" style="width:100%;" placeholder="pass nuevo(campo necesario)" maxlength="30">					
					</td></tr>
				</table>
			</td>
		</tr>
		
		<tr class="colorfondoformu">
			<td><text class="detallepazz">Mini descripción:</text><textarea name="mensaje" style="width:100%;" rows="2" class="inputtransparente" maxlength="80"><?=$mensaje?></textarea></td>
			<td><a href="javascript:kaputseguro();" class="detallepazz">eliminar cuenta del kolectivo</a></td>
		</tr>
			
	</table>

</form>


<!--D) Publicar flyer --------EN CONSTRUCCION------------------------------------------------------------------------------------>
<form id="f4" action="/flyers/avolar.php"style="display:none" method="post">
	<table width="60%" border="0" class="tablacabeza" align="center" cellpadding="2" cellspacing="1">
		<tr>
			<td><!--Editor de Fecha -->
				<div class='cajapublicarfecha'>
					<table><tr><td>
						<a href="javascript:trirruptor('f1','f2','f3');"><text id="txt39"></text> / </a>
						<a href="javascript:trirruptor('f2','f1','f3');"><text id="txt40"></text> / </a>
						<a href="javascript:trirruptor('f3','f1','f2');"><text id="txt41"></text></a>
					</td></tr>
					<tr><td>
						<input type='date' name='fechainicial' placeholder='aaaa-mm-dd'>
						<input type='date' name='fechacaducidad' placeholder='aaaa-mm-dd'>
						<input type='submit' style='float:right'>
						
					</td></tr>
					</table>
				</div>
			</td>	
			<td colspan=2><!--Subir flyer-->
				
			</td>			
		</tr>
		<tr>	
			<td><!--Input para descripción-->
				<textarea name="infodelflyer" style="width:100%;" rows="8" class="inputtransparente"><?=$infodelflyer?></textarea>
			</td>
		</tr>
	
		
	</table>
</form>


<!--
<table width="90%" border="0" style="border-collapse:collapse;border:1px solid black;" align="center" cellpadding="" cellspacing="1">
  <tr>
    <td class="cabeceragrande">
		<h2>Red de Kollserola</h2>
		Red de autogestión de Collserola
    </td>
  </tr>
</table>
-->

<div id="loginkol">
	
	<table width="90%" border="0" style="border-collapse:collapse;margin-bottom:30px;margin-top:30px;border:1px solid black;" align="center" cellpadding="2" cellspacing="2">

		<tr><td  colspan="3" class="cabeceragrande"><h4>Log:</h4></td></tr>
	
		<form id="looog" action="/ficha/toctoc.php" name="looog" method="post">
		
			<tr class="colorfondoformu"> 	
				<td width="40%">
					<select class="inputtransparente" name="kolectivo" id="choosenkol">					
						<?/* Cargamos los kolectivos availables*/
						$sql = "SELECT kolectivo FROM semanario";
						$k = mysql_query($sql, $con);
						print '<option value="" disabled selected></option>';
						while($row = mysql_fetch_assoc($k)) print "<option value='".$row['kolectivo']."'>".$row['kolectivo']."</option>";
						?>
					</select>
				</td>
				<td width="40%"><input type="text" name="pazzinside" id="pazzinside" class="inputtransparente" placeholder="pass del kolectivo"></td>
				<td width="20%"><div class="botonseleccion" style="float:right;" onclick="javascript:logtest();">Login</div></td>

			</tr>

		</form>
		
	</table>
	
</div>


<div id="filanuevokolectivo">
	
	<table width="90%" border="1 black" style="border-collapse:collapse;margin-bottom:30px;margin-top:30px;" align="center" cellpadding="2" cellspacing="2">
	
		<tr><td  colspan="3" class="cabeceragrande"><h4>Añadir Kolectivo / Comunidad / Contacto a la red de autogestión de Kollserola:</h4></td></tr>
	
		<form id="sumarkolectivo" name="sumarkolectivo" action="/ficha/sumarkolectivo.php" method="post">
			
			<tr class="colorfondoformu"> 
				<td><input type="text" id ="inputkolectivo" name="kolectivo" class="inputtransparente" placeholder="Nombre del Kolectivo (campo necesario)"></td>
				<td width="30%"><input type="text" name="web" class="inputtransparente" placeholder="web"><input type="text" name="email" class="inputtransparente" placeholder="email"></td>
				<td width="30%"><input type="text" name="direccion" class="inputtransparente" placeholder="dirección"></td>
			</tr>
			
			<tr class="colorfondoformu">
				<td><textarea name="mensaje" style="width:100%;" rows="4" class="inputtransparente" placeholder="Descripción mini"></textarea></td>
				<td  colspan="2">
					<table width="100%"><tr>
						<td>
							<input id="inputpazz" type="text" name="pazz" class="inputpazz" placeholder="pass (campo necesario)"><br>
							<text class="detallepazz">(password)</text>
						</td>
						<td align="right"><div class="botonseleccion" onclick="javascript:subirseguro();">Añadir</div></td>
					</tr></table>
		
				</td>
			</tr>
			
		</form>
		
	</table>
</div>


<script language="javascript">

<!-- comprovaciones para entrar en la ventana de edicion -->
function logtest(){

	var kol = document.getElementById('choosenkol');
	if (kol.value == '') {alert('¡Elije el colectivo que quieres editar!'); exit();}

	var paz = document.getElementById('pazzinside');
	if (paz.value == '') {alert('y el pass, que?'); exit();}

	document.getElementById('looog').submit();
}
</script>
<?
	//CARGAMOS LAS VARIABLES CON LOS DATOS DEL KOLECTIVO
	
	$kolectivo = $_SESSION['kol'];
	$sql = "SELECT id, kolectivo, web, email, direccion, mensaje, comunicado, pazz, L, hL, L2, hL2, flyerL, M, hM, M2, hM2, flyerM, X, hX, X2, hX2, flyerX, J, hJ, J2, hJ2, flyerJ, V, hV, V2, hV2, flyerV, S, hS, S2, hS2, flyerS, D, hD, D2, hD2, flyerD FROM semanario WHERE kolectivo = '".$kolectivo."';";
	$rs = mysql_query($sql, $con);$row = mysql_fetch_assoc($rs);

	//extraemos las variables para que estén el el ámbito
	extract($row);	
?>


<!--0) Cabecera de la ficha del colectivo--------------------------------------->

	<table width="1024px" border="0" class="tablamedia cabeceragrande" align="center" cellpadding="" cellspacing="1">
	  <tr>
		<td><h3><?=$kolectivo;?></h3>
			<a href="javascript:cuatrirruptor('f4','f1','f2','f3');">[ <text id="txt42"></text> ] </a>
			<a href="javascript:cuatrirruptor('f1','f2','f3','f4');">[ <text id="txt10"></text> ] </a>
			<a href="javascript:cuatrirruptor('f2','f1','f3','f4');">[ <text id="txt11"></text> ] </a>
			<a href="javascript:cuatrirruptor('f3','f1','f2','f4');">[ <text id="txt12"></text> ] </a>
		</td>
	  </tr>
	</table>

<!--A) Publicar flyer ------------------------------------------------------------------------------------------------------>
	
	<form id="f4" action="/ficha/avolar.php" enctype="multipart/form-data" method="post">
		<table width="600px" class="tablacabeza color2" style='border:2px solid darkgrey' align="center" cellpadding="2" cellspacing="1">
			<tr>
				<td width="60%"><!--Editor de Fecha -->
					<div class='cajapublicarfecha'>
						<table>
							
							<tr><td><!--pestañitas un dia/dos dias/varios dias-->
								<a href="javascript:selectorfechitas('undia');"><text id="txt39"></text> / </a>
								<a href="javascript:selectorfechitas('dos');"><text id="txt40"></text> / </a>
								<a href="javascript:selectorfechitas('varios');"><text id="txt41"></text></a>
							</td></tr>
							
							<tr><td><!--Inputs de fecha-->
							
								<text id='txt44' class='maquina100' style='margin:6px;float:left;display:none'></text>
								<input id='inputini' type='date' style='margin:6px;float:left;width:7em;display:none' name='fechainicio' placeholder='aaaa-mm-dd'>
								<text id='txt43' class='maquina100' style='margin:6px;float:left;display:none'></text>
								<text id='txt45' class='maquina100' style='margin:6px;float:left;display:none'></text>
								<input id ='inputcad' type='date' name='fechacaducidad' style='margin:6px;float:left;width:7em' placeholder='aaaa-mm-dd'>

								<!--variable que registra si es un dia, dos o varios. Por defecto es uno.-->
								<input id = 'cuantosdias' type = 'hidden' name='undosvariosdias' value='1'>
								
							</td></tr>
						</table>
					</div>
				</td>	
				
				<td width="40%"><!--Input para subir flyer-->
								<input type="hidden" name="MAX_FILE_SIZE" value="1000000000">				
								<input type="file" id="botonFlyReal" name="archivofly" accept="image/png, .jpeg, .jpg, image/gif" onchange="document.getElementById('botonFlyConClase').value=this.files[0].name;document.getElementById('botonCambiarFly').style.display ='block';" style="display:none;">
								<input type="button" id="botonFlyConClase" value="Añadir flyer" class="inputtransparente" style='border:1px solid black;min-height:20px;width:80%' onclick="document.getElementById('botonFlyReal').click();">
								<input type="button" id="botonCambiarFly" value="Cambiar flyer" class="inputtransparente" style='display:none' onclick="document.getElementById('botonFlyReal').click();">
				</td>			
			</tr>
			<tr>	
				<td><!--Input para descripción-->
					<input name="titulodelflyer" style="padding:6px;border:1px solid black" rows="8" class="inputtransparente" maxlength='80' placeholder='Título del evento'></textarea>
					<textarea name="infodelflyer" style="padding:6px;border:1px solid black" rows="8" class="inputtransparente" maxlength='300' placeholder='Descripción / info adicional al flyer'></textarea>
				</td>
				<td><!--Boton Publicar (quizá poner uno con Cancelar que limpie los inputs?)-->
					<input type="submit" id="botonPublicarFly" value="Publicar flyer" class="botonseleccion" style="width:10em">

				</td>
			</tr>
		
			
		</table>
	</form>

<!--B) Editar el Semanario---------------------------------------------------------------------------------------------------------------->

	<div id="f1"  style="display:none">
		
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

<!--C) Editar el Comunicado---------------------------------------------------------------------------------------------------------------->

	<form id="f2" action="/ficha/edi_comunicado.php" style="display:none" method="post">

		<table width="92%" border="0" class="tablacabeza" align="center" cellpadding="2" cellspacing="1">
			<tr>
				<td class="cabeceragrande">¿Algún detalle o circunstancia que hacer saber a la comunidad?</td>
				<td class="cabeceragrande" width="20%"><button class="botonseleccion" style="float:right;border:0;" type="submit" value="Publicar cambios">Publicar <font size="-1">cambios</font></button></td>
			</tr>
		</table>
		
		<table width="92%" border="0" class="tablapie" align="center" cellpadding="2" cellspacing="1">
			<tr class="colorfondoformu"><td colspan="2" class="cabeceragrande">
					<textarea name="comunicado" style="width:100%;" rows="6" maxlength='600' class="inputtransparente"><?=$comunicado?></textarea>
			</td></tr>
		</table>

	</form>


<!--D) Edicion de la Info general ---------------------------------------------------->

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
							<input id="inputpazz" type="text" name="oldpazz" class="inputpazz" style="width:100%;" placeholder="pass antiguo(campo necesario)" maxlength="30"><br>
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


//sustituibles por una funcion mas general que podríamos llamar pestañero
function mostrar(cuadro){
	var cuadros = ["cuadrosemana", "cuadroforo", "cuadroficha", "cuadronuevo", "cuadrolog", "cuadroflyers"];
	
	for (i in cuadros){
		
		var c = document.getElementById(cuadros[i]);
		var b = document.getElementById('boton'+cuadros[i]);
		
		if (cuadros[i] != cuadro) {
			c.style.display='none';
			b.style.border='';		
		}
		
		else {
			c.style.display = (c.style.display == 'none') ? 'block' : 'none';
			b.style.border = (b.style.border == '') ? '2px solid darkgrey' : '';
			}
	}
}


//sustituibles por una funcion mas general que podríamos llamar pestañero(loquequierover, [todo el pestañero])
function editardeunoenuno(cosa){
	var cuadros = ["formueditarL", "formueditarM","formueditarX","formueditarJ","formueditarV","formueditarS","formueditarD"];
	
	for (i in cuadros){
	var c = document.getElementById(cuadros[i]);
	if (cuadros[i] != cosa) c.style.display='none';
	else c.style.display = (c.style.display == 'none') ? 'block' : 'none';
	}

	
}	

function carga(visible){
	if (visible != '') mostrar('cuadro'+visible);
	else mostrar('cuadrosemana');
}

function editarkolectivo(){
		document.getElementById(formedicionkolectivo).submit();
}

function subirseguro(){
	var kol = document.getElementById('inputkolectivo');
	if (kol.value == '') {alert('¡falta el nombre del kolectivo!'); exit();
}

	var paz = document.getElementById('inputpazz');
	if (paz.value == '') {alert('el password será necesario para poder editar los datos y la programación semanal del colectivo'); exit();
}

	var r = confirm("¿Todos los datos están bien? ¿Confirmado?");
    if (r == true) document.getElementById('sumarkolectivo').submit();
}

function kaputseguro(){

	var z  = confirm("¿Seguro? ¿Eliminar todo? ¿Bye Bye?");
    if (z == true) window.location="/ficha/kaputkol.php";
}

function chau(){

 window.location="/ficha/chau.php";
}

//loging

function nuevokol(){
var t = document.getElementById('loginkol'); t.style.display = 'none';
var d = document.getElementById('filanuevokolectivo');
d.style.display = (d.style.display == 'none') ? 'block' : 'none';
}

function logkol(){
var d = document.getElementById('filanuevokolectivo'); d.style.display = 'none';
var t = document.getElementById('loginkol');
t.style.display = (t.style.display == 'none') ? 'block' : 'none';
}

//Pantallita de info de evento
function pantallita(dia){
	var x = document.getElementsByClassName("pantallita");
	var p = document.getElementById('pantallita'+dia);
	
	for (i=0;i<x.length;i++){
     if (x[i] != p){x[i].style.display ='none';}
	 else {p.style.display = (p.style.display == 'none') ? 'block' : 'none';}
	}	
}

function pantallitaout(dia){
	
	var p = document.getElementById('pantallita'+dia);
	p.style.display = 'none';
}


function segundatarea(dia){
	
		var bcos = document.getElementById('botonsegundacosa'+dia);
		
		var cos = document.getElementById('segundacosa'+dia);

		
	if (cos.style.display == 'none'){
		bcos.innerHTML = "<font size='+2'>-</font>";
		cos.style.display = 'block';
	}
	else{
		bcos.innerHTML = "<font size='+2'>+</font>";
		cos.style.display = 'none';
	}
				

}

function mostrarflyer(dia){
		
		var bfly = document.getElementById('botonsubirflyer'+dia);
		var fly = document.getElementById('miniflyer'+dia);

	bfly.innerHTML = (bfly.innerHTML == '+flyer') ? '-flyer' : '+flyer';
	fly.style.display = (fly.style.display == 'none') ? 'block' : 'none';
}

function mostrarsubirflyer(dia){
		
		var ffly = document.getElementById('formflyer'+dia);
		var bfly = document.getElementById('botonsubirflyer'+dia);

	bfly.innerHTML = (bfly.innerHTML == '+flyer') ? '-flyer' : '+flyer';
	ffly.style.display = (ffly.style.display == 'none') ? 'block' : 'none';
}


function subirflyer(dia){
	  document.getElementById('formularioflyer'+dia).submit();
}



//USANDOSE para mostrar las ventanas emergentes de log kolectivo o nuevo kolectivo en cabeceraweb.html
function birruptor(cosa1,cosa2){
	var a = document.getElementById(cosa1);
	var b = document.getElementById(cosa2);
	
	a.style.display = (a.style.display == 'none') ? 'block' : 'none';
	b.style.display = 'none';	
}



function monorruptor(cosa){
	var c = document.getElementById(cosa);
	c.style.display = (c.style.display == 'block') ? 'none' : 'block';	
}

function trirruptor(cosa1,cosa2,cosa3){//Trirruptor con ocultamiento del activo
	/*la cosa uno es la que se quiere ver, las otras apagar*/

	var a = document.getElementById(cosa1);
	var b = document.getElementById(cosa2);
	var c = document.getElementById(cosa3);
	
		
	if (a.style.display == 'none'){
		b.style.display = 'none';
		c.style.display = 'none';
		a.style.display = 'block';		
	}
	else{
		b.style.display = 'none';
		c.style.display = 'none';
		a.style.display = 'none';	
	}
		
}

function trirruptorb(cosa1,cosa2,cosa3){ //Trirruptor que no esconde el activo al clickear sobre el
	/*la cosa uno es la que se quiere ver, las otras apagar*/

	var a = document.getElementById(cosa1);
	var b = document.getElementById(cosa2);
	var c = document.getElementById(cosa3);
	
		b.style.display = 'none';
		c.style.display = 'none';
		a.style.display = 'block';		
}

function cuatrirruptor(cosa1,cosa2,cosa3,cosa4){
	/*la cosa uno es la que se quiere ver, las otras apagar*/

	var a = document.getElementById(cosa1);
	var b = document.getElementById(cosa2);
	var c = document.getElementById(cosa3);
	var d = document.getElementById(cosa4);
	
		
	if (a.style.display == 'none'){
		b.style.display = 'none';
		c.style.display = 'none';
		d.style.display = 'none';
		a.style.display = 'block';		
	}
	else{
		b.style.display = 'none';
		c.style.display = 'none';
		a.style.display = 'none';	
		d.style.display = 'none';	
	}
		
}

//Función asociada al botón imprimir semanario
function imprimir(){
  var tab=document.getElementById('tablak');  //cargamos la id de la tabla de kollserola
  var objeto=document.getElementById('semanariok');  //cargamos la id del objeto a imprimir
  tab.width='100%'; //Le ponemos a la tabla la width en %, mejor de cara a ser imprimida
  var cabeza=document.getElementById('cabeceraprint');  //cargamos la cabecera de impresion (cabeceraimpresion.html)
  var ventana=window.open('','_blank');  //abrimos una ventana vacía nueva; en ella:
  ventana.document.write(cabeza.innerHTML);  //imprimimos la cabecera
  ventana.document.write(objeto.innerHTML);  //imprimimos la tabla (encerrada en el div semanariok)
  ventana.document.close();  //cerramos el documento
  ventana.print();  //imprimimos la ventana
  ventana.close();  //cerramos la ventana
  tab.width='1024px'; //Le devolvemos a la tabla de k la width del modo web
  
}

function ocultarasecas(cosa){
	var a = document.getElementById(cosa);
	a.style.display = 'none';
}




function quierosubirflyer(dia){

	document.getElementById('botonFileConClase'+dia).value=this.files[0].name;
	document.getElementById('miniflyer'+dia).style.display ='none';
	document.getElementById('quierosubirflyer'+dia).value ='ok';

}

function botonquitarflyer(dia){
	var a = document.getElementById('formueditar'+dia);
	var r = confirm("¿Quitamos el flyer?");
	if (r == true){
		a.action = '/ficha/quitarflyer.php';
		a.submit();
	}
}

function modovista(){
		var a = document.getElementsByClassName('imagenesencasilla');
		
		for (i = 0; i < a.length; i++) {
			a[i].style.display = (a[i].style.display == 'none') ? 'inline' : 'none';
		}

		var bot = document.getElementById('botonvertablaoflyers');
		var text2 = 'Mostrar<font size="-1"><br>imágenes</font>';
		var text1 = 'Ocultar<font size="-1"><br>imágenes</font>';
		bot.innerHTML = (bot.value == 1) ? text2 : text1;
		bot.value = (bot.value == 1) ? 0 : 1;
}

function selectorfechitas(modo){
	
	var a = document.getElementById('txt43');//'y'
	var b = document.getElementById('txt44');//'de'
	var c = document.getElementById('txt45');//'a'
	var d = document.getElementById('inputini');
	var x = document.getElementById('cuantosdias');//la variable que almacena si se trata de uno dos o varios dias
	
	if (modo == 'dos') {
		a.style.display = 'block';
		b.style.display = 'none';
		c.style.display = 'none';
		d.style.display = 'block';
		x.value = '2';
		
		}
	else if (modo == 'varios') {
		a.style.display = 'none';
		b.style.display = 'block';
		c.style.display = 'block';
		d.style.display = 'block';
		x.value = '3';
		}
	else {
		a.style.display = 'none';
		b.style.display = 'none';
		c.style.display = 'none';
		d.style.display = 'none';
		x.value = '1';
	}

}

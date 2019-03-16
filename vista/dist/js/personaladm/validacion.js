$(document).ready(function(){
	//$("span.help-block").hide();
	$("#btnvalidar").click(validaciones);
	$("#cedula").keyup(validarcedula);
	$("#nombre").keyup(validarnombre);
	$("#apellido").keyup(validarapellido);
	$("#telefono").keyup(validartelefono);
	$("#correo").keyup(validarcorreo);
	$("#sexo").click(validarsexo);




	//$("#sexo").change(validarsexo);
	/*$("#departamento").change(validardepartamento);
	$("#cargo").change(validarcargo);
	$("#estado").change(validarestado);
	$("#municipio").change(validarmunicipio);
	$("#parroquia").change(validarparroquia);
	$("#direccion").keyup(validardireccion);*/
});

//------------------------------Cedula--------------------------------//	
function validarcedula(){
var cedula = document.getElementById("cedula").value;

	if (cedula== null || cedula.length== 0 || /^\s+$/.test(cedula)){
		$('#icon_cedula').remove();		
		$('#cedula').parent().parent().attr("class", "form-group col-md-6 has-error has-feedback");
		$("#cedula").parent().parent().children("span.help-block").text("Ingrese algun numero, Por favor.").show();
		$("#cedula").focus();
		//$('#cedula').parent().append('<span id="icon_cedula class="glyphicon glyphicon-remove form-control-feedback"></span>');
		return false;
	}

	if ( filtrocedula(document.getElementById("cedula").value)==false) {
		$('#icon_cedula').remove();		
		$("#cedula").parent().parent().attr("class","form-group col-md-6 has-error has-feedback");
		$("#cedula").parent().parent().children("span.help-block").text("[Min 5, max 8 numeros]. Sin letras, ni simbolos").show();
		$("#cedula").focus();
		//$('#cedula').parent().append('<span id="icon_cedula" class="glyphicon glyphicon-remove form-control-feedback"></span>');
		return false;
	}
	else{
	    $('#icon_cedula').remove();
		$("#cedula").parent().parent().attr("class","form-group col-md-6 has-feedback");
		$("#cedula").parent().parent().children("span.help-block").text("Validado correctamente").show();
		//$('#cedula').parent().append('<i id="icon_nombre" class="glyphicon glyphicon-ok form-control-feedback"></i>');

		return true;
	}

}

//------------------------------SEXO--------------------------------//	
function validarsexo(){
var sexo = document.getElementById("sexo").value;

	if (sexo== null || sexo.length== 0 || /^\s+$/.test(sexo)){
		$('#icon_sexo').remove();		
		$('#sexo').parent().attr("class", "form-group col-md-12 has-error has-feedback");
		$("#sexo").parent().children("span.help-block").text("Seleccione por favor").show();
		$("#sexo").focus();
		//$('#sexo').parent().append('<span id="icon_sexo class="glyphicon glyphicon-remove form-control-feedback"></span>');
		return false;
	}

	if ( filtronombre(document.getElementById("sexo").value)=='') {
		$('#icon_sexo').remove();		
		$('#sexo').parent().attr("class", "form-group col-md-12 has-error has-feedback");
		$("#sexo").parent().children("span.help-block").text("Seleccione por favor").show();
		$("#sexo").focus();
		//$('#sexo').parent().append('<span id="icon_sexo" class="glyphicon glyphicon-remove form-control-feedback"></span>');
		return false;
	}
	else{
	    $('#icon_sexo').remove();
		$('#sexo').parent().attr("class", "form-group col-md-12 has-feedback");
		$("#sexo").parent().children("span.help-block").text("validado").show();
		//$('#sexo').parent().append('<i id="icon_nombre" class="glyphicon glyphicon-ok form-control-feedback"></i>');

		return true;
	}

}



//------------------------------NOMBRES--------------------------------//	
function validarnombre(){
var nombre = document.getElementById("nombre").value;
	if (nombre== null || nombre.length== 0 || /^\s+$/.test(nombre)){
		$('#icon_nombre').remove();		
		$('#nombre').parent().attr("class", "form-group col-md-6 has-error has-feedback");
		$("#nombre").parent().children("span.help-block").text("Ingrese algun caracter, Por favor.").show();
		$("#nombre").focus();
		//$('#nombre').parent().append('<span id="icon_nombre class="glyphicon glyphicon-remove form-control-feedback"></span>');
		return false;
	}

	if ( filtronombre(document.getElementById("nombre").value)==false) {
		$('#icon_nombre').remove();		
		$("#nombre").parent().attr("class","form-group col-md-6 has-error has-feedback");
		$("#nombre").parent().children("span.help-block").text("(Min. 2 caracteres. Solo letras.)").show();
		$("#nombre").focus();
		//$('#nombre').parent().append('<span id="icon_nombre" class="glyphicon glyphicon-remove form-control-feedback"></span>');
		return false;
	}
	else{
	    $('#icon_nombre').remove();
		$("#nombre").parent().attr("class","form-group col-md-6 has-feedback");
		$("#nombre").parent().children("span").text("¡Campo validado correctamente!").show();
		//$('#nombre').parent().append('<i id="icon_nombre" class="glyphicon glyphicon-ok form-control-feedback"></i>');

		return true;
	}

		/*if (nombre.length<2){
		$('#icon_nombre').remove();		
		$('#nombre').parent().attr("class", "form-group col-md-6 has-error has-feedback");
		$("#nombre").parent().children("span.help-block").text("Minimo 2 caracteres.").show();
		//$('#nombre').parent().append('<span id="icon_nombre class="glyphicon glyphicon-remove form-control-feedback"></span>');
		return false;
	}*/
}


//------------------------------APELLIDOS--------------------------------//

function validarapellido(){
var apellido = document.getElementById("apellido").value;

	if (apellido== null || apellido.length== 0 || /^\s+$/.test(apellido)){
		$('#icon_apellido').remove();		
		$('#apellido').parent().attr("class", "form-group col-md-6 has-error has-feedback");
		$("#apellido").parent().children("span.help-block").text("Ingrese algun caracter, Por favor.").show();
		$("#apellido").focus();
		//$('#apellido').parent().append('<span id="icon_apellido class="glyphicon glyphicon-remove form-control-feedback"></span>');
		return false;
	}


	if ( filtronombre(document.getElementById("apellido").value)==false) {
		$('#icon_apellido').remove();		
		$("#apellido").parent().attr("class","form-group col-md-6 has-error has-feedback");
		$("#apellido").parent().children("span.help-block").text("(Min. 2 caracteres. Solo letras.)").show();
		$("#apellido").focus();
		//$('#apellido').parent().append('<span id="icon_apellido" class="glyphicon glyphicon-remove form-control-feedback"></span>');
		return false;
	}
	else{
	    $('#icon_apellido').remove();
		$("#apellido").parent().attr("class","form-group col-md-6  has-feedback");
		$("#apellido").parent().children("span").text("¡Campo validado correctamente!").show();
		//$('#apellido').parent().append('<i id="icon_nombre" class="glyphicon glyphicon-ok form-control-feedback"></i>');

		return true;
	}

		/*if (apellido.length<2){
		$('#icon_nombre').remove();		
		$('#nombre').parent().attr("class", "form-group col-md-6 has-error has-feedback");
		$("#nombre").parent().children("span.help-block").text("Minimo 2 caracteres.").show();
		//$('#nombre').parent().append('<span id="icon_nombre class="glyphicon glyphicon-remove form-control-feedback"></span>');
		return false;
	}*/
}

//------------------------------SEXO--------------------------------//

/*function validarsexo(){
var sexo = document.getElementById("sexo").value;

	if (sexo== null || sexo.length== 0 || /^\s+$/.test(sexo)){
		$('#icon_sexo').remove();		
		$('#sexo').parent().attr("class", "form-group col-md-6 has-error has-feedback");
		$("#sexo").parent().children("span.help-block").text("(Seleccione por favor.)").show();
		$("#sexo").focus();
		//$('#sexo').parent().append('<span id="icon_sexo class="glyphicon glyphicon-remove form-control-feedback"></span>');
		return false;
	}


	if ( filtronombre(document.getElementById("sexo").value)=='') {
		$('#icon_sexo').remove();		
		$("#sexo").parent().attr("class","form-group col-md-6 has-error has-feedback");
		$("#sexo").parent().children("span.help-block").text("(Seleccione por favor.)").show();
		$("#sexo").focus();
		//$('#sexo').parent().append('<span id="icon_sexo" class="glyphicon glyphicon-remove form-control-feedback"></span>');
		return false;
	}
	else{
	    $('#icon_sexo').remove();
		$("#sexo").parent().attr("class","form-group col-md-6  has-feedback");
		$("#sexo").parent().children("span").text("¡Campo validado correctamente!").show();
		//$('#sexo').parent().append('<i id="icon_nombre" class="glyphicon glyphicon-ok form-control-feedback"></i>');
		return true;
	}

		/*if (apellido.length<2){
		$('#icon_nombre').remove();		
		$('#nombre').parent().attr("class", "form-group col-md-6 has-error has-feedback");
		$("#nombre").parent().children("span.help-block").text("Minimo 2 caracteres.").show();
		//$('#nombre').parent().append('<span id="icon_nombre class="glyphicon glyphicon-remove form-control-feedback"></span>');
		return false;
	}
}*/


//---------------------------TELEFONO-------------------------//
function validartelefono(){
var telefono = document.getElementById("telefono").value;

	if (telefono== null || telefono.length== 0 || /^\s+$/.test(telefono)){
		$('#icon_telefono').remove();		
		$('#telefono').parent().attr("class", "form-group col-md-6 has-feedback");
		$("#telefono").parent().children("span.help-block").text("(Opcional.)").show();
		$("#telefono").focus();
		//$('#telefono').parent().append('<span id="icon_telefono class="glyphicon glyphicon-remove form-control-feedback"></span>');
		return false;
	}

	if ( filtrotelefono(document.getElementById("telefono").value)==false) {
		$('#icon_telefono').remove();		
		$("#telefono").parent().attr("class","form-group col-md-6 has-error has-feedback");
		$("#telefono").parent().children("span.help-block").text("(Min. 11 caracteres. Solo numeros.)").show();
		$("#telefono").focus();
		//$('#telefono').parent().append('<span id="icon_telefono" class="glyphicon glyphicon-remove form-control-feedback"></span>');
		return false;
	}
	else{
	    $('#icon_telefono').remove();
		$("#telefono").parent().attr("class","form-group col-md-6  has-feedback");
		$("#telefono").parent().children("span").text("¡Campo validado correctamente!").show();
		//$('#telefono').parent().append('<i id="icon_nombre" class="glyphicon glyphicon-ok form-control-feedback"></i>');
		return true;
	}

		/*if (apellido.length<2){
		$('#icon_nombre').remove();		
		$('#nombre').parent().attr("class", "form-group col-md-6 has-error has-feedback");
		$("#nombre").parent().children("span.help-block").text("Minimo 2 caracteres.").show();
		//$('#nombre').parent().append('<span id="icon_nombre class="glyphicon glyphicon-remove form-control-feedback"></span>');
		return false;
	}*/
}

//---------------------------CORREO-------------------------//
function validarcorreo(){
var correo = document.getElementById("correo").value;

	if (correo== null || correo.length== 0 || /^\s+$/.test(correo)){
		$('#icon_correo').remove();		
		$('#correo').parent().attr("class", "form-group col-md-6 has-feedback");
		$("#correo").parent().children("span.help-block").text("(Opcional.)").show();
		$("#correo").focus();
		//$('#correo').parent().append('<span id="icon_correo class="glyphicon glyphicon-remove form-control-feedback"></span>');
		return false;
	}

	if ( filtrocorreo(document.getElementById("correo").value)==false) {
		$('#icon_correo').remove();		
		$("#correo").parent().attr("class","form-group col-md-6 has-error has-feedback");
		$("#correo").parent().children("span.help-block").text("(Ejemplo: john@doe.com)").show();
		$("#correo").focus();
		//$('#correo').parent().append('<span id="icon_correo" class="glyphicon glyphicon-remove form-control-feedback"></span>');
		return false;
	}
	else{
	    $('#icon_correo').remove();
		$("#correo").parent().attr("class","form-group col-md-6  has-feedback");
		$("#correo").parent().children("span").text("¡Campo validado correctamente!").show();
		//$('#correo').parent().append('<i id="icon_nombre" class="glyphicon glyphicon-ok form-control-feedback"></i>');
		return true;
	}

		/*if (apellido.length<2){
		$('#icon_nombre').remove();		
		$('#nombre').parent().attr("class", "form-group col-md-6 has-error has-feedback");
		$("#nombre").parent().children("span.help-block").text("Minimo 2 caracteres.").show();
		//$('#nombre').parent().append('<span id="icon_nombre class="glyphicon glyphicon-remove form-control-feedback"></span>');
		return false;
	}*/
}

//-------------------------------DEPARTAMENTO-----------//
/*function validardepartamento(){
var departamento = document.getElementById("departamento").value;

	if (departamento== null || departamento.length== 0 || /^\s+$/.test(departamento)){
		$('#icon_departamento').remove();		
		$('#departamento').parent().attr("class", "form-group col-md-6 has-error has-feedback");
		$("#departamento").parent().children("span.help-block").text("(Seleccione por favor.)").show();
		$("#departamento").focus();
		//$('#departamento').parent().append('<span id="icon_departamento class="glyphicon glyphicon-remove form-control-feedback"></span>');
		return false;
	}


	if ( filtroselect(document.getElementById("departamento").value)=='') {
		$('#icon_departamento').remove();		
		$("#departamento").parent().attr("class","form-group col-md-6 has-error has-feedback");
		$("#departamento").parent().children("span.help-block").text("(Seleccione por favor.)").show();
		$("#departamento").focus();
		//$('#departamento').parent().append('<span id="icon_departamento" class="glyphicon glyphicon-remove form-control-feedback"></span>');
		return false;
	}
	else{
	    $('#icon_departamento').remove();
		$("#departamento").parent().attr("class","form-group col-md-6  has-feedback");
		$("#departamento").parent().children("span").text("¡Campo validado correctamente!").show();
		//$('#departamento').parent().append('<i id="icon_nombre" class="glyphicon glyphicon-ok form-control-feedback"></i>');
		return true;
	}

		/*if (apellido.length<2){
		$('#icon_nombre').remove();		
		$('#nombre').parent().attr("class", "form-group col-md-6 has-error has-feedback");
		$("#nombre").parent().children("span.help-block").text("Minimo 2 caracteres.").show();
		//$('#nombre').parent().append('<span id="icon_nombre class="glyphicon glyphicon-remove form-control-feedback"></span>');
		return false;
	}
}*/

//-------------------------------CARGO-----------//
/*function validarcargo(){
var cargo = document.getElementById("cargo").value;

	if (cargo== null || cargo.length== 0 || /^\s+$/.test(cargo)){
		$('#icon_cargo').remove();		
		$('#cargo').parent().attr("class", "form-group col-md-6 has-error has-feedback");
		$("#cargo").parent().children("span.help-block").text("(Seleccione por favor.)").show();
		$("#cargo").focus();
		//$('#cargo').parent().append('<span id="icon_cargo class="glyphicon glyphicon-remove form-control-feedback"></span>');
		return false;
	}


	if ( filtroselect(document.getElementById("cargo").value)=='') {
		$('#icon_cargo').remove();		
		$("#cargo").parent().attr("class","form-group col-md-6 has-error has-feedback");
		$("#cargo").parent().children("span.help-block").text("(Seleccione por favor.)").show();
		$("#cargo").focus();
		//$('#cargo').parent().append('<span id="icon_cargo" class="glyphicon glyphicon-remove form-control-feedback"></span>');
		return false;
	}
	else{
	    $('#icon_cargo').remove();
		$("#cargo").parent().attr("class","form-group col-md-6  has-feedback");
		$("#cargo").parent().children("span").text("¡Campo validado correctamente!").show();
		//$('#cargo').parent().append('<i id="icon_nombre" class="glyphicon glyphicon-ok form-control-feedback"></i>');
		return true;
	}

		/*if (apellido.length<2){
		$('#icon_nombre').remove();		
		$('#nombre').parent().attr("class", "form-group col-md-6 has-error has-feedback");
		$("#nombre").parent().children("span.help-block").text("Minimo 2 caracteres.").show();
		//$('#nombre').parent().append('<span id="icon_nombre class="glyphicon glyphicon-remove form-control-feedback"></span>');
		return false;
	}
}*/

//-------------------ESTADO--------------------------------//
/*function validarestado(){
var estado = document.getElementById("estado").value;

	if (estado== null || estado.length== 0 || /^\s+$/.test(estado)){
		$('#icon_estado').remove();		
		$('#estado').parent().attr("class", "form-group col-md-4 has-error has-feedback");
		$("#estado").parent().children("span.help-block").text("(Seleccione por favor.)").show();
		$("#estado").focus();
		//$('#estado').parent().append('<span id="icon_estado class="glyphicon glyphicon-remove form-control-feedback"></span>');
		return false;
	}

	if ( filtroselect(document.getElementById("estado").value)=='') {
		$('#icon_estado').remove();		
		$("#estado").parent().attr("class","form-group col-md-4 has-error has-feedback");
		$("#estado").parent().children("span.help-block").text("(Seleccione por favor.)").show();
		$("#estado").focus();
		//$('#estado').parent().append('<span id="icon_estado" class="glyphicon glyphicon-remove form-control-feedback"></span>');
		return false;
	}
	else{
	    $('#icon_estado').remove();
		$("#estado").parent().attr("class","form-group col-md-4  has-feedback");
		$("#estado").parent().children("span").text("¡Campo validado correctamente!").show();
		//$('#estado').parent().append('<i id="icon_nombre" class="glyphicon glyphicon-ok form-control-feedback"></i>');
		return true;
	}

		if (apellido.length<2){
		$('#icon_nombre').remove();		
		$('#nombre').parent().attr("class", "form-group col-md-6 has-error has-feedback");
		$("#nombre").parent().children("span.help-block").text("Minimo 2 caracteres.").show();
		//$('#nombre').parent().append('<span id="icon_nombre class="glyphicon glyphicon-remove form-control-feedback"></span>');
		return false;
	}
}*/

//-------------------MUNICIPIO--------------------------------//
/*function validarmunicipio(){
var municipio = document.getElementById("municipio").value;

	if (municipio== null || municipio.length== 0 || /^\s+$/.test(municipio)){
		$('#icon_municipio').remove();		
		$('#municipio').parent().attr("class", "form-group col-md-4 has-error has-feedback");
		$("#municipio").parent().children("span.help-block").text("(Seleccione por favor.)").show();
		$("#municipio").focus();
		//$('#municipio').parent().append('<span id="icon_municipio class="glyphicon glyphicon-remove form-control-feedback"></span>');
		return false;
	}

	if ( filtroselect(document.getElementById("municipio").value)=='') {
		$('#icon_municipio').remove();		
		$("#municipio").parent().attr("class","form-group col-md-4 has-error has-feedback");
		$("#municipio").parent().children("span.help-block").text("(Seleccione por favor.)").show();
		$("#municipio").focus();
		//$('#municipio').parent().append('<span id="icon_municipio" class="glyphicon glyphicon-remove form-control-feedback"></span>');
		return false;
	}
	else{
	    $('#icon_municipio').remove();
		$("#municipio").parent().attr("class","form-group col-md-4  has-feedback");
		$("#municipio").parent().children("span").text("¡Campo validado correctamente!").show();
		//$('#municipio').parent().append('<i id="icon_nombre" class="glyphicon glyphicon-ok form-control-feedback"></i>');
		return true;
	}

		/*if (apellido.length<2){
		$('#icon_nombre').remove();		
		$('#nombre').parent().attr("class", "form-group col-md-6 has-error has-feedback");
		$("#nombre").parent().children("span.help-block").text("Minimo 2 caracteres.").show();
		//$('#nombre').parent().append('<span id="icon_nombre class="glyphicon glyphicon-remove form-control-feedback"></span>');
		return false;
	}
}*/

//-------------------PARROQUIA--------------------------------//
/*function validarparroquia(){
var parroquia = document.getElementById("parroquia").value;

	if (parroquia== null || parroquia.length== 0 || /^\s+$/.test(parroquia)){
		$('#icon_parroquia').remove();		
		$('#parroquia').parent().attr("class", "form-group col-md-4 has-error has-feedback");
		$("#parroquia").parent().children("span.help-block").text("(Seleccione por favor.)").show();
		$("#parroquia").focus();
		//$('#parroquia').parent().append('<span id="icon_parroquia class="glyphicon glyphicon-remove form-control-feedback"></span>');
		return false;
	}

	if ( filtroselect(document.getElementById("parroquia").value)=='') {
		$('#icon_parroquia').remove();		
		$("#parroquia").parent().attr("class","form-group col-md-4 has-error has-feedback");
		$("#parroquia").parent().children("span.help-block").text("(Seleccione por favor.)").show();
		$("#parroquia").focus();
		//$('#parroquia').parent().append('<span id="icon_parroquia" class="glyphicon glyphicon-remove form-control-feedback"></span>');
		return false;
	}
	else{
	    $('#icon_parroquia').remove();
		$("#parroquia").parent().attr("class","form-group col-md-4  has-feedback");
		$("#parroquia").parent().children("span").text("¡Campo validado correctamente!").show();
		//$('#parroquia').parent().append('<i id="icon_nombre" class="glyphicon glyphicon-ok form-control-feedback"></i>');
		return true;
	}

		if (apellido.length<2){
		$('#icon_nombre').remove();		
		$('#nombre').parent().attr("class", "form-group col-md-6 has-error has-feedback");
		$("#nombre").parent().children("span.help-block").text("Minimo 2 caracteres.").show();
		//$('#nombre').parent().append('<span id="icon_nombre class="glyphicon glyphicon-remove form-control-feedback"></span>');
		return false;
	}
}*/

//-------------------PARROQUIA--------------------------------//
/*function validardireccion(){
var direccion = document.getElementById("direccion").value;

	if (direccion== null || direccion.length== 0 || /^\s+$/.test(direccion)){
		$('#icon_direccion').remove();		
		$('#direccion').parent().attr("class", "form-group col-md-12 has-error has-feedback");
		$("#direccion").parent().children("span.help-block").text("(Ingrese una direccion.)").show();
		$("#direccion").focus();
		//$('#direccion').parent().append('<span id="icon_direccion class="glyphicon glyphicon-remove form-control-feedback"></span>');
		return false;
	}

	if ( filtrodireccion(document.getElementById("direccion").value)==false) {
		$('#icon_direccion').remove();		
		$("#direccion").parent().attr("class","form-group col-md-12 has-error has-feedback");
		$("#direccion").parent().children("span.help-block").text("(Minimo 2 caracteres.)").show();
		$("#direccion").focus();
		//$('#direccion').parent().append('<span id="icon_direccion" class="glyphicon glyphicon-remove form-control-feedback"></span>');
		return false;
	}
	else{
	    $('#icon_direccion').remove();
		$("#direccion").parent().attr("class","form-group col-md-12  has-feedback");
		$("#direccion").parent().children("span").text("¡Campo validado correctamente!").show();
		//$('#direccion').parent().append('<i id="icon_nombre" class="glyphicon glyphicon-ok form-control-feedback"></i>');
		return true;
	}

		/*if (apellido.length<2){
		$('#icon_nombre').remove();		
		$('#nombre').parent().attr("class", "form-group col-md-6 has-error has-feedback");
		$("#nombre").parent().children("span.help-block").text("Minimo 2 caracteres.").show();
		//$('#nombre').parent().append('<span id="icon_nombre class="glyphicon glyphicon-remove form-control-feedback"></span>');
		return false;
	}
}*/


function validaciones(){
	 validarnombre();
	 validarapellido();
	 validarsexo();
	 validarcedula();
	 validartelefono();
	 validarcorreo();
	 /*validardepartamento();
	 validarcargo();
	 validarestado();
	 validarmunicipio();
	 validarparroquia();
	 validardireccion();*/
}

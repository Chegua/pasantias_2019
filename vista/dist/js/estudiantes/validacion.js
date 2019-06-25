$(document).ready(function(){
	$("span.help-block").hide();
	$("#btnvalidar").click(validaciones);
	// $("#tipo").change(validartipo);
	// $("#rif").keyup(validarrif);
	// $("#nombre").keyup(validarnombre);
	// $("#telefono").keyup(validartelefono);
	$("#correo").keyup(validarcorreo);
	// $("#estado").change(validarestado);
});


// function validarrif(){

// var rif = document.getElementById("rif").value;//capturo el valor

// 	if (rif== null || rif.length== 0 || /^\s+$/.test(rif)){//si esta vacio
// 		$('#rif').parent().attr("class", "form-group col-md-4 has-error has-feedback");
// 		$("#rif").parent().children("span.help-block").text("(Introduzca un rif por favor.)").hide();
// 		$("#rif").focus();
// 		//$('#tipo').parent().append('<span id="icon_tipo class="glyphicon glyphicon-remove form-control-feedback"></span>');
// 		return false;
// 	}

// 	if ( filtrorif(document.getElementById("rif").value)==false) {
// 		$("#rif").parent().attr("class","form-group col-md-4 has-error has-feedback");
// 		$("#rif").parent().children("span.help-block").text("No [!#$%&/()=?]. No [a-Z]").hide();
// 		$("#rif").focus();
// 		//$('#tipo').parent().append('<span id="icon_tipo" class="glyphicon glyphicon-remove form-control-feedback"></span>');
// 		return false;
// 	}
// 	else{
// 		$("#rif").parent().attr("class","form-group col-md-4  has-feedback");
// 		$("#rif").parent().children("span").text("(¡Listo!)").hide();
// 		//$('#tipo').parent().append('<i id="icon_nombre" class="glyphicon glyphicon-ok form-control-feedback"></i>');
// 		return true;
// 	}
// }

// function validarnombre(){

// var nombre = document.getElementById("nombre").value;//capturo el valor

// 	if (nombre== null || nombre.length== 0 || /^\s+$/.test(nombre)){//si esta vacio
// 		$("#nombre").parent().parent().attr("class", "form-group col-md-6 has-error has-feedback");
// 		$("#nombre").parent().parent().children("span.help-block").text("(Introduzca un nombre por favor)").hide();
// 		$("#nombre").focus();
// 		//$('#tipo').parent().append('<span id="icon_tipo class="glyphicon glyphicon-remove form-control-feedback"></span>');
// 		return false;
// 	}

// if ( filtronombre(document.getElementById("nombre").value)== false) {
// 		$("#nombre").parent().parent().attr("class","form-group col-md-6 has-error has-feedback");
// 		$("#nombre").parent().parent().children("span.help-block").text("[Min 2 caracteres]. Solo letras").hide();
// 		$("#nombre").focus();
// 		//$('#tipo').parent().append('<span id="icon_tipo" class="glyphicon glyphicon-remove form-control-feedback"></span>');
// 		return false;
// 	}
// 	else{
// 		$("#nombre").parent().parent().attr("class","form-group col-md-6  has-feedback");
// 		$("#nombre").parent().parent().children("span.help-block").text("(¡Listo!)").hide();
// 		//$('#tipo').parent().append('<i id="icon_nombre" class="glyphicon glyphicon-ok form-control-feedback"></i>');
// 		return true;
// 	}
// }

// function validartelefono(){

// var telefono = document.getElementById("telefono").value;//capturo el valor

// 	if (telefono== null || telefono.length== 0 || /^\s+$/.test(telefono)){//si esta vacio
// 		$("#telefono").parent().attr("class", "form-group col-md-6 has-feedback");
// 		$("#telefono").parent().children("span.help-block").text("(ingrese su numero de tlfno)").hide();
// 		$("#telefono").focus();
// 		//$('#tipo').parent().append('<span id="icon_tipo class="glyphicon glyphicon-remove form-control-feedback"></span>');
// 		return false;
// 	}
// if ( filtrotelefono(document.getElementById("telefono").value)== false) {
// 		$("#telefono").parent().attr("class","form-group col-md-6 has-error has-feedback");
// 		$("#telefono").parent().children("span.help-block").text("[minimo 11]").hide();
// 		$("#telefono").focus();
// 		//$('#tipo').parent().append('<span id="icon_tipo" class="glyphicon glyphicon-remove form-control-feedback"></span>');
// 		return false;
// 	}
// 	else{
// 		$("#telefono").parent().attr("class","form-group col-md-6  has-feedback");
// 		$("#telefono").parent().children("span.help-block").text("(¡Listo!)").hide();
// 		//$('#tipo').parent().append('<i id="icon_nombre" class="glyphicon glyphicon-ok form-control-feedback"></i>');
// 		return true;
// 	}
// }



function validarcorreo(){

var correo = document.getElementById("correo").value;//capturo el valor

	if (correo== null || correo.length== 0 || /^\s+$/.test(correo)){//si esta vacio
		$("#correo").parent().attr("class", "form-group col-md-6 has-feedback");
		$("#correo").parent().children("span.help-block").text("(opcional)").hide();
		$("#correo").focus();
		//$('#tipo').parent().append('<span id="icon_tipo class="glyphicon glyphicon-remove form-control-feedback"></span>');
		return false;
	}
if ( filtrocorreo(document.getElementById("correo").value)== false) {
		$("#correo").parent().attr("class","form-group col-md-6 has-error has-feedback");
		$("#correo").parent().children("span.help-block").text("[@nose.com]").hide();
		$("#correo").focus();
		//$('#tipo').parent().append('<span id="icon_tipo" class="glyphicon glyphicon-remove form-control-feedback"></span>');
		return false;
	}
	else{
		$("#correo").parent().attr("class","form-group col-md-6  has-feedback");
		$("#correo").parent().children("span.help-block").text("(¡Listo!)").hide();
		//$('#tipo').parent().append('<i id="icon_nombre" class="glyphicon glyphicon-ok form-control-feedback"></i>');
		return true;
	}
}

// function validarestado(){

// var estado = document.getElementById("estado").value;//capturo el valor

// 	if (estado== null || estado.length== 0 || /^\s+$/.test(estado)){//si esta vacio
// 		$("#estado").parent().attr("class", "form-group col-md-3 has-error has-feedback");
// 		$("#estado").parent().children("span.help-block").text("(opcional)").hide();
// 		$("#estado").focus();
// 		//$('#tipo').parent().append('<span id="icon_tipo class="glyphicon glyphicon-remove form-control-feedback"></span>');
// 		return false;
// 	}
// if ( filtrodireccion2(document.getElementById("estado").value)== false) {
// 		$("#estado").parent().attr("class","form-group col-md-3 has-error has-feedback");
// 		$("#estado").parent().children("span.help-block").text("[@nose.com]").hide();
// 		$("#estado").focus();
// 		//$('#tipo').parent().append('<span id="icon_tipo" class="glyphicon glyphicon-remove form-control-feedback"></span>');
// 		return false;
// 	}
// 	else{
// 		$("#estado").parent().attr("class","form-group col-md-3  has-feedback");
// 		$("#estado").parent().children("span.help-block").text("(¡Listo!)").hide();
// 		//$('#tipo').parent().append('<i id="icon_nombre" class="glyphicon glyphicon-ok form-control-feedback"></i>');
// 		return true;
// 	}
// }





function validaciones(){
	// validartipo();
	// validarrif();
	// validarnombre();
	// validartelefono();
	validarcorreo();
	// validarestado();
}

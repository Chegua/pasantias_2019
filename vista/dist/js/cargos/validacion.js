$(document).ready(function(){
	//$("span.help-block").hide();
	$("#btnvalidar").click(validaciones);
	$("#cargo").keyup(validarcargo);
	$("#cargo").click(validarcargo);

	$("tipo").change(validarselect);
});


function validarcargo(){
var valor = document.getElementById("cargo").value;
	
	if (valor== null || valor.length== 0 || /^\s+$/.test(valor)){
		$('#icon_cargo').remove();		
		$('#cargo').parent().parent().attr("class", "form-group  has-error has-feedback");
		$("#cargo").parent().children("span.help-block").text("Ingrese algun caracter, Por favor.").show();
		$("#cargo").focus();
		//$('#cargo').parent().append('<span id="icon_cargo class="glyphicon glyphicon-remove form-control-feedback"></span>');
		return false;
	}

	/*if (valor.length<2){
		$('#icon_cargo').remove();		
		$('#cargo').parent().parent().attr("class", "form-group  has-error has-feedback");
		$("#cargo").parent().children("span.help-block").text("Minimo 2 caracteres.").show();
		//$('#cargo').parent().append('<span id="icon_cargo class="glyphicon glyphicon-remove form-control-feedback"></span>');
		return false;
	}*/

	if ( filtrocargo(document.getElementById("cargo").value)==false) {
		$('#icon_cargo').remove();		
		$("#cargo").parent().parent().attr("class","form-group has-error has-feedback");
		$("#cargo").parent().children("span.help-block").text("No esta permitido simbolos [!''#$%&¡]").show();
		$("#cargo").focus();
		//$('#cargo').parent().append('<span id="icon_cargo" class="glyphicon glyphicon-remove form-control-feedback"></span>');
		return false;
	}
	else{
	    $('#icon_cargo').remove();
		$("#cargo").parent().parent().attr("class","form-group  has-feedback");
		$("#cargo").parent().children("span").text("¡Campo validado correctamente!").show();
		//$('#cargo').parent().append('<i id="icon_cargo" class="glyphicon glyphicon-ok form-control-feedback"></i>');

		return true;
	}
}



function validarselect(){
var tipo = document.getElementById("tipo").value;

	if (tipo== null || tipo.length== 0 || /^\s+$/.test(tipo)){
		$('#icon_tipo').remove();		
		$('#tipo').parent().parent().attr("class", "form-group  has-error has-feedback");
		$("#tipo").parent().children("span.help-block").text("Seleccione por favor").show();
		$("#tipo").focus();
		//$('#tipo').parent().append('<span id="icon_tipo class="glyphicon glyphicon-remove form-control-feedback"></span>');
		return false;
	}

	if ( filtroselect(document.getElementById("tipo").value)=='') {
		$('#icon_tipo').remove();		
		$("#tipo").parent().parent().attr("class","form-group has-error has-feedback");
		$("#tipo").parent().children("span.help-block").text("(Seleccione por favor.)").show();
		$("#tipo").focus();
		//$('#tipo').parent().append('<span id="icon_tipo" class="glyphicon glyphicon-remove form-control-feedback"></span>');
		return false;
	}
	else{
	    $('#icon_tipo').remove();
		$("#tipo").parent().parent().attr("class","form-group  has-feedback");
		$("#tipo").parent().children("span").text("¡Campo validado correctamente!").show();
		//$('#tipo').parent().append('<i id="icon_nombre" class="glyphicon glyphicon-ok form-control-feedback"></i>');
		return true;
	}

		/*if (apellido.length<2){
		$('#icon_nombre').remove();		
		$('#nombre').parent().attr("class", "form-group col-md-6 has-error has-feedback");
		$("#nombre").parent().children("span.help-block").text("Minimo 2 caracteres.").show();
		//$('#nombre').parent().append('<span id="icon_nombre class="glyphicon glyphicon-remove form-control-feedback"></span>');
		return false;
	}
*/
}



function validaciones(){
	validarcargo();
	validarselect();
}




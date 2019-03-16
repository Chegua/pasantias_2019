$(document).ready(function(){
	//$("span.help-block").hide();
	$("#btnvalidar").click(validar);
	$("#mencion").keyup(validar);
});


function validar(){
var valor = document.getElementById("mencion").value;
	
	if (valor== null || valor.length== 0 || /^\s+$/.test(valor)){
		$('#icon_mencion').remove();		
		$('#mencion').parent().parent().attr("class", "form-group  has-error has-feedback");
		$("#mencion").parent().children("span.help-block").text("Ingrese algun caracter, Por favor.").show();
		$("#mencion").focus();
		//$('#mencion').parent().append('<span id="icon_mencion class="glyphicon glyphicon-remove form-control-feedback"></span>');
		return false;
	}

	/*if (valor.length<2){
		$('#icon_mencion').remove();		
		$('#mencion').parent().parent().attr("class", "form-group  has-error has-feedback");
		$("#mencion").parent().children("span.help-block").text("Minimo 2 caracteres.").show();
		//$('#mencion').parent().append('<span id="icon_mencion class="glyphicon glyphicon-remove form-control-feedback"></span>');
		return false;
	}*/

	if ( filtromencion(document.getElementById("mencion").value)==false) {
		$('#icon_mencion').remove();		
		$("#mencion").parent().parent().attr("class","form-group has-error has-feedback");
		$("#mencion").parent().children("span.help-block").text("No esta permitido simbolos [!''#$%&¡]").show();
		$("#mencion").focus();
		//$('#mencion').parent().append('<span id="icon_mencion" class="glyphicon glyphicon-remove form-control-feedback"></span>');
		return false;
	}
	else{
	    $('#icon_mencion').remove();
		$("#mencion").parent().parent().attr("class","form-group has-success has-feedback");
		$("#mencion").parent().children("span").text("¡Campo validado correctamente!").show();
		//$('#mencion').parent().append('<i id="icon_mencion" class="glyphicon glyphicon-ok form-control-feedback"></i>');
		return true;
	}
}








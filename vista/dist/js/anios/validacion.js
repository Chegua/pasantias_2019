$(document).ready(function(){
	//$("span.help-block").hide();
	$("#btnvalidar").click(validar);
	$("#grado").keyup(validar);
});


function validar(){
var valor = document.getElementById("grado").value;
	
	if (valor== null || valor.length== 0 || /^\s+$/.test(valor)){
		$('#icon_grado').remove();		
		$('#grado').parent().parent().attr("class", "form-group  has-error has-feedback");
		$("#grado").parent().children("span.help-block").text("Ingrese algun caracter, Por favor.").show();
		$("#grado").focus();
		//$('#grado').parent().append('<span id="icon_grado class="glyphicon glyphicon-remove form-control-feedback"></span>');
		return false;
	}

	/*if (valor.length<2){
		$('#icon_grado').remove();		
		$('#grado').parent().parent().attr("class", "form-group  has-error has-feedback");
		$("#grado").parent().children("span.help-block").text("Minimo 2 caracteres.").show();
		//$('#grado').parent().append('<span id="icon_grado class="glyphicon glyphicon-remove form-control-feedback"></span>');
		return false;
	}*/

	if ( filtrogrado(document.getElementById("grado").value)==false) {
		$('#icon_grado').remove();		
		$("#grado").parent().parent().attr("class","form-group has-error has-feedback");
		$("#grado").parent().children("span.help-block").text("No esta permitido simbolos [!''#$%&¡]").show();
		$("#grado").focus();
		//$('#grado').parent().append('<span id="icon_grado" class="glyphicon glyphicon-remove form-control-feedback"></span>');
		return false;
	}
	else{
	    $('#icon_grado').remove();
		$("#grado").parent().parent().attr("class","form-group has-success has-feedback");
		$("#grado").parent().children("span").text("¡Campo validado correctamente!").show();
		//$('#grado').parent().append('<i id="icon_grado" class="glyphicon glyphicon-ok form-control-feedback"></i>');

		return true;
	}
}








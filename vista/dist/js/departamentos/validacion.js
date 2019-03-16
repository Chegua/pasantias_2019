$(document).ready(function(){
	//$("span.help-block").hide();
	$("#btnvalidar").click(validar);
	$("#departamento").keyup(validar);
});


function validar(){
var valor = document.getElementById("departamento").value;
	
	if (valor== null || valor.length== 0 || /^\s+$/.test(valor)){
		$('#icon_departamento').remove();		
		$('#departamento').parent().parent().attr("class", "form-group  has-error has-feedback");
		$("#departamento").parent().children("span.help-block").text("Ingrese algun caracter, Por favor.").show();
		$("#departamento").focus();
		//$('#departamento').parent().append('<span id="icon_departamento class="glyphicon glyphicon-remove form-control-feedback"></span>');
		return false;
	}

	/*if (valor.length<2){
		$('#icon_departamento').remove();		
		$('#departamento').parent().parent().attr("class", "form-group  has-error has-feedback");
		$("#departamento").parent().children("span.help-block").text("Minimo 2 caracteres.").show();
		//$('#departamento').parent().append('<span id="icon_departamento class="glyphicon glyphicon-remove form-control-feedback"></span>');
		return false;
	}*/

	if ( filtrodepartamento(document.getElementById("departamento").value)==false) {
		$('#icon_departamento').remove();		
		$("#departamento").parent().parent().attr("class","form-group has-error has-feedback");
		$("#departamento").parent().children("span.help-block").text("No esta permitido simbolos [!''#$%&¡]").show();
		$("#departamento").focus();
		//$('#departamento').parent().append('<span id="icon_departamento" class="glyphicon glyphicon-remove form-control-feedback"></span>');
		return false;
	}
	else{
	    $('#icon_departamento').remove();
		$("#departamento").parent().parent().attr("class","form-group has-success has-feedback");
		$("#departamento").parent().children("span").text("¡Campo validado correctamente!").show();
		//$('#departamento').parent().append('<i id="icon_departamento" class="glyphicon glyphicon-ok form-control-feedback"></i>');

		return true;
	}
}








$(document).ready(function(){
	$('#departamento').keyup(function(e){
		let valor=$('#departamento').val();

		$.ajax({
			url:"../../../controlador/c_departamento.php",
			method: "POST",
			data:{'opcion':'filtrar','valor':valor}, 
			dataType: "json",
			success:function(result){
				$('#filtrar').empty(texto);




				for (var i = 0; i < result.length; i++) {
					var texto = '<table border="1">'+
								'<tr>'+
									'<th>departamento<th>'+
								'</tr>'+

								'<tr>'+
									'<td>' +  result[i]['departamento']; + ' </td>'+
								'</tr>'+

								'</table>' ;
								

					$('#filtrar').append(texto);
				}
			},
			error:function(result){
				$('#filtrar').empty('');
			}	

		});
	});
});
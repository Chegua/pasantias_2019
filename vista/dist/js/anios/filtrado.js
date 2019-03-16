$(document).ready(function(){
	$('#cargo').keyup(function(e){
		let valor=$('#cargo').val();

		$.ajax({
			url:"../../../controlador/c_cargo.php",
			method: "POST",
			data:{'opcion':'filtrar','valor':valor}, 
			dataType: "json",
			success:function(result){
				$('#filtrar').empty(texto);




				for (var i = 0; i < result.length; i++) {
					var texto = '<table border="1">'+
								'<tr>'+
									'<th>Cargo<th>'+
								'</tr>'+

								'<tr>'+
									'<td>' +  result[i]['cargo']; + ' </td>'+
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
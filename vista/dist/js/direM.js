$(document).ready(function(){
	//$("#opcion").val('listarEstado');
	$.ajax({
			url:'../../../controlador/controladordire.php',
			method:'GET',
			data:{'opcion':'listarEstado'},
			dataType:'json',
			success:function(result){ //data,textStatus,jqXHR
				var respuesta= result['respuesta'];
				for(var i=0;i<respuesta.length;i++){
					var texto='<option value='+respuesta[i]['id_estado']+' >'+respuesta[i]['nombre_estado'] +'</option>';
					$("#estado").append(texto);
				}

			},
			error:function(result){ //xhr,status,error
				alert("error: "+result.responseText+" "+result.status);
			}


		});//fin Ajax

		function cargar_parroquia() {
			var codigo=$("#municipio").val();
			var nombre=$("#municipio option:selected").text();
			$.ajax({
				url:'../../../controlador/controladordire.php',
				data:{'opcion':'listarParroquia','codigo':codigo,'nombre':nombre},
				method:'GET',
				dataType:'json',
				success:function(result){ //data,textStatus,jqXHR
					$("#parroquia").empty();
					var respuesta=result['respuesta'];
					for(var i=0;i<respuesta.length;i++){
						var texto='<option value='+respuesta[i]['id_parroquia']+' >'+respuesta[i]['nombre_parroquia'] +'</option>';
						$("#parroquia").append(texto);
						cargar_comunidad();
					}
				},
				error:function(result){ //xhr,status,error
					alert("error: "+result.responseText+" "+result.status);
				}

			})//fin Ajax

		}

		function cargar_comunidad() {
			var codigo=$("#parroquia").val();
			var nombre=$("#parroquia option:selected").text();
			$.ajax({
				url:'../../../controlador/controladordire.php',
				data:{'opcion':'listarParroquia','codigo':codigo,'nombre':nombre},
				method:'GET',
				dataType:'json',
				success:function(result){ //data,textStatus,jqXHR
					$("#comunidad").empty();
					var respuesta=result['respuesta'];
					for(var i=0;i<respuesta.length;i++){
						var texto='<option value='+respuesta[i]['id_comunidad']+' >'+respuesta[i]['nombre_comunidad'] +'</option>';
						$("#comunidad").append(texto);
					}
				},
				error:function(result){ //xhr,status,error
					alert("error: "+result.responseText+" "+result.status);
				}

			})//fin Ajax dentro

		}

	/*Podemos programar el evento change del select ***/
	$("#estado").change(function(){
		var codigo=$("#estado").val();
		var nombre=$("#estado option:selected").text();
		$.ajax({
			url:'../../../controlador/controladordire.php',
			data:{'opcion':'listarMunicipio','codigo':codigo,'nombre':nombre},
			method:'GET',
			dataType:'json',
			success:function(result){ //data,textStatus,jqXHR
				$("#municipio").empty();
				var respuesta=result['respuesta'];
				for(var i=0;i<respuesta.length;i++){
					var texto='<option value='+respuesta[i]['id_municipio']+' >'+respuesta[i]['nombre_municipio'] +'</option>';
					$("#municipio").append(texto);
					cargar_parroquia();
				}
			},
			error:function(result){ //xhr,status,error
				alert("error: "+result.responseText+" "+result.status);
			}


		})//fin Ajax dentro del change

	});//fin change

	$("#municipio").change(function(){
		var codigo=$("#municipio").val();
		var nombre=$("#municipio option:selected").text();
		$.ajax({
			url:'../../../controlador/controladordire.php',
			data:{'opcion':'listarParroquia','codigo':codigo,'nombre':nombre},
			method:'GET',
			dataType:'json',
			success:function(result){ //data,textStatus,jqXHR
				$("#parroquia").empty();
				var respuesta=result['respuesta'];
				for(var i=0;i<respuesta.length;i++){
					var texto='<option value='+respuesta[i]['id_parroquia']+' >'+respuesta[i]['nombre_parroquia'] +'</option>';
					$("#parroquia").append(texto);
					cargar_comunidad();
				}
			},
			error:function(result){ //xhr,status,error
				alert("error: "+result.responseText+" "+result.status);
			}

		})//fin Ajax dentro del change

	});

	$("#parroquia").change(function(){
		var codigo=$("#parroquia").val();
		var nombre=$("#parroquia option:selected").text();
		$.ajax({
			url:'../../../controlador/controladordire.php',
			data:{'opcion':'listarComunidad','codigo':codigo,'nombre':nombre},
			method:'GET',
			dataType:'json',
			success:function(result){ //data,textStatus,jqXHR
				$("#comunidad").empty();
				var respuesta=result['respuesta'];
				for(var i=0;i<respuesta.length;i++){
					var texto='<option value='+respuesta[i]['id_comunidad']+' >'+respuesta[i]['nombre_comunidad'] +'</option>';
					$("#comunidad").append(texto);
				}
			},
			error:function(result){ //xhr,status,error
				alert("error: "+result.responseText+" "+result.status);
			}

		})//fin Ajax dentro del change

	});

});//fin ready

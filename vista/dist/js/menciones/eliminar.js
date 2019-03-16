function preguntar(id){
	alertify.confirm('Eliminar Datos', '¿Esta seguro de eliminar este registro?',
		function(){ eliminarDato(id) },
		function(){alertify.error('Cancelado')});
}

function eliminarDato(id){

	$.ajax({
		url: "../../../controlador/c_mencion.php",
		type: "POST",
		data: {'id': id, 'opcion': 'eliminar'}, 
		dataType:'json',
		success:function(r){
			if (r==1) {
				alertify.success("¡Eliminado con exito!")
				 location.reload();

			}else{
				alertify.error("Fallo el servidor");
			}
		}
	});
}


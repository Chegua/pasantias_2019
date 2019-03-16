function preguntar(id,opcion){
	alertify.confirm('Eliminar Datos', '¿Esta seguro de eliminar este registro?',
		function(){ eliminar(id,opcion) },
		function(){alertify.error('Cancelado')}).set('labels',{ok:'Si', cancel:'No'});
}

function eliminar(id,opcion){
	 window.location="../../../controlador/c_historial_academico.php?id=" + id + "&opcion=" + opcion;		
}
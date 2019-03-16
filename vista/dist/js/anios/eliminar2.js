function preguntar(id,opcion){
	alertify.confirm('Eliminar Datos', '¿Esta seguro de eliminar este registro?',
		function(){ eliminar(id,opcion) },
		function(){alertify.error('Cancelado')});
}

function eliminar(id,opcion){
	 window.location="../../../controlador/c_anios.php?id=" + id + "&opcion=" + opcion;
}

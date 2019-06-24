$(document).ready(function(){
	function redireccionar(){
        //window.location="http://localhost/kukul_tales/usuario-01.html";
    }

	$(document).on("click",'.eliminar',function(){
		var id= $(this).val();
		alertify.confirm('Eliminar Datos', '¿Esta seguro de eliminar este registro?',
		function(){ eliminar(id) },
		function(){alertify.error('Cancelado')}).set('labels',{ok:'Si', cancel:'No'});
	})

	function eliminar(id){
		const postData={
			id: id,
			opcion: 'eliminar'
		}
		$.ajax({
			url: '../../../controlador/c_estado.php',
            method: 'post',
            data: postData,
            dataType: 'json',
            success: function(r){
                console.log(postData);  
                alertify.success('Eliminado con exito');
                console.log(r);
                // setTimeout (go_to_index(), 6000); 
            },
            error: function(r){
                console.log(postData);  
                alertify.error(r.responseText);
                //alert("error: "+r.responseText+" "+r.status);    
            }
		});
	}
		
	
});

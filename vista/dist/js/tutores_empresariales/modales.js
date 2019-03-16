function elegir_empresa(id){
  // console.log(empre);
  $.ajax({
      url:'../../../controlador/c_empresa.php',
      method:'GET',
      data:{'opcion':'encontrar', 'id':id},
      dataType:'json',
      success:function(result){ //data,textStatus,jqXHR
        // $('#filtrar').empty(texto);
        empresa= result[0]['empresa'];
        rif= result[0]['tipo']+'-'+result[0]['rif'];

        $('#emp').val(empresa);
        $('#rif').val(rif);
        $('#area').empty();
        for (var i = 0; i < result.length; i++) {
           var texto= ' <option value='+result[i]['id_empresa_mencion']+'>'+result[i]['mencion'] +'</option>';
           $('#area').append(texto);
        }
      },
      error:function(result) {
        // alert("error: "+result.responseText+" "+result.status);
        console.log("error: "+result.responseText+" "+result.status);
        // $('#filtrar').empty('');
      }
    });
}

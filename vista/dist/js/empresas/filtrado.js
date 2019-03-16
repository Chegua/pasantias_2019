$(document).ready(function(){
  $('#grilla').hide();
  $('#nombre').keyup(function(e) {
    let valor= $('#nombre').val();
    $.ajax({
        url:'../../../controlador/c_empresa.php',
        method:'GET',
        data:{'opcion':'filtrar', 'valor':valor},
        dataType:'json',
        success:function(result){ //data,textStatus,jqXHR
          if (result.length>0) {
            $('#grilla').show();
          }

          $('#filtrar').empty(texto);

          for (var i = 0; i < result.length; i++) {
            var texto= ' <tr> <td>'+result[i]['empresa']+'</td> <td>'+result[i]['tipo']+'-'+result[i]['rif']+'</td>  </tr>';
            //$('#filtrar').html(texto);
            $('#filtrar').append(texto);
          }
        },
        error:function(result) {
          //alert("error: "+result.responseText+" "+result.status);
          $('#grilla').hide();
          $('#filtrar').empty('');
        }
      });
  });
});

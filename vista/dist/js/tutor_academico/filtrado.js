$(document).ready(function(){
  $('#cedula').keyup(function(e) {
    let valor= $('#cedula').val();
    $.ajax({
        url:'../../../controlador/c_historial_academico.php',
        method:'GET',
        data:{'opcion':'filtrar', 'valor':valor},
        dataType:'json',
        success:function(result){ //data,textStatus,jqXHR
          // let estudiante= JSON.parse(result);
          $('#filtrar').empty(texto);

          for (var i = 0; i < result.length; i++) {
            var texto= ' <tr> <td>'+result[i]['cedula']+'</td> <td>'+result[i]['nombre']+'</td> <td>'+result[i]['apellido']+'</td> <td>'+result[i]['estatus_tutor']+'</td> <td>'+result[i]['estatus_activo']+'</td> </tr>';
            // $('#filtrar').html(texto);
            $('#filtrar').append(texto);
          }
        },
        error:function(result) {
          alert("error: "+result.responseText+" "+result.status);
          $('#filtrar').empty('');
        }
      });
  });
});
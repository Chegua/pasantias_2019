function elegir_representante(id){
  $.ajax({
      url:'../../../controlador/c_representante.php',
      method:'GET',
      data:{'opcion':'encontrar', 'id':id},
      dataType:'json',
      success:function(result){ //data,textStatus,jqXHR
        // $('#filtrar').empty(texto);

        id= result[0]['id_persona'];
        cedula= result[0]['nacionalidad']+'-'+result[0]['cedula'];
        nombre= result[0]['nombre'];
        apellido= result[0]['apellido'];

        $('#representante').val(id);
        $('#cedulaR').val(cedula);
        $('#nombreR').val(nombre);
        $('#apellidoR').val(apellido);

      },
      error:function(result) {
        // alert("error: "+result.responseText+" "+result.status);
        console.log("error: "+result.responseText+" "+result.status);
        // $('#filtrar').empty('');
      }
    });
}

function elegir_docente(id){
  $.ajax({
      url:'../../../controlador/c_historial_academico.php',
      method:'GET',
      data:{'opcion':'encontrar', 'id':id},
      dataType:'json',
      success:function(result){ //data,textStatus,jqXHR
        // $('#filtrar').empty(texto);
        id= result[0]['id_docente'];
        cedula= result[0]['nacionalidad']+'-'+result[0]['cedula'];
        nombre= result[0]['nombre'];
        apellido= result[0]['apellido'];

        $('#docente').val(id);
        $('#cedulaD').val(cedula);
        $('#nombreD').val(nombre);
        $('#apellidoD').val(apellido);

      },
      error:function(result) {
        alert("error: "+result.responseText+" "+result.status);
        console.log("error: "+result.responseText+" "+result.status);
        // $('#filtrar').empty('');
      }
    });
}

function elegir_cuadratura(id){
  $.ajax({
      url:'../../../controlador/c_cuadratura.php',
      method:'GET',
      data:{'opcion':'encontrar', 'id':id},
      dataType:'json',
      success:function(result){ //data,textStatus,jqXHR
        // $('#filtrar').empty(texto);
        id= result[0]['id_cuadratura'];
        cedula= result[0]['nacionalidad']+'-'+result[0]['cedula'];
        nombre= result[0]['nombre'];
        apellido= result[0]['apellido'];
        anio= result[0]['anio'];
        mencion= result[0]['mencion'];
        periodo= result[0]['periodo'];

        $('#cuadratura').val(id);
        $('#cedulaD').val(cedula);
        $('#nombreD').val(nombre);
        $('#apellidoD').val(apellido);
        $('#anio').val(anio);
        $('#mencion').val(mencion);
        $('#periodo').val(periodo);

      },
      error:function(result) {
        alert("error: "+result.responseText+" "+result.status);
        console.log("error: "+result.responseText+" "+result.status);
        // $('#filtrar').empty('');
      }
    });
}

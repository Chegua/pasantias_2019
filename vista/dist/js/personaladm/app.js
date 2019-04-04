$(document).ready(function(){

  $('#registrar_adm').submit(e => {
    e.preventDefault();
    const postData = {
      opcion: "registrar",
      nacionalidad: $('#nacionalidad').val(),
      cedula: $('#cedula').val(),
      nombre: $('#nombre').val(),
      apellido: $('#apellido').val(),
      sexo: $('#sexo').val(),
      telefono: $('#telefono').val(),
      correo: $('#correo').val(),
      departamento: $('#departamento').val(),
      cargo: $('#cargo').val(),
      estatus: $('#estatus').val(),
      fecha_inicio: $('#fecha_inicio').val(),
      fecha_fin: $('#fecha_fin').val()
    };
    const url = '../../../controlador/c_personaladm.php';
    console.log(postData, url);

    $.ajax({
      url: url,
      method: 'post',
      data: postData,
      dataType: 'json',
      success: function(result) {
        console.log(result);
        $('#registrar_adm').trigger('reset');
        alertify.success('Guardado exitosamente');
      },
      error: function(result) {
        console.log("error: "+result.responseText+" "+result.status);
        alertify.error('Error: los datos de la persona ya existen');
      }
    });

     // $.post(url, postData)
     // .done((response) => {
     //  console.log(response);
     //  $('#registrar_adm').trigger('reset');
     //  alertify.success('Guardado exitosamente');
     // })
     // .fail((xhr, status, error) =>{
     //   console.log(error);
     //   alertify.error('Error: los datos de la persona ya existen');
     // })
  });


});

function asignarMen(){

  // $("#mencion").change(function(){
    var idMen= $('#mencion').val();
    var idEmp= $('#empresa').val();

      $.ajax({
        url: '../../../controlador/c_empresa.php',
        method: 'post',
        data: {'opcion':'empresa_mencion', 'mencion':idMen, 'empresa':idEmp},
        dataType: 'json',
        success: function(r) {
          alert('asignado');
          
          location.reload();
        },
        error: function(r){
          alert("error: "+r.responseText+" "+r.status);
        }

      })
    // })
}


$(buscar_datos());

function buscar_datos(consulta){
  $.ajax({
    url: 'filtro.php' ,
    type: 'POST' ,
    dataType: 'html',
    data: {consulta: consulta},
  })
  .done(function(respuesta){
    $("#tabla").html(respuesta);
  })
  .fail(function(){
    console.log("error");
  });
}

$(document).ready(function(){
  var valor = $(this).val();
  if (valor != "") {
    buscar_datos(valor);
  }else{
    buscar_datos();
  }
});

$(document).on('keyup','#mencion', function(){
  var valor = $(this).val();
  if (valor != "") {
    buscar_datos(valor);
  }else{
    buscar_datos();
  }
});

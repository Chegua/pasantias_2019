$(document).ready(function(){
    // $('#infoMatricula').hide();

    //----------------------------------------FUNCIONES DATATABLE-------------------------------------
    function dataTableMatricula(){
      var table= $('#listaMatri').DataTable({
        //'destroy':true,
        dom: 'Bfrtip',
        buttons:[
          'copyHtml5',
          'excelHtml5',
          'csvHtml5',
          'pdfHtml5',
          'colvis'
        ],
        'paging': true,
        'lengthChange': false,
        'searching': true,
        'ordering': true,
        'info': true,
        'autoWidth': false,
        'scrollX': false,
        "language":{
          "url":"../../bower_components/datatables.net/js/Spanish.json"
        }
      });
    }
//--------------------------------------ELEGIR ESTUDIANTE--------------------------------------------------------------------------------------------------
$(document).on('click','.selecionar_estudiante',function(){
  var id_matricula= $(this).val();
  $('#id_matricula').val(id_matricula);
  $.ajax({
   url: '../../../controlador/c_estudiante.php',
   method: 'GET',
   data: {'opcion':'encontrar','id_matricula':id_matricula},
   dataType: 'json',
   success:function(result){
     datos=result['nacionalidad_estudiante']+'-'+result['cedula_estudiante']+' '+result['nombre_estudiante']+' '+result['apellido_estudiante'];

     if (result['anio']!='4to'){

       alertify.confirm('Confirmar', '¿Desea asignar el estudiante a una empresa?',
         function(){
            alertify.success('Operación exitosa'), $('#datos_estudiante').html(datos);  listar_empresas(result['mencion']); $('#mostrar_ocultar').show();
          },
         function(){
           alertify.error('Cancelado')}).set('labels',{ok:'Si', cancel:'No'
         }
       );
     }else {
       alertify.confirm('Confirmar', 'Los estudiantes de 4to año seran asigignado a los departamentos activos para pre-pasantias',
         function(){ alertify.success('Operación exitosa'),
            $('#datos_estudiante').html(datos);
            listar_departamentos();
            $('#mostrar_ocultar').show();
            $('#vaciar_histEmp').empty();
            $('#tabla_empresarial').hide();
         },
         function(){alertify.error('Cancelado')}).set('labels',{ok:'Entendido', cancel:'Cancelar'});
     }
    },
   error:function(result) {
     alert("error: "+result.responseText+" "+result.status);
   }
  });//fin Ajax
});
    function dataTableEmpresarial() {
      var table= $('#tabla_empresarial').DataTable({
        //'destroy':true,
        dom: 'Bfrtip',
        buttons:[
          'copyHtml5',
          'excelHtml5',
          'csvHtml5',
          'pdfHtml5',
          'colvis'
        ],
        'paging': true,
        'lengthChange': false,
        'searching': true,
        'ordering': true,
        'info': true,
        'autoWidth': false,
        'scrollX': false,
        "language":{
          "url":"../../bower_components/datatables.net/js/Spanish.json"
        }
      });
    }
  dataTableMatricula();
  dataTableEmpresarial();

  $('#listaMatri').hide();
  $('#tabla_empresarial').hide();

  //------------------------------------SELECT2 DENTRO DE UNA MODAL-------------------------------
  $('.select2_modal').select2({
  dropdownParent: $("#modal_matricula")
  })




  //----------------------------------SELECT AÑOS-----------------------------------------------
    $.ajax({
  			url:'../../../controlador/c_anios.php',
  			method:'GET',
  			data:{'opcion':'listar'},
  			dataType:'json',
  			success:function(result){ //data,textStatus,jqXHR
  				for(var i=0;i<result.length;i++){
  					var texto='<option value='+result[i]['anio']+' >'+result[i]['anio'] +'</option>';
  					$("#anio").append(texto);
  				}
  			},
  			error:function(result){ //xhr,status,error
  				alert("error: "+result.responseText+" "+result.status);
  			}


  		});//fin Ajax

//----------------------------------------SELECT MENCIONES--------------------------------------------------
      $.ajax({
    			url:'../../../controlador/c_mencion.php',
    			method:'GET',
    			data:{'opcion':'listar'},
    			dataType:'json',
    			success:function(result){ //data,textStatus,jqXHR
    				for(var i=0;i<result.length;i++){
    					var texto='<option value='+result[i]['mencion']+' >'+result[i]['mencion'] +'</option>';
    					$("#mencion").append(texto);
    				}
    			},
    			error:function(result){ //xhr,status,error
    				alert("error: "+result.responseText+" "+result.status);
    			}

    		});//fin Ajax

//-----------------------------------------FILTAR POR AÑO------------------------------------------
        $('#anio').change(function(){
          var anio=$("#anio").val();
      		var mencion=$("#mencion").val();

          $.ajax({
      			url:'../../../controlador/c_estudiante.php',
      			data:{'opcion':'actualizar_lista','anio':anio,'mencion':mencion},
      			method:'GET',
      			dataType:'json',
      			success:function(result){ //data,textStatus,jqXHR
              $('#listar').empty();
              // $('#infoMatricula').show();
              $('#listaMatri').DataTable().clear().destroy();
              cedulaD= result[0]['nacionalidad_docente']+'-'+result[0]['cedula_docente'];
              nombreD= result[0]['nombre_docente'];
              apellidoD= result[0]['apellido_docente'];

              var docente= cedulaD+' '+nombreD+' '+apellidoD;
              for (var i = 0; i < result.length; i++) {
                var texto= '<tr>'+
                              '<td> <button type="button" class= "btn btn-info selecionar_estudiante" data-dismiss="modal" value="'+result[i]['id_matricula']+'">click</button></td>'+
                              '<td>'+result[i]['nacionalidad_estudiante']+'-'+result[i]['cedula_estudiante']+'</td>'+
                              '<td>'+result[i]['nombre_estudiante']+'</td>'+
                              '<td>'+result[i]['apellido_estudiante']+'</td>'+
                           '</tr>';
                $('#listaMatri').show();
                $('#listar').append(texto);
              }
              $('#docente').html(docente);
              dataTableMatricula();
      			},
      			error:function(result){ //xhr,status,error
              // console.log("error: "+result.responseText+" "+result.status);
              $('#listar').empty();
              // listar();
      			}

      		})//fin Ajax dentro del change
        });

//----------------------------------FILTAR POR MENCIONES-------------------------------------------
        $('#mencion').change(function(){
          var anio=$("#anio").val();
      		var mencion=$("#mencion").val();
          $.ajax({
      			url:'../../../controlador/c_estudiante.php',
      			data:{'opcion':'actualizar_lista','anio':anio,'mencion':mencion},
      			method:'GET',
      			dataType:'json',
      			success:function(result){ //data,textStatus,jqXHR
              $('#listar').empty();
              // $('#infoMatricula').show();
              $('#listaMatri').DataTable().clear().destroy();
              cedulaD= result[0]['nacionalidad_docente']+'-'+result[0]['cedula_docente'];
              nombreD= result[0]['nombre_docente'];
              apellidoD= result[0]['apellido_docente'];

              var docente= cedulaD+' '+nombreD+' '+apellidoD;

              for (var i = 0; i < result.length; i++) {
                var texto= '<tr>'+
                              '<td> <button type="button" class= "btn btn-info selecionar_estudiante" data-dismiss="modal" value="'+result[i]['id_matricula']+'">click</button></td>'+
                              '<td>'+result[i]['nacionalidad_estudiante']+'-'+result[i]['cedula_estudiante']+'</td>'+
                              '<td>'+result[i]['nombre_estudiante']+'</td>'+
                              '<td>'+result[i]['apellido_estudiante']+'</td>'+
                           '</tr>';
                $('#listaMatri').show();
                $('#listar').append(texto);
              }
              $('#docente').html(docente);

              dataTableMatricula();
      			},
      			error:function(result){ //xhr,status,error
              // console.log("error: "+result.responseText+" "+result.status);
              $('#listar').empty();
              // listar();
      			}
      		})//fin Ajax dentro del change
        });

//--------------------------------------ELEGIR ESTUDIANTE--------------------------------------------------------------------------------------------------
        $(document).on('click','.selecionar_estudiante',function(){
          var id_matricula= $(this).val();
          $('#id_matricula').val(id_matricula);
          $.ajax({
           url: '../../../controlador/c_estudiante.php',
           method: 'GET',
           data: {'opcion':'encontrar','id_matricula':id_matricula},
           dataType: 'json',
           success:function(result){
             datos=result['nacionalidad_estudiante']+'-'+result['cedula_estudiante']+' '+result['nombre_estudiante']+' '+result['apellido_estudiante'];

             if (result['anio']!='4to'){

               alertify.confirm('Confirmar', '¿Desea asignar el estudiante a una empresa?',
                 function(){
                    alertify.success('Operación exitosa'), $('#datos_estudiante').html(datos);  listar_empresas(result['mencion']); $('#mostrar_ocultar').show();
                  },
                 function(){
                   alertify.error('Cancelado')}).set('labels',{ok:'Si', cancel:'No'
                 }
               );
             }else {
               alertify.confirm('Confirmar', 'Los estudiantes de 4to año seran asigignado a los departamentos activos para pre-pasantias',
                 function(){ alertify.success('Operación exitosa'),
                    $('#datos_estudiante').html(datos);
                    listar_departamentos();
                    $('#mostrar_ocultar').show();
                    $('#vaciar_histEmp').empty();
                    $('#tabla_empresarial').hide();
                 },
                 function(){alertify.error('Cancelado')}).set('labels',{ok:'Entendido', cancel:'Cancelar'});
             }
            },
           error:function(result) {
             alert("error: "+result.responseText+" "+result.status);
           }
          });//fin Ajax
        });

//----------------------LISTAR EMPRESAS SEGUN LA MENCION DEL ESTUDIANTE--------------------------------------------
        function listar_empresas(mencion){
          $.ajax({
            url: '../../../controlador/c_asignar.php',
            method: 'GET',
            data: {'opcion':'listar_empresas','mencion':mencion},
            dataType: 'json',
            success:function(result) {
              $('#lista_empresarial').empty();
              $('#tabla_empresarial').DataTable().clear().destroy();

              for (var i = 0; i < result.length; i++) {
                var texto= '<tr>'+
                           '<td> <button type="button" class= "btn btn-primary ver_tutor" data-toggle="modal" data-target="#modal_tutorEmp" value="'+result[i]['id_empresa_mencion']+'">Ver <i class="fa fa-eye"></i> </button></td>'+
                           '<td>'+result[i]['empresa']+'</td>'+
                           '<td>'+result[i]['tipo']+'-'+result[i]['rif']+'</td>'+
                           '</tr>';
                $('#lista_empresarial').append(texto);

              }
              $('#tabla_empresarial').show();
              dataTableEmpresarial();
            },
            error:function(result) {
              alert("error: "+result.responseText+" "+result.status);
            }
          });
        }

//------------------------------------------LISTA ADMINISTRATIVA-----------------------------------------
        function listar_departamentos(){
          $.ajax({
            url: '../../../controlador/c_asignar.php',
            method: 'GET',
            data: {'opcion':'listar_departamentos'},
            dataType: 'json',
            success:function(result) {
              $('#lista_administrativa').empty();

              for (var i = 0; i < result.length; i++) {
                var texto= '<tr>'+
                            '<td> <input type="checkbox" name="prueba" value="'+result[i]['id_hist_dpto']+'">'+result[i]['departamento']+'</td>'+
                            '<td>'+result[i]['nacionalidad']+'-'+result[i]['cedula']+' '+result[i]['nombre']+' '+result[i]['apellido']+'</td>'+
                           '</tr>';
                 $('#lista_administrativa').append(texto);
              }
            },
            error:function(result) {
              alert("error: "+result.responseText+" "+result.status);
            }
          });
        }

        $('#boton').click(function(){
          var array=[];
          $('input:checkbox[name=prueba]:checked').each(function(){
            //cada elemento seleccionado
            array[array.length]=$(this).val();
            //console.log($(this).val());
          });
          for (var i = 0; i < array.length; i++) {
            console.log(array[i]);
          }
        })
//-------------------------------LISTAR TUTORES DE LA EMPRESA-----------------------------------------
        $(document).on('click','.ver_tutor',function(){
          var id_empresa_mencion= $(this).val();
          $.ajax({
            url: '../../../controlador/c_asignar.php',
            method: 'GET',
            data: {'opcion':'lista_tutorxempresa','id_empresa_mencion':id_empresa_mencion},
            dataType: 'json',
            success: function(result) {
              $('#lista_tutorxempresa').empty();
              for (var i = 0; i < result.length; i++) {
                var texto= '<tr>'+
                              '<td> <button type="button" class= "btn btn-primary selecionar_tutor" data-dismiss="modal" value="'+result[i]['id_hist_emp']+'">click</button></td>'+
                              '<td>'+result[i]['nacionalidad']+'-'+result[i]['cedula']+'</td>'+
                              '<td>'+result[i]['nombre']+'</td>'+
                              '<td>'+result[i]['apellido']+'</td>'+
                              '<td>'+result[i]['cargo']+'</td>'+
                           '</tr>';
                $('#lista_tutorxempresa').append(texto);
              }
            },
            error:function(result) {
              console.log("error: "+result.responseText+" "+result.status);
            }
          });

        });
//-------------------------------ELEGIR TUTOR EMPRESARIAL---------------------------------------
        $(document).on('click','.selecionar_tutor',function(){
          var id_hist_emp= $(this).val();
          $('#id_hist_emp').val(id_hist_emp);
          $.ajax({
           url: '../../../controlador/c_tutores_empresariales.php',
           method: 'GET',
           data: {'opcion':'encontrar','id_hist_emp':id_hist_emp},
           dataType: 'json',
           success:function(result){
             alertify.success('Operación exitosa');
             datos=result['nacionalidad']+'-'+result['cedula']+' '+result['nombre']+' '+result['apellido'];
             $('#datos_hist_emp').html(datos);
            },
           error:function(result) {
             alert("error: "+result.responseText+" "+result.status);
           }
          });//fin Ajax
        });

//---------------------------------BOTON DE ASIGNAR--------------------------------------------
        $('#asignarFormEmp').submit(e => {
          e.preventDefault();
          const postData = {
            opcion: "asignar_emp",
            id_matricula: $('#id_matricula').val(),
            id_hist_emp: $('#id_hist_emp').val()
          };
          const url = '../../../controlador/c_asignar.php';
          console.log(postData, url);
          // $.post(url, postData, (response) => {
          //   if (response) {
          //     alertify.success('Asingnacion exitosa');
          //     console.log(response);
          //     $('#asignarFormEmp').trigger('reset');
          //   }else {
          //     alertify.error('Asignacion fallida');
          //     console.log(response);
          //     $('#asignarFormEmp').trigger('reset');
          //   }
          // });
          $.ajax({
            url: url,
            method: 'post',
            data: postData,
            dataType: 'json',
            success: function(result) {
              if (result) {
                alertify.success('Asingnacion exitosa');
                console.log(result);
                $('#asignarFormEmp').trigger('reset');
              }else {
                alertify.error('Asignacion fallida');
                console.log(result);
                $('#asignarFormEmp').trigger('reset');
              }
            }
          });

        });

});

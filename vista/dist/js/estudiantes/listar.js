$(document).ready(function(){
    // $('#infoMatricula').hide();
    function daTable() {

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
        'scrollX': true,
        "language":{
          "url":"../../bower_components/datatables.net/js/Spanish.json"
        }
      });
    }
                     // OJOOOOOO
//   $(document).ready(function() {
//     var table = $('#example').DataTable( {
//         lengthChange: false,
//         buttons: [ 'copy', 'excel', 'pdf', 'colvis' ]
//     } );

//     table.buttons().container()
//         .appendTo( '#example_wrapper .col-sm-6:eq(0)' );
// } );

  daTable();
  $('.select2_modal').select2({
  dropdownParent: $("#modal_matricula")
  })

  $('#listaMatri').hide();


                            // SELECT AÑOS
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

                       // SELECT MENCIONES
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



                    // FILTAR POR AÑO
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
              daTable();
      			},
      			error:function(result){ //xhr,status,error
              // console.log("error: "+result.responseText+" "+result.status);
              $('#listar').empty();
              // listar();
      			}

      		})//fin Ajax dentro del change
        });

              // FILTAR POR MENCIONES
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

              daTable();
      			},
      			error:function(result){ //xhr,status,error
              // console.log("error: "+result.responseText+" "+result.status);
              $('#listar').empty();
              // listar();
      			}
      		})//fin Ajax dentro del change
        });

        $(document).on('click','.selecionar_estudiante',function(){
          var id_matricula= $(this).val();
          $('#id_matricula').val(id_matricula);
          $.ajax({
           url: '../../../controlador/c_estudiante.php',
           method: 'GET',
           data: {'opcion':'encontrar','id_matricula':id_matricula},
           dataType: 'json',
           success:function(result){
             datos='Cédula: '+result['nacionalidad_estudiante']+'-'+result['cedula_estudiante']+' Nombre: '+result['nombre_estudiante']+' Apellido: '+result['apellido_estudiante'];


             if (result['anio']!='4to'){

               alertify.confirm('Confirmar', '¿Desea asignar el estudiante a una empresa?',
                 function(){ alertify.success('Operación exitosa'), $('#datos_estudiante').html(datos); listar_empresas(result['mencion']); },
                 function(){alertify.error('Cancelado')}).set('labels',{ok:'Si', cancel:'No'});
             }else {
               alert('Soy de 4to');
             }
            },
           error:function(result) {
             alert("error: "+result.responseText+" "+result.status);
           }
          });//fin Ajax
        });

        function listar_empresas(mencion){
          $.ajax({
            url: '../../../controlador/c_asignar.php',
            method: 'GET',
            data: {'opcion':'listar_empresas','mencion':mencion},
            dataType: 'json',
            success:function(result) {
              $('#lista_empresarial').empty();

              for (var i = 0; i < result.length; i++) {
                var texto= '<tr>'+
                           '<td> <button type="button" class= "btn btn-primary ver_tutor" data-toggle="modal" data-target="#modal_tutorEmp" value="'+result[i]['id_empresa_mencion']+'">Ver <i class="fa fa-eye"></i> </button></td>'+
                           '<td>'+result[i]['empresa']+'</td>'+
                           '<td>'+result[i]['tipo']+'-'+result[i]['rif']+'</td>'+
                           '</tr>';
                           $('#lista_empresarial').append(texto);
              }



            },
            error:function(result) {
              alert("error: "+result.responseText+" "+result.status);
            }
          });
        }

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

        $(document).on('click','.selecionar_tutor',function(){
          var id_hist_emp= $(this).val();
          $('#id_hist_emp').val(id_hist_emp);
          $.ajax({
           url: '../../../controlador/c_tutores_empresariales.php',
           method: 'GET',
           data: {'opcion':'encontrar','id_hist_emp':id_hist_emp},
           dataType: 'json',
           success:function(result){
             datos='Cédula: '+result['cargo']+'-'+result['cedula']+' Nombre: '+result['nombre']+' Apellido: '+result['apellido'];
             $('#datos_hist_emp').html(datos);
            },
           error:function(result) {
             alert("error: "+result.responseText+" "+result.status);
           }
          });//fin Ajax
        });

        $('#asignar-form').submit(e => {
          e.preventDefault();
          const postData = {
            opcion: "asignar_emp",
            id_matricula: $('#id_matricula').val(),
            id_hist_emp: $('#id_hist_emp').val()
          };
          const url = 'c_asignar.php';
          console.log(postData, url);
          // $.post(url, postData, (response) => {
          //   console.log(response);
          //   $('#asignar-form').trigger('reset');
          //
          // });
        });

});

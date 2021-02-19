$(document).ready(function(){

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

      function dataTableHistDpto(){
        var table= $('#listaHistDpto').DataTable({
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
      dataTableHistDpto();


    $('#anioModal').val('4to');

    //------------------------------------SELECT2 DENTRO DE UNA MODAL-------------------------------
    $('.select2_modal').select2({
        dropdownParent: $("#modal_matricula")
    })

    $('.select2_modal2').select2({
        dropdownParent: $("#modal_histDepartamento")
    })

    //----------------------------------------SELECT MENCIONES--------------------------------------------------
    $.ajax({
        url:'../../../controlador/c_mencion.php',
        method:'GET',
        data:{'opcion':'listar'},
        dataType:'json',
        success:function(result){ //data,textStatus,jqXHR
            for(var i=0;i<result.length;i++){
                var texto='<option value='+result[i]['mencion']+'>'+result[i]['mencion'] +'</option>';
                $("#mencionModal").append(texto);
            }
        },
        error:function(result){ //xhr,status,error
            alert("error: "+result.responseText+" "+result.status);
        }

    });//fin Ajax


    //----------------------------------FILTAR POR MENCIONES-------------------------------------------
    $('#mencionModal').change(function(){
        var anio=$("#anioModal").val();
        var mencion=$("#mencionModal").val();
        $.ajax({
            url:'../../../controlador/c_estudiante.php',
            data:{'opcion':'actualizar_lista','anio':anio,'mencion':mencion},
            method:'GET',
            dataType:'json',
            success:function(result){ //data,textStatus,jqXHR
            $('#listar').empty();
            // $('#infoMatricula').show();
            $('#listaMatri').DataTable().clear().destroy();
            // cedulaD= result[0]['nacionalidad_docente']+'-'+result[0]['cedula_docente'];
            // nombreD= result[0]['nombre_docente'];
            // apellidoD= result[0]['apellido_docente'];

            // var docente= cedulaD+' '+nombreD+' '+apellidoD;

            for (var i = 0; i < result.length; i++) {
              var texto= '<tr>'+
                            '<td> <button type="button" class= "btn btn-info selecionar_estudiante" data-dismiss="modal" value="'+result[i]['id_matricula']+'"><i class="fa fa-check"></i></button></td>'+
                            '<td>'+result[i]['nacionalidad_estudiante']+'-'+result[i]['cedula_estudiante']+'</td>'+
                            '<td>'+result[i]['nombre_estudiante']+'</td>'+
                            '<td>'+result[i]['apellido_estudiante']+'</td>'+
                            '<td>'+result[i]['sexo_estudiante']+'</td>'+
                            '<td>'+result[i]['telefono_estudiante']+'</td>'+
                            '<td>'+result[i]['correo_estudiante']+'</td>'+
                         '</tr>';
              $('#listaMatri').show();
              $('#listar').append(texto);
            }
            // $('#docente').html(docente);

            dataTableMatricula();
            },
            error:function(result){ //xhr,status,error
            console.log("error: "+result.responseText+" "+result.status);
            $('#listar').empty();
            // listar();
            }
        })//fin Ajax dentro del change
    });

    //--------------------------------------ELEGIR ESTUDIANTE--------------------------------------------------------------------------------------------------
    $(document).on('click','.selecionar_estudiante',function(){
        var id_matricula= $(this).val();
        $('#id_matricula').val(id_matricula);
        const getData= {
            opcion:'encontrarMatricula',
            id_matricula:id_matricula
        }
        $.ajax({
            url: '../../../controlador/c_estudiante.php',
            method: 'GET',
            data: getData,
            dataType: 'json',
            success:function(result){
                $('#nacionalidad').val(result['nacionalidad_estudiante']);
                $('#cedula').val(result['cedula_estudiante']);
                $('#nombre').val(result['nombre_estudiante']);
                $('#apellido').val(result['apellido_estudiante']);
                $('#sexo').val(result['sexo_estudiante']);
                $('#anio').val(result['anio']);
                $('#mencion').val(result['mencion']);
                alertify.success('Estudiante seleccionado');                
            },
            error:function(result) {
            alert("error: "+result.responseText+" "+result.status);
            }
        });//fin Ajax
    });


    //----------------------------------------SELECT DEPARTAMENTO--------------------------------------------------
    $.ajax({
        url:'../../../controlador/c_departamento.php',
        method:'GET',
        data:{'opcion':'listar'},
        dataType:'json',
        success:function(result){ //data,textStatus,jqXHR
            for(var i=0;i<result.length;i++){
                var texto='<option value='+result[i]['departamento']+'>'+result[i]['departamento'] +'</option>';
                $("#departamentoModal").append(texto);
            }
        },
        error:function(result){ //xhr,status,error
            alert("error: "+result.responseText+" "+result.status);
        }

    });//fin 
    
    //----------------------------------FILTAR POR DEPARTAMENTOS-------------------------------------------


    $('#departamentoModal').change(function(){
        var departamento=  $('#departamentoModal').val();
        $.ajax({
            url:'../../../controlador/c_personaladm.php',
            data:{'opcion':'actualizar_lista','departamento':departamento},
            method:'GET',
            dataType:'json',
            success:function(result){ //data,textStatus,jqXHR
                $('#listarHistorial').empty();
                $('#listaHistDpto').DataTable().clear().destroy();

                for (var i = 0; i < result.length; i++){
                    var texto= '<tr>'+
                                '<td> <button type="button" class= "btn btn-info selecionar_adm" data-dismiss="modal" value="'+result[i]['id_hist_dpto']+'"><i class="fa fa-check"></i></button></td>'+
                                '<td>'+result[i]['nacionalidad']+'-'+result[i]['cedula']+'</td>'+
                                '<td>'+result[i]['nombre']+'</td>'+
                                '<td>'+result[i]['apellido']+'</td>'+
                                '<td>'+result[i]['sexo']+'</td>'+
                                '<td>'+result[i]['cargo']+'</td>'+
                                '<td>'+result[i]['telefono']+'</td>'+
                                '<td>'+result[i]['correo']+'</td>'+
                            '</tr>';
                    $('#listaHistDpto').show();
                    $('#listarHistorial').append(texto);
                }
                dataTableHistDpto();

            },
            error:function(result) {
                alert("error: "+result.responseText+" "+result.status);
            }            
        })//fin Ajax
    });

    //--------------------------------------ELEGIR PERSONAL ADM--------------------------------------------------------------------------------------------------

    $(document).on("click",".selecionar_adm", function(){
        var id_hist_dpto= $(this).val();
        $('#id_hist_dpto').val(id_hist_dpto);
        const getData= {
            opcion:'encontrarHistorial',
            id_hist_dpto:id_hist_dpto
        }
        $.ajax({
            url: '../../../controlador/c_personaladm.php',
            method: 'GET',
            data: getData,
            dataType: 'json',
            success:function(result){
                $('#nacionalidadAdm').val(result['nacionalidad']);
                $('#cedulaAdm').val(result['cedula']);
                $('#nombreAdm').val(result['nombre']);
                $('#apellidoAdm').val(result['apellido']);
                $('#sexoAdm').val(result['sexo']);
                $('#cargo').val(result['cargo']);
                $('#departamento').val(result['departamento']);
                alertify.success('Seleccionado');                
            },
            error:function(result) {
            alert("error: "+result.responseText+" "+result.status);
            }
        });//fin Ajax
    });


    $('#asignarDptoForm').submit(function (e) { 
        e.preventDefault();
        
        const postData= {
            opcion: 'asignarDpto',
            id_matricula:$('#id_matricula').val(),
            id_hist:$('#id_hist_dpto').val(),
            fecha_inicio:$('#fecha_inicio').val(),
            fecha_fin:$('#fecha_final').val()
        }

        $.ajax({
            url: '../../../controlador/c_asignaciones.php',
            method: 'post',
            data: postData,
            dataType: 'json',
            success:function(result){
                console.log(postData);  
                alertify.success('Asignado con exito');
                console.log(result);               
            },
            error:function(result) {
                console.log(postData);  
                alertify.error(result.responseText);
            }
        });//fin Ajax
        
    });

});
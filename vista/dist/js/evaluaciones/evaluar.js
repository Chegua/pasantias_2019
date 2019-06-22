$(document).ready(function(){

    listar_evaluacion_item();
    listar_items(); 
    $('#total').val(0);
 //--------------------------------------FUNCIONES DE CALCULOS--------------------------------------------

    function dividir(n1,n2){
        return (parseFloat(n1) / parseFloat(n2));   
    }

    function calcularSuma(elementos){
        let resultado= 0;
        for (let i = 0; i < elementos.length; i++) {
            resultado= parseFloat(resultado)+parseFloat(elementos[i]);            
        }
        return resultado;   
    }

    // $.ajax({
    //     url: '../../../controlador/c_evaluacion.php',
    //     method: 'get',
    //     data: {'opcion': 'consultar'},
    //     dataType: 'json',
    //     success: function(result){
    //         for (let i = 0; i < result.length; i++) {
    //             var texto = '<tr>'+
    //             '<td> <button type="button" class= "btn btn-primary selecionar_evaluacion" data-dismiss="modal" value="'+result[i]['id_evaluacion']+'"><i class="fa fa-check"></i></button></td>'+
    //                             '<td>'+result[i]['nombre_evaluacion']+'</td>'+
    //                             '<td>'+result[i]['tipo_evaluacion']+'</td>'+
    //                             '<td>'+result[i]['porcentaje']+'</td>'+
    //                         '</tr>';
    //             $('#lista_evaluaciones').append(texto);                
    //         }
    //     }
    // });
   //-------------------------------LISTAR EMPRESAS ASIGNADOS---------------------------------------------
        $.ajax({
          url: '../../../controlador/c_asignar.php',
          method: 'GET',
          data: {'opcion':'listar_empresas_asignadas'},
          dataType: 'json',
          success:function(result) {
            $('#lista_empresarial').empty();
            // $('#tabla_empresarial').DataTable().clear().destroy();
            for (var i = 0; i < result.length; i++) {
              var texto= '<tr>'+
                         '<td> <button type="button" class= "btn btn-primary ver_estudiantes_asignados" data-toggle="modal" data-target="#ver_estudiantes_asignados" value="'+result[i]['empresa']+'">Ver <i class="fa fa-eye"></i> </button></td>'+
                         '<td>'+result[i]['empresa']+'</td>'+
                         '<td>'+result[i]['tipo']+'-'+result[i]['rif']+'</td>'+
                         '</tr>';
              $('#lista_empresarial').append(texto);
            }
            // $('#tabla_empresarial').show();
            // dataTableEmpresarial();
          },
          error:function(result) {
            alert("error: "+result.responseText+" "+result.status);
          }
        });

//-------------------------------LISTAR ESTUDIANTES ASIGNADO A EMPRESA-----------------------------------------
    $(document).on('click','.ver_estudiantes_asignados',function(){
        var nombre_empresa= $(this).val();
        $.ajax({
        url: '../../../controlador/c_asignar.php',
        method: 'GET',
        data: {'opcion':'lista_asignados_empresa','nombre_empresa':nombre_empresa},
        dataType: 'json',
        success: function(result) {
            $('#lista_asignar_empresa').empty();
            for (var i = 0; i < result.length; i++) {
            var texto= '<tr>'+
                            '<td> <button type="button" class= "btn btn-success seleccionar_estudiante_asignado" data-dismiss="modal" value="'+result[i]['id_asignar_empresa']+'"><i class="fa fa-check"></i></button></td>'+
                            '<td>'+result[i]['nacionalidad_estudiante']+'-'+result[i]['cedula_estudiante']+'</td>'+
                            '<td>'+result[i]['apellido_estudiante']+' '+result[i]['nombre_estudiante']+'</td>'+
                            '<td>'+result[i]['anio']+'</td>'+
                            '<td>'+result[i]['mencion']+'</td>'+
                            '<td>'+result[i]['periodo']+'</td>'+
                            '<td>'+result[i]['apellido']+' '+result[i]['nombre']+'</td>'+
                            '<td>'+result[i]['cargo']+'</td>'+
                        '</tr>';
            $('#lista_asignar_empresa').append(texto);
            }
        },
        error:function(result) {
            console.log("error: "+result.responseText+" "+result.status);
        }
        });

    });

    $(document).on('click','.seleccionar_estudiante_asignado',function(){
        var id_asignar_empresa= $(this).val();
        $.ajax({
            url: '../../../controlador/c_asignar.php',
            method: 'get',
            data: {'opcion':'encontrar_asignar_empresa', 'id_asignar_empresa': id_asignar_empresa},
            dataType: 'json',
            success: function(result){
                $('#id_asignar_empresa').val(result['id_asignar_empresa']);
                datos=result['nacionalidad_estudiante']+'-'+result['cedula_estudiante']+' '+result['nombre_estudiante']+' '+result['apellido_estudiante']+' Año: '+result['anio']+' Mencion: '+result['mencion'];
                $('#datos_asignar_empresa').html(datos);
                alertify.success('Estudiante listo para ser evaluado');
            },
            error:function(result) {
                console.log("error: "+result.responseText+" "+result.status);
            }
        });
    });
      

// -----------------------------AJAX PARA LISTAR ITEMS-----------------------------
    function listar_items() {
        $.ajax({
            url: '../../../controlador/c_evaluacion.php',
            method: 'get',
            data: {'id_evaluacion':2,'opcion': 'consultar_items_disponibles'},
            dataType: 'json',
            success: function(result){
                $('#lista_items').empty();
                for (let i = 0; i < result.length; i++) {
                    
                    var texto = '<tr>'+
                                    '<td><button type="button" class= "btn btn-success selecionar_item" value="'+result[i]['id_item']+'"><i class="fa fa-check"></i></button></td>'+
                                    '<td>'+result[i]['item']+'</td>'+
                                    '<td>'+result[i]['descripcion']+'</td>'+
                                '</tr>';
                    $('#lista_items').append(texto);                
                }
            }
        }); 
    }
    

    //------------------------------AJAX PARA EVALUAR POR ITEM------------------------------------------------
    function listar_evaluacion_item() {
        $.ajax({
            url: '../../../controlador/c_evaluacion.php',
            method: 'get',
            data: {'id_evaluacion':2,'opcion':'consultar_evaluacion_item'},
            dataType: 'json',
            success: function(result){
                $('#lista_evaEmp').empty();                
                var puntaje= dividir(result[0]['porcentaje'],result.length);
                var valor= dividir(puntaje,4);            
                for (var i = 0; i < result.length; i++) {
                    var texto= '<tr>'+
                                    '<td>'+result[i]['item']+'</td>'+
                                    '<td>'+result[i]['descripcion']+'</td>'+                                                    
                                    '<td>'+'<select name="puntaje" class="form-control puntaje">'+
                                        '<option  value="">Seleccione...</option>'+
                                        '<option  value="'+valor*4+'" >Excelente'+'</option>'+
                                        '<option  value="'+valor*3+'" >Bueno'+'</option>'+
                                        '<option  value="'+valor*2+'" >Regular'+'</option>'+
                                        '<option  value="'+valor*1+'">Malo'+'</option> ' +                  
                                    '</select>'+'</td>'+                                
                               '</tr>';
                     $('#lista_evaEmp').append(texto);                
                }
                $('#porcentaje_eva').val(result[0]['porcentaje']+'%');
                        
            },
            error:function(result) {
                alert("error: "+result.responseText+" "+result.status);
            }
        });
    }
            

    //---------------------------------- EVENTO CHANGE DEL SELECT DE PUNTAJE---------------------------------
    $(document).on('change','.puntaje',function(){
        var array=[];       
        $('.puntaje').each(function(){
            if ($(this).val()!='') {
                array[array.length]=$(this).val();
            }                        
        });
        let total=0;
        if (array.length>0) {
            total= calcularSuma(array);            
        }              
        $('#total').val(total);    
    });

    //--------------------------------------ELEGIR ITEM--------------------------------------------------------------------------------------------------
    $(document).on('click','.selecionar_item',function(){
        var id_item= $(this).val();        
        $.ajax({
         url: '../../../controlador/c_evaluacion.php',
         method: 'POST',
         data: {'opcion':'asignar_evaluacion_item','id_item':id_item, 'id_evaluacion':2},
         dataType: 'json',
         success:function(result){
             alertify.success('Item asignado con exito');
             listar_evaluacion_item(); 
             listar_items();
             $('#total').val(0);    
         },
         error:function(result) {
           alert("error: "+result.responseText+" "+result.status);
         }
        });//fin Ajax
      });

});
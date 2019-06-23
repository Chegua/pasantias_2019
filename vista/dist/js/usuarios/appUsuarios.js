$(document).ready(function(){

    function redireccionar(){
        window.location="http://localhost/kukul_tales/usuario-01.html";
    }
    
    function go_to_index(){
        window.location="http://localhost/PASANTIAS_2019/";
    }
    // --------------------------------------------CREATE-------------------------------------------------------------       
    $('#userForm').submit(function(e){
        e.preventDefault();
        const postData={
            opcion: 'registrar',
            nacionalidad: $('#nacionalidad').val(),
            cedula: $('#cedula').val(),
            nombre: $('#nombre').val(),
            apellido: $('#apellido').val(),
            sexo: $('#sexo').val(),
            telefono: $('#telefono').val(),
            correo: $('#correo').val(),
            clave: $('#clave').val(),
            tipo: $('#tipo').val()            
        };        
        $.ajax({
            url: '../../../controlador/c_persona.php',
            method: 'post',
            data: postData,
            dataType: 'json',
            success: function(r){                
                alertify.success('Operación exitosa');
                console.log(r);
                $('#userForm').trigger('reset');
                // setTimeout (redireccionar(), 5000);      
                console.log(postData);
                
            },
            error:function(r) {
                alertify.error(r.responseText);
                console.log(r);
                //$('#userForm').trigger('reset');
                // console.log(postData);  
                //alert("error: "+r.responseText+" "+r.status);             
            }
        });
    });

    // ---------------------------------------------LOGIN-------------------------------------------------------

    $('#loginForm').submit(function(e){
        e.preventDefault();
        const postData={
            opcion: 'iniciarSesion',            
            cedula: $('#cedula').val(),
            clave: $('#clave').val()
        };
        
        $.ajax({
            url: '../../../controlador/c_persona.php',
            method: 'post',
            data: postData,
            dataType: 'json',
            success: function(r){
                console.log(postData);  
                alertify.success('Logueado con exito');
                console.log(r);
                $('#loginForm').trigger('reset');                
                setTimeout (go_to_index(), 6000); 
            },
            error: function(r){
                console.log(postData);  
                alertify.error(r.responseText);
                //alert("error: "+r.responseText+" "+r.status);    
            }
        });
    });

    

});
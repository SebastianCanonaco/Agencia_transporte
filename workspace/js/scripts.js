    function validateEmail(email) 
    {
     if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(email))
      {
        return (true);
      }
        return (false);
    }
    
$(document).ready(function(){
    var modalIngresoClon;
    var modalRegistroClon;
    var seguir;
    
    $('#nav_contacto').on('click', function() {
        $('#nav_inicio').removeClass('active');
        $('#nav_servicios').removeClass('active');
        $(this).addClass('active');
    });
    
    $('#nav_servicios').on('click', function() {
        $('#nav_inicio').removeClass('active');
        $('#nav_contacto').removeClass('active');
        $(this).addClass('active');
    });
    
    $('.mostrar_pass').on('click', function() {
        var type = $('.ingreso_pass').attr("type"); 
        // now test it's value
        if (type === 'password' ){
          $('.ingreso_pass').attr("type", "text");
          $('.icono_pass').removeClass("fa-eye");
          $('.icono_pass').addClass("fa-eye-slash");
        } else {
          $('.ingreso_pass').attr("type", "password");
          $('.icono_pass').removeClass("fa-eye-slash");
          $('.icono_pass').addClass("fa-eye");
        } 
    })
    
    /*$('#email_ingreso').on('blur', function() {
        if(validateEmail($("#email_ingreso").val())){
            $('#error-email-ingreso').hide();
            $('#email_ingreso').addClass("was-validated");
        } else {
            $('#error-email-ingreso').show();      
        }
    }).keypress(function(){
        if(validateEmail($("#email_ingreso").val())){
            $('#error-email-ingreso').hide();
            $('#email_ingreso').addClass("was-validated");
        } else {
            $('#error-email-ingreso').show();      
        }
    });*/
	
    /*$('#password').on('blur', function() {
        if($(this).val() == ""){
            $(this).attr("placeholder", "Ingrese una contraseña");
            $('#div_ingreso_pass').addClass("border border-danger rounded");
            
        }
    }).keypress(function(){
        if($(this).hasClass("border border-danger")){
            $('#div_ingreso_pass').removeClass("border border-danger rounded");
        }
    })
    
    if($('#email').val() != "" && $('#password').val() != ""){
            $('#boton_ingreso').prop('enabled','true');
    }*/
    
    $('#form_ingreso').on('submit',function(e) {
        e.preventDefault();
        
        $.ajax({
            url: 'session.php',
            type: 'POST',
            data: {
                email_ajax : $('#email_ingreso').val(),
                contra_ajax : $('#contrasena_ingreso').val()
            },
            success: function(response){
                console.log(response);
                //String.prototype.trim = function(){ return this.replace(/^\s+|\s+$/g, "");}
                if(response == "usuario"){
                    window.location.href = "index.php";
                } else if (response == "empresa"){
                    window.location.href = "sys_index.php";
                    console.log("empresa");
                } else {
                    $('#ingreso_alert').removeClass("d-none");
                }
            }
        });
        return false;
    });
    
    $('#form_registro').on('submit',function() {
        $.ajax({
            url: 'registro_usuario.php',
            type: 'POST',
            data: {
                nombre_ajax : $('#nombre_registro').val(),
                apellido_ajax : $('#apellido_registro').val(),
                telefono_ajax : $('#telefono_registro').val(),
                email_ajax : $('#email_registro').val(),
                contrasena_ajax : $('#contrasena_registro').val()
            },
            success: function(response){
                //String.prototype.trim = function(){ return this.replace(/^\s+|\s+$/g, "");}
                if (response == "success"){
                    $('#cerrar_registro').click();
                    swal({
                        title: "Se ha registrado correctamente!",
                        text: "Su cuenta ya fue registrada puede comenzar a utilizar nuestro sistema",
                        icon: "success",
                        buttons: {
                        ok: "Continuar",
                        },
                        })
                        .then((ok) => {
                          if (ok) {
                            window.location.href = "index.php";
                          } else {
                            window.location.href = "index.php";
                          }
                        })
                    console.log(response);
                }
                else if (response == "existe"){
                    $('#email_alert').removeClass("d-none");
                } else {console.log(response);}
            }
        });
        
        return false;
    });

    $('#link_registro').on('click', function() {
        $('#cerrar_ingreso').click();
    });
    
    /*$('.modal').on('shown.bs.modal', function () {
        alert('hola');
        modalIngresoClon = $('#modalIngreso').clone();
        modalRegistroClon = $('#modalRegistro').clone();
    });
    
    $('.modal').on('hidden.bs.modal', function () {
        $(this).remove();
        $('#registro_container').append(modalRegistroClon);
        
    });*/
    
    
    
    
    /*$('#select_cond_editar').change(function(){
        console.log('cambio');
        var id_conductor = $("#select_cond_editar option:selected").attr('value');
        $.ajax({
            url: 'buscar_vehiculos.php',
            type: 'POST',
            data: {
                    id_conductor_ajax : id_conductor,
                },
                success: function(response){
                    //String.prototype.trim = function(){ return this.replace(/^\s+|\s+$/g, "");}
                    //if (response == "success"){
                        $('#select_veh_editar').load('modalRegistro.php')
                        console.log(response);
                    //} else {
                       // console.log(response);
                   // }
                }
            })
            return false;
    });*/

})
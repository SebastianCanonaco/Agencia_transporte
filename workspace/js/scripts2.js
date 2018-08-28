    function myMap() {
    var mapProp= {
        center:new google.maps.LatLng(-38.0033, -57.5528),
        zoom:12,
    };
    var map=new google.maps.Map(document.getElementById("googleMap"),mapProp);
    }
    
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
    
    
    $("#calle").on('blur', function(){
        var calle = $(this).val();
        $("#googleMap").html('<iframe width="600" height="450"  frameborder="0" style="border:0"   src="https://www.google.com/maps/embed/v1/place?key=AIzaSyAZSmeT8tznWd0MX9kbOYH3-8AW0Shgnf4&q='+calle+',mar del plata, argentina" allowfullscreen></iframe>');
    });
    
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
     (function() {
       'use strict';
       window.addEventListener('load', function() {
         // Fetch all the forms we want to apply custom Bootstrap validation styles to
         var forms = document.getElementsByClassName('needs-validation');
         // Loop over them and prevent submission
         var validation = Array.prototype.filter.call(forms, function(form) {
           form.addEventListener('submit', function(event) {
             if (form.checkValidity() === false) {
               seguir = false;
               event.preventDefault();
               event.stopPropagation();
             }
             form.classList.add('was-validated');
           }, false);
         });
       }, false);
     })();
    
    
var form = $("#form_registro"); 
var post_url = form.attr('action'); 

/*$("#form_registro").validator.validate().on("submit" , function(event){
    if (event.isDefaultPrevented()){
        alert(' no' );
        
    }  else {
        event.preventDefault();
        alert(" ok" );
    }
});*/

/*$(form).validate({ 
    rules: {
        nombre: {
            required: true
        },
        email: {
            rangelength: [2,40], 
            email: true,
            required: true
        },
        errorClass:"error",
        highlight: function(label) {
            $(label).closest('.form-group').removeClass('has-success').addClass('has-error');
        },

        success: function(label) {
            label.closest('.form-group').addClass('has-success');
        }
    },
    submitHandler: function(form) { 
        console.log("ok");
        return;
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
                    window.location.href = "index.php";
                    console.log(response);
                }
                else if (response == "existe"){
                    console.log(response);
                    //$('#email_registro').addClass("border border-danger rounded");
                } else {console.log(response);}
            }
        });            
        return false; 
    }                  
});*/ 
    
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
                if(response == "success"){
                    window.location.href = "index.php";
                } else {
                    /*$('#div_ingreso_email').addClass("border border-danger rounded");
                    $('#div_ingreso_pass').addClass("border border-danger rounded");*/
                }
            }
        });
        return false;
    });
    
    $('#form_registro').on('submit',function(e) {
        e.preventDefault();
        console.log("asd");
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
                    window.location.href = "index.php";
                    console.log(response);
                }
                else if (response == "existe"){
                    console.log(response);
                    //$('#email_registro').addClass("border border-danger rounded");
                } else {console.log(response);}
            }
        });
        
        return false;
    });
    
    $('#favoritos').change(function(){
       var calle = $("#favoritos option:selected").attr('calle');
       var altura = $("#favoritos option:selected").attr('altura');
       $('#input_calle').val(calle);
       $('#input_altura').val(altura);
    });
    
    /*$('#form_pedido').on('submit',function() {
        $.ajax({
            url: 'pedido_coche.php',
            type: 'POST',
            data: {
                telefono_ajax : $('#nombre_registro').val(),
                apellido_ajax : $('#apellido_registro').val(),
                telefono_ajax : $('#telefono_registro').val(),
                email_ajax : $('#email_registro').val(),
                contrasena_ajax : $('#contrasena_registro').val()
            },
            success: function(response){
                //String.prototype.trim = function(){ return this.replace(/^\s+|\s+$/g, "");}
                if (response == "success"){
                    window.location.href = "index.php";
                    console.log(response);
                }
                else if (response == "existe"){
                    console.log(response);
                    //$('#email_registro').addClass("border border-danger rounded");
                } else {console.log(response);}
            }
        });
        
        return false;
    });*/
    
    
    
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

})
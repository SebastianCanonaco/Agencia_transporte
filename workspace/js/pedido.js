    function myMap() {
    var mapProp= {
        center:new google.maps.LatLng(-38.0033, -57.5528),
        zoom:12,
    };
    var map=new google.maps.Map(document.getElementById("googleMap"),mapProp);
    }   
$(document).ready(function(){
    
    $('#nav_inicio').removeClass('active');
    $('#nav_pedido').addClass('active');
    
    $('#favoritos').change(function(){
        var calle = $("#favoritos option:selected").attr('calle');
        var altura = $("#favoritos option:selected").attr('altura');
        $('#input_calle').val(calle);
        $('#input_altura').val(altura);
        $("#googleMap").html('<iframe width="600" height="450"  frameborder="0" style="border:0"   src="https://www.google.com/maps/embed/v1/place?key=AIzaSyAZSmeT8tznWd0MX9kbOYH3-8AW0Shgnf4&q='+calle+altura+',mar del plata, argentina" allowfullscreen></iframe>');
        
    });      
      
    $("#input_altura").on('blur', function(){
        console.log('entra');
        var calle = $("#input_calle").val();
        var altura = $(this).val();
        
        $("#googleMap").html('<iframe width="600" height="450"  frameborder="0" style="border:0"   src="https://www.google.com/maps/embed/v1/place?key=AIzaSyAZSmeT8tznWd0MX9kbOYH3-8AW0Shgnf4&q='+calle+altura+',mar del plata, argentina" allowfullscreen></iframe>');
    });
    
    $('#form_pedido').on('submit',function() {
        
        $.ajax({
            url: 'pedido_coche.php',
            type: 'POST',
            data: {
                calle_ajax : $('#input_calle').val(),
                altura_ajax : $('#input_altura').val(),
                pasajeros_ajax : $('#pasajeros').val(),
                descripcion_ajax : $('#descripcion').val(),
                telefono_ajax : $('#telefono_pedido').val()
            },
            success: function(response){
                //String.prototype.trim = function(){ return this.replace(/^\s+|\s+$/g, "");}
                if (response == "success"){
                    swal({
                        title: "Viaje registrado",
                        text: "El viaje se registro correctamente, puede ver su estado en la pestaña 'Mi Cuenta, Mis Viajes'",
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
                    console.log(response);
                    //$('#email_registro').addClass("border border-danger rounded");
                } else {console.log(response);}
            }
        });
        
        return false;
    });
    
   });
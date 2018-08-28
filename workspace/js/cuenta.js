    function eliminar_fav(id){
        $('#boton_modal').click();
        $('#boton_eliminar').on('click', function(){
            $('#boton_cerrar').click();
            $.ajax({
            url: 'eliminar_favorito.php',
            type: 'POST',
            data: {
                    id_direccion_ajax : id,
                },
                success: function(response){
                    //String.prototype.trim = function(){ return this.replace(/^\s+|\s+$/g, "");}
                    if (response == "success"){
                        $("#cuadro_favoritos").load(location.href+" #cuadro_favoritos>*","");
                        console.log(response);
                    } else {
                        console.log(response);
                    }
                }
            });
            
            return false;
        });
    }
    
    
$(document).ready(function(){
    
    $('.elims_dir').on('click',function() {
        var elemento = $(this);
        $('#boton_modal').click();
        $('#boton_eliminar').on('click', function(){
            $('#boton_cerrar').click();
            $.ajax({
            url: 'eliminar_favorito.php',
            type: 'POST',
            data: {
                    id_direccion_ajax : elemento.attr('direccion'),
                },
                success: function(response){
                    //String.prototype.trim = function(){ return this.replace(/^\s+|\s+$/g, "");}
                    if (response == "success"){
                        $("#cuadro_favoritos").load(location.href+" #cuadro_favoritos>*","");
                        console.log(response);
                    } else {
                        console.log(response);
                    }
                }
            });
            
            return false;
        });

    });
    
        $('.sidebar a').on('mouseenter', function(){
        $(this).addClass('mouseenter');
        $(this).removeClass('bg-grey');
        $(this).addClass('text-dark');        
        $(this).removeClass('text-white');
    }).on('mouseleave', function(){
        $(this).removeClass('mouseenter');        
        $(this).addClass('bg-grey');
        $(this).addClass('text-white'); 
        $(this).removeClass('text-dark');
    });
    
    $('#form_favorito').on('submit',function() {
        $.ajax({
            url: 'agregar_favorito.php',
            type: 'POST',
            data: {
                calle_ajax : $('#calle_favorito').val(),
                altura_ajax : $('#altura_favorito').val(),
            },
            success: function(response){
                //String.prototype.trim = function(){ return this.replace(/^\s+|\s+$/g, "");}
                if (response == "success"){
                    $("#cuadro_favoritos").load(location.href+" #cuadro_favoritos>*","");
                    console.log(response);
                }
            }
        });
        
        return false;
    });

    $('#boton_eliminar_pedido').on('click', function() {
        $.ajax({
            url: 'cancelar_pedido.php',
            type: 'POST',
            data: {
                id_viaje : $('#boton_eliminar_pedido').attr('id_viaje')
            },
            success: function(response){
                //String.prototype.trim = function(){ return this.replace(/^\s+|\s+$/g, "");}
                if (response == "success"){
                    swal({
                        title: "Pedido cancelado",
                        text: "El viaje se ha cancelado correctamente, puede ver su estado en la pestaña 'Mi Cuenta, Mis Viajes'",
                        icon: "success",
                        buttons: {
                        ok: "Continuar",
                        },
                        })
                        .then((ok) => {
                          if (ok) {
                            window.location.href = "cuentaP.php";
                          } else {
                            window.location.href = "cuentaP.php";
                          }
                        })
                    console.log(response);
                }
            }
        });
        
        return false;
    });
});
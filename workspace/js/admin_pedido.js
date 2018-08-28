$(document).ready(function(){
    
    var id_conductor;
    var id_vehiculo;
    
    $('#nav_pedidos').addClass('active');
    
    $('#select_cond').change(function(){
        id_conductor = $("#select_cond option:selected").val();
        $(".datos").each(function() {
            $(this).removeClass('d-none');
            if(id_conductor == 0){
                $('#select_veh').val(0);
                $(this).removeClass('d-none');
            }
            if(id_conductor != 0 && $(this).attr('id_conductor') != id_conductor){
                $(this).addClass('d-none')
           }
        });
    });
    
    $('#select_veh').change(function(){
        id_vehiculo = $("#select_veh option:selected").val();
        console.log('id' + id_vehiculo);
        $(".datos").each(function() {
            console.log($(this).attr('id_vehiculo'));
            if(id_vehiculo == 0 && $(this).attr('id_conductor') == id_conductor){
                $(this).removeClass('d-none');
            }
            if(id_vehiculo != 0 && $(this).attr('id_conductor') == id_conductor && $(this).attr('id_vehiculo') == id_vehiculo){
                $(this).removeClass('d-none');
            }
            /*if($(this).attr('id_vehiculo') != id_vehiculo && $(this).attr('id_conductor') != id_conductor){
                    $(this).addClass('d-none')
            }*/
            if(id_vehiculo != 0 && id_conductor != 0 && $(this).attr('id_vehiculo') != id_vehiculo){
                    $(this).addClass('d-none')
            }
            
        });
    });
    
    $('#select_est').change(function(){
        estado = $("#select_est option:selected").val();
        $(".datos").each(function() {
            $(this).removeClass('d-none');
            if(estado == 0 ){
                $('#select_veh').val(0);
                $(this).removeClass('d-none');
            }
            if(id_conductor != 0 && $(this).attr('id_conductor') != id_conductor){
                $(this).addClass('d-none')
           }
        });
    });
    
    $('#select_cond').change(function(){
        var id_conductor_viaje = $("#select_cond option:selected").attr('value');
        $.ajax({
            url: 'buscar_vehiculos.php',
            type: 'POST',
            data: {
                    id_conductor_ajax : id_conductor_viaje,
                },
                success: function(response){
                    //String.prototype.trim = function(){ return this.replace(/^\s+|\s+$/g, "");}
                    //if (response == "success"){
                        $('#select_veh').html(response);
                        console.log(response);
                    //} else {
                       // console.log(response);
                   // }
                }
            })
            return false;
    });
    
   $('.boton_finalizar').on('click', function(){
       $.ajax({
            url: 'finalizar_pedido.php',
            type: 'POST',
            data: {
                    id_viaje : $(this).attr('id_viaje'),
                },
                success: function(response){
                    //String.prototype.trim = function(){ return this.replace(/^\s+|\s+$/g, "");}
                    if (response == "success"){
                        window.location.href = "admin_pedidos.php";
                        console.log(response);
                    } else {
                        console.log(response);
                    }
                }
            })
            return false;
   });
      
    
    $('.boton_cancelar').on('click', function(){
        $.ajax({
            url: 'cancelar_pedido.php',
            type: 'POST',
            data: {
                    id_viaje : $(this).attr('id_viaje'),
                },
                success: function(response){
                    //String.prototype.trim = function(){ return this.replace(/^\s+|\s+$/g, "");}
                    if (response == "success"){
                        window.location.href = "admin_pedidos.php"
                        console.log(response);
                    } else {
                        console.log(response);
                    }
                }
            })
            return false;
    });
    
    $('.boton_eliminar').on('click', function(){
        swal({
                        title: "Eliminar pedido",
                        text: "Seguro que quiere eliminar este pedido?",
                        icon: "warning",
                        buttons: {
                        ok: "Eliminar",
                        cancel:"Cancelar",
                        },
                        })
                        .then((ok) => {
                          if (ok) {
                            $.ajax({
                                url: 'eliminar_pedido.php',
                                type: 'POST',
                                data: {
                                        id_viaje : $(this).attr('id_viaje'),
                                    },
                                    success: function(response){
                                        //String.prototype.trim = function(){ return this.replace(/^\s+|\s+$/g, "");}
                                        if (response == "success"){
                                            window.location.href = "admin_pedidos.php"
                                            console.log(response);
                                        } else {
                                            console.log(response);
                                        }
                                    }
                                })
                            return false;
                          } else {
                            
                          }
                        });
    });
});
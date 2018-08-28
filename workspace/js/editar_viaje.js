$(document).ready(function(){
    var condicion = true;
$('#select_cond_editar').change(function(){
        var id_conductor = $("#select_cond_editar option:selected").attr('value');
        console.log(id_conductor);
        $.ajax({
            url: 'buscar_vehiculos.php',
            type: 'POST',
            data: {
                    id_conductor_ajax : id_conductor,
                },
                success: function(response){
                    //String.prototype.trim = function(){ return this.replace(/^\s+|\s+$/g, "");}
                    //if (response == "success"){
                        $('#select_veh_editar').html(response);
                        $('#select_veh_editar').val($('#cabecera').attr('id_vehiculo'));
                        console.log(response);
                    //} else {
                       // console.log(response);
                   // }
                }
            })
            return false;
            
    });
    
    $('#form_editar_pedido').on('submit',function() {
        $.ajax({
            url: 'actualizar_pedido.php',
            type: 'POST',
            data: {
                    id_viaje : $('#cabecera').attr('id_viaje'),
                    calle_salida : $('#calle_salida').val(),
                    altura_salida : $('#altura_salida').val(),
                    calle_llegada : $('#calle_llegada').val(),
                    altura_llegada : $('#altura_llegada').val(),
                    id_conductor : $("#select_cond_editar option:selected").attr('value'),
                    id_vehiculo : $("#select_veh_editar option:selected").attr('value')
                    
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
    })
    

    $('#select_cond_editar').val($('#cabecera').attr('id_conductor'));
    $('#select_cond_editar').change();
    
});
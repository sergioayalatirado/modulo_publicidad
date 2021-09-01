function bajaPublicidad(id_publicidad){
    
    $.ajax({
    type: 'POST',
    url: 'metodos/php/baja_publicidad.php',
    data: {
        'id_publicidad': id_publicidad
    },
    success: function (data) {
        div_resultado.innerHTML = data;
        console.log("Se obtuvo una respuesta de la base de datos.")
        $("#avisoPublicidad").modal({
            'show': true
        });
    }
})
}

function altaPublicidad(id_publicidad){
    console.log(id_publicidad);
    var ptable = $("#dataTable").DataTable();
    $.ajax({
        type: 'POST',
        url: 'metodos/php/alta_publicidad.php',
        data:{
            'id_publicidad': id_publicidad
        },
        success:function(data){
            div_resultado.innerHTML = data;
            console.log("Se obtuvo respues de la bdd");
            $("#avisoPublicidad").modal({
                'show': true
            });
        }
    })
}
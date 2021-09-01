function soloLetras(e) {
    key = e.keyCode || e.which;
    tecla = String.fromCharCode(key).toLowerCase();
    letras = " áéíóúabcdefghijklmnñopqrstuvwxyz";
    especiales = "8-37-39-46";
    var mensaje = document.getElementById("mensaje_sucursal");
    tecla_especial = false
    for (var i in especiales) {
        if (key == especiales[i]) {
            tecla_especial = true;
        }
    }
    if (letras.indexOf(tecla) == -1 && !tecla_especial) {
        mensaje.innerHTML = "Ingresa solo texto";
        setTimeout(function () {
            mensaje.innerHTML = "";
        }, 3000);
        return false;
    }
}


document.getElementById("forma-sucursal").addEventListener('submit', function (event) {
    event.preventDefault();
    var sucursal = document.getElementById("sucursal").value;
    var tipo_sucursal = document.getElementById("tipo_sucursal").value;
    var id_sucursal = document.getElementById("id_sucursala").value;

    var s_leng = document.getElementById("sucursal").value.length;
    var ts_leng = document.getElementById("tipo_sucursal").value.length;
    var div_resultado = document.getElementById('div_resultado');
    

    
    if(sucursal == ""){
        alert("El apartado de nombre de la sucursal se encuentra vacio o es muy corto.");
    }else if(s_leng < 3 || s_leng >= 50){
        alert("Recuerda, minimo debes ingresar 3 caracteres y maximos 50 caracteres.");
    }else if(tipo_sucursal == ""){
        alert("Selecciona un tipo de sucursal.");
    }else{
        $.ajax({
            type: 'POST',
            url: 'metodos/php/actualizar_sucursal.php',
            data: {
                'id_sucursala': id_sucursal,
                'sucursal': sucursal,
                'tipo_sucursal': tipo_sucursal
            },
            success: function (data) {
                div_resultado.innerHTML = data;
                console.log("Se obtuvo una respuesta de la base de datos.")
                $("#avisoSucursal").modal({
                    'show': true
                });
            }
        })
    }
});
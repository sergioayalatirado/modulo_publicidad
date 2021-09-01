
document.getElementById("archivo").addEventListener('change', function(event){
    $("#limpiarArchivo").removeClass("d-none");
});

function comprobarTexto(textArea1){
    if(textArea1.length > 0){
        console.log("ya lleguee!!")
        $("#borrarTexto").removeClass("d-none");
        
    }else{
        $("#borrarTexto").addClass("d-none");
        $("#texto").val("");
    }
}

function borrarTexto1(textArea){
    $("#texto").val("");
}


function soloLetras(e) {
    key = e.keyCode || e.which;
    tecla = String.fromCharCode(key).toLowerCase();
    letras = " áéíóúabcdefghijklmnñopqrstuvwxyz";
    especiales = "8-37-39-46";
    var mensaje = document.getElementById("mensaje_titulo");
    tecla_especial = false
    for (var i in especiales) {
        if (key == especiales[i]) {
            tecla_especial = true;
        }
    }
    if (letras.indexOf(tecla) == -1 && !tecla_especial) {
        mensaje.innerHTML = "<i>Ingresa solo texto</i>";
        setTimeout(function () {
            mensaje.innerHTML = "";
        }, 3000);
        return false;
    }
}

var estaOculto=false;

$('#botonAccion').click(function(event){
    event.preventDefault();
    if(estaOculto){
        $("#noMedia").removeClass('d-none');
        $("#sTexto").addClass('d-none');

        // estaOculto = false;
    }else{
        $("#noMedia").addClass('d-none');
        $("#sTexto").removeClass('d-none');
        $("#archivo").val("");
        // estaOculto = true;
    }
    estaOculto = !estaOculto;
});

$("#limpiarArchivo").click(function(event){
    event.preventDefault();

    $("#archivo").val("");
});

var archivo = true;
document.getElementById('botonAccion').addEventListener('click', function (event) {
    //True = archivo;
    //False = texto;
    if (archivo == true) {
        $("#botonAccion").html('<i>Solo Archivo</i>');
        $("#ocultarTodo").removeClass('d-none');
        //El usuario dio click y ingresara texto.
        //Aqui cambia a true el false

        console.log(archivo);
        document.getElementById("texto").value = "";
        return archivo = false;
    } else {
        //El usuario regreso a archivo e ingresara un archivo.
        //Aqui regresa a true
        $("#botonAccion").html('<i>Solo Texto</i>');
        document.getElementById("archivo").value = "";
        $("#ocultarTodo").removeClass('d-none');
        console.log(archivo);
        return archivo = true;
    }
});

$('#ocultarTodo').click(function(event){
    event.preventDefault();
    $("#noMedia").addClass('d-none');
    $("#sTexto").addClass('d-none');
    $("#ocultarTodo").addClass('d-none');
    $("#botonAccion").html('<i>Modificar contenido</i>');

});

document.getElementById('archivo').addEventListener('change', function (event) {

    var tipoArchivo = this.files[0].type; //Recibe el tipo de archivo
    var tamanoArchivo = this.files[0].size; //Recibe el tama;o de archivo
    // var bytesAmb = (tamanoArchivo / 1.048); //PRUEBA 
    var limiteBytesImg = 1048576; //1MB IMAGEN
    var limiteBytesVid = 52428800; //50MB VIDEO
    var limiteBytesAu = 10485760; //10MB AUDIO

    //Limites archivos a MB
    var splitTArchivo = tipoArchivo.split("/");


    if (splitTArchivo[0] == "image" || splitTArchivo[0] == "video" || splitTArchivo[0] == "audio") {

        if (splitTArchivo[0] == "image" && tamanoArchivo < limiteBytesImg) {
             document.getElementById("aviso_valido").innerHTML = "Esta imagen es valida.<br>";
            setTimeout(function(){
                document.getElementById("aviso_valido").innerHTML = "";
            }, 4000);

        } else if (splitTArchivo[0] == "video" && tamanoArchivo < limiteBytesVid) {
            document.getElementById("aviso_valido").innerHTML = "Este video es valido.<br>";
            setTimeout(function () {
                document.getElementById("aviso_valido").innerHTML = "";
            }, 4000);

        } else if (splitTArchivo[0] == "audio" && tamanoArchivo < limiteBytesAu) {
            document.getElementById("aviso_valido").innerHTML = "Este audio es valido.<br>";
            setTimeout(function () {
                document.getElementById("aviso_valido").innerHTML = "";
            }, 4000);

        } else {

            if (splitTArchivo[0] == "image") {
                document.getElementById("aviso_invalido").innerHTML = "La imagen sobrepasa el tamaño de 1MB, elija una de menor tamaño.";
                this.value = "";
                setTimeout(function () {
                    document.getElementById("aviso_invalido").innerHTML = "";
                }, 4000);
            } else if (splitTArchivo[0] == "video") {
                document.getElementById("aviso_invalido").innerHTML = "El video sobrepasa el tamaño de 50MB, elija una de menor tamaño.";
                this.value = "";
                setTimeout(function () {
                    document.getElementById("aviso_invalido").innerHTML = "";
                }, 4000);
            } else if (splitTArchivo[0] == "audio") {
                document.getElementById("aviso_invalido").innerHTML = "El audio sobrepasa el tamaño de 10MB, elija una de menor tamaño.";
                this.value = "";
                setTimeout(function () {
                    document.getElementById("aviso_invalido").innerHTML = "";
                }, 4000);
            } else {}
            console.log("El archivo excede el tamaño en MB (" + tamanoArchivo + ") y por ende no es apto para subirse " + tamanoArchivo);
        }
    } else {

        document.getElementById("aviso_archivo").innerHTML = "Este no es un archivo valido, por favor elija un archivo valido.";
        setTimeout(function () {
            document.getElementById("aviso_archivo").innerHTML = "";
        }, 4000);
        this.value = '';
    }
});




document.getElementById('form_a_publicidad').addEventListener('submit', function (event) {
    //Previene a que el form se envie cuando valida los datos
    event.preventDefault();



    const inputTitulo = document.getElementById('titulo_publicidad');
    const inputSucursal = document.getElementById('fk_sucursal');
    const inputDispositivo = document.getElementById('fk_dispositivo');
    const inputTexto = document.getElementById('texto');
    var valInputArchivo = document.getElementById('archivo');

    //Variables fechas recibidas del FrontEn
    var inputSfechaInicio = document.getElementById("fecha_inicio").value;
    var inputShoraInicio = document.getElementById("hora_inicio").value;
    var inputSfechaFinal = document.getElementById("fecha_final").value;
    var inputShoraFinal = document.getElementById("hora_final").value;
    var div_respuesta = document.getElementById("respuesta");
    
    var textoValue = document.getElementById('texto').value;
    var textoAnterior = document.getElementById('textoAnterior');

    if(textoAnterior != null){
        textoAnterior.value;
    }
    //Fechas parseadas
    const lengthTexto = inputTexto.value.length;
    var valueTexto = inputTexto.value;

    var cantText = document.getElementById('texto').value.length;

    //Evaluar el valor de la sucursal
    const valueSucursal = inputSucursal.value;
    const valueDispositivo = inputDispositivo.value;

    //Evaluar el valor de la variable recibida.
    const valueTitulo = inputTitulo.value;
    //Evaluar la longitud de la variable recibida
    const lengthTitulo = valueTitulo.length;

    //Variables para saber si el formato es valido dentro del input file
    var archivo = document.getElementById('archivo');

    console.log("Formato fecha y hora");
    var iFechaHInicio = inputSfechaInicio + ' ' + inputShoraInicio;
    var iFechaHFinal = inputSfechaFinal + ' ' + inputShoraFinal;

    //Añadiendo un cero mientras tiene un digito en su valor
    var hoy = new Date();
    var dia_x = hoy.toLocaleDateString();
    var dia_now = dia_x.split("/", 1);
    var mes_now = ('0' + (hoy.getMonth() + 1)).slice(-2);
    var hora_now = ('0' + (hoy.getMinutes())).slice(-2);


    var hora_actual = hoy.getHours() + ":" + hora_now;

    var ActualAnio = hoy.getFullYear();
    var FechaActualCompleta = ActualAnio + '-' + mes_now + '-' + dia_now + ' ' + hora_actual;

    //ESTA VARIABLE ALMACENA LA FECHA,DIA Y HORA FORMATEADAS AL TIPO DE LA BASE DE DATOS //NO ELIMINAR ESTA VARIABLE
    var nDateH = FechaActualCompleta;


    console.log("REVISADO EL 20/07/2021 A LAS 12:58PM DONDE SE REPARARON FALLAS DE CONDICIONALES DE LA HORA.");
    //La condicional compara que si el titulo esta vacio o que tenga menos de 5 caracteres automaticamente marcara que hay algun error y por ende no hara nada.
    if (valueTitulo == "" || lengthTitulo < 5) {
        alert("Campo de titulo vacio o muy corto.");
    } else if (lengthTitulo >= 35) {
        alert("La cantidad de caracteres en el titulo de publicidad excede los permitidos.");
    } else if (inputSfechaInicio == "" || inputSfechaFinal == "" || inputShoraInicio == "" || inputShoraFinal == "") {
        alert("Favor de llenar las fechas y horas faltantes.");
    }
    //Revisar 
    else if (iFechaHInicio == iFechaHFinal) {
        alert("La fecha y hora de inicio y final no pueden ser identicas.\nVerifica e intentalo nuevamente.");

        //Se inhabilita el ingresar desde la hora actual ya que generaba conflicto al modificar la publicidad
    } else if (inputSfechaInicio > inputSfechaFinal) {
        alert("La fecha inicio es mayor a la fecha final.");
    } else if (inputShoraInicio >= inputShoraFinal) {
        alert("La hora INICIAL es mayor o igual a la hora FINAL.");
    } else if (iFechaHInicio > iFechaHFinal) {
        alert("La fecha de inicio es mayor a la fecha final.");
    } else if (iFechaHInicio == iFechaHFinal) {
        alert("La fecha y hora de inicio es igual a la fecha y hora final");
    } else if (valueSucursal == "" || valueSucursal == null) {
        alert("Selecciona una sucursal.");
    } else if (valueDispositivo == "" || valueDispositivo == null) {
        alert("Selecciona un dispositivo.")
    } else if (archivo == false && cantText <= 4) {
        alert("Muy poco texto o descripcion de la publicidad. \nIngresa desde 5 caracteres.\nIngresaste " + cantText + " Caracteres.");
    } else if (archivo == true) {
        var i = document.getElementById("texto").value = "";
        i = this.innerHTML = "";
    } else {
        $("#actualizar").attr('disabled', true);
        $("#actualizar").html('Validando...');
        var formData = new FormData(document.getElementById("form_a_publicidad"));
        $.ajax({
            type: 'POST',
            url: 'metodos/php/editar_publicidad_v2.php',
            dataType: "html",
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            success: function (data) {
                div_respuesta.innerHTML = data;
                console.log("Ya obtuve la respuesta");
                console.log(data);
                $("#avisoPublicidad").modal({
                    'show': true
                });
                $("#actualizar").html('Actualizar publicidad');
                $("#actualizar").attr('disabled', false);
            }
        })
    }
});



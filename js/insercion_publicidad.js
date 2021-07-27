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
        mensaje.innerHTML = "Ingresa solo texto";
        setTimeout(function () {
            mensaje.innerHTML = "";
        }, 3000);
        return false;
    }
}

function checkDate() {
    var fecha_inicio = document.getElementById('fecha_hora_inicio');
    var fecha_final = document.getElementById('fecha_hora_final');
    if (fecha_final < fecha_inicio) {
        alert("La fecha final no puede ser menor que la fecha de inicio.");
        return false;
    }
    return true;
}


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
            document.getElementById("aviso_valido").innerHTML = "Esta imagen es valida.";

        } else if (splitTArchivo[0] == "video" && tamanoArchivo < limiteBytesVid) {
            document.getElementById("aviso_valido").innerHTML = "Este video es valido.";
            setTimeout(function () {
                document.getElementById("aviso_valido").innerHTML = "";
            }, 4000);

        } else if (splitTArchivo[0] == "audio" && tamanoArchivo < limiteBytesAu) {
            document.getElementById("aviso_valido").innerHTML = "Este audio es valido.";
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



var archivo = true;
document.getElementById('botonAccion').addEventListener('click', function (event) {
    //True = archivo;
    //False = texto;
    if (archivo == true) {
        $("#botonAccion").html('<i>Solo Archivo</i>');

        //El usuario dio click y ingresara texto.
        //Aqui cambia a true el false
        console.log(archivo);
        document.getElementById("texto").value = "";
        return archivo = false;
    } else {
        //El usuario regreso a archivo e ingresara un archivo.
        //Aqui regresa a true
        $("#botonAccion").html('<i>Solo Texto</i>');

        console.log(archivo);
        return archivo = true;
    }
});






document.getElementById('form_publicidad').addEventListener('submit', function (event) {
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
    } //Esta linea sirve para validar los formatos de fecha
    else if (nDateH > iFechaHInicio) {
        alert("Ingresa una fecha inicial posterior a la fecha actual.");
    } else if (iFechaHInicio < nDateH) {
        alert("La fecha y hora de inicio no puede ser menor a la fecha y hora actual.\n" + iFechaHInicio + "\n" + nDateH);
    } else if (iFechaHFinal < nDateH) {
        console.log(hora_actual);
        alert("La fecha y hora final no puede ser menor a la fecha y hora actual.");
    } else if (iFechaHInicio < nDateH && iFechaHFinal < nDateH) {
        alert("La fecha inicial y final son menores a la actual, ingresa una fecha valida.");
    } else if (inputSfechaInicio > inputSfechaFinal) {
        alert("La fecha inicio es mayor a la fecha final.");
    } else if (inputShoraInicio >= inputShoraFinal) {
        alert("La hora INICIAL es mayor o igual a la hora FINAL.");
    } else if (nDateH > iFechaHFinal) {
        alert("La fecha de hoy es mayor a la final.");
    } else if (iFechaHInicio < nDateH) {
        alert("La fecha de inicio no puede ser menor a la actual.");
    } else if (iFechaHInicio > iFechaHFinal) {
        alert("La fecha de inicio es mayor a la fecha final.");
    } else if (iFechaHInicio == iFechaHFinal) {
        alert("La fecha y hora de inicio es igual a la fecha y hora final");
    } else if (valueSucursal == "" || valueSucursal == null) {
        alert("Selecciona una sucursal.");
    } else if (valueDispositivo == "" || valueDispositivo == null) {
        alert("Selecciona un dispositivo.")
    } else if (valueTexto == "" && valInputArchivo.files.length === 0) {
        alert("Por favor adjunta texto o contenido multimedia a tu publicidad.");
    } else if (archivo == false && cantText <= 4) {
        alert("Muy poco texto o descripcion de la publicidad. \nIngresa desde 5 caracteres.\nIngresaste " + cantText + " Caracteres.");
    } else if (archivo == true) {
        var i = document.getElementById("texto").value = "";
        i = this.innerHTML = "";
    } else {
        
        $("#btn_validar").attr('disabled', true);
        $("#btn_validar").html('Validando...');
        $("#btn_validar").html('Por favor espere...');
        var formData = new FormData(document.getElementById("form_publicidad"));
        $.ajax({
            type: 'POST',
            url: '../../metodos/php/verify_horario.php',
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
                $("#btn_validar").html('Crear nueva publicidad');
                $("#btn_validar").attr('disabled', false);
            }
        })
    }
});

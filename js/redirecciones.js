
//LOS VALORES QUE SE OBTIENEN A TRAVES DE LA URL COMO id_dispositivo, id_sucursal, id_publicidad y id_publicidadpt SE OBTIENEN A TRAVES DEL DATATABLE en el archivo formularios/tables_publicidadeshoy.php 
//DONDE SE OBTIENEN LOS VALORES id_publicidadpt DONDE SEGUN SU TIPO DE CONTENIDO ES EL REPRODUCTOR QUE SE MOSTRARA 

id_dispositivo = obtenerParametro('id_dispositivo')
id_sucursal = obtenerParametro('id_sucursal')
id_publicidad = obtenerParametro('id_publicidad')

//ESTE PARAMETRO SE OBTIENE DEL REPRODUCIR PUBLICIDAD EN CURSO DEL ARCHIVO DATATABLE formuarlios/tables_publicidadeshoy.php
id_publicidadpt = obtenerParametro('id_publicidadpt')

if (id_dispositivo.length > 0) {
    traer('actualizar_dispositivo.php?id_dispositivo=' + id_dispositivo);
} else if (id_sucursal.length > 0) {
    traer('editar_sucursal.php?id_sucursal=' + id_sucursal);
} else if (id_publicidad.length > 0) {
    traer('editar_publicidad_v3.php?id_publicidad=' + id_publicidad);
} else if (id_publicidadpt.length > 0) {
    traerphp('reproductor-only.php?id_publicidadpt=' + id_publicidadpt);
}else{
    traer('inicio.php')
}

function traer(archivo) {

    $('#contenido').load('metodos/formularios/' + archivo);

}

function traerphp(aphp) {
    $('#contenido').load('metodos/php/' + aphp);
}

function traerTabla(archivo) {
    $('#contenido').load('metodos/formularios/' + archivo);
}

function obtenerParametro(name) {
    name = name.replace(/[\[]/, "\\[").replace(/[\]]/, "\\]");
    var regex = new RegExp("[\\?&]" + name + "=([^&#]*)"),
        results = regex.exec(location.search);
    return results === null ? "" : decodeURIComponent(results[1].replace(/\+/g, " "));
}

//ESTO FUNCIONA PARA QUE NO QUEDE RASTRO DE LA URL ANTERIOR DENTRO DE LA BARRA DE DIRECCIONES
var newURL = location.href.split("?")[0];
window.history.pushState('object', document.title, newURL);

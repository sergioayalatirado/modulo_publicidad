
id_dispositivo = obtenerParametro('id_dispositivo')
id_sucursal = obtenerParametro('id_sucursal')
id_publicidad = obtenerParametro('id_publicidad')
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

var newURL = location.href.split("?")[0];
window.history.pushState('object', document.title, newURL);

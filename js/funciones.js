// let miParrafo = $('#noMedia');
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
        
        // estaOculto = true;
    }
    estaOculto = !estaOculto;
});
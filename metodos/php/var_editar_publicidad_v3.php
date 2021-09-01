<?php 
    $fhi = $row['fecha_hora_inicio'];
    $fhf = $row['fecha_hora_final'];

    //Sacando la fecha inicio del row consulta por ID
    $fecha_i = explode(" ", $fhi);
    $fecha_inicio = $fecha_i[0];
    $fi_dt = new DateTime($fecha_inicio);

    //Sacando la fecha final del row consulta por ID
    $fecha_f = explode(" ", $fhf);
    $fecha_final = $fecha_f[0];
    $ff_dt = new DateTime($fecha_final);
    
    //Sacando las HR de inicio y final
    $hr_inicio = $fecha_i[1];
    $hr_final = $fecha_f[1];

    //Buscando las sucursales disponibles
    $sucursales = $mysqli->query("SELECT * FROM sucursal WHERE estatus=1");

    //Variables de archivos
    $tipo_archivo = $row['tipo_archivo'];
    $url = $row['url_archivo'];

    //Buscando los dispositivos disponibles ACTIVOS
    $dispositivos = $mysqli->query("SELECT * FROM dispositivo WHERE estatus=1");
?>

  <!-- Modal -->
  <div class="modal fade" id="avisoPublicidad" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title text-center" id="exampleModalLongTitle">AVISO</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="text-center"></div>
                    <div class="col-md">
                        <div id="respuesta" class=""></div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar aviso</button>
                </div>
            </div>
        </div>
    </div>

<?php include("../php/conexion.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Dispositivo</title>

    <script src="js/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
</head>

<body>
    <div class="container" style="width:50%; height:0%;">
        <form id="formr_dispositivo" name="formr_dispositivo">
            <h4 class="display-4 text-center">Registrar nuevo dispositivo</h4>
            <hr><br>

            <div class="form-group">
                <h5 for="name" class="display-7">Nombre del dispositivo(Apodo)</h5>
                <input type="text" class="form-control" id="nombre_dispositivo" name="nombre_dispositivo" value="" placeholder="Ingresa el nombre o apodo del dispositivo">
            </div>
            <hr>
            
            <div class="form-group">
                <h5 for="tipo_dispositivo" class="display-7">Tipo de dispositivo</h5>
                <select name="tipo_dispositivo" id="tipo_dispositivo" class="form-control">
                    <option value="">Seleccione un dispositivo</option>
                    <option value="television">Television</option>
                    <option value="computadora">Computadora</option>
                    <option value="smartphone">Smartphone</option>
                </select>
            </div>
            <hr>
            
            <div class="form-group">
                <h5 for="tipo_dispositivo">Sucursal</h5>
                <select name="fk_sucursal" id="fk_sucursal" class="form-control">
                    <option value="">Seleccione una sucursal</option>
                    <?php
                    $query = $mysqli->query("SELECT * FROM sucursal WHERE estatus=1");
                    while ($valores = mysqli_fetch_array($query)) {
                        echo '<option value="' . $valores['id_sucursal'] . '" >' . $valores['nombre_sucursal'] . '</option>';
                    }
                    ?>
                </select>
            </div>
            <hr>
            <div class="form-group" style="width: 100%;">
                <label class="col-lg-14 control-label">
                    <h5>
                    Ingresa el User Agent(Identificador de navegador)(No obligatorio)
                    </h5>
                </label> <br>
                <label class="form-group">
                    <textarea class="form-group" name="device_agent" id="device_agent" cols="90%" rows="2.8px"></textarea>
                </label>
            </div>
            <div class="text-center">
            <button type="submit" class="btn btn-primary" name="crear" id="crear">Agregar nuevo dispositivo</button>
            </div>   
            <br>
        </form>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="avisoDispositivo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
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
                        <div id="div_resultado" name="div_resultado"></div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-warning" data-dismiss="modal">Cerrar aviso</button>
                </div>
            </div>
        </div>
    </div>

    <script src="js/agregar_dispositivo.js"></script>
</body>

</html>
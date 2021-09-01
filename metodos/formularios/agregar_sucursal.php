<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Sucursal</title>
    <script src="js/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.0/dist/jquery.validate.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</head>

<body>
    <div class="container" style="width:50%; height:10%;">
        <form action="" method="" id="formr-sucursal" name="formr-sucursal">

            <h4 class="display-4 text-center">Registrar nueva sucursal</h4>
            <hr><br>
            <div class="form-group">
                <h5 for="name">Nombre de la Sucursal</h5>
                <input type="text" class="form-control" id="sucursal" name="sucursal" value="" placeholder="Ingresa el nombre o identificador de la sucursal" onkeypress="return soloLetras(event)" onpaste="return false;">
            </div>
            <i id="mensaje_sucursal" style="color:red;" class="text-center"></i>
            <hr>
            <div class="form-group">
                <h5 for="tipo_sucursal">Tipo de sucursal</h5>
                <select name="tipo_sucursal" id="tipo_sucursal" class="form-control">
                    <option value="">---- Selecciona un tipo de sucursal ----</option>
                    <option value="Matriz">Matriz</option>
                    <option value="Normal">Normal</option>
                </select>
            </div>
            <br>
            <hr>
            <div class="text-center">
            <a href="../formularios/lista_sucursales.php" class=" btn btn-secondary">Lista de sucursales</a>
            <button type="submit" class="btn btn-primary" id="btn_esucursal" name='crear'>Guardar sucursal</button>
            </div>
        </form>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="avisoSucursal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
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
    <script src="js/agregar_sucursal.js"></script>
</body>

</html>
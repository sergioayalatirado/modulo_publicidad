<?php include_once "../php/conexion.php"; ?>
<?php include("../php/actualizar_dispositivo.php"); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizar Dispositivo</title>
    <script src="js/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.0/dist/jquery.validate.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</head>

<body>
    <div class="container" style="width:50%; height:0%;">
        <form id="forma_dispositivo" name="forma_dispositivo">

            <h4 class="display-4 text-center">Actualizar dispositivo</h4>
            <hr><br>

            <div class="form-group">
                <h5 for="name" class="display-7">Nombre del dispositivo</h5>
                <input type="text" class="form-control" id="nombre_dispositivo" name="nombre_dispositivo" value="<?= $row['nombre_dispositivo'] ?>" placeholder="Ingresa el nombre o apodo del dispositivo">
            </div>
            <hr>
            <div class="form-group">
                <h5 for="tipo_dispositivo" class="display-7">Tipo de dispositivo</h5>
                <select name="tipo_dispositivo" id="tipo_dispositivo" class="form-control">
                    <option value="">---Seleccione un dispositivo---</option>
                    <!-- 
                    <?php
                    $query = $mysqli->query("SELECT * FROM dispositivo");
                    while ($valores = mysqli_fetch_array($query)) {
                        if ($valores['id_dispositivo'] == $row["tipo_dispositivo"]) {
                            echo "<option value='" . $valores["id_dispositivo"] . "' selected='selected'>" . utf8_encode($valores["tipo_dispositivo"]) . "</option>";
                        } else {
                            echo "<option value='" . $valores["id_dispositivo"] . "'>" . utf8_encode($valores["tipo_dispositivo"]) . "</option>";
                        }
                    }
                    ?> -->
                    <option <?= ($row['tipo_dispositivo'] == "TELEVISION") ? 'SELECTED' : '123'; ?> value="TELEVISION">TELEVISION</option>
                    <option <?= ($row['tipo_dispositivo'] == "COMPUTADORA") ? 'SELECTED' : '456'; ?> value="COMPUTADORA">COMPUTADORA</option>
                    <option <?= ($row['tipo_dispositivo'] == "SMARTPHONE") ? 'SELECTED' : '789'; ?> value="SMARTPHONE">SMARTPHONE</option>
                </select>
            </div>
            <hr>

            <div class="form-group">
                <h5 for="tipo_dispositivo">Sucursal</h5>
                <select name="fk_sucursal" id="fk_sucursal" class="form-control">
                    <option value="">----Seleccione una sucursal----</option>
                    <?php
                    $query = $mysqli->query("SELECT * FROM sucursal");
                    while ($valores = mysqli_fetch_array($query)) {
                        // echo '<option value="'.$valores['id_sucursal'].'" name="fk_sucursal">'.$valores['nombre_sucursal'].'</option>';
                        if ($valores["id_sucursal"] == $row["fk_sucursal"]) {
                            echo "<option value='" . $valores["id_sucursal"] . "' selected='selected'>" . utf8_encode($valores["nombre_sucursal"]) . "</option>";
                        } else {
                            echo "<option value='" . $valores["id_sucursal"] . "'>" . utf8_encode($valores["nombre_sucursal"]) . "</option>";
                        }
                    }
                    ?>
                </select>
            </div>
            <hr>
            <div class="form-group">
                <label>
                    <h5>
                        Ingresa el User Agent(Identificador de navegador)(No obligatorio) <br>
                    </h5>
                </label><br>
                <div class="col-lg-14">
                    <textarea name="device_agent" id="device_agent" cols="90%" rows="2.8px"><?= $row['device_agent'] ?></textarea>
                </div>
            </div>
            <input type="text" name="id_dispositivoa" value="<?= $row['id_dispositivo'] ?>" hidden id="id_dispositivoa">
            <br>
            <div class="text-center">
            <a class="btn btn-danger" id="id_dispositivo" name="id_dispositivo" onclick="eliminarDispositivo(<?= $row['id_dispositivo'] ?>)">Eliminar dispositivo</a>
            <button type="submit" class="btn btn-primary" name="actualizar">Actualizar dispositivo</button>
            </div>
            <br>
        </form>
    </div>

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
                    <a href="../formularios/lista_dispositivos.php" class="btn btn-success">Lista de dispositivos</a>
                    <button type="button" class="btn btn-warning" data-dismiss="modal">Cerrar aviso</button>
                </div>
            </div>
        </div>
    </div>

    <script src="js/editar_dispositivo.js"></script>
</body>

</html>
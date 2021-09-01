<?php include_once('../metodos/php/conexion.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio | Bienvenido</title>
    <script src="../js/jquery-3.6.0.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>

<body>

    <!-- Modal Sucursal -->
    <div class="modal fade" id="modalSucursal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered ">
            <div class="modal-content">

                <div class="modal-header">

                    <h5 class="modal-title w-100 text-center" id="staticBackdropLabel">MODULO DE PUBLICIDAD</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <?php
                $consulta = "SELECT id_sucursal, nombre_sucursal FROM sucursal WHERE estatus=1";
                $resultado = mysqli_query($mysqli, $consulta);

                ?>

                <div class="modal-body">
                    <div class="row">
                        <div class="col-12 col-sm-8 offset-sm-2">
                            <h6 class="text-center">SELECCIONA UNA SUCURSAL</h6>
                            <select name="" id="IDsucursal" class="form-control" style="text-align: center; text-align-last: center;" ; onChange="buscarDispositivo(this.value)">
                                <?php
                                while ($rows = mysqli_fetch_array($resultado)) {
                                ?>
                                    <option value="<?= $rows['id_sucursal'] ?>"><?= $rows['nombre_sucursal'] ?></option>

                                <?php
                                } ?>

                            </select>

                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-12 col-sm-8 offset-sm-2">
                            <h6 class="text-center">SELECCIONA UN DISPOSITIVO</h6>
                            <select name="" id="dispositivo" class="form-control" style="text-align: center; text-align-last:center;"></select>
                        </div>
                    </div>
                </div><br>


                <div class="modal-footer text-center">
                    <!-- <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button> -->
                    <button type="button" class="btn btn-primary">Ir al reproductor</button>
                </div>
            </div>
        </div>
    </div>

    <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
        <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
        </symbol>
        <symbol id="info-fill" fill="currentColor" viewBox="0 0 16 16">
            <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z" />
        </symbol>
        <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
            <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
        </symbol>
    </svg>



    <div class="modal fade" id="modalError" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered text-center">
            <div class="modal-content">

                <div class="modal-header">

                    <h5 class="modal-title w-100 text-center" id="staticBackdropLabel">AVISO</h5>
                </div>

                <div class="modal-body">
                    <div class="alert alert-danger d-flex align-items-center" role="alert">
                        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:">
                            <use xlink:href="#exclamation-triangle-fill" />
                        </svg>
                        <div >
                            NAVEGADOR NO COMPATIBLE
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
<script>
    function detectOS() {
        const platform = navigator.platform.toLowerCase(),
            iosPlatforms = ['iphone', 'ipad', 'ipod', 'ipod touch'];

        if (platform.includes('mac')) return 'MacOS';
        if (iosPlatforms.includes(platform)) return 'iOS';
        if (platform.includes('win')) return 'Windows';
        if (/android/.test(navigator.userAgent.toLowerCase())) return 'Android';
        if (/linux/.test(platform)) return 'Linux';

        return 'unknown';
    }

    sistema = detectOS()

    
    if (sistema == 'Windows') {
        var myModal = new bootstrap.Modal(document.getElementById('modalSucursal'), {
            keyboard: false
        })
        myModal.show()

    } else {
        var myModal = new bootstrap.Modal(document.getElementById('modalError'), {
            keyboard: false
        })
        myModal.show()
    }



    function buscarDispositivo(val) {
        console.log(val);
        $.ajax({
            url: '../metodos/php/buscarDispositivo.php?id_sucursal=' + val,
            error: function(error) {
                console.log('error');
            },
            success: function(response) {
                $('#dispositivo').html(response);
                console.log(response);
            }
        })
    }
</script>

</html>
<?php
include_once "../php/conexion.php";
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Subir publicidad</title>
    <script src="js/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.0/dist/jquery.validate.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
</head>

<body>
    <div class="container" style="width:60%; height:10%;">
        <form action="" method="POST" enctype="multipart/form-data" id="form_publicidad">
            <h4 class="display-4 text-center">Registrar Publicidad</h4>
            <hr><br>

            <div class="form-group">
                <h5 for="titulo" class="display-7"> Título de la publicidad</h5>
                <input type="text"  onkeypress="return soloLetras(event)" class="form-control" onpaste="return false;" id="titulo_publicidad" name="titulo_publicidad" value="<?php if (isset($_GET['titulo']))                                                                                                                                                                   echo ($_GET['titulo']); ?>">
                <i id="mensaje_titulo" class="alertas" role="alert alert-warning" style=" font-style: italic; color: red;"></i>
                
            </div>
            
            <br>
            <hr>
            <div id="time"></div>
            <h5 for="" class="display-7">Fecha y hora de inicio</h5>
            <input type="date" size="1" class="form-control " name="fecha_inicio" id="fecha_inicio"><br>
            <input type="time" size="1" class="form-control " name="hora_inicio" id="hora_inicio"><br>
            <h5 for="" class="display-7">Fecha y hora de vencimiento</h5>
            <input type="date" size="1" class="form-control " name="fecha_final" id="fecha_final"><br>
            <input type="time" size="1" class="form-control " name="hora_final" id="hora_final"><br>
            <hr>
            
            <div class="form-group">
                <h5 for="" class="display-7 ">Selecciona una sucursal</h5>
                <select name="fk_sucursal" id="fk_sucursal" class="form-control " onpaste="return false;">
                    <option value="" class="form-control ">----Seleccione una sucursal----</option>
                    <?php
                    $query = $mysqli->query("SELECT * FROM sucursal WHERE estatus=1");
                    while ($valores = mysqli_fetch_array($query)) {
                        echo '<option value="' . $valores['id_sucursal'] . '" name="fk_sucursal">' . $valores['nombre_sucursal'] . ' (' . $valores['tipo_sucursal'] . ')' . '</option>';
                    }
                    ?>
                </select>
                <hr>
                <h5 for="" class="display-7">Dispositivos disponibles</h5>
                <select name="fk_dispositivo" id="fk_dispositivo" class="form-control" onpaste="return false;">
                    <option value="">----Seleccione un dispositivo----</option>
                    <?php
                    $query = $mysqli->query("SELECT * FROM dispositivo WHERE estatus=1");
                    while ($valores = mysqli_fetch_array($query)) {
                        echo '<option value="' . $valores['id_dispositivo'] . '" name="fk_dispositivo">' . $valores['tipo_dispositivo'] . ' (' . $valores['nombre_dispositivo'] . ')' . '</option>';
                    }
                    ?>
                </select>
                <i id="mensaje_dispositivo" style=" font-style: italic; color:red;"></i>
                <hr>

            </div>
            <i id="aviso_contenido" style="font-style: italoc; color:red;"><br></i>


            <label for=""><b>Selecciona una opcion: </b></label>
            <button class="btn btn-outline-danger" id="botonAccion"> <i> Solo Texto</i></button>

            <div class="form-group d-none" id="sTexto">
                <p id="mensaje_solotexto" class="alert alert-info d-none" role="alert"> </p>
                <hr>
                <h5 for="texto_descripcion" name="texto" class="display-7">Escribe texto o una nota.</h5>
                <textarea type="text" size="5" name="texto" id="texto" onkeypress="return soloLetras(event)" cols="80%" rows="2.8px" class="form-control"><?php if (isset($_GET['texto_descripcion']))
                                                                                                                                                            echo ($_GET['texto_descripcion']); ?></textarea>
             </div>
                    <hr>
            <div class="form-group" id="noMedia">
                <h5 for="" class="display-7">Audio/Imagen/Video</h5>
                </h6>
                <i id="aviso_archivo" style="color: red;"></i>
                <i id="aviso_valido" style="color: green;"></i>
                <i id="aviso_invalido" style="color: red;"></i>

                <input type="file" class="form-control" name="archivo" id="archivo" accept="audio/*,video/*,image/*" ><br>
                <hr>
                <div class="imagePreview" id="imagePreview"></div>
                <div id="audioPreview"></div>

            </div>

            <div class="text-center">
            <button type="submit" class="btn btn-primary my-2 aaaa text-center" id="btn_validar">Crear nueva publicidad</button>
            </div><br>
        </form>
    </div>


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
    <!-- No cambiar el orden de los JS -->
    <script src="js/funciones.js"></script>
    <!-- <script src="js/verify_horario.js"></script> -->
    <script src="js/insercion_publicidad.js"></script>

</body>

</html>
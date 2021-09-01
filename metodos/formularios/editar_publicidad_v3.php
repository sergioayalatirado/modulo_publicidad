<?php 
      include_once "../php/editar_publicidad.php";
      include_once "../php/var_editar_publicidad_v3.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar publicidad</title>
    <script src="js/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.0/dist/jquery.validate.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
</head>

<body>
    <div class="container" style="width:60%; height:10%;">
        <form action="" method="post" enctype="multipart/form-data" id="form_a_publicidad">
            <h4 class="display-4 text-center">Editar publicidad</h4>
            <hr><br>

            <div class="form-group">
                <h5 for="titulo" class="display-7">Titulo de la publicidad</h5>
                <input type="text" onkeypress="return soloLetras(event)" onpaste="return false;" class="form-control" id="titulo_publicidad" name="titulo_publicidad" value="<?php echo $row['titulo_publicidad'];?>">
                <i id="mensaje_titulo" class="alertas" role="alert alert-warning" style=" font-style: italic; color: red;"></i>
            </div>
            <br>
            <hr>

            <div class="form-group">
                <h5 for="" class="display-7">Fecha y hora de Inicio</h5>
                <input type="date" size="1" class="form-control" name="fecha_inicio" id="fecha_inicio" value="<?php echo $fi_dt->format('Y-m-d');?>" readonly>
                <br><input type="time" class="form-control" name="hora_inicio" id="hora_inicio" value="<?php echo $hr_inicio;?>" readonly>
            </div>
            <div class="form-group">
            <h5 for="" class="display-7">Fecha y hora de vencimiento</h5><br>
            <input type="date" name="fecha_final" class="form-control" id="fecha_final" name="fecha_final" value="<?php echo $ff_dt->format('Y-m-d');?>" readonly>
            <br><input type="time" name="hora_final" id="hora_final" class="form-control" value="<?php echo $hr_final;?>" readonly>
            <br><hr>
            </div>

            <div class="form-group">
                <h5 for="" class="display-7">Selecciona una sucursal</h5>
                <select name="fk_sucursal" id="fk_sucursal" class="form-control">
                        <option value="">SELECCIONE UNA SUCURSAL</option>
                        <?php 
                            while($valores = mysqli_fetch_array($sucursales)){
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
                <h5 for="" class="display-7 ">Selecciona un dispositivo</h5>
                <select name="fk_dispositivo" id="fk_dispositivo" class="form-control">
                    <option value="">SELECCIONA UN DISPOSITIVO</option>
                    <?php 
                        while($devices = mysqli_fetch_array($dispositivos)){
                            if($devices["id_dispositivo"] == $row["fk_dispositivo"]){
                                echo "<option value='" . $devices["id_dispositivo"] . "' selected='selected'>" . utf8_encode($devices["nombre_dispositivo"]). "</option>";
                            }else{
                                echo "<option value='" .$devices['id_dispositivo'] . "'>" . utf8_encode($devices["nombre_dispositivo"]) . "</option>";
                            }
                        }
                    ?>
                </select>
            </div>
            <hr>
        
            <?php 
                if($tipo_archivo == 'imagen'){
            ?>
            <div class="form-group text-center" >
                <h5 for="" class="display-7 text-center">Imagen almacenada</h5><br><br>
                <img src="multimedia/<?php echo $url ?>" alt="" width="300" class="img-fluid rounded mx-auto d-block"><br>
            </div>
            
            <?php 
            }else if($tipo_archivo == 'audio'){
            ?>
            
            <div class="form-group text-center">
               
                <h5 for="" class="display-7 text-center">Audio almacenado</h5><br><br>
                <embed src="multimedia/<?php echo $url ?>" width="300" height="150" style="border-style: groove;"></embed>
            </div>
            
            <?php 
            }else if($tipo_archivo == 'video'){
            ?>
        
            <div class="form-group text-center">
                <h5 for="" class="display-7 text-center">Video almacenado</h5><br><br>
                <!-- Si jala el video, probar desde los id 112 para arriba ya que tiene el nuevo formato de formulario-->
                <embed src="multimedia/<?php echo $url ?>"  alt="" height="200" width="300" style="border-style:outset;" ><br>
            </div>

            <?php 
            }else{
            ?>

            <div class="form-group">
                <h5 for="" class="display-7 text-center">Texto almacenado</h5><br>
                <textarea name="textoAnterior" id="textoAnterior" cols="30" rows="10" class="form-control" readonly><?=$row['texto']?></textarea>
            </div>

            <?php 
            }
        ?>
        
        <br>
        <hr>
        <br>
        <label for="" class="display-6 text-center">¿Deseas cambiar el contenido de esta publicidad?</label><br><br>
        <div class="text-center">
        <button class="btn btn-outline-danger" id="botonAccion">Modificar contenido</button>
        <button class="btn btn-outline-info d-none" id="ocultarTodo">Ocultar Todo</button>
        </div>
        <br>
        <hr>
        
        
        <div class="form-group d-none" id="sTexto">
            <p id="mensaje_solotexto" class="alert alert-info d-none" role="alert"></p>
            <p id="mensaje_titulo" style="color: red;"></p>
            <h5 for="" name="texto" class="display-7">Escribe texto o una nota.</h5>
            <textarea name="texto" size="5" onkeypress="return soloLetras(event)" onpaste="return false;" id="texto" cols="80%" rows="1px" class="form-control" onkeyup="comprobarTexto(this.value)"></textarea><br>
            <div class="text-center">
            <button type="button" name="borrarTexto" id="borrarTexto" class="btn btn-outline-warning d-none" onclick="borrarTexto1()">Limpiar texto</button>
            </div>
            <hr>
            <br>
        </div>

        <div class="form-group d-none" id="noMedia">
            <h5 for="" class="display-7 ">Selecciona un Audio, imagen o video.</h5>
            <i id="aviso_archivo" style="color:red;"></i>
            <i id="aviso_valido" style="color:green;"></i>
            <i id="aviso_invalido" style="color: red;"></i>

            <input type="file" class="form-control" name="archivo" id="archivo" accept="audio/*, video/*, image/*"> <br>
            
            <div class="text-center">
            <button class="btn btn-outline-warning d-none" id="limpiarArchivo">Limpiar archivo</button>
            </div>
            
            <div class="imagePreview" id="imagePreview"></div>
            <div id="audioPreview"></div>
            <div id="videoPreview"></div>
            <hr><br>
        </div>
            <input type="text" value="<?php echo $row['id_publicidad']?>" name="id_publicidad" id="id_publicidad" hidden>
            <input type="text" value="<?php echo $row['url_archivo']?>" name ="archivoAnterior" id="archivoAnterior" hidden>
            <div class="text-center">
            <button type="submit" class="btn btn-primary text-center" name="actualizar" id="actualizar">Editar publicidad</button>
            </div><br>
        </form>
    </div>
    
</body>
<script src="js/editar_publicidad.js"></script>
</html>
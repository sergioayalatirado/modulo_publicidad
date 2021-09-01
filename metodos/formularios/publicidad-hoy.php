<?php include "../php/leer_publicidad_hoy.php"; ?>
<?php include "../php/reproductor-only.php"; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Publicidad Disponible</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <script src="../../js/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
    <script src="//cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>    

</head>
<body>
<div class="container">
            <div class="box">
                <h4 class="display-4 text-center">PUBLICIDADES EN CURSO -  <?php
                    $DateAndTime = new DateTime('now');
                    $DateAndTime->setTimezone(new DateTimeZone('UTC'));  
                    echo $DateAndTime->format('d-m-Y');
                    ?></h4><hr>
                <div class="link-right">
                            <a href="../formularios/leer_publicidad.php">Anterior</a>
                </div>
                <?php if(isset($_GET['success'])){?>    
                <div class="alert alert-success" role="alert">
                    <?php echo $_GET['success']; ?>
                </div>
                <?php } ?> 
                <?php if(mysqli_num_rows($resultado)) { ?>
                <table class="table table-striped" id="datatable">
                    <thead>
                        <tr>
        
                        <th scope="col">ID</th>
                        <th scope="col">Titulo de Publicidad</th>
                        <th scope="col">Url archivo</th>
                        <th scope="col">Tipo de Archivo</th>
                        <th scope="col">Fecha/Hora Inicio</th>
                        <th scope="col">Fecha/Hora Final</th>
                        <th scope="col">Estatus</th>
                        <?php if($rows['tipo_archivo'] == 'texto'){
                            echo  "<th scope='col'>Texto</th>";
                        }?>
                        <th scope="col">Sucursal</th>
                        <th scope="col">Dispositivo</th>
                        <th scope="col">Tipo de Dispositivo</th>
                        <th scope="col">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                            $i =0;
                          while($rows = mysqli_fetch_assoc($resultado)){
                          $i++;
                   ?>
                        <tr>
                        <th scope="row"><?=$i?></th>
                        <td><?php echo $rows['titulo_publicidad']; ?></td>
                        <td><?php echo $rows['url_archivo']; ?></td>
                        <td><?php echo $rows['tipo_archivo']; ?></td>
                        <td><?php echo $rows['fecha_hora_inicio']; ?></td>
                        <td><?php echo $rows['fecha_hora_final']; ?></td>
                        <td><?php echo $rows['estatus']; ?></td>
                        <?php if($rows['tipo_archivo']=='texto'){

                         echo "<td>".$rows['texto'];
                         echo "</td>";
                        }
                         ?>
                        
                        <td><?php echo $rows['nombre_sucursal']; ?></td>
                        <td><?php echo $rows['nombre_dispositivo']; ?></td>
                        <td><?php echo $rows['tipo_dispositivo']; ?></td>
                        <td>
                            <a href="../php/reproductor-only.php?id=<?=$rows['id_publicidad']?>" 
                            class="btn btn-primary" name="id_publicidad">Reproducir</a><br><br>
                            
                            <a href="../formularios/editar_publicidad_v3.php?id=<?=$rows['id_publicidad']?>" 
                               class="btn btn-warning">Editar datos</a><br><br>
                            
                            <a href="../php/baja_publicidad.php?id=<?=$rows['id_publicidad']?>" 
                               class="btn btn-danger">Eliminar publicidad</a>
                            </td>
                        </tr>
                        <?php } ?>  
                    </tbody>
                </table>
                <?php } ?>
                <div class="link-right">
                    <a href="../../modulo_publicidad/index.php" class="link-primary">Inicio</a>
                </div>
               
            </div>
        </div>  
    <script src="../../js/lenguaje.js"></script>
</body>
</html>
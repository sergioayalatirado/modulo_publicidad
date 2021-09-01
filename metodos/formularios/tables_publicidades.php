<?php 
    $publicidad_av = "SELECT * FROM publicidad p, sucursal s , dispositivo d 
    WHERE p.fk_sucursal = s.id_sucursal AND p.fk_dispositivo = d.id_dispositivo AND p.estatus= 1 AND s.estatus=1 AND d.estatus=1 ORDER BY id_publicidad ASC";
?> 

<body id="page-top">
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Lista de publicidades</h1>
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">PUBLICIDADES GUARDADAS</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead class="text-center">
                            <tr>
                                <th>Titulo de publicidad</th>
                                <th>Tipo de archivo</th>
                                <th>Fecha de Inicio / Final</th>
                                <th>Sucursal</th>
                                <th>Dispositivo</th>
                                <th>Fecha de creacion</th>
                                <th>Fecha de Modificacion</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Titulo de publicidad</th>
                                <th>Tipo de archivo</th>
                                <th>Fecha de Inicio / Final</th>
                                <th>Sucursal</th>
                                <th>Dispositivo</th>
                                <th>Fecha de creacion</th>
                                <th>Fecha de Modificacion</th>
                                <th>Acciones</th>
                            </tr>
                        </tfoot>

                        <tbody class="text-center hover">
                            <?php
                            include_once('../php/conexion.php');
                            $mostrar = "SELECT * FROM publicidad p, sucursal s , dispositivo d 
                            WHERE p.fk_sucursal = s.id_sucursal AND p.fk_dispositivo = d.id_dispositivo AND p.estatus= 1 
                            ORDER BY fecha_hora_inicio DESC";
                            $resultado = mysqli_query($mysqli, $mostrar);

                            while ($publicidad = mysqli_fetch_array($resultado)) {
                            ?>
                                <tr>
                                    <td><?= strtoupper($publicidad['titulo_publicidad']) ?></td>
                                    <td><?= strtoupper($publicidad['tipo_archivo']) ?></td>
                                    <td class="text-center"><?= strtoupper($publicidad['fecha_hora_inicio']) ?> <br><hr>
                                        <?= strtoupper($publicidad['fecha_hora_final'])?>
                                    </td>
                                    <td><?= strtoupper($publicidad['nombre_sucursal']) ?></td>
                                    <td><?= strtoupper($publicidad['nombre_dispositivo']) ?> </td>
                                    <td><?= strtoupper($publicidad['fecha_creacion']) ?></td>
                                    <td><?= strtoupper($publicidad['fecha_modificacion']) ?></td>
                                    <td>
                                        <a class="btn btn-warning h-100 w-100" href="index.php?id_publicidad=<?= $publicidad['id_publicidad'] ?>">Editar</a>
                                    <hr>
                                        <?php
                                        if($publicidad['estatus']==1){
                                         ?>
                                        <a class="btn btn-danger h-100 w-100" onclick="bajaPublicidad(<?= $publicidad['id_publicidad'] ?>)">Dar de baja</a>
                                        
                                        <?php   
                                        }else if($publicidad['estatus']==0){
                                          ?>  
                                          <a class="btn btn-success h-100 w-100" onclick=" altaPublicidad(<?= $publicidad['id_publicidad']?>)">Activar</a>
                                          <?php
                                        }
                                        ?>
                                        
                                        
                                    </td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

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
                        <div id="div_resultado" name="div_resultado"></div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-warning" data-dismiss="modal">Cerrar aviso</button>
                </div>
            </div>
        </div>
    </div>

    </div>
    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
<script src="js/orderDTPub.js"></script>  

    <!-- Script para modificar las publicidades-->
    <script src="js/estatus_publicidad.js"></script>
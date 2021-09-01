<?php 
    $publicidad_av = "SELECT * FROM publicidad p, sucursal s , dispositivo d 
    WHERE p.fk_sucursal = s.id_sucursal AND p.fk_dispositivo = d.id_dispositivo AND p.estatus= 1 AND s.estatus=1 AND d.estatus=1 ORDER BY id_publicidad ASC";
?> 

<body id="page-top">
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Lista de publicidades en curso</h1>
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
                                <th class="text-center">Horario</th>
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
                                <th class="text-center">Horario</th>
                                <th>Sucursal</th>
                                <th>Dispositivo</th>
                                <th>Fecha de creacion</th>
                                <th>Fecha de Modificacion</th>
                                <th>Acciones</th>
                            </tr>
                        </tfoot>

                        <tbody class="text-center">
                            <?php
                            include_once('../php/leer_publicidad_hoy.php');
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
                                    <td><a class="btn btn-warning h-100 w-100" href="index.php?id_publicidad=<?= $publicidad['id_publicidad'] ?>">Editar</a>
                                    <hr>
                                    <a class="btn btn-primary h-100 w-100" href="index.php?id_publicidadpt=<?= $publicidad['id_publicidad'] ?>">Reproducir</a>
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

    </div>
    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/orderDTPub"></script>
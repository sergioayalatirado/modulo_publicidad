<body id="page-top">
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Lista de dispositivos</h1>
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">DISPOSITIVOS REGISTRADOS</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead class="text-center">
                            <tr>
                                <th>Nombre dispositivo</th>
                                <th>Tipo de dispositivo</th>
                                <th>Device Agent</th>
                                <th>Sucursal</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tfoot class="text-center">
                            <tr>
                                <th>Nombre dispositivo</th>
                                <th>Tipo de dispositivo</th>
                                <th>Device Agent</th>
                                <th>Sucursal</th>
                                <th>Acciones</th>
                            </tr>
                        </tfoot>

                        <tbody>
                            <?php
                            include_once('../php/conexion.php');
                            $mostrar = "SELECT * FROM dispositivo d, sucursal s
                                        WHERE d.fk_sucursal = s.id_sucursal AND d.estatus=1 ORDER BY id_dispositivo DESC";
                            $resultado = mysqli_query($mysqli, $mostrar);

                            while ($dispositivos = mysqli_fetch_array($resultado)) {
                            ?>
                                <tr class="text-center">
                                    <td><?= strtoupper($dispositivos['nombre_dispositivo']) ?></td>
                                    <td><?= strtoupper($dispositivos['tipo_dispositivo']) ?></td>
                                    <td><?= strtoupper($dispositivos['device_agent']) ?></td>
                                    <td><?= strtoupper($dispositivos['nombre_sucursal']) ?></td>
                                    <td><a class="btn btn-warning h-100 w-100" href="index.php?id_dispositivo=<?=$dispositivos['id_dispositivo']?>">Editar</a></td>
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
    <script src="js/demo/datatables-demo.js"></script>

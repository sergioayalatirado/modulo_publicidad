<body id="page-top">
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Sucursales registradas</h1>
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">LISTA DE SUCURSALES</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr class="text-center">
                                <th>Nombre sucursal</th>
                                <th>Tipo de sucursal</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr class="text-center">
                                <th>Nombre sucursal</th>
                                <th>Tipo de sucursal</th>
                                <th>Acciones</th>
                            </tr>
                        </tfoot>

                        <tbody>
                            <?php
                            include_once('../php/conexion.php');
                            $mostrar = "SELECT * FROM sucursal WHERE estatus=1 ORDER BY id_sucursal ASC";
                            $resultado = mysqli_query($mysqli, $mostrar);

                            while ($dispositivos = mysqli_fetch_array($resultado)) {
                            ?>
                                <tr class="text-center">
                                    <td><?= strtoupper($dispositivos['nombre_sucursal']) ?></td>
                                    <td><?= strtoupper($dispositivos['tipo_sucursal']) ?></td>
                                    <td><a class="btn btn-warning h-55 w-55" href="index.php?id_sucursal=<?= $dispositivos['id_sucursal'] ?>">Editar sucursal</a></td>
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
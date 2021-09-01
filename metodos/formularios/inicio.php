<?php 
include_once('../php/conexion.php');
?>                    
                    
                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">PANEL DE ADMINISTRADOR</h1>
                    </div>

                    <!-- Content Row -->
                    <div class="row">
                    <?php 
                    $publicidad_hoy = "SELECT COUNT(id_publicidad) FROM publicidad p WHERE
                    p.estatus=1 AND (CURRENT_TIMESTAMP > fecha_hora_inicio AND CURRENT_TIMESTAMP < fecha_hora_final) ORDER BY id_publicidad ASC";
                    $busqueda= mysqli_query($mysqli,$publicidad_hoy);
                    $pub_hoy= mysqli_fetch_array($busqueda);
                    ?>
                    
                    <?php 
                    $consulta= "SELECT COUNT(estatus) FROM publicidad";
                    $busqueda = mysqli_query($mysqli, $consulta);
                    $publicidades = mysqli_fetch_array($busqueda);

                    ?>
                        <!-- Publicidades almacenadas -->
                        <div class="col-xl-3 col-md-6 mb-4 hover-shadow">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Publicidades guardadas</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $publicidades[0]; ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-archive fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Publicidades activas de hoy -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                               Publicidades Activas(Hoy)</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $pub_hoy[0];?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-calendar-week fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Sucursales en sistema -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-info shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Sucursales en sistema
                                            </div>
                                            <div class="row no-gutters align-items-center">
                                                <div class="col-auto">
                                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?php 
                                                    $sucursales= "SELECT COUNT(id_sucursal) FROM sucursal";
                                                    $consulta = mysqli_query($mysqli, $sucursales);
                                                    $resultado = mysqli_fetch_array($consulta);
                                                    echo $resultado[0];
                                                    ?></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                        <i class="fas fa-home fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Dispositivos registrados -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                Dispositivos registrados</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php
                                            $dispositivos= "SELECT COUNT(id_dispositivo) FROM DISPOSITIVO";
                                            $consulta = mysqli_query($mysqli,$dispositivos);
                                            $resultado = mysqli_fetch_array($consulta);
                                            echo $resultado[0];
                                            ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-desktop fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Content Row -->

                    <div class="row">

                      
                    </div>

                    <!-- Content Row -->
                    <div class="row">

                        <!-- Content Column -->
                        <div class="col-lg-6 mb-4">

                           

                            <!-- Color System
                            <div class="row">
                                <div class="col-lg-6 mb-4">
                                    <div class="card bg-primary text-white shadow">
                                        <div class="card-body">
                                            Primary
                                            <div class="text-white-50 small">#4e73df</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-4">
                                    <div class="card bg-success text-white shadow">
                                        <div class="card-body">
                                            Success
                                            <div class="text-white-50 small">#1cc88a</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-4">
                                    <div class="card bg-info text-white shadow">
                                        <div class="card-body">
                                            Info
                                            <div class="text-white-50 small">#36b9cc</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-4">
                                    <div class="card bg-warning text-white shadow">
                                        <div class="card-body">
                                            Warning
                                            <div class="text-white-50 small">#f6c23e</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-4">
                                    <div class="card bg-danger text-white shadow">
                                        <div class="card-body">
                                            Danger
                                            <div class="text-white-50 small">#e74a3b</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-4">
                                    <div class="card bg-secondary text-white shadow">
                                        <div class="card-body">
                                            Secondary
                                            <div class="text-white-50 small">#858796</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-4">
                                    <div class="card bg-light text-black shadow">
                                        <div class="card-body">
                                            Light
                                            <div class="text-black-50 small">#f8f9fc</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-4">
                                    <div class="card bg-dark text-white shadow">
                                        <div class="card-body">
                                            Dark
                                            <div class="text-white-50 small">#5a5c69</div>
                                        </div>
                                    </div>
                                </div>
                            </div> -->

                        </div>

                        <div class="col-lg-6 mb-4">



                        </div>
                    </div>
<!DOCTYPE html>
<html lang="en">
    
<?php
include('contenido/head.php');
include('conexion/conexion.php');



?>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">


        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
            <?php
            include('contenido/sidebar.php')
            ?>
        </ul>

        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?php
                include('contenido/topbar.php')
                ?>
                <!-- End of Topbar -->
        

                <!-- Begin Page Content -->
                
                <div class="container-fluid">
                    <div class="card">
                        <div class="card-body">
                        <form  method="POST">
                            <?php 
                            include('controllers/catalogo/insertcatalogo.php');
                            include('controllers/catalogo/updatecatalogo.php');
                            
                            include('contenido/modal/catalogo/modalcatalogo.php');

                            ?>
                            <a class="btn btn-success float-right" href="#" data-toggle="modal" data-target="#modalcatalogo"><i class="fas fa-plus"></i> Crear</a>
                        </form>
                            <h3>Catalogo de Cuentas</h3>
                            
                            
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col" WIDTH="300">N#</th>
                                        <th scope="col">Nombre</th>
                                        <th scope="col">Movimientos</th>
                                        <th scope="col">Accion</th>

                                    </tr>
                                </thead>
                                <tbody>

                                    <?php
                            
                                    $sql = "SELECT * FROM catalogoCuentas";
                                    $resultado = $conexion->query($sql);

                                    $contador = 1;
                                    
                                    // validación para mostrar los datos

                                    if ($resultado->num_rows > 0) {

                                        // hay información que mostrar

                                        while ($row = $resultado->fetch_assoc()) {?>
                                    <tr>
                                        
                                        <td><?= $row['numeroCuenta'] ?></td>
                                        <td><?= $row['nombreCuenta'] ?></td>
                                        <td><?= $row['movimientoId'] ?></td>
                                        <td>

                                            <button type="button" class="btn btn-primary btn-sm"><i class="fas fa-layer-group"></i> Subcuentas</button>
                                            <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#modalcatalogoedit<?php echo $row['cuentaId'];?>"><i class="fas fa-edit"></i> Editar</button>
                                            <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"  id="eliminardato"><i class="fas fa-trash-alt"></i> Eliminar</button>
                                          
                                        </td>
                                    </tr>
                                    <?php
                                    
                                              include('contenido/modal/catalogo/editmodalcatalogo.php');
                                              include('contenido/modal/catalogo/modaldelete.php');

                                            

                                    ?>

                                    <?php }
                                    } else {

                                        echo "Sin información ingresada aún";
                                    }

                                    $contador++;


                                ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <?php
            
            include('contenido/footer.php')
            
            ?>


            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>


    <?php
    include('contenido/js.php')
    
    ?>
    $
</body>

</html>
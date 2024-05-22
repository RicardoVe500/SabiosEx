<!DOCTYPE html>
<html lang="en">



<?php
include('contenido/head.php')
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

                <div class="row">
                    <div class="col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Empresas y Sucursales</h5>
                                <p class="card-text">Apartado de administrar las empresas registradas en el sistema.</p>
                                <a href="#" class="btn btn-primary">Ir</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Catalago de cuentas</h5>
                                <p class="card-text">Ingresar y Modificar el listado del Catalogo de cuentas.</p>
                                <a href="catalogo2.php" class="btn btn-primary">Ir</a>
                            </div>
                        </div>
                    </div>
                </div>
            <br>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Partidas Contables</h5>
                                <p class="card-text">Registrar todas las partidas contables.</p>
                                <a href="#" class="btn btn-primary">Ir</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Administrar Usuarios</h5>
                                <p class="card-text">Se configura los usuarios.</p>
                                <a href="aduser.php" class="btn btn-primary">Ir</a>
                            </div>
                        </div>
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
                    <h5 class="modal-title" id="exampleModalLabel">¿Listo para Salir?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Selecciono "Cerrar Sesión", ¿Esta seguro?.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                    <a class="btn btn-primary" href="login/login.html">Cerrar Sesión</a>
                </div>
            </div>
        </div>
    </div>


    <?php
    include('contenido/js.php')
    ?>
    
  <script src="js/ajax.js"></script>
</body>

</html>


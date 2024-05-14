<!DOCTYPE html>
<html lang="en">
<?php
include('contenido/head.php');

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
                           
                            <?php 
                            include('contenido/modal/catalogo/modalcatalogo.php');
                            include('contenido/modal/catalogo/editmodalcatalogo.php');

                            ?>
                                <a class="btn btn-success float-right" href="#" data-toggle="modal" data-target="#modalcatalogo"><i class="fas fa-plus"></i> Crear</a>

                            <h3>Catalogo de Cuentas</h3>
                        <div class="card" id="task-result">
                            <div class="card-body">

                                <ul id="container"></ul>
                                
                            </div>
                        </div>

                            <form id="task-from">
                                <table id="datatable" class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">Nombre</th>
                                            <th scope="col" WIDTH="200">Numero cuenta</th>
                                            <th scope="col" WIDTH="200">Movimientos</th>
                                            <th scope="col">Nivel de la cuenta</th>
                                            <th scope="col">Accion</th>

                                        </tr>
                                    </thead>
                                    <tbody id="datoscuerpo">
                                        <tr>
                                            <th scope="row">1</th>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                    </tbody>
                                </table>
                                
                            </form>



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

    <script src="js/ajax.js"></script>

</body>

</html>
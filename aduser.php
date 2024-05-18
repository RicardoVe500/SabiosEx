<!DOCTYPE html>
<html lang="en">
    <?php include ('contenido/head.php');?>

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="./css/bootstrap.min.css">
</head>
<body id="page-top">
     <!-- Page Wrapper -->
                <div id="wrapper">
            <!-- Sidebar -->
            <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
                <?php
                include('contenido/sidebar.php')
                ?>
            </ul>

   
                        <!-- Content Wrapper -->
                        <div id="content-wrapper" class="d-flex flex-column">

                         <!-- Main Content -->
                            <div id="content">

                            <!-- Topbar -->
                            <?php
                             include('contenido/topbar.php')
                            ?>
    
    <nav class="navbar">
        <div class="container-fluid">
            <a href="index.php" class="navbar-brand fw-bold text">Administración de Usuarios</a>
            <form class="d-flex">
                <input type="search" id="search" placeholder="" class="form-control me-2">
                <button type="submit" class="btn btn-warning">Buscar</button>
            </form>
        </div>
    </nav>


    <div class="container my-5">
        <div class="row p-4">
            <div class="col-md-5">
                <div class="card">
                    <div class="card-body">

                    
                        <form id="task-form">
                            <div class="form-group">
                                <input type="text" id="nombre" placeholder="Nombre" class="form-control my-2">
                            </div>

                            <div class="form-group">
                                <input type="text" id="apellidos" placeholder="Apellido" class="form-control my-2">
                            </div>

                            <div class="form-group">
                                <input type="email" id="email" placeholder="email" class="form-control my-2">
                            </div>

                            <div class="form-group">
                                <input type="password" id="clave" placeholder="Contraseña" class="form-control my-2">
                            </div>
                            </div>
                            <button type="submit" class="btn btn-primary text-center w-100">Guardar</button>
                        </form>
                    </div>
                </div>
            </div>
            
            <div class="col-md-7">
                <div class="card my-4" id="task-result">
                    <div class="card-body">
                        <ul id="container"></ul>
                    </div>
                </div>
                
                <table class="table table-bordered table-sm">
                    <thead>
                        <tr>
                            <td class="text-center">Id</td>
                            <td class="text-center">Nombre</td>
                            <td class="text-center">Apellidos</td>
                            <td class="text-center">Email</td>
                        </tr>
                    </thead>
                    <tbody id="task"></tbody>
                </table>
            </div>
        </div>
    </div>
    </div>
    </div>
    
    <!-- Cerrar Sesion Modal-->
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
                <div class="modal-body">Seleccionó "Cerrar Sesión", ¿Esta seguro?.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                    <a class="btn btn-primary" href="login/login.php">Cerrar Sesión</a>
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

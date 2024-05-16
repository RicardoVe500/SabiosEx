<?php

include('../../conexion/conexion.php');


//If para buscar el rol que se deseea eliminar
if (isset($_POST['tipousario'])) {

    $codigotipo = $_POST['tipoUsuarioId'];

    $query = "DELETE FROM tipousuario WHERE tipoUsuarioId = $codigotipo ";
    $result = mysqli_query($conexion, $query);
    
    //Retorno de mensaje de error
    if (!$result) {
        die ("Error al eliminar el rol.".mysqli_error($conexion));
          
      }

}

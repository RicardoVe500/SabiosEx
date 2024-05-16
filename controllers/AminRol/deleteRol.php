<?php

include('../../conexion/conexion.php');



if (isset($_POST['tipousario'])) {

    $codigotipo = $_POST['tipoUsuarioId'];

    $query = "DELETE FROM tipousuario WHERE tipoUsuarioId = $codigotipo ";
    $result = mysqli_query($conexion, $query);
    
    if (!$result) {
        die ("Error en la consulta".mysqli_error($conexion));
          
      }

}

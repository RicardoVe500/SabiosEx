<?php

include('../../conexion/conexion.php');



if (isset($_POST['tipoPartidaId'])) {

    $tipoPartidaId = $_POST['tipoPartidaId'];

    $query = "DELETE FROM tipoPartida WHERE tipoPartidaId = $tipoPartidaId ";
    $result = mysqli_query($conexion, $query);
    
    if (!$result) {
        die ("Error en la consulta".mysqli_error($conexion));
          
      }

}




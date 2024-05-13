<?php

include('../../conexion/conexion.php');



if (isset($_POST['cuentaId'])) {

    $cuentaId = $_POST['cuentaId'];

    $query = "DELETE FROM catalogoCuentas WHERE cuentaId = $cuentaId ";
    $result = mysqli_query($conexion, $query);
    
    if (!$result) {
        die ("Error en la consulta".mysqli_error($conexion));
          
      }

}




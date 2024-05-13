<?php
include('../../conexion/conexion.php');


$query = "SELECT cuentaId ,movimientoId, numeroCuenta,  nivelCuenta,  nombreCuenta FROM catalogoCuentas";
$result = mysqli_query($conexion, $query);


  if (!$result) {
    die ("Error en la consulta".mysqli_error($conexion));
      
  }


  $json = array();

    while ($row = mysqli_fetch_array($result)) {
        $json[] = array(
            "cuentaId"=>$row["cuentaId"],
            "movimientoId"=>$row["movimientoId"],
            "numeroCuenta"=>$row["numeroCuenta"],
            "nivelCuenta"=>$row["nivelCuenta"],
            "nombreCuenta"=>$row["nombreCuenta"],
        );
    }

    $jsonstring = json_encode($json);
    echo $jsonstring;



?>
<?php
include('../../conexion/conexion.php');


if (isset($_GET['id'])) {

  $cuentaId = $_GET['id'];

  $query = "SELECT 
  catalogoCuentas.cuentaId,
  movimientos.movimiento,
  catalogoCuentas.numeroCuenta,
  catalogoCuentas.cuentaDependiente,
  catalogoCuentas.nivelCuenta,
  catalogoCuentas.nombreCuenta
  FROM 
  catalogoCuentas 
  LEFT JOIN 
  movimientos  ON catalogoCuentas.movimientoId = movimientos.movimientoId
  WHERE numeroCuenta LIKE '$cuentaId%';";

  $result = mysqli_query($conexion, $query);

  if (!$result) {
      die("Error en la consulta".mysqli_error($conexion));
      
  }
  
  $json = array();

  while ($row = mysqli_fetch_array($result)) {
      $json[] = array(

            "cuentaId"=>$row["cuentaId"],
            "movimiento"=>$row["movimiento"],
            "cuentaDependiente"=>$row["cuentaDependiente"],
            "numeroCuenta"=>$row["numeroCuenta"],
            "nivelCuenta"=>$row["nivelCuenta"],
            "nombreCuenta"=>$row["nombreCuenta"],
      );
  }
    $jsonstring = json_encode($json);
    echo $jsonstring;

}

?>
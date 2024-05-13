<?php
include('../../conexion/conexion.php');



if (isset($_GET['id'])) {

  $cuentaId = $_GET['id'];

  $query = "SELECT * FROM catalogoCuentas WHERE cuentaId LIKE '$cuentaId%'";

  $result = mysqli_query($conexion, $query);

  if (!$result) {
      die("Error en la consulta".mysqli_error($conexion));
      
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

}

?>
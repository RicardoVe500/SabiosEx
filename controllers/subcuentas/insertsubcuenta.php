<?php
include('../../conexion/conexion.php');


if (isset($_POST['numeroCuenta'])) {
  
// Obtener movimientoId enviado desde JavaScript
  $movimientos = 1;
  
  $nivelcuenta ++;
  $numerocuenta = $_POST["numeroCuenta"];
  $nombrecuenta = $_POST["nombreCuenta"];
  $fechaHoraActual = date("Y-m-d H:i:s"); 

  

  $query = "INSERT INTO catalogoCuentas(movimientoId, n1, n2, n3, n4, n5, n6, n7, n8, numeroCuenta, cuentaDependiente, nivelCuenta, nombreCuenta, usuarioAgrega, fechaAgrega, usuarioModifica, fechaModifica) 
  VALUES ('$movimientos','','','','','','','','','$numerocuenta','','$nivelcuenta','$nombrecuenta','','$fechaHoraActual','','$fechaHoraActual')";

  $result = mysqli_query($conexion, $query);

  if (!$result) {
    echo "Error en la consulta".mysqli_error($conexion);
      
  }
}

?>
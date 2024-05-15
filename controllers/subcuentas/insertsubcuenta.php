<?php
include('../../conexion/conexion.php');


if (isset($_POST['numeroCuenta'])) {
  
// Obtener movimientoId enviado desde JavaScript

  $nivelcuenta =  $_POST["nivelCuenta"] + 1;
  $movimientos = $_POST["movimientos"];
  $numerocuenta = $_POST["numeroCuenta"];
  $nombrecuenta = $_POST["nombreCuenta"];
  $fechaHoraActual = date("Y-m-d H:i:s"); 
  $cuentaDependiente = substr($numerocuenta, 0, -2); ;

   // Obtener el nivel de cuenta más alto de la base de datos
   $queryMaxNivel = "SELECT MAX(nivelCuenta) as maxNivel FROM catalogoCuentas";
   $resultMaxNivel = mysqli_query($conexion, $queryMaxNivel);

   if ($resultMaxNivel) {
       $row = mysqli_fetch_assoc($resultMaxNivel);
       $maxNivel = $row['maxNivel'];

       // Establecer el campo movimientos
       $movimientos = ($nivelcuenta > $maxNivel) ? 1 : 2;

       // Insertar los datos en la base de datos
       $queryInsert = "INSERT INTO catalogoCuentas(movimientoId, n1, n2, n3, n4, n5, n6, n7, n8, numeroCuenta, cuentaDependiente, nivelCuenta, nombreCuenta, usuarioAgrega, fechaAgrega, usuarioModifica, fechaModifica) 
                       VALUES ('$movimientos','','','','','','','','','$numerocuenta','$cuentaDependiente','$nivelcuenta','$nombrecuenta','','$fechaHoraActual','','$fechaHoraActual')";

       $resultInsert = mysqli_query($conexion, $queryInsert);

       if ($resultInsert) {
        // Actualizar el campo movimientos para todos los registros en la base de datos
        // Si el nuevo nivel es el más alto, poner todos los niveles inferiores a 2 y el nuevo nivel a 1
        // Si el nuevo nivel no es el más alto, mantener el nivel más alto en 1 y todos los demás en 2
        $queryUpdate = "UPDATE catalogoCuentas
                        SET movimientoId = CASE
                            WHEN nivelCuenta = (SELECT MAX(nivelCuenta) FROM catalogoCuentas) THEN 1
                            ELSE 2
                        END";
        $resultUpdate = mysqli_query($conexion, $queryUpdate);

        if (!$resultUpdate) {
            echo "Error al actualizar los movimientos: " . mysqli_error($conexion);
        }
   } else {
       echo "Error al obtener el nivel de cuenta más alto: " . mysqli_error($conexion);
   }
  }
}
?>
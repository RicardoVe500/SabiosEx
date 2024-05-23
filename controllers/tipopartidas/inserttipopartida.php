<?php
include('../../conexion/conexion.php');


if (isset($_POST['nombrePartida'])) {
  
// Obtener movimientoId enviado desde JavaScript

  $nombrePartida = $_POST["nombrePartida"];
  $descripcion = $_POST["descripcion"];

  $query = "INSERT INTO tipoPartida(nombrePartida, descripcion) 
  VALUES ('$nombrePartida','$descripcion')";

  $result = mysqli_query($conexion, $query);

  if (!$result) {
    echo "Error en la consulta".mysqli_error($conexion);
      
  }
}

?>
<?php
include('../../conexion/conexion.php');


$query = "SELECT tipoPartidaId, nombrePartida, descripcion FROM tipoPartida";
$result = mysqli_query($conexion, $query);

  if (!$result) {
    die ("Error en la consulta".mysqli_error($conexion));
      
  }

  $json = array();

  while ($row = mysqli_fetch_array($result)) {
      $json[] = array(

            "tipoPartidaId"=>$row["tipoPartidaId"],
            "nombrePartida"=>$row["nombrePartida"],
            "descripcion"=>$row["descripcion"],
            
      );
  }
    $jsonstring = json_encode($json);
    echo $jsonstring;


?>


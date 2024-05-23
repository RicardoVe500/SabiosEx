<?php
include('../../conexion/conexion.php');


if (isset($_POST['tipoPartidaId'])) {
    
    $tipoPartidaId = $_POST['tipoPartidaId'];

    $query = "SELECT * FROM tipoPartida WHERE tipoPartidaId = {$tipoPartidaId} ";
    $result = mysqli_query($conexion, $query);

    if (!$result) {
        die("Error en la consulta".mysqli_error($conexion));
        
    }
    
    $json = array();

    while ($row = mysqli_fetch_array($result)) {
        $json[] = array(
            "tipoPartidaId"=>$row["tipoPartidaId"],
            "nombrePartida"=>$row["nombrePartida"],
            "descripcion"=>$row["descripcion"],
        );
    }
    $jsonstring = json_encode($json[0]);
    echo $jsonstring;
}
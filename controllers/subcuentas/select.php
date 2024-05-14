<?php
include('../../conexion/conexion.php');


        $query = "SELECT * FROM movimientos";

    $result = mysqli_query($conexion, $query);

    if (!$result) {
        die("Error en la consulta".mysqli_error($conexion));
        
    }
    
    $json = array();

    while ($row = mysqli_fetch_array($result)) {
        $json[] = array(

            "movimientoId"=>$row["movimientoId"],
            "movimiento"=>$row["movimiento"],

        );
    }
    $jsonstring = json_encode($json);
    echo $jsonstring;

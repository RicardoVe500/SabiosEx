<?php
include('../../conexion/conexion.php');


$search = $_POST["search"];

if (!empty($search)) {
    $query = "SELECT * FROM tipousuario WHERE codigotipo LIKE '$search%' ";
    $result = mysqli_query($conexion, $query);

    if (!$result) {
        die("Error en la consulta".mysqli_error($conexion));
        
    }
    
    $json = array();

    while ($row = mysqli_fetch_array($result)) {
        $json[] = array(
            "tipoUusarioId"=>$row["tipoUusarioId"],
            "codigotipo"=>$row["codigotipo"],
            "nombreTipo"=>$row["nombreTipo"],
            "n1"=>$row["n1"],
            "n2"=>$row["n2"],
            "n3"=>$row["n3"],
            "n4"=>$row["n4"],
            "n5"=>$row["n5"],
            "n6"=>$row["n6"],
            "n7"=>$row["n7"],
            "n8"=>$row["n8"],
            "usuarioAgrega"=>$row["usuarioAgrega"],
            "fechaAgrega"=>$row["fechaAgrega"],
            "usuarioModifica"=>$row["usuarioModifica"],
            "fechaModifica"=>$row["fechaModifica"],  
        );
    }
    $jsonstring = json_encode($json);
    echo $jsonstring;
}

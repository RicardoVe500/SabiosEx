<?php
include('../../conexion/conexion.php');


$search = $_POST["search"];

// If para identificar el rol segun los diferentes criterios de busqueda
if (!empty($search)) { 
    $query = "SELECT * FROM tipousuario WHERE codigotipo LIKE '$search%' ";
    $result = mysqli_query($conexion, $query);

    // Retorna error si no se realizo la consulta de forma correcta
    if (!$result) {
        die("No se encontro ningun rol con esos criteros de busqueda.".mysqli_error($conexion));
        
    }
    
    $json = array();

    //Criterios de busqueda 
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

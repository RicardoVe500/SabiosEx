<?php

include ('backend/conexion.php');

$search = $_POST["search"];

if(!empty($search)) {
    $query = "SELECT * FROM usuarios WHERE nombre LIKE '$search%'";
    $result = mysqli_query($bd, $query);

    if(!$result) {
        die("Hubo un error en la consola". mysqli_error($bd));
    }

    $json = array();

    while($row = mysqli_fetch_array($result)){
        $json[] = array(
            "usuarioId"=>$row["usuarioId"],
            "tipoUsuarioId"=>$row["tipoUsuarioId"],
            "nombre"=>$row["nombre"],
            "apellidos"=>$row["apellidos"],
            "email"=>$row["email"],
            "clave"=>$row["clave"],
            "fechaAgrega"=>$row["fechaAgrega"]
        );
    }
    $jsonstring = json_encode($json);
    echo $jsonstring;
}
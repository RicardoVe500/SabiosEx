<?php
include('../../conexion/conexion.php');


if (isset($_POST["tipoPartidaId"])) {
   
        $tipoPartidaId = $_POST["tipoPartidaId"];
        $nombrePartida = $_POST["nombrePartida"];
        $descripcion = $_POST["descripcion"];

        $query = "UPDATE tipoPartida SET nombrePartida = '$nombrePartida', descripcion = '$descripcion' 
        WHERE tipoPartidaId = $tipoPartidaId ";

        $result = mysqli_query($conexion, $query);
      
        if (!$result) {
          echo "Error en la consulta".mysqli_error($conexion);
            
        }
        
      }


        
   


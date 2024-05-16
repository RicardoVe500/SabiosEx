<?php
include('../../conexion/conexion.php');

//If para buscar el rol que se desea modificar
if (isset($_POST["tipousuario"])) {
   
        $tipousuario = $_POST["tipousuario"];
        $codigotipo = $_POST["codigotipo"];
        $nombreTipo = $_POST["nombreTipo"];
        $fechaModifica = date("Y-m-d H:i:s"); 

        $query = "UPDATE tipousuario SET codigotipo = $codigotipo, nombreTipo = '$nombreTipo', fechaModifica = '$fechaModifica' 
        WHERE codigotipo = $codigotipo";

        $result = mysqli_query($conexion, $query);
      
        //Mensaje de error
        if (!$result) {
          echo "Error al modificar el rol.".mysqli_error($conexion);
            
        }
        
      }

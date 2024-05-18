<?php

//Crear conexion a la BD
require_once '../backend/conexion.php';


if(isset($_POST)){

    //Recoger los valores del formulario de registro
    $nombre = isset($_POST['nombre']) ? mysqli_real_escape_string($bd, $_POST['nombre']) : false;
    $apellidos = isset($_POST['apellidos']) ? mysqli_real_escape_string($bd, $_POST['apellidos']) : false;
    $email = isset($_POST['email']) ? mysqli_real_escape_string($bd, $_POST['email']) : false;
    $clave = isset($_POST['clave']) ? mysqli_real_escape_string($bd, $_POST['clave']) : false;
    $fecha = date("Y-m-d H:i:s");

    $clave_segura = password_hash($clave, PASSWORD_BCRYPT, ['cost'=>4]);

    if($email == ""){
        echo "<script>alert('Debe ingresar su correo'); history.go(-1);</script>";
    } else if ($clave == ""){
        echo "<script>alert('Debe ingresar su clave'); history.go(-1);</script>";
    } else if ($nombre == ""){
        echo "<script>alert('Debe ingresar su nombre'); history.go(-1);</script>";
    } else if ($apellidos == ""){
        echo "<script>alert('Debe ingresar su apellido'); history.go(-1);</script>";

    }else{
        $ins = mysqli_query($bd,
        "INSERT INTO usuarios (nombre, apellidos, email, clave, fechaAgrega)
         VALUES ('$nombre','$apellidos','$email','$clave_segura','$fecha')
         ") or die ("ERROR INS: ".mysqli_error($bd));
        }

/*     if($ins){
        echo "<script>alert('Insert con exito'); history.go(-1);</script>";
    } else {
        echo "<script>alert('Algo fallo'); history.go(-1);</script>";
    } */

}

header('Location: register/register.html');


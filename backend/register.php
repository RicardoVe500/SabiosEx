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

    $query = "SELECT * FROM usuarios WHERE email = '$email'";//Mostrar al usuario que ese correo ya esta registrado
    $result = mysqli_query($bd, $query);
    
    if (mysqli_num_rows($result) > 0) {
        // El correo ya está registrado
        echo "El correo electrónico ya está registrado.";
    } else {
        // Insertar los datos en la base de datos
        $query = "INSERT INTO usuarios (nombre, apellidos, email, clave) VALUES ('$nombre', '$apellidos', '$email', '$clave')";
        if (mysqli_query($bd, $query)) {
            echo "Registro exitoso.";
            
        } else {
            echo "Error al registrar los datos: ". mysqli_error($bd);
        }
    }
    
    // Cerrar la conexión
    mysqli_close($bd);

}

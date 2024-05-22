<?php

// Crear conexión a la BD
require_once '../backend/conexion.php';

if(isset($_POST)){
    // Recoger los valores del formulario de registro
    $nombre = isset($_POST['nombre']) ? mysqli_real_escape_string($bd, $_POST['nombre']) : false;
    $apellidos = isset($_POST['apellidos']) ? mysqli_real_escape_string($bd, $_POST['apellidos']) : false;
    $email = isset($_POST['email']) ? mysqli_real_escape_string($bd, $_POST['email']) : false;
    $clave = isset($_POST['clave']) ? mysqli_real_escape_string($bd, $_POST['clave']) : false;
    $fecha = date("Y-m-d H:i:s");

    // Validar que el nombre y los apellidos no contengan números
    if (preg_match('/[0-9]/', $nombre)) {
        echo json_encode(['status' => 'error', 'message' => 'El nombre no debe contener números']);
        exit;
    }

    if (preg_match('/[0-9]/', $apellidos)) {
        echo json_encode(['status' => 'error', 'message' => 'Los apellidos no deben contener números']);
        exit;
    }

    $clave_segura = password_hash($clave, PASSWORD_BCRYPT, ['cost' => 4]);

    // Verificar si el correo electrónico ya está registrado
    $query = "SELECT * FROM usuarios WHERE email = '$email'";
    $result = mysqli_query($bd, $query);
    
    if (mysqli_num_rows($result) > 0) {
        // El correo ya está registrado
        echo json_encode(['status' => 'error', 'message' => 'El correo electrónico ya está registrado.']);
    } else {
        // Insertar los datos en la base de datos
        $query = "INSERT INTO usuarios (nombre, apellidos, email, clave) VALUES ('$nombre', '$apellidos', '$email', '$clave_segura')";
        if (mysqli_query($bd, $query)) {
            echo json_encode(['status' => 'success', 'message' => 'Registro exitoso.']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Error al registrar los datos: ' . mysqli_error($bd)]);
        }
    }
    
    // Cerrar la conexión
    mysqli_close($bd);
}
?>

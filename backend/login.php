<?php

session_start();
require_once '../backend/conexion.php';

// Verificar si se enviaron datos por POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Recoger datos del formulario
    $email = trim($_POST['email']);
    $clave = $_POST['clave'];

    // Consultar para comprobar las credenciales del usuario
    $sql = "SELECT * FROM usuarios WHERE email = '$email'";
    $login = mysqli_query($bd, $sql);

    if ($login && mysqli_num_rows($login) == 1) {
        $email = mysqli_fetch_assoc($login);

        // Comprobar la contraseña
        if (password_verify($clave, $email['clave'])) {
			
            // Utilizar una sesión para guardar los datos del usuario logueado
            $_SESSION['email'] = $email && $_SESSION['clave'] = $clave;
            echo json_encode(['status' => 'success', 'message' => 'Login exitoso']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'La contraseña es incorrecta']);
        }
    } else {
        echo json_encode(['status' => 'error', 'message' => 'El usuario no existe']);
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'Solicitud no válida']);
}

<?php

//Conexion a la base de datos
require_once '../backend/conexion.php';

if (isset($_POST)){

    //Recoger datos del formulario
    $email = trim($_POST['email']);
    $clave = $_POST['clave'];

    if($email == ""){
        echo "<script>alert('Debe ingresar su correo'); history.go(-1);</script>";
    } else if ($clave == ""){
        echo "<script>alert('Debe ingresar su clave'); history.go(-1);</script>";
    }else{

    //Consultar para comprobar las credenciales del usuario
    $sql = "SELECT * FROM usuarios WHERE = email = '$email'";
    $login = mysqli_query($bd, $sql);

    if($login && mysqli_num_rows($login) == 1){
		$email = mysqli_fetch_assoc($login);
		
		// Comprobar la contraseña
		$verify = password_verify($clave, $email['clave']);
		
		if($verify){
			// Utilizar una sesión para guardar los datos del usuario logueado
			$_SESSION['email'] = $email;
			
		}else{
			// Si algo falla enviar una sesión con el fallo
			$_SESSION['error_login'] = "Login incorrecto!!";
		}
	}else{
		// mensaje de error
		$_SESSION['error_login'] = "Login incorrecto!!";
	}

    }

}
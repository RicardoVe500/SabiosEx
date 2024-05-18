<?php
// Conexión
$servidor = 'localhost';
$usuario = 'root';
$password = '';
$basededatos = 'tesis';
$bd = mysqli_connect($servidor, $usuario, $password, $basededatos);

mysqli_query($bd, "SET NAMES 'utf8'");

// Iniciar la sesión
/* if(!isset($_SESSION)){
	session_start();
} */
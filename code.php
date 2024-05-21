<?php

include('conexion/conexion.php');

require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

if(isset($_POST['save_excel_data'])){
    $filename = $_FILES['import_file']['name'];
    $fiel_ext = pathinfo($filename, PATHINFO_EXTENSION);
    $allow_ext = ['xls', 'csv', 'xlsx'];

    if (in_array($fiel_ext, $allow_ext)) {

        $inputFileName = $_FILES['import_file']['tmp_name'];
        $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($inputFileName);
        $data = $spreadsheet->getActiveSheet()->toArray();

        foreach ($data as $row) {
            $movimientos = $row['0'];
            $numerocuenta = $row['1'];
            $cuentadependiente = $row['2'];
            $nivelcuenta = $row['3'];
            $nombrecuenta = $row['4'];
            $fecha = $row['5'];


            $query = "INSERT INTO catalogoCuentas(movimientoId, numerocuenta, cuentadependiente, nivelcuenta, nombrecuenta) 
            VALUES ('$movimientos','$numerocuenta','$cuentadependiente','$nivelcuenta','$nombrecuenta')";
          
            $result = mysqli_query($conexion, $query);

            if (!$result) {
                echo "Error en la consulta".mysqli_error($conexion);
                  
              }
        }
        header('location: catalogo2.php');
        
    }else{
        $_SESSION['message'] = "Archivo Invalido";
        header('location: catalogo2.php');
        exit(0);
    }
}
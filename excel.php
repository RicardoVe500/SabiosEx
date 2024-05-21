<?php
include('../../conexion/conexion.php');
require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Reader\Xlsx;

if ($_FILES['file']['name']) {
    $file_name = $_FILES['file']['tmp_name'];

    $reader = new Xlsx();
    $spreadsheet = $reader->load($file_name);
    $sheetData = $spreadsheet->getActiveSheet()->toArray();

    $bulkInsertQuery = "INSERT INTO catalogoCuentas(movimientoId, numeroCuenta, nivelCuenta, nombreCuenta, fechaAgrega, fechaModifica) VALUES ";
    $insertData = [];
    foreach ($sheetData as $row) {
        $movimientos = $conn->real_escape_string($row[0]);
        $numerocuenta = $conn->real_escape_string($row[1]);
        $nivelcuenta = $conn->real_escape_string($row[2]);
        $nombrecuenta = $conn->real_escape_string($row[3]);
        $fechaHoraActual = date('Y-m-d H:i:s');
        $insertData[] = "('$movimientos', '$numerocuenta', '$nivelcuenta', '$nombrecuenta', '$fechaHoraActual', '$fechaHoraActual')";
    }
    
    if (!empty($insertData)) {
        $bulkInsertQuery .= implode(', ', $insertData);
        $conn->query($bulkInsertQuery);
    }
    echo "Datos insertados correctamente";
} else {
    echo "No file selected";
}
?>

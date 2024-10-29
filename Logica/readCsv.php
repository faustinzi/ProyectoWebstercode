<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$filePath = isset($_GET['filePath']) ? $_GET['filePath'] : null;

if (!file_exists($filePath)) {
    echo json_encode(['error' => 'El archivo no existe']);
    exit;
}

$data = [];
if (($handle = fopen($filePath, 'r')) !== false) {

    while (($row = fgetcsv($handle, 1000, ';')) !== false) {
        $data[] = $row;
    }
    
    fclose($handle);
} else {
    echo json_encode(['error' => 'No se pudo abrir el archivo']);
    exit;
}

header('Content-Type: application/json');
echo json_encode($data);
?>


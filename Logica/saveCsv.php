<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$data = json_decode(file_get_contents('php://input'), true);

if ($data === null) {
    echo json_encode(['success' => false, 'error' => 'Datos inválidos']);
    exit;
}

$filePath = isset($_GET['filePath']) ? $_GET['filePath'] : null;

if (($handle = fopen($filePath, 'w')) !== false) {
    foreach ($data as $row) {
        fputcsv($handle, $row, ';');
    }
    fclose($handle);
    echo json_encode(['success' => true]);
} else {
    echo json_encode(['success' => false, 'error' => 'No se pudo abrir el archivo para escribir']);
}
?>

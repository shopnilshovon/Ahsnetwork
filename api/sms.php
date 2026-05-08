<?php
include '../lamix.php';

header('Content-Type: application/json');

$number = $_GET['number'] ?? '';

$response = [
    'number' => $number,
    'sms' => fetchSMS($number)
];

echo json_encode($response);
?>

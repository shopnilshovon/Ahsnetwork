<?php
header('Content-Type: application/json');

$country = $_GET['country'] ?? 'Unknown';

$numbers = [
    '244915530629',
    '244915542588',
    '255652896911',
    '255653078398',
    '60123456789'
];

shuffle($numbers);

$response = [
    'country' => $country,
    'number' => $numbers[0],
    'status' => 'allocated'
];

echo json_encode($response);
?>

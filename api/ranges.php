<?php
header('Content-Type: application/json');

$ranges = [
    ['country'=>'Angola','qty'=>100],
    ['country'=>'Tanzania','qty'=>41],
    ['country'=>'Libya','qty'=>30],
    ['country'=>'Malaysia','qty'=>30],
    ['country'=>'Myanmar','qty'=>50]
];

echo json_encode($ranges);
?>

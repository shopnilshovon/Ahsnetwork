<?php
session_start();

if(!isset($_SESSION['user'])){
    header('Location:index.php');
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>AHS Network - Allocations</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="topbar">
    <h2>AHS Network</h2>
    <a href="panel.php" class="btn">Back</a>
</div>

<div class="card">

<h3>Available Ranges</h3>

<div id="ranges"></div>

</div>

<script>

async function loadRanges(){

    let res = await fetch('api/ranges.php');
    let data = await res.json();

    let html = '';

    data.forEach(item => {

        html += `
        <div class="single-number" onclick="allocate('${item.country}')">
            <strong>${item.country}</strong>
            <br>
            Available: ${item.qty}
        </div>
        `;
    });

    document.getElementById('ranges').innerHTML = html;
}

async function allocate(country){

    let res = await fetch('api/allocate.php?country='+country);
    let data = await res.json();

    alert(
        'Country: '+data.country+'

'+
        'Allocated Number: '+data.number
    );
}

loadRanges();

setInterval(loadRanges,10000);

</script>

</body>
</html>
```php
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

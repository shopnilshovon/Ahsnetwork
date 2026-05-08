<?php
session_start();

if(!isset($_SESSION['user'])){
    header('Location:index.php');
    exit;
}

include 'lamix.php';

$remove = $_GET['remove'] ?? 0;

$numbers = fetchNumbers();
?>

<!DOCTYPE html>
<html>
<head>
    <title>AHS Network</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="topbar">

<h2>AHS Network</h2>

<div>
    <a href="?remove=0" class="btn">Original</a>
    <a href="?remove=2" class="btn">-2 Digits</a>
    <a href="?remove=3" class="btn">-3 Digits</a>
    <a href="allocations.php" class="btn">Add Number</a>
    <a href="logout.php" class="btn red">Logout</a>
</div>

</div>

<div class="card">

<h3>Available Numbers</h3>

<button onclick="copyAll()" class="copy-btn">Copy All</button>
<button onclick="copyFive()" class="copy-btn">Copy 5</button>

<br><br>

<?php
$count = 1;

foreach($numbers as $num){

    echo '<div class="single-number" onclick="loadSMS(\''.$num.'\')">';
    echo '<span>'.$count.'. </span>';
    echo '<span class="num">'.removeCountryCode($num,$remove).'</span>';
    echo '</div>';

    $count++;
}
?>

</div>

<div class="card">

<h3>Live SMS</h3>

<div id="sms-area">
Click Any Number To Load SMS
</div>

</div>

<script>

function copyAll(){

    let nums = [];

    document.querySelectorAll('.num').forEach(el => {
        nums.push(el.innerText);
    });

    navigator.clipboard.writeText(nums.join("\n"));

    alert('Copied All Numbers');
}

function copyFive(){

    let nums = [];

    document.querySelectorAll('.num').forEach((el,index) => {

        if(index < 5){
            nums.push(el.innerText);
        }
    });

    navigator.clipboard.writeText(nums.join("\n"));

    alert('Copied 5 Numbers');
}

async function loadSMS(number){

    let res = await fetch('api/sms.php?number='+number);

    let data = await res.json();

    document.getElementById('sms-area').innerHTML = `
        <div class="sms-box">
            <strong>${data.number}</strong>
            <br><br>
            ${data.sms}
        </div>
    `;
}

setInterval(() => {
    location.reload();
},10000);

</script>

</body>
</html>

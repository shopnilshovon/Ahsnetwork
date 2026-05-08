<?php
session_start();

if(isset($_SESSION['user'])){
    header('Location: panel.php');
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>AHS Network</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="login-box">

<h1>AHS Network</h1>
<p>Realtime SMS Dashboard</p>

<form method="POST" action="auth.php">

<input type="text" name="username" placeholder="Username" required>

<input type="password" name="password" placeholder="Password" required>

<button type="submit">Login</button>

</form>

</div>

</body>
</html>

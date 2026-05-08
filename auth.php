<?php
session_start();
include 'config.php';

$username = $_POST['username'] ?? '';
$password = $_POST['password'] ?? '';

if($username == AGENT_USERNAME && $password == AGENT_PASSWORD){

    $_SESSION['user'] = $username;

    header('Location: panel.php');
    exit;

}else{

    echo 'Login Failed';
}
?>

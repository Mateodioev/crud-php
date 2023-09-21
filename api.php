<?php

if ($_SERVER["REQUEST_METHOD"] !== 'POST') {
    redirect("index.php");
}

session_start();
if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
    redirect("index.php");
}

$action = $_POST['action'] ?? 'invalid';

switch ($action) {
    case 'login':
        echo 'Buscando';
        break;
    case 'signup':
        echo 'Registrando';
        break;
    default:
        redirect('404.php');
        break;
}

function redirect(string $url): never {
    header("location: $url");
    exit;
}

function encodePassword(string $password): string {
    return password_hash($password, PASSWORD_DEFAULT);
}

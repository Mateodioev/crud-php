<?php

require __DIR__.'/src/db.php';

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
        $user = $_POST['username'];
        $pass = $_POST['password'];
        $result = Db::getInstance()->query('SELECT * FROM usuarios WHERE correo = ? OR username = ?', [$user, $user])->fetch(PDO::FETCH_ASSOC);

        $password = $result['password'] ?? null;
        $exists = $password !== null && matchPasswords($pass, $password);

        if ($exists) {
            $_SESSION['loggedin'] = true;
            $_SESSION['username'] = $result['username'];
            redirect('index.php');
        } else {
            die('Usuario o contraseña incorrectos');
        }
    case 'signup':
        $user = $_POST['username'];
        $pass = $_POST['password'];
        $correo = $_POST['email'];

        try {
            Db::getInstance()->exec('INSERT INTO usuarios (username, `password`, correo) VALUES (?, ?, ?)', [
                $user, encodePassword($pass), $correo
            ]);
            $_SESSION['loggedin'] = true;
            $_SESSION['username'] = $user;
            redirect('index.php');
        } catch (\Throwable $th) {
            die('Error al crear el usuario');
        }
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

function matchPasswords(string $password, string $hash): bool {
    return password_verify($password, $hash);
}

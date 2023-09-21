<?php

session_start();

$isLogged = $_SESSION["loggedin"] ?? false;

if ($isLogged) {
    header("location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="static/css/main.css">
    <link rel="stylesheet" href="static/css/login.css">
    <title>Registrate</title>
</head>

<body>
    <div class="login-card">
        <h2>Crea tu cuenta</h2>

        <form action="api.php" method="POST" class="login-form">
            <input type="hidden" name="action" value="signup">
            <input id="username" name="username" type="text" placeholder="Usuario" required autocomplete="username">
            <input id="email" name="email" type="text" placeholder="Correo" required autocomplete="email">
            <input id="password" name="password" type="password" placeholder="Contraseña" required autocomplete="new-password">
            <input type="submit" value="Registrate" id="form-submit">
            <p>Ya tienes una cuenta? <a href="index.php">Inicia session</a></p>
        </form>
    </div>
</body>

</html>
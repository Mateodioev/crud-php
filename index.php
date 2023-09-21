<?php

session_start();

$isLogged = $_SESSION["loggedin"] ?? false;
$title = $isLogged ? "Bienvenido " . ($_SESSION['username'] ?? '') : "Inicia session";

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="static/css/main.css">
    <?php if ($isLogged === false): ?> <link rel="stylesheet" href="static/css/login.css"><?php endif; ?>
    <title><?php echo $title; ?></title>
</head>

<body>

    <?php if ($isLogged === false): ?>
    <div class="login-card">
        <h2>Inicia session</h2>
        <h3>Ingresa tu contraseña</h3>

        <form action="api.php" method="POST" class="login-form">
            <input type="hidden" name="action" value="login">
            <input id="username" name="username" type="text" placeholder="Usuario" required autocomplete="username">
            <input id="password" name="password" type="password" placeholder="Contraseña" required>
            <a href="resetpassword.php">Olvidaste tu contraseña?</a>
            <input type="submit" value="Ingresar" id="form-submit">
            <p>No tienes una cuenta? <a href="signup.php">Registrate</a></p>
        </form>
    </div>
    <?php endif; ?>
</body>
</html>

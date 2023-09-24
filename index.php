<?php
require __DIR__ . '/src/functions.php';

session_start();

if (isLogged()) {
    redirect('main');
}

$error = '';

if (isMethod('POST') && ($_POST['action'] ?? '') === 'login') {
    $user = $_POST['username'];
    $pass = $_POST['password'];
    $result = database()->query('SELECT * FROM usuarios WHERE correo = ? OR username = ?', [$user, $user])->fetch(PDO::FETCH_ASSOC);

    $password = $result['password'] ?? null;
    $exists = $password !== null && matchPasswords($pass, $password);

    if ($exists) {
        $_SESSION['loggedin'] = true;
        $_SESSION['username'] = $result['username'];
        redirect('main');
    } else {
        $error = 'Usuario o contraseña incorrectos';
    }
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
    <title>Inicia session</title>
</head>

<body>
    <div class="login-card">
        <h2>Inicia session</h2>
        <h3>Ingresa tu contraseña</h3>

        <form action="index" method="POST" class="login-form">
            <input type="hidden" name="action" value="login">
            <input id="username" name="username" type="text" placeholder="Usuario" required autocomplete="username">
            <input id="password" name="password" type="password" placeholder="Contraseña" required>
            <a href="resetpassword.php">Olvidaste tu contraseña?</a>
            <?php if (empty($error) === false): ?>
                <div class="modal-error"><?php echo $error; ?></div>
            <?php endif; ?>
            <input type="submit" value="Ingresar" id="form-submit">
            <p>No tienes una cuenta? <a href="signup">Registrate</a></p>
        </form>
    </div>
</body>
</html>

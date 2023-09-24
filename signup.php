<?php
require __DIR__ . '/src/functions.php';
session_start();

if (isLogged()) {
    header("location: index");
    exit;
}

$error = '';

if (isMethod('POST') && ($_POST['action'] ?? '') === 'signup') {
    $user = $_POST['username'] ?? '';
    $pass = $_POST['password'] ?? '';
    $correo = $_POST['email'] ?? '';

    try {
        database()->exec('INSERT INTO usuarios (username, `password`, correo) VALUES (?, ?, ?)', [
            $user, encodePassword($pass), $correo
        ]);

        setLogged($user);
        redirect('index');
    } catch (\Throwable $e) {
        $error = 'Error al crear el usuario';
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
    <title>Registrate</title>
</head>

<body>
    <div class="login-card">
        <h2>Crea tu cuenta</h2>

        <form action="signup" method="POST" class="login-form">
            <input type="hidden" name="action" value="signup">
            <input id="username" name="username" type="text" placeholder="Usuario" required autocomplete="username">
            <input id="email" name="email" type="text" placeholder="Correo" required autocomplete="email">
            <input id="password" name="password" type="password" placeholder="Contraseña" required autocomplete="new-password">
            <?php if (empty($error) === false): ?>
                <div class="modal-error"><?php echo $error; ?></div>
            <?php endif; ?>
            <input type="submit" value="Registrate" id="form-submit">
            <p>Ya tienes una cuenta? <a href="index">Inicia session</a></p>
        </form>
    </div>
</body>

</html>
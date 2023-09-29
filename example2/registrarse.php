<?php

session_start();

require __DIR__.'/src/functions.php';

if (isLogged()) {
    redirect('principal');
}

if (isMethod('POST')) {
    $dni = $_POST['dni'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    try {
        $result = database()->fetch('INSERT INTO usuarios VALUES (?, ?, ?)', [$dni, $email, encodePassword($password)]);
        setLogged($dni);
        redirect('principal');
    } catch (\PDOException $e) {
        $errorMsg = 'El usuario ya existe';
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenido</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <link rel="stylesheet" href="static/css/main.css">
    <link rel="stylesheet" href="static/css/login.css">
</head>
<body>
    <div class="login-card">
        <h2>Registrate</h2>

        <form method="POST" class="login-form">
            <input id="dni" name="dni" type="text" placeholder="Dni" maxlength="7" required autocomplete="on">
            <input id="email" name="email" type="text" placeholder="Email" required autocomplete="email">
            <input id="password" name="password" type="password" placeholder="Contraseña" required>
            <?php if (isset($errorMsg)): ?> <!-- Solo mostrar el mensaje de error si existe -->
                <div class="modal-error"><?php echo $errorMsg; ?></div>
            <?php endif; ?>
            <input type="submit" value="Registrate" id="form-submit">
            <p>Ya tienes una cuenta? <a href="index">Inicia sesión</a></p>
        </form>
    </div>
</body>
</html>
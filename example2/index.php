<?php

session_start();

require __DIR__.'/src/functions.php';

if (isLogged()) { // Redireccionar si ya esta logueado
    redirect('principal');
}

if (isMethod('POST')) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Seleccionar el usuario de la db
    $result = database()->fetch('SELECT * FROM usuarios WHERE email = ?', [$email]);
    
    $hashedPassword = $result['password'] ?? null;
    $exists         = $hashedPassword !== null && matchPasswords($password, $hashedPassword);

    if ($exists === false) {
        $errorMsg = 'Usuario o contraseña inválidos';
    } else { // Redirigir a la pagina principal si los datos son correctos
        setLogged($result['dni']);
        redirect('principal');
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
        <h2>Inicia session</h2>
        <h3>Ingresa tu contraseña</h3>

        <form method="POST" class="login-form">
            <input id="email" name="email" type="text" placeholder="Email" required autocomplete="email">
            <input id="password" name="password" type="password" placeholder="Contraseña" required>
            <?php if (isset($errorMsg)): ?> <!-- Solo mostrar el mensaje de error si existe -->
                <div class="modal-error"><?php echo $errorMsg; ?></div>
            <?php endif; ?>
            <input type="submit" value="Ingresar" id="form-submit">
            <p>No tienes una cuenta? <a href="registrarse">Registrate</a></p>
        </form>
    </div>
</body>
</html>
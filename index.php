<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="static/css/login.css">
    <title>Inicia session</title>
</head>

<body>
    <div class="login-card" aria-hidden="true">
        <h2>Inicia session</h2>
        <h3>Ingresa tu contraseña</h3>

        <form action="login.php" method="POST" class="login-form">
            <input id="username" name="username" type="text" placeholder="Usuario" required autocomplete="username">
            <input id="password" name="password" type="password" placeholder="Contraseña" required>
            <a href="#">Olvidaste tu contraseña?</a>
            <input type="submit" value="Ingresar" id="form-submit">
        </form>
    </div>
</body>

</html>
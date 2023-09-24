<?php
require __DIR__ . '/src/functions.php';
session_start();

if (!isLogged()) {
    redirect('index');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="static/css/main.css">
    <link rel="stylesheet" href="static/css/juegos.css">
    <title>Bienvenido a gamesWorkShop</title>
</head>
<body>
    <div class="container">
        <div class="search-box">
            <a href="#"><h1>GamesWorkShop</h1></a>
            <form id="search-form">
                <input type="text" id="search-input" placeholder="Buscar juegos ...">
                <button class="search-btn" type="submit">Buscar</button>
            </form>
        </div>

        <div id="result"></div>

    </div>

    <!-- <script src="index.js"></script> -->
</body>
</html>
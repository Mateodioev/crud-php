<?php
require __DIR__ . '/src/functions.php';
session_start();

if (!isLogged()) {
    redirect('index');
}

if (isMethod('POST') && isset($_FILES['gameImage'])) {
    $query     = 'INSERT INTO `juegos` (`nombre`, `descripcion`, `desarrollador`, `categoria`, `lanzamiento`, `precio`, `existencias`, `calificacion`, `imagen`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)';
    $archivo   = $_FILES['gameImage'];
    $imagePath = getUploadPathFile($archivo['name']);

    if ( move_uploaded_file($archivo['tmp_name'], $imagePath) ) {
        try {
            database()->query($query, [
                $_POST['gameName'],
                $_POST['gameDescription'],
                $_POST['gameDev'],
                $_POST['gameCategory'],
                $_POST['gameDate'],
                $_POST['gamePrice'],
                $_POST['gameStock'],
                round($_POST['gameRating'], 2),
                $imagePath
            ]);
            redirect('addGames');
        } catch (Exception $e) {
            $error = 'Error al agregar el juego';
        }
    } else {
        $error = ' Error al subir la imagen';
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agrega mas videojuegos</title>
    <link rel="stylesheet" href="static/css/main.css">
    <link rel="stylesheet" href="static/css/login.css">
    <style>
        .new-games {
            width: 50%;
        }
        @media (width <= 700px){ /** Si el ancho es menor a 700px agrandar el formulario */
            .new-games {
                width: 80%;
            }
        }
        
        #gameImage {
            text-align: center;
            color: #fff;
        }
    </style>
</head>
<body>
    <div class="new-games login-card">
        <h2>Agrega mas videojuegos</h2>
        <h3>Ingresa los datos del videojuego</h3>

        <form enctype="multipart/form-data" action="addGames" method="POST" class="login-form">
            <!-- Nombre del juego -->
            <label for="gameName">Nombre del videojuego</label>
            <input id="gameName" name="gameName" type="text" placeholder="Nombre del juego" required maxlength="200">
            <!-- Descripcion del juego -->
            <label for="gameDescription">Descripcion del videojuego</label>
            <textarea name="gameDescription" id="gameDescription" rows="2" maxlength="255">None</textarea>
            <!-- Desarrollador del juego -->
            <label for="gameDev">Desarrollador del videojuego</label>
            <input id="gameDev" name="gameDev" type="text" placeholder="Desarrolador" required maxlength="50">
            <!-- Categorias -->
            <label for="gameCategory">Categoria</label>
            <input list="gameCategories" id="gameCategory" name="gameCategory" required maxlength="50">
            <datalist id="gameCategories">
                <option value="Accion">
                <option value="Aventura">
                <option value="Carreras">
                <option value="Deportes">
                <option value="Estrategia">
                <option value="Indie">
                <option value="Multijugador">
                <option value="Rol">
                <option value="Simulacion">
                <option value="Shooters">
            </datalist>
            <!-- Fecha de lanzamiento -->
            <label for="gameDate">Fecha de lanzamiento</label>
            <input id="gameDate" name="gameDate" type="number" min="1950" max="2050" step="1" placeholder="Fecha de lanzamiento" value="2023">
            <!-- Precio -->
            <label for="gamePrice">Precio</label>
            <input id="gamePrice" name="gamePrice" type="number" step="0.1" placeholder="Precio" required>
            <!-- Existencias -->
            <label for="gameStock">Stock</label>
            <input id="gameStock" name="gameStock" type="number" placeholder="Stock" value="0">
            <!-- Calificacion -->
            <label for="gameRating">Calificacion<output id="gameRatingValue"></output></label>
            <input id="gameRating" name="gameRating" type="range" min="0" max="10" step="any" placeholder="Calificacion" value="0">
            <!-- Imagen del juego ratio=2:3 -->
            <label for="gameImage">Elige una imagen del juego (2:3)</label>
            <input type="hidden" name="MAX_FILE_SIZE" value="3000000" />
            <input id="gameImage" name="gameImage" type="file" accept="image/png, image/jpeg" required class="inputfile">

            <?php if (isset($error)): ?>
                <div class="modal-error"><?php echo $error; ?></div>
            <?php endif; ?>

            <input type="submit" value="Agregar" id="form-submit">
        </form>
    </div>

    <script src="static/js/addGames.js"></script>
</body>
</html>

<?php

require __DIR__.'/src/Productos.php';

$productos = Productos::all();

$jsonProducts = Productos::bulkToArray($productos);

// Mostrar los productos como un json

header('Content-Type: application/json');
echo json_encode($jsonProducts, JSON_PRETTY_PRINT);

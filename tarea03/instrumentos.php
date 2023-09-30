<?php


$instrumentos = [
    'flauta'   => 'Instrumento de viento',
    'guitarra' => 'Instrumento de cuerda',
    'bateria'  => 'Instrumento de percusion',
    'teclado'  => 'Instrumento de tecla',
];

$instrumento = strtolower($_GET['instrumento'] ?? '');

echo $instrumentos[$instrumento] ?? 'No se ha encontrado el instrumento';

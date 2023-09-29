<?php
// Eliminar las variables de la session y luego destruirla

session_start();

$_SESSION = [];
setcookie(session_name(), '', time() - 86400, '/');

session_destroy();

header("location: index");
exit;

?>
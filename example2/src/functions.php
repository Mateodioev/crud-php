<?php

require __DIR__.'/db.php';

function isLogged(): bool {
    return $_SESSION['logged'] ?? false;
}

function isMethod(string $method): bool
{
    return $_SERVER['REQUEST_METHOD'] === $method;
}

function redirect(string $location): never
{
    header('Location: ' . $location);
    exit;
}

function setLogged(int $dni): void {
    $_SESSION['logged'] = true;
    $_SESSION['username'] = $dni;
}

function encodePassword(string $password): string
{
    return password_hash($password, PASSWORD_DEFAULT);
}

function matchPasswords(string $password, string $hash): bool
{
    return password_verify($password, $hash);
}

function database(): Db
{
    return Db::getInstance();
}
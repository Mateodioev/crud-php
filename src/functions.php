<?php

require __DIR__ . '/db.php';

/**
 * Returns true if the user is logged in
 */
function isLogged(): bool
{
    return (bool) ($_SESSION["loggedin"] ?? false);
}

/**
 * Return true if the request method is $method
 */
function isMethod(string $method): bool
{
    return $_SERVER["REQUEST_METHOD"] === $method;
}

/**
 * Redirects to $url
 */
function redirect(string $url): never
{
    header("location: $url");
    exit;
}

/**
 * Redirects to $uri if the request method is not in $correctMethods
 */
function redirectIfMethodIsWrong(string $uri, array $correctMethods = ['POST']): void
{
    if (!in_array($_SERVER["REQUEST_METHOD"], $correctMethods)) {
        redirect($uri);
    }
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

function setLogged(string $username): void {
    $_SESSION['loggedin'] = true;
    $_SESSION['username'] = $username;
}

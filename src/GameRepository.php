<?php

require __DIR__.'/functions.php';
require __DIR__.'/Game.php';

class GameRepository
{
    /**
     * @return Game[]
     */
    public static function all(): array
    {
        $query = 'SELECT * FROM `juegos`';
        return self::fetchAll(database()->query($query));
    }

    public static function allWithLimit(int $limit, int $offset): array
    {
        $query = "SELECT * FROM `juegos` LIMIT $limit OFFSET $offset";
        return self::fetchAll(database()->query($query));
    }

    public static function searchWithLimit(string $query, int $limit, int $offset): array
    {
        $query = "SELECT * FROM `juegos` WHERE `nombre` LIKE '$query%' LIMIT $limit OFFSET $offset";
        return self::fetchAll(database()->query($query));
    }

    public static function byId(int $id): Game
    {
        $query = 'SELECT * FROM `juegos` WHERE `id` = ?';
        $game = self::fetchObject(database()->query($query, [$id]));

        if (!$game) {
            throw new Exception('No se encontro el juego', 404);
        }

        return $game;
    }

    public static function byName(string $name): Game
    {
        $query = 'SELECT * FROM `juegos` WHERE `nombre` = ?';
        $game = self::fetchObject(database()->query($query, [$name]));

        if (!$game) {
            throw new Exception('No se encontro el juego', 404);
        }

        return $game;
    }

    public static function byCategory(string $category): Game
    {
        $query = 'SELECT * FROM `juegos` WHERE `categoria` = ?';
        $game = self::fetchObject(database()->query($query, [$category]));

        if (!$game) {
            throw new Exception('No se encontro la categoria', 404);
        }

        return $game;
    }
    
    /**
     * @return Game[]
     */
    public static function findByName(string $name)
    {
        $query = "SELECT * FROM `juegos` WHERE nombre LIKE '$name%'";
        return self::fetchAll(database()->query($query));
    }

    /**
     * @param Game[] $games
     */
    public static function bulkToArray(array $games): array
    {
        return array_map(fn($game) => $game->toArray(), $games);
    }

    /**
     * @param Game[] $games
     * @return string Json string
     */
    public static function bulkToJson(array $games, int $flags = 0): string
    {
        return json_encode([
            'games' => self::bulkToArray($games),
            'total' => count($games)
        ], $flags);
    }

    /**
     * @return Game[]
     */
    private static function fetchAll(PDOStatement $stmt): array
    {
        return $stmt->fetchAll(PDO::FETCH_CLASS, Game::class);
    }

    private static function fetchObject(PDOStatement $stmt): mixed
    {
        return $stmt->fetchObject(Game::class);
    }
}

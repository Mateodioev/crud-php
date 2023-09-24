<?php

require __DIR__.'/../src/BramusRouter.php';
require __DIR__.'/../src/GameRepository.php';

$router = new BramusRouter;


$router->mount('/games', function () use ($router) {
    $limit = (int) ($_GET['limit'] ?? 10);
    $page  = (int) ($_GET['page'] ?? 0);
    $offset = $limit * ($page - 1);
    $offset = $offset < 0 ? 0 : $offset;

    $router->get('/all', fn () => GameRepository::bulkToJson(GameRepository::allWithLimit($limit, $offset)));

    $router->get('/search(/\w+)?', function (?string $query) use ($limit, $offset): string {
        return GameRepository::bulkToJson(GameRepository::searchWithLimit((string) $query, $limit, $offset));
    });


    $router->get('/id/(\d+)',fn (int $id) => GameRepository::byId($id)->toJson());
    $router->get('/name/(\w+)',fn (string $name) => GameRepository::byName($name)->toJson());
    $router->get('/category/(\w+)',fn (string $name) => GameRepository::byCategory($name)->toJson());
});

$router->set404('/games(/.*)?', function() {
    header('HTTP/1.1 404 Not Found');
    return json_encode(['error' => 'Not found']);
});

try {
    header('Content-Type: application/json');
    // Cors 
    header('Access-Control-Allow-Origin: *');
    $router->run();
} catch (Exception $e) {
    header('Content-Type: application/json', response_code: $e->getCode() ?: 400);
    echo json_encode(['error' => $e->getMessage()]);
}
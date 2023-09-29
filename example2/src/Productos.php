<?php

require __DIR__.'/functions.php';

class Productos
{
    public int $id;
    public string $nombre;
    public float $precio;
    public ?string $descripcion;
    public string $imagen;

    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'nombre' => $this->nombre,
            'precio' => $this->precio,
            'descripcion' => $this->descripcion,
            'imagen' => $this->imagen
        ];
    }

    public function toJson(?int $flags = null): string
    {
        return json_encode($this->toArray(), $flags);
    }

    /**
     * Convert products to array
     *
     * @param Productos[] $productos
     */
    public static function bulkToArray(array $productos): array
    {
        return array_map(fn (Productos $producto) => $producto->toArray(), $productos);
    }

    /**
     * Listar todos los productos
     *
     * @return Productos[]
     */
    public static function all(): array
    {
        $query = 'SELECT * FROM productos';

        return database()
            ->query($query)
            ->fetchAll(PDO::FETCH_CLASS, Productos::class);
    }

    /**
     * Buscar un producto por el id
     * @throws Exception Si no se encontro el producto
     */
    public static function byId(int $id): Productos
    {
        $query = 'SELECT * FROM `productos` WHERE `id` = ?';

        $producto = database()->query($query, [$id])->fetchObject(Productos::class);

        if (!$producto) {
            throw new Exception('No se encontro el juego');
        }

        return $producto;
    }
}

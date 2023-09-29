<?php

class Game
{
    public int $id;
    public string $nombre;
    public string $descripcion;
    public string $desarrollador;
    public string $categoria;
    public int $lanzamiento;
    public float $precio;
    public int $existencias;
    public float $calificacion;
    public string $imagen;

    public function toArray(): array
    {
        return [
            'id'            => $this->id,
            'nombre'        => $this->nombre,
            'descripcion'   => $this->descripcion,
            'desarrollador' => $this->desarrollador,
            'categoria'     => $this->categoria,
            'lanzamiento'   => $this->lanzamiento,
            'precio'        => $this->precio,
            'existencias'   => $this->existencias,
            'calificacion'  => $this->calificacion,
            'imagen'        => $this->imagen,
        ];
    }

    public function toJson(int $flags = 0): string
    {
        return json_encode($this->toArray(), $flags);
    }
}

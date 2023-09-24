CREATE TABLE `juegos` (
  `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `nombre` varchar(200) NOT NULL UNIQUE KEY,
  `descripcion` varchar(255) DEFAULT NULL,
  `desarrollador` varchar(50) NOT NULL COMMENT 'Empresa/Estudio que hizo el videojuego',
  `categoria` varchar(50) NOT NULL,
  `lanzamiento` year(4) DEFAULT NULL COMMENT 'year de lanzamiento',
  `precio` float NOT NULL,
  `existencias` int(11) DEFAULT NULL COMMENT 'cantidad de copias disponibles',
  `calificacion` int(11) DEFAULT NULL COMMENT 'calificacion de 0 a 5',
  `imagen` varchar(255) NOT NULL COMMENT 'Path donde se guarda la imagen'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         8.0.30 - MySQL Community Server - GPL
-- SO del servidor:              Win64
-- HeidiSQL Versión:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Volcando estructura para tabla entregable01.productos
CREATE TABLE IF NOT EXISTS `productos` (
  `id` int NOT NULL,
  `nombre` varchar(50) NOT NULL DEFAULT '',
  `precio` decimal(20,2) NOT NULL DEFAULT '0.00',
  `descripcion` varchar(300) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `imagen` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla entregable01.productos: ~6 rows (aproximadamente)
DELETE FROM `productos`;
INSERT INTO `productos` (`id`, `nombre`, `precio`, `descripcion`, `imagen`) VALUES
	(1, 'Cebolla', 8.00, 'La cebolla se consume cruda, frita, hervida y asada, casi siempre como condimento. También se usan distintos derivados: cebolla deshidratada, usada en la industria alimenticia como saborizante en diversos alimentos; polvo de cebolla, para elaborar sal de cebolla', 'static/img/cebolla.jpg'),
	(2, 'Zanahorias', 3.50, 'Perteneciente a la familia de las umbelíferas, la zanahoria (Daucus carota) es una raíz vegetal de color naranja y textura leñosa. Se le considera uno de los vegetales que más salud aporta al organismo humano gracias a su alto contenido de vitaminas y minerales.', 'static/img/carrots.png'),
	(3, 'Papa', 1.00, 'La papa es un tubérculo comestible que crece bajo la tierra. Su principal función es almacenar o acumular nutrientes.', 'static/img/papa.jpg'),
	(4, 'Brocoli', 3.50, 'Brassica oleracea var. italica, el brócoli, ​ brécol​ o bróquil​ del italiano broccoli, es una planta de la familia de las brasicáceas. Existen otras variedades de la misma especie, tales como: repollo, la coliflor, el colinabo y la col de Bruselas.', 'static/img/brocoli.jpg'),
	(5, 'Berenjena', 4.00, 'Solanum melongena o berenjena es una planta de fruto comestible, generalmente anual, del género Solanum dentro de la familia de las solanáceas.', 'static/img/berenjena.jpg'),
	(6, 'Tomate', 2.00, 'Solanum lycopersicum, conocida comúnmente como tomate, jitomate o tomatera es una especie de planta herbácea del género Solanum de la familia Solanaceae', 'static/img/tomate.jpg');

-- Volcando estructura para tabla entregable01.usuarios
CREATE TABLE IF NOT EXISTS `usuarios` (
  `dni` int NOT NULL,
  `email` varchar(50) NOT NULL DEFAULT '',
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  PRIMARY KEY (`dni`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla entregable01.usuarios: ~0 rows (aproximadamente)
DELETE FROM `usuarios`;
INSERT INTO `usuarios` (`dni`, `email`, `password`) VALUES
	(7777777, 'mateodioev@gmail.com', '$2y$10$oPhpKIXEsbn.vsa9QpO6meypgVNvgh0FHa13YLXxEabzdSzRz2UIK'); -- mateo

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;

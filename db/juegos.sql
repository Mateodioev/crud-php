CREATE TABLE `juegos` (
  `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `nombre` varchar(200) NOT NULL UNIQUE KEY,
  `descripcion` varchar(255) DEFAULT NULL,
  `desarrollador` varchar(50) NOT NULL COMMENT 'Empresa/Estudio que hizo el videojuego',
  `categoria` varchar(50) NOT NULL,
  `lanzamiento` year(4) DEFAULT NULL COMMENT 'year de lanzamiento',
  `precio` float NOT NULL,
  `existencias` int(11) DEFAULT NULL COMMENT 'cantidad de copias disponibles',
  `calificacion` float(11) DEFAULT NULL COMMENT 'calificacion de 0 a 5',
  `imagen` varchar(255) NOT NULL COMMENT 'Path donde se guarda la imagen',
  `added_by` varchar(50) DEFAULT NULL COMMENT 'username del usuario que agrego el juego'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `juegos` (`id`, `nombre`, `descripcion`, `desarrollador`, `categoria`, `lanzamiento`, `precio`, `existencias`, `calificacion`, `imagen`, `added_by`) VALUES
(1, 'Minecraft', 'Minecraft es un videojuego de construcción de tipo «mundo abierto»', 'Mojang', 'Simulacion', 2011, 30, 1000, 9.32188, 'storage/img/PEvswfya8OSteve_(Minecraft).png', NULL),
(2, 'Counter-Strike: Global Offensive', 'Counter-Strike: Global Offensive (CS: GO) expands upon the team-based action gameplay that it pioneered when it was launched 19 years ago. CS: GO features new maps, characters, weapons, and game modes, and delivers updated versions of the classic CS conte', 'Valve', 'Shooters', 2012, 20, 10000, 8.85172, 'storage/img/hyFQfr38bocsgo.png', NULL),
(3, 'Cyberpunk 2077', 'Cyberpunk 2077 is an open-world, action-adventure RPG set in the dark future of Night City — a dangerous megalopolis obsessed with power, glamor, and ceaseless body modification.', 'CD PROJEKT RED', 'Multijugador', 2020, 119.4, 40000, 7.87591, 'storage/img/52iCRItDEWCyberpunk-2077.jpg', NULL),
(4, 'Starfield', 'Starfield is the first new universe in 25 years from Bethesda Game Studios, the award-winning creators of The Elder Scrolls V: Skyrim and Fallout 4.', 'Bethesda Game Studios', 'Multijugador', 2023, 249, 1000, 7.14599, 'storage/img/bQa4hSgq2Jstarfield.png', NULL),
(5, 'Grand Theft Auto V', 'Grand Theft Auto V for PC offers players the option to explore the award-winning world of Los Santos and Blaine County in resolutions of up to 4k and beyond, as well as the chance to experience the game running at 60 frames per second.', 'Rockstart Games', 'Accion', 2015, 80.5, 10000, 8.57664, 'storage/img/3sCVWSYPuqgta-v.jpg', NULL),
(6, 'Rust', 'The only aim in Rust is to survive. Everything wants you to die - the island’s wildlife and other inhabitants, the environment, other survivors. Do whatever it takes to last another night.', 'Facepunch Studios', 'Supervivencia', 2018, 79, 5000, 8.60584, 'storage/img/ufhglkC0Xndesktop-wallpaper-rust-rust-game.jpg', NULL),
(7, 'Tom Clancy\'s Rainbow Six Siege', 'Tom Clancy\'s Rainbow Six® Siege is an elite, tactical team-based shooter where superior planning and execution triumph.', 'Ubisoft', 'Shooters', 2015, 59.9, 4000, 8.51825, 'storage/img/jfIJCXZts6rainbow-six-siege.jpg', NULL),
(8, 'Football Manager 2023', 'Build your dream squad, outsmart your rivals and experience the thrill of big European nights in the UEFA Champions League. Your journey towards footballing glory awaits.', 'SEGA', 'Deportes', 2022, 159, 4200, 8.63504, 'storage/img/2jsgX6VbYvfm2023.jpg', NULL),
(9, 'PAYDAY 3', 'PAYDAY 3 is the much anticipated sequel to one of the most popular co-op shooters ever. Since its release, PAYDAY-players have been reveling in the thrill of a perfectly planned and executed heist. That’s what makes PAYDAY a high-octane, co-op FPS experie', 'Deep Silver', 'Shooters', 2023, 100, 10000, 3.40876, 'storage/img/AqwvChEMKepayday3.png', NULL),
(10, 'Party Animals', 'Fight your friends as puppies, kittens and other fuzzy creatures in PARTY ANIMALS! Paw it out with your friends remotely, or huddle together for chaotic fun on the same screen. Interact with the world under our realistic physics engine. Did I mention PUPP', 'Recreate Games', 'Aventura', 2023, 46.5, 40000, 5.86131, 'storage/img/DmkMVNsW1wparty-animals.jpg', NULL),
(11, 'Lies of P', 'Lies of P is a thrilling soulslike that takes the story of Pinocchio, turns it on its head, and sets it against the darkly elegant backdrop of the Belle Epoque era.', 'NEOWIZ', 'Aventura', 2023, 170, 500, 8.31387, 'storage/img/MvFhxfynp7lies-of-p.png', NULL);

COMMIT;

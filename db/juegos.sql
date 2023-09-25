CREATE TABLE `juegos` (
  `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `nombre` varchar(200) NOT NULL UNIQUE KEY,
  `descripcion` varchar(255) DEFAULT NULL,
  `desarrollador` varchar(50) NOT NULL COMMENT 'Empresa/Estudio que hizo el videojuego',
  `categoria` varchar(50) NOT NULL,
  `lanzamiento` year(4) DEFAULT NULL COMMENT 'year de lanzamiento',
  `precio` float NOT NULL,
  `existencias` int(11) DEFAULT NULL COMMENT 'cantidad de copias disponibles',
  `calificacion` decimal(4, 2) DEFAULT NULL COMMENT 'calificacion de 0 a 5',
  `imagen` varchar(255) NOT NULL COMMENT 'Path donde se guarda la imagen',
  `added_by` varchar(50) DEFAULT NULL COMMENT 'username del usuario que agrego el juego'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `juegos` (`id`, `nombre`, `descripcion`, `desarrollador`, `categoria`, `lanzamiento`, `precio`, `existencias`, `calificacion`, `imagen`, `added_by`) VALUES
(1, 'Minecraft', 'Minecraft es un videojuego de construcción de tipo «mundo abierto»', 'Mojang', 'Simulacion', 2011, 30, 1000, '9.32', 'storage/img/PEvswfya8OSteve_(Minecraft).png', NULL),
(2, 'Counter-Strike: Global Offensive', 'Counter-Strike: Global Offensive (CS: GO) expands upon the team-based action gameplay that it pioneered when it was launched 19 years ago. CS: GO features new maps, characters, weapons, and game modes, and delivers updated versions of the classic CS conte', 'Valve', 'Shooters', 2012, 20, 10000, '8.85', 'storage/img/hyFQfr38bocsgo.png', NULL),
(3, 'Cyberpunk 2077', 'Cyberpunk 2077 is an open-world, action-adventure RPG set in the dark future of Night City — a dangerous megalopolis obsessed with power, glamor, and ceaseless body modification.', 'CD PROJEKT RED', 'Multijugador', 2020, 119.4, 40000, '7.88', 'storage/img/52iCRItDEWCyberpunk-2077.jpg', NULL),
(4, 'Starfield', 'Starfield is the first new universe in 25 years from Bethesda Game Studios, the award-winning creators of The Elder Scrolls V: Skyrim and Fallout 4.', 'Bethesda Game Studios', 'Multijugador', 2023, 249, 1000, '7.15', 'storage/img/bQa4hSgq2Jstarfield.png', NULL),
(5, 'Grand Theft Auto V', 'Grand Theft Auto V for PC offers players the option to explore the award-winning world of Los Santos and Blaine County in resolutions of up to 4k and beyond, as well as the chance to experience the game running at 60 frames per second.', 'Rockstart Games', 'Accion', 2015, 80.5, 10000, '8.58', 'storage/img/3sCVWSYPuqgta-v.jpg', NULL),
(6, 'Rust', 'The only aim in Rust is to survive. Everything wants you to die - the island’s wildlife and other inhabitants, the environment, other survivors. Do whatever it takes to last another night.', 'Facepunch Studios', 'Supervivencia', 2018, 79, 5000, '8.61', 'storage/img/ufhglkC0Xndesktop-wallpaper-rust-rust-game.jpg', NULL),
(7, 'Tom Clancy\'s Rainbow Six Siege', 'Tom Clancy\'s Rainbow Six® Siege is an elite, tactical team-based shooter where superior planning and execution triumph.', 'Ubisoft', 'Shooters', 2015, 59.9, 4000, '8.52', 'storage/img/jfIJCXZts6rainbow-six-siege.jpg', NULL),
(8, 'Football Manager 2023', 'Build your dream squad, outsmart your rivals and experience the thrill of big European nights in the UEFA Champions League. Your journey towards footballing glory awaits.', 'SEGA', 'Deportes', 2022, 159, 4200, '8.64', 'storage/img/2jsgX6VbYvfm2023.jpg', NULL),
(9, 'PAYDAY 3', 'PAYDAY 3 is the much anticipated sequel to one of the most popular co-op shooters ever. Since its release, PAYDAY-players have been reveling in the thrill of a perfectly planned and executed heist. That’s what makes PAYDAY a high-octane, co-op FPS experie', 'Deep Silver', 'Shooters', 2023, 100, 10000, '3.41', 'storage/img/AqwvChEMKepayday3.png', NULL),
(10, 'Party Animals', 'Fight your friends as puppies, kittens and other fuzzy creatures in PARTY ANIMALS! Paw it out with your friends remotely, or huddle together for chaotic fun on the same screen. Interact with the world under our realistic physics engine. Did I mention PUPP', 'Recreate Games', 'Aventura', 2023, 46.5, 40000, '5.86', 'storage/img/DmkMVNsW1wparty-animals.jpg', NULL),
(11, 'Lies of P', 'Lies of P is a thrilling soulslike that takes the story of Pinocchio, turns it on its head, and sets it against the darkly elegant backdrop of the Belle Epoque era.', 'NEOWIZ', 'Aventura', 2023, 170, 500, '8.31', 'storage/img/MvFhxfynp7lies-of-p.png', NULL),
(12, 'Mortal Kombat 1', 'Discover a reborn Mortal Kombat™ Universe created by the Fire God Liu Kang. Mortal Kombat™ 1 ushers in a new era of the iconic franchise with a new fighting system, game modes, and fatalities!', 'NetherRealm Studios', 'Peleas', 2023, 208, 10000, '7.34', 'storage/img/yQCZriofRqmortal-kombat-1.jpg', NULL),
(13, 'Moonstone Island', 'Moonstone Island is a creature-collecting life-sim set in an open world with 100 islands to explore. Make friends, brew potions, collect Spirits, and test your strength in card-based encounters to complete your Alchemy training!', 'Studio Supersoft', 'Aventura', 2023, 38.7, 10000, '8.50', 'storage/img/c7jEmlVAu6Moonstone-Island.jpg', NULL),
(14, 'Fallout 76', 'Bethesda Game Studios welcome you to Fallout 76. Twenty-five years after the bombs fall, you and your fellow Vault Dwellers emerge into post-nuclear America. Explore a vast wasteland in this open-world multiplayer addition to the Fallout story.', 'Bethesda Game Studios', 'Accion', 2020, 126.6, 10000, '7.75', 'storage/img/qj2pGAeEVXartwork-fallout-76.jpg', NULL),
(15, 'Terraria', 'Dig, fight, explore, build! Nothing is impossible in this action-packed adventure game. Four Pack also available!', 'Re-Logic', 'Simulacion', 2011, 27.9, 10000, '9.70', 'storage/img/kFgYEVT0zyterraria.jpg', 'mateodioev'),
(16, 'Euro Truck Simulator 2', 'Travel across Europe as king of the road, a trucker who delivers important cargo across impressive distances! With dozens of cities to explore, your endurance, skill and speed will all be pushed to their limits.', 'SCS Software', 'Simulacion', 2012, 47, 5000, '9.65', 'storage/img/6EYn1J7aXweuro-truck.jpg', 'mateodioev');

COMMIT;

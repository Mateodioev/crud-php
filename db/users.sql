CREATE TABLE `usuarios` (
  `correo` varchar(50) NOT NULL PRIMARY KEY,
  `username` varchar(50) NOT NULL UNIQUE KEY,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `usuarios` (`correo`, `username`, `password`) VALUES
('orehurcomito@gmail.com', 'mateodioev', '$2y$10$bObYPz9rvaXKNpACL5O.9OhNfAg8EFWleWcJP35zQ63lAvAXNlhxu'); -- password: mateo

COMMIT;

CREATE DATABASE ferroviax;
USE ferroviax;

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

CREATE TABLE `itinerario` (
  `id_itinerario` int NOT NULL,
  `id_usuario` int NOT NULL,
  `id_trem` int NOT NULL,
  `dia_itinerario` date NOT NULL,
  `horario_itinerario` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `sensores` (
  `id_sensor` int NOT NULL,
  `tipo_sensor` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `local_sensor` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `data_sensor` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `sensores` (`id_sensor`, `tipo_sensor`, `local_sensor`, `data_sensor`) VALUES
(1, 'sensor de temperatura', 'terminal 1', '2023-10-15');

CREATE TABLE `trem` (
  `pk_trem` int NOT NULL,
  `nome_trem` varchar(20) NOT NULL,
  `linha_trem` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `usuario` (
  `pk_usuario` int NOT NULL,
  `nome_usuario` varchar(50) DEFAULT NULL,
  `email_usuario` varchar(50) DEFAULT NULL,
  `senha_usuario` varchar(200) DEFAULT NULL,
  `foto_usuario` varchar(255) DEFAULT NULL,
  `cargo` int DEFAULT '1',
  `linha_maquinista` varchar(50) DEFAULT 'Nenhuma',
  `horario_maquinista` varchar(50) DEFAULT 'Nenhum',
  `indentificador` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE alertas (
    id_alerta INT AUTO_INCREMENT PRIMARY KEY,
    titulo VARCHAR(255) NOT NULL,
    descricao TEXT NOT NULL,
    linha VARCHAR(120) NOT NULL,
    tipo VARCHAR(50) NOT NULL,
    data_alerta DATETIME NOT NULL
);

CREATE TABLE alertas_recebidos (
  id INT AUTO_INCREMENT PRIMARY KEY,
  fk_usuario INT,
  fk_alerta INT,
  titulo VARCHAR(200),
  descricao TEXT,
  linha VARCHAR(100),
  tipo VARCHAR(50),
  data_recebido DATETIME
);

INSERT INTO `usuario` (`pk_usuario`, `nome_usuario`, `email_usuario`, `senha_usuario`, `foto_usuario`, `cargo`, `linha_maquinista`, `horario_maquinista`, `indentificador`) VALUES
(1, 'teste', 'teste@gmail.com', '$2y$10$nkRfcP12t9TIIM.ku/pMSelaBfocFim2lihYlQt2Hqk5Ikw9W7Ogq', 'uploads/foto_12_1758981995.png', 3, 'Linha Preta', '12:00 - 06:00', 4),
(2, 'admin', 'admin@gmail.com', '$2y$10$x4fBcwO/YmjMhw.RTvR8ReOotVgrc6tUH6j9vPDu2efjyYCvSQFrS', 'uploads/foto_2_1759494876.png', 2, 'Nenhuma', 'Nenhum', NULL),
(3, 'maquinista', 'maquinista@gmail.com', '$2y$10$Po4dznrR4gD.hPxGy0boTOd97rZw0L6yTnY/OcfTI.aoV3HawT9/u', 'uploads/foto_3_1759504527.jfif', 3, 'Linha Preta', '13:00 - 17:00', 200),
(4, 'usuario', 'usuario@gmail.com', '$2y$10$.h4cry5S.s6CdmLwqz9XquTe/gW3yTC3XMYAbSuJs5MJ4q27M8AmC', 'uploads/foto_4_1760092198.jpg', 1, 'Nenhuma', 'Nenhum', NULL),
(5, 'maquinista1', 'maquinista1@gmail.com', '$2y$10$Ek/Eib0MVU7nMA2gdFLV/OmOiqYJ8ihSPjNq4nTF7AGRWeUo8Loia', 'uploads/foto_12_1758981995.png', 3, 'Linha Amarela', '13:00 - 15:30', 1),
(6, 'maquinista2', 'maquinista2@gmail.com', '$2y$10$8uzM70ZttYLISaOrCoSpxej2li5cMjuFOTVqf88dLaCZqYo/lWYfe', 'uploads/foto_12_1758981995.png', 3, 'Linha Verde', '12:00 - 21:00', 3),
(8, 'Matheus', 'matheus@gmail.com', '$2y$10$qEJq5LOIkLihmPif.0ZGAOvFL1HBQxvT.iaECjXv2JdyF/Ob3ymM2', 'uploads/foto_12_1758981995.png', 1, 'Nenhuma', 'Nenhum', NULL),
(9, 'guilherme', 'guilherme@gmail.com', '$2y$10$p60HeJvx/EBnXOHwOJZ6O.2/jGpvnVUYRlbD6GEcOtLXxIx8mWmve', 'uploads/foto_12_1758981995.png', 1, 'Nenhuma', 'Nenhum', NULL),
(10, 'teste123', 'teste123@gmail.com', '$2y$10$v/yvUEtgH9PhPmhPfgNSYOjvTfYG/UOanHH6AZ/JjD.3bScGqYJSS', 'uploads/foto_12_1758981995.png', 1, 'Nenhuma', 'Nenhum', NULL),
(11, 'felipe', 'felipe@gmail.com', '$2y$10$rmDiBvmPsY/FpXEqpohsm.9EgSrB4mYJ2N.3CP.rCu4Ww0wtyqOX.', 'uploads/foto_12_1758981995.png', 1, 'Nenhuma', 'Nenhum', NULL),
(12, 'gabirl', 'gabriel_santos67@estudante.sesisenai.org.br', '$2y$10$ztfA8DMF0qlVH3H7uByltuogxao6WuULZ3TnhPoPEHNCo2v5ZRUvu', 'uploads/foto_12_1758981995.png', 1, 'Nenhuma', 'Nenhum', NULL);

ALTER TABLE `itinerario`
  ADD PRIMARY KEY (`id_itinerario`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_trem` (`id_trem`);

ALTER TABLE `sensores`
  ADD PRIMARY KEY (`id_sensor`);

ALTER TABLE `trem`
  ADD PRIMARY KEY (`pk_trem`);

ALTER TABLE `usuario`
  ADD PRIMARY KEY (`pk_usuario`);

ALTER TABLE `itinerario`
  MODIFY `id_itinerario` int NOT NULL AUTO_INCREMENT;

ALTER TABLE `sensores`
  MODIFY `id_sensor` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

ALTER TABLE `trem`
  MODIFY `pk_trem` int NOT NULL AUTO_INCREMENT;

ALTER TABLE `usuario`
  MODIFY `pk_usuario` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

ALTER TABLE `itinerario`
  ADD CONSTRAINT `itinerario_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`pk_usuario`),
  ADD CONSTRAINT `itinerario_ibfk_2` FOREIGN KEY (`id_trem`) REFERENCES `trem` (`pk_trem`);
COMMIT;

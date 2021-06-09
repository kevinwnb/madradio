-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 09, 2021 at 10:59 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `madradio`
--

-- --------------------------------------------------------

--
-- Table structure for table `categorias`
--

CREATE TABLE `categorias` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categorias`
--

INSERT INTO `categorias` (`id`, `nombre`) VALUES
(1, 'Podcasts'),
(2, 'Radio');

-- --------------------------------------------------------

--
-- Table structure for table `comentarios`
--

CREATE TABLE `comentarios` (
  `id` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `comentario` text NOT NULL,
  `id_publicacion` int(11) NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `generos`
--

CREATE TABLE `generos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `generos`
--

INSERT INTO `generos` (`id`, `nombre`) VALUES
(1, 'POP'),
(2, 'Jazz'),
(3, 'Rock'),
(4, 'Punk'),
(5, 'Rap'),
(6, 'Entretenimiento'),
(7, 'Conversacional'),
(8, 'Formación'),
(9, 'Investigación'),
(10, 'Periodístico');

-- --------------------------------------------------------

--
-- Table structure for table `publicaciones`
--

CREATE TABLE `publicaciones` (
  `id` int(11) NOT NULL,
  `titulo` varchar(50) NOT NULL,
  `descripcion` text NOT NULL,
  `etiquetas` text DEFAULT NULL,
  `id_categoria` int(11) NOT NULL,
  `id_genero` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `url_imagen` varchar(100) NOT NULL,
  `url_audio` varchar(100) NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `publicaciones`
--

INSERT INTO `publicaciones` (`id`, `titulo`, `descripcion`, `etiquetas`, `id_categoria`, `id_genero`, `id_usuario`, `url_imagen`, `url_audio`, `fecha`) VALUES
(26, 'faxa', 'faxa', 'faxa', 2, 1, 7, '/uploads/imagenes/', '/uploads/audio/', '2021-06-07'),
(27, 'asdf', 'asdf', 'asdf', 2, 5, 7, 'back-end/uploads/imagenes/60be4188566ea.jpg', 'back-end/uploads/audio/60be41885f1f3.mp3', '2021-06-07'),
(28, 'aa', 'aa', 'aa', 1, 3, 7, 'back-end/uploads/imagenes/60be4265563b7.jpg', 'back-end/uploads/audio/60be42655b15c.mp3', '2021-06-07'),
(29, 'bb', 'bb', 'bb', 1, 1, 7, 'back-end/uploads/imagenes/60be42b630250.jpg', 'back-end/uploads/audio/60be42b630e6f.mp3', '2021-06-07'),
(30, 'ffd', 'ffd', 'ffd', 1, 1, 7, '/uploads/imagenes/', '/uploads/audio/', '2021-06-07'),
(31, 'af', 'af', 'afdf', 2, 1, 7, '/uploads/imagenes/60bee05cbfd61.jpg', '/uploads/audio/60bee00245797.mp3', '2021-06-08'),
(32, 'da', 'da', 'da', 1, 1, 7, '/uploads/imagenes/60c0106038c7a.jpg', '/uploads/audio/60c01060404c1.mp3', '2021-06-09'),
(33, 't', 't', 't', 2, 3, 7, '/uploads/imagenes/60c01a047c700.jpg', '/uploads/audio/60c01a047d900.mp3', '2021-06-09');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `role` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `role`) VALUES
(1, 'Administrador'),
(2, 'Cliente');

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` text NOT NULL,
  `role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `email`, `password`, `role_id`) VALUES
(6, 'Nico', 'nico@mail.com', '$2y$10$hYm1Nomxe1./Y44CweXme.NGJL5suwqSzv92zdEdKdKytsZyHAnse', 2),
(7, 'Mario', 'mario@mail.com', '$2y$10$IAo7ZZTqdLjALEMkmLJY7eOzKgcCsst.lqkXdk804vDsGq66Z0qry', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comentarios`
--
ALTER TABLE `comentarios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_publicacion` (`id_publicacion`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indexes for table `generos`
--
ALTER TABLE `generos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `publicaciones`
--
ALTER TABLE `publicaciones`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_categoria` (`id_categoria`),
  ADD KEY `id_genero` (`id_genero`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_id` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `comentarios`
--
ALTER TABLE `comentarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `generos`
--
ALTER TABLE `generos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `publicaciones`
--
ALTER TABLE `publicaciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comentarios`
--
ALTER TABLE `comentarios`
  ADD CONSTRAINT `comentarios_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `comentarios_ibfk_2` FOREIGN KEY (`id_publicacion`) REFERENCES `publicaciones` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `publicaciones`
--
ALTER TABLE `publicaciones`
  ADD CONSTRAINT `publicaciones_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `publicaciones_ibfk_2` FOREIGN KEY (`id_genero`) REFERENCES `generos` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `publicaciones_ibfk_3` FOREIGN KEY (`id_categoria`) REFERENCES `categorias` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

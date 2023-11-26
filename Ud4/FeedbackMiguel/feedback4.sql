-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 22-11-2023 a las 12:44:59
-- Versión del servidor: 8.0.34
-- Versión de PHP: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `feedback4`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id` int NOT NULL,
  `primerNombre` varchar(45) NOT NULL,
  `segundoNombre` varchar(45) DEFAULT NULL,
  `primerApellido` varchar(45) NOT NULL,
  `segundoApellido` varchar(45) DEFAULT NULL,
  `edad` int NOT NULL,
  `genero` varchar(20) NOT NULL,
  `email` varchar(45) NOT NULL,
  `telefono` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id`, `primerNombre`, `segundoNombre`, `primerApellido`, `segundoApellido`, `edad`, `genero`, `email`, `telefono`) VALUES
(3, 'Javier', 'pedro', 'Perez', '', 23, 'masculino', 'robertoPerez@hotmail.com', '+34644714545'),
(4, 'Angel', 'Pedro', 'Perez', 'Carrillo', 23, 'masculino', 'robertoPerez@hotmail.com', '+34644714545'),
(6, 'Miguel', 'Angel', 'Brice', 'Rodri', 45, 'masculino', 'manasmkma@hotmsil.com', '+34644714545'),
(9, 'Maria', 'Petra', 'Roblo', '', 23, 'otro', 'otro@gmail.com', '+34644714545'),
(11, 'Angel', 'David', 'Fernandex', 'Roberto', 30, 'masculino', 'mndns@dfg.com', '+34644719535'),
(12, 'Angel', 'David', 'Fernandex', 'Roberto', 30, 'masculino', 'mndns@dfg.com', '+34644719535'),
(13, 'Roberto ', 'Carlos', 'Peres', 'Cal', 34, 'masculino', 'tototot@gmail.com', '+34644719535'),
(14, 'Angel', 'David', 'Briceño', 'Goncalves', 25, 'masculino', 'angeldbricenog@gmail.com', '634505518'),
(15, 'Angel', 'David', 'Briceño', 'Goncalves', 25, 'masculino', 'angeldbricenog@gmail.com', '34634505518');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

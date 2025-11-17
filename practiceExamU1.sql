-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 17-11-2025 a las 10:49:48
-- Versión del servidor: 8.0.17
-- Versión de PHP: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `practicar`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `chicken`
--

CREATE TABLE `chicken` (
  `id_chicken` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `color` varchar(50) NOT NULL,
  `age` int(11) NOT NULL,
  `isMolting` tinyint(1) NOT NULL,
  `id_coop` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `chicken`
--

INSERT INTO `chicken` (`id_chicken`, `name`, `color`, `age`, `isMolting`, `id_coop`) VALUES
(1, 'Silvana', 'white', 12, 0, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `chicken_coop`
--

CREATE TABLE `chicken_coop` (
  `id_coop` int(11) NOT NULL,
  `id_farmer` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `chicken_coop`
--

INSERT INTO `chicken_coop` (`id_coop`, `id_farmer`) VALUES
(1, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `egg`
--

CREATE TABLE `egg` (
  `id_egg` int(11) NOT NULL,
  `id_chicken` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `egg`
--

INSERT INTO `egg` (`id_egg`, `id_chicken`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `farmer`
--

CREATE TABLE `farmer` (
  `id_farmer` int(11) NOT NULL,
  `name_farmer` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `farmer`
--

INSERT INTO `farmer` (`id_farmer`, `name_farmer`) VALUES
(1, 'Manuel'),
(2, 'Juan');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `chicken`
--
ALTER TABLE `chicken`
  ADD PRIMARY KEY (`id_chicken`),
  ADD KEY `FK_COOP_CHICKEN` (`id_coop`);

--
-- Indices de la tabla `chicken_coop`
--
ALTER TABLE `chicken_coop`
  ADD PRIMARY KEY (`id_coop`),
  ADD KEY `FK_FARMER_COOP` (`id_farmer`);

--
-- Indices de la tabla `egg`
--
ALTER TABLE `egg`
  ADD PRIMARY KEY (`id_egg`),
  ADD KEY `FK_CHICKEN_EGG` (`id_chicken`);

--
-- Indices de la tabla `farmer`
--
ALTER TABLE `farmer`
  ADD PRIMARY KEY (`id_farmer`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `chicken`
--
ALTER TABLE `chicken`
  MODIFY `id_chicken` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `chicken_coop`
--
ALTER TABLE `chicken_coop`
  MODIFY `id_coop` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `egg`
--
ALTER TABLE `egg`
  MODIFY `id_egg` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `farmer`
--
ALTER TABLE `farmer`
  MODIFY `id_farmer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `chicken`
--
ALTER TABLE `chicken`
  ADD CONSTRAINT `FK_COOP_CHICKEN` FOREIGN KEY (`id_coop`) REFERENCES `chicken_coop` (`id_coop`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Filtros para la tabla `chicken_coop`
--
ALTER TABLE `chicken_coop`
  ADD CONSTRAINT `FK_FARMER_COOP` FOREIGN KEY (`id_farmer`) REFERENCES `farmer` (`id_farmer`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Filtros para la tabla `egg`
--
ALTER TABLE `egg`
  ADD CONSTRAINT `FK_CHICKEN_EGG` FOREIGN KEY (`id_chicken`) REFERENCES `chicken` (`id_chicken`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

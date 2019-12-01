-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 01-12-2019 a las 02:27:42
-- Versión del servidor: 10.3.16-MariaDB
-- Versión de PHP: 7.1.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `huerto`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sensor_distancia`
--

CREATE TABLE `sensor_distancia` (
  `id` int(11) NOT NULL,
  `valor_distancia_agua` int(11) NOT NULL,
  `fecha_medicion` date NOT NULL,
  `hora_medicion` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sensor_luminosidad`
--

CREATE TABLE `sensor_luminosidad` (
  `id` int(11) NOT NULL,
  `valor_luminosidad_ambiente` int(11) NOT NULL,
  `fecha_medicion` date NOT NULL,
  `hora_medicion` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sensor_suelo`
--

CREATE TABLE `sensor_suelo` (
  `id` int(11) NOT NULL,
  `valor_humedad_suelo` int(11) NOT NULL,
  `fecha_medicion` date NOT NULL,
  `hora_medicion` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sensor_temperatura`
--

CREATE TABLE `sensor_temperatura` (
  `id` int(11) NOT NULL,
  `valor_temperatura_ambiente` int(11) NOT NULL,
  `fecha_medicion` date NOT NULL,
  `hora_medicion` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `sensor_distancia`
--
ALTER TABLE `sensor_distancia`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `sensor_luminosidad`
--
ALTER TABLE `sensor_luminosidad`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `sensor_suelo`
--
ALTER TABLE `sensor_suelo`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `sensor_temperatura`
--
ALTER TABLE `sensor_temperatura`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `sensor_distancia`
--
ALTER TABLE `sensor_distancia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `sensor_luminosidad`
--
ALTER TABLE `sensor_luminosidad`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `sensor_suelo`
--
ALTER TABLE `sensor_suelo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `sensor_temperatura`
--
ALTER TABLE `sensor_temperatura`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

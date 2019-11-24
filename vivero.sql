-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 24-11-2019 a las 00:41:06
-- Versión del servidor: 8.0.15
-- Versión de PHP: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `vivero`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sensor_dht11`
--

CREATE TABLE `sensor_dht11` (
  `id_sensor_dht11` int(20) NOT NULL,
  `dht11_humedad` int(20) NOT NULL,
  `dht11_temperatura` int(20) NOT NULL,
  `fecha_medicion` datetime(6) NOT NULL,
  `hora_medicion` timestamp(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sensor_distancia`
--

CREATE TABLE `sensor_distancia` (
  `id_sensor_distancia` int(20) NOT NULL,
  `valor_profundidad` int(20) NOT NULL,
  `fecha_medicion` datetime(6) NOT NULL,
  `hora_medicion` timestamp(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sensor_luminosidad`
--

CREATE TABLE `sensor_luminosidad` (
  `id_sensor_luminosidad` int(20) NOT NULL,
  `valor_luminosidad` int(20) NOT NULL,
  `fecha_medicion` datetime(6) NOT NULL,
  `hora_medicion` timestamp(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sensor_suelo`
--

CREATE TABLE `sensor_suelo` (
  `id_sensor_suelo` int(11) NOT NULL,
  `valor_humedad_suelo` int(20) NOT NULL,
  `fecha_medicion` date NOT NULL,
  `hora_medicion` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `sensor_suelo`
--

INSERT INTO `sensor_suelo` (`id_sensor_suelo`, `valor_humedad_suelo`, `fecha_medicion`, `hora_medicion`) VALUES
(1, 858, '2019-11-22', '00:00:00'),
(2, 858, '2019-11-22', '20:39:33'),
(3, 858, '2019-11-22', '20:40:35'),
(4, 855, '2019-11-22', '20:54:49'),
(5, 648, '2019-11-22', '21:04:02'),
(6, 649, '2019-11-22', '21:06:15'),
(7, 649, '2019-11-22', '21:07:07'),
(8, 649, '2019-11-22', '21:07:11'),
(9, 648, '2019-11-22', '21:07:30'),
(10, 649, '2019-11-22', '21:07:37'),
(11, 649, '2019-11-22', '21:08:04'),
(12, 649, '2019-11-22', '21:08:45'),
(13, 649, '2019-11-22', '21:08:46'),
(14, 648, '2019-11-22', '21:09:04'),
(15, 648, '2019-11-22', '21:10:29'),
(16, 648, '2019-11-22', '21:13:02'),
(17, 648, '2019-11-22', '21:13:12'),
(18, 649, '2019-11-22', '21:13:22'),
(19, 648, '2019-11-22', '21:13:37'),
(20, 648, '2019-11-22', '21:13:48'),
(21, 648, '2019-11-22', '21:13:58'),
(22, 649, '2019-11-22', '21:14:12'),
(23, 648, '2019-11-22', '21:14:22');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `sensor_dht11`
--
ALTER TABLE `sensor_dht11`
  ADD PRIMARY KEY (`id_sensor_dht11`);

--
-- Indices de la tabla `sensor_distancia`
--
ALTER TABLE `sensor_distancia`
  ADD PRIMARY KEY (`id_sensor_distancia`);

--
-- Indices de la tabla `sensor_luminosidad`
--
ALTER TABLE `sensor_luminosidad`
  ADD PRIMARY KEY (`id_sensor_luminosidad`);

--
-- Indices de la tabla `sensor_suelo`
--
ALTER TABLE `sensor_suelo`
  ADD PRIMARY KEY (`id_sensor_suelo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `sensor_dht11`
--
ALTER TABLE `sensor_dht11`
  MODIFY `id_sensor_dht11` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `sensor_distancia`
--
ALTER TABLE `sensor_distancia`
  MODIFY `id_sensor_distancia` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `sensor_luminosidad`
--
ALTER TABLE `sensor_luminosidad`
  MODIFY `id_sensor_luminosidad` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `sensor_suelo`
--
ALTER TABLE `sensor_suelo`
  MODIFY `id_sensor_suelo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

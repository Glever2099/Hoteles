-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 05-09-2023 a las 00:12:34
-- Versión del servidor: 8.0.31
-- Versión de PHP: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `hotel`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `acompaniante`
--

DROP TABLE IF EXISTS `acompaniante`;
CREATE TABLE IF NOT EXISTS `acompaniante` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dni` int NOT NULL,
  `celular` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pais_cuidad` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `habitacion`
--

DROP TABLE IF EXISTS `habitacion`;
CREATE TABLE IF NOT EXISTS `habitacion` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_servi_habitacion` int NOT NULL,
  `habilitado` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_servi_habitacion` (`id_servi_habitacion`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `habitacion`
--

INSERT INTO `habitacion` (`id`, `nombre`, `id_servi_habitacion`, `habilitado`) VALUES
(1, '105', 1, 'si'),
(2, '104', 16, 'si');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reserva`
--

DROP TABLE IF EXISTS `reserva`;
CREATE TABLE IF NOT EXISTS `reserva` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_habitacion` int NOT NULL,
  `ingreso` datetime NOT NULL,
  `retiro` datetime NOT NULL,
  `comentario` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `acompaniantes` int NOT NULL,
  `metodo_pago` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estado_pago` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cantidad_pago` int NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_habitacion` (`id_habitacion`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reserva_cliente`
--

DROP TABLE IF EXISTS `reserva_cliente`;
CREATE TABLE IF NOT EXISTS `reserva_cliente` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_cliente` int NOT NULL,
  `id_reserva` int NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_cliente` (`id_cliente`,`id_reserva`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servi_habitacion`
--

DROP TABLE IF EXISTS `servi_habitacion`;
CREATE TABLE IF NOT EXISTS `servi_habitacion` (
  `id` int NOT NULL AUTO_INCREMENT,
  `cantidad_persona` int NOT NULL,
  `descripcion` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `costo` int NOT NULL,
  `moneda` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `servi_habitacion`
--

INSERT INTO `servi_habitacion` (`id`, `cantidad_persona`, `descripcion`, `costo`, `moneda`) VALUES
(1, 1, 'cama simple', 1000, 'pesos argentinos'),
(16, 2, 'cama doble', 2000, 'pesos argentinos');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `titular`
--

DROP TABLE IF EXISTS `titular`;
CREATE TABLE IF NOT EXISTS `titular` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ciudad` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dni` int NOT NULL,
  `ocupacion` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `celular` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `genero` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contrasenia` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

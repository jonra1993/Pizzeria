-- phpMyAdmin SQL Dump
-- version 4.4.15.9
-- https://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 20-01-2019 a las 04:20:43
-- Versión del servidor: 5.6.37
-- Versión de PHP: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `oswa_inv`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `catalogo_lasagna`
--

CREATE TABLE IF NOT EXISTS `catalogo_lasagna` (
  `id` int(11) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `price` decimal(25,2) NOT NULL,
  `media_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `catalogo_lasagna`
--

INSERT INTO `catalogo_lasagna` (`id`, `nombre`, `price`, `media_id`) VALUES
(1, 'carne', '4.00', 96),
(2, 'pollo', '4.00', 97),
(3, 'mixta', '4.50', 98);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `catalogo_lasagna`
--
ALTER TABLE `catalogo_lasagna`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `catalogo_lasagna`
--
ALTER TABLE `catalogo_lasagna`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

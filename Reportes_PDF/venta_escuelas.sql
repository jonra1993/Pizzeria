-- phpMyAdmin SQL Dump
-- version 4.4.15.9
-- https://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 19-01-2019 a las 23:41:54
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
-- Estructura de tabla para la tabla `venta_escuelas`
--

CREATE TABLE IF NOT EXISTS `venta_escuelas` (
  `id` int(11) unsigned NOT NULL,
  `qty_masas` int(11) NOT NULL,
  `price` decimal(25,2) NOT NULL,
  `cajaGrande` int(11) NOT NULL,
  `cajaPequena` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `user` varchar(25) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `venta_escuelas`
--

INSERT INTO `venta_escuelas` (`id`, `qty_masas`, `price`, `cajaGrande`, `cajaPequena`, `date`, `user`) VALUES
(1, 5, '18.00', 0, 0, '2019-01-19 14:59:07', ''),
(2, 1, '5.00', 0, 0, '2019-01-19 15:00:38', ''),
(3, 1, '5.00', 0, 0, '2019-01-19 15:05:58', ''),
(4, 5, '5.00', 0, 0, '2019-01-19 15:06:08', ''),
(5, 5, '5.00', 0, 0, '2019-01-19 15:06:34', ''),
(6, 5, '5.00', 0, 0, '2019-01-19 15:07:00', ''),
(7, 5, '5.00', 0, 0, '2019-01-19 15:09:18', ''),
(8, 2, '9.00', 0, 0, '2019-01-19 15:12:30', 'Array'),
(9, 10, '19.20', 0, 0, '2019-01-19 15:13:45', 'Array'),
(10, 10, '80.00', 0, 0, '2019-01-19 15:15:22', ''),
(11, 10, '22.50', 0, 0, '2019-01-19 15:17:11', 'Desarrollador'),
(12, 10, '10.00', 0, 0, '2019-01-19 17:00:39', 'Desarrollador'),
(13, 10, '10.00', 0, 0, '2019-01-19 17:03:19', 'Desarrollador'),
(14, 10, '36.00', 0, 0, '2019-01-19 17:03:30', 'Desarrollador'),
(15, 10, '36.00', 0, 0, '2019-01-19 17:04:08', 'Desarrollador'),
(16, 2, '12.80', 0, 0, '2019-01-19 17:04:20', 'Desarrollador'),
(17, 1, '7.20', 3, 3, '2019-01-19 17:05:09', 'Desarrollador'),
(18, 5, '28.00', 0, 0, '2019-01-19 18:03:36', 'Desarrollador'),
(19, 8, '57.60', 2, 0, '2019-01-19 18:28:25', 'Desarrollador'),
(20, 5, '30.00', 3, 0, '2019-01-19 18:30:29', 'Desarrollador');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `venta_escuelas`
--
ALTER TABLE `venta_escuelas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `venta_escuelas`
--
ALTER TABLE `venta_escuelas`
  MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=21;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

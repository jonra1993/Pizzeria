-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 20-08-2018 a las 21:48:46
-- Versión del servidor: 5.6.37
-- Versión de PHP: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
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
-- Estructura de tabla para la tabla `venta_pizzas`
--

CREATE TABLE `venta_pizzas` (
  `id` int(11) UNSIGNED NOT NULL,
  `qty` int(11) NOT NULL,
  `tam_pizza` varchar(25) NOT NULL,
  `tipo_pizza` varchar(25) NOT NULL,
  `sabor_pizza` varchar(50) NOT NULL,
  `llevar_pizza` varchar(25) NOT NULL,
  `extras` varchar(100) NOT NULL,
  `price` decimal(25,2) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `venta_pizzas`
--

INSERT INTO `venta_pizzas` (`id`, `qty`, `tam_pizza`, `tipo_pizza`, `sabor_pizza`, `llevar_pizza`, `extras`, `price`, `date`) VALUES
(1, 1, 'mediana', 'normal', 'mixta', '', '', '0.00', '2018-08-20 14:27:46'),
(2, 1, 'mediana', 'normal', 'mixta', '', '', '0.00', '2018-08-20 14:32:33'),
(3, 1, 'porcion', 'porcion', 'mixta', '', '', '0.00', '2018-08-20 15:32:14'),
(4, 1, 'porcion', 'porcion', 'mixta', '', '', '0.00', '2018-08-20 16:04:55'),
(5, 1, 'porcion', 'porcion', 'pollo', '', '', '0.00', '2018-08-20 16:06:59'),
(6, 1, 'porcion', 'porcion', 'hawayana', '', '', '0.00', '2018-08-20 16:08:32'),
(7, 1, 'porcion', 'porcion', 'mixta', '', '', '0.00', '2018-08-20 16:17:33'),
(8, 1, 'porcion', 'porcion', 'pollo', '', '', '0.00', '2018-08-20 16:20:17'),
(9, 1, 'porcion', 'porcion', 'mixta', '', '', '0.00', '2018-08-20 16:21:41'),
(10, 1, 'porcion', 'porcion', 'mixta', '', '', '0.00', '2018-08-20 16:23:11'),
(11, 3, 'porcion', 'porcion', 'mixta', '', '', '0.00', '2018-08-20 16:27:54'),
(12, 4, 'porcion', 'porcion', 'hawayana', '', '', '0.00', '2018-08-20 16:41:50');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `venta_pizzas`
--
ALTER TABLE `venta_pizzas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `venta_pizzas`
--
ALTER TABLE `venta_pizzas`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

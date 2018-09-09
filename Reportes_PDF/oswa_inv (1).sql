-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 09-09-2018 a las 03:21:52
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
-- Estructura de tabla para la tabla `catalogo_bebidas`
--

CREATE TABLE `catalogo_bebidas` (
  `id` int(11) NOT NULL,
  `size` varchar(20) NOT NULL,
  `flavor` varchar(20) NOT NULL,
  `price` decimal(25,2) NOT NULL,
  `media_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `catalogo_bebidas`
--

INSERT INTO `catalogo_bebidas` (`id`, `size`, `flavor`, `price`, `media_id`) VALUES
(1, 'vaso', 'fruit', '0.30', 50),
(2, '1/2 litro', 'fruit', '0.50', 51),
(3, '1 +1/2 litro', 'fruit', '1.75', 52),
(4, '3 litro', 'fruit', '2.75', 53),
(5, '1/2 litro', 'coca-cola', '0.75', 56),
(6, '1+1/2 litro', 'coca-cola', '2.00', 55),
(7, '3 litro', 'coca-cola', '3.00', 67),
(8, '1/2 litro', 'pepsi', '0.60', 66),
(9, '1+1/2 litro', 'pepsi', '1.80', 59),
(10, '3 litro', 'pepsi', '2.85', 60),
(11, '850 ml', 'pilsener', '1.75', 61),
(12, '850 ml', 'budweiser', '1.50', 62),
(13, 'vaso', 'jugo', '1.75', 63);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `catalogo_extras`
--

CREATE TABLE `catalogo_extras` (
  `id` int(11) NOT NULL,
  `size` varchar(20) NOT NULL,
  `flavor` varchar(20) NOT NULL,
  `price` decimal(25,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `catalogo_extras`
--

INSERT INTO `catalogo_extras` (`id`, `size`, `flavor`, `price`) VALUES
(1, 'porcion', 'queso', '0.50'),
(2, 'porcion', 'jamon', '0.50'),
(3, 'porcion', 'salami', '0.50'),
(4, 'porcion', 'peperoni', '0.50'),
(5, 'porcion', 'chorizo', '0.50'),
(6, 'porcion', 'carne', '0.50'),
(7, 'porcion', 'pollo', '0.50'),
(8, 'porcion', 'tocino', '0.50'),
(9, 'porcion', 'pina', '0.50'),
(10, 'porcion', 'durazno', '0.50'),
(11, 'porcion', 'manzana', '0.50'),
(12, 'porcion', 'kiwi', '0.50'),
(13, 'porcion', 'choclo', '0.50'),
(14, 'porcion', 'champinones', '0.50'),
(15, 'porcion', 'cebolla', '0.50'),
(16, 'porcion', 'pimiento_verde', '0.50'),
(17, 'porcion', 'pimiento_rojo', '0.50'),
(18, 'mediana', 'queso', '2.00'),
(19, 'mediana', 'jamon', '2.00'),
(20, 'mediana', 'salami', '2.00'),
(21, 'mediana', 'peperoni', '2.00'),
(22, 'mediana', 'chorizo', '2.00'),
(23, 'mediana', 'carne', '2.00'),
(24, 'mediana', 'pollo', '2.00'),
(25, 'mediana', 'tocino', '2.00'),
(26, 'mediana', 'pina', '2.00'),
(27, 'mediana', 'durazno', '2.00'),
(28, 'mediana', 'manzana', '2.00'),
(29, 'mediana', 'kiwi', '2.00'),
(30, 'mediana', 'choclo', '2.00'),
(31, 'mediana', 'champinones', '2.00'),
(32, 'mediana', 'cebolla', '2.00'),
(33, 'mediana', 'pimiento_verde', '2.00'),
(34, 'mediana', 'pimiento_rojo', '2.00'),
(35, 'familiar', 'queso', '3.00'),
(36, 'familiar', 'jamon', '3.00'),
(37, 'familiar', 'salami', '3.00'),
(38, 'familiar', 'peperoni', '3.00'),
(39, 'familiar', 'chorizo', '3.00'),
(40, 'familiar', 'carne', '3.00'),
(41, 'familiar', 'pollo', '3.00'),
(42, 'familiar', 'tocino', '3.00'),
(43, 'familiar', 'pina', '3.00'),
(44, 'familiar', 'durazno', '3.00'),
(45, 'familiar', 'manzana', '3.00'),
(46, 'familiar', 'kiwi', '3.00'),
(47, 'familiar', 'choclo', '3.00'),
(48, 'familiar', 'champinones', '3.00'),
(49, 'familiar', 'cebolla', '3.00'),
(50, 'familiar', 'pimiento_verde', '3.00'),
(51, 'familiar', 'pimiento_rojo', '3.00'),
(52, 'extragrande', 'queso', '4.00'),
(53, 'extragrande', 'jamon', '4.00'),
(54, 'extragrande', 'salami', '4.00'),
(55, 'extragrande', 'peperoni', '4.00'),
(56, 'extragrande', 'chorizo', '4.00'),
(57, 'extragrande', 'carne', '4.00'),
(58, 'extragrande', 'pollo', '4.00'),
(59, 'extragrande', 'tocino', '4.00'),
(60, 'extragrande', 'pina', '4.00'),
(61, 'extragrande', 'durazno', '4.00'),
(62, 'extragrande', 'manzana', '4.00'),
(63, 'extragrande', 'kiwi', '4.00'),
(64, 'extragrande', 'choclo', '4.00'),
(65, 'extragrande', 'champinones', '4.00'),
(66, 'extragrande', 'cebolla', '4.00'),
(67, 'extragrande', 'pimiento_verde', '4.00'),
(68, 'extragrande', 'pimiento_rojo', '4.00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `catalogo_ingredientes`
--

CREATE TABLE `catalogo_ingredientes` (
  `id` int(11) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `price` decimal(25,2) NOT NULL,
  `media_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `catalogo_ingredientes`
--

INSERT INTO `catalogo_ingredientes` (`id`, `nombre`, `price`, `media_id`) VALUES
(1, 'quesoEspecial', '15.00', 68),
(2, 'quesoNormal', '12.00', 69),
(3, 'embutidos', '7.50', 38);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `catalogo_pizzas`
--

CREATE TABLE `catalogo_pizzas` (
  `id` int(11) NOT NULL,
  `size` varchar(20) NOT NULL,
  `type` varchar(20) NOT NULL,
  `flavor` varchar(20) NOT NULL,
  `price` decimal(25,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `catalogo_pizzas`
--

INSERT INTO `catalogo_pizzas` (`id`, `size`, `type`, `flavor`, `price`) VALUES
(1, 'mediana', 'normal', 'mixta', '8.50'),
(2, 'mediana', 'normal', 'carne', '8.50'),
(3, 'mediana', 'normal', 'tocino', '8.50'),
(4, 'mediana', 'normal', 'pollo', '8.50'),
(5, 'mediana', 'normal', 'hawayana', '8.50'),
(6, 'mediana', 'normal', 'napolitana', '8.50'),
(7, 'mediana', 'normal', 'mexicana', '10.00'),
(8, 'mediana', 'normal', 'criolla', '10.00'),
(9, 'mediana', 'normal', 'tropical', '10.00'),
(10, 'mediana', 'normal', 'vegana', '8.50'),
(11, 'mediana', 'normal', 'vegetariana', '8.50'),
(12, 'familiar', 'normal', 'mixta', '13.00'),
(13, 'familiar', 'normal', 'carne', '13.00'),
(14, 'familiar', 'normal', 'tocino', '13.00'),
(15, 'familiar', 'normal', 'pollo', '13.00'),
(16, 'familiar', 'normal', 'hawayana', '13.00'),
(17, 'familiar', 'normal', 'napolitana', '13.00'),
(18, 'familiar', 'normal', 'mexicana', '15.00'),
(19, 'familiar', 'normal', 'criolla', '15.00'),
(20, 'familiar', 'normal', 'tropical', '15.00'),
(21, 'familiar', 'normal', 'vegana', '13.00'),
(22, 'familiar', 'normal', 'vegetariana', '13.00'),
(23, 'extragrande', 'normal', 'mixta', '15.00'),
(24, 'extragrande', 'normal', 'carne', '15.00'),
(25, 'extragrande', 'normal', 'tocino', '15.00'),
(26, 'extragrande', 'normal', 'pollo', '15.00'),
(27, 'extragrande', 'normal', 'hawayana', '15.00'),
(28, 'extragrande', 'normal', 'napolitana', '15.00'),
(29, 'extragrande', 'normal', 'mexicana', '17.00'),
(30, 'extragrande', 'normal', 'criolla', '17.00'),
(31, 'extragrande', 'normal', 'tropical', '17.00'),
(32, 'extragrande', 'normal', 'vegana', '15.00'),
(33, 'extragrande', 'normal', 'vegetariana', '15.00'),
(35, 'mediana', 'especial', 'amangiare', '10.00'),
(36, 'mediana', 'especial', 'tradicionalHawayana', '10.00'),
(37, 'familiar', 'especial', 'amangiare', '15.00'),
(38, 'familiar', 'especial', 'tradicionalHawayana', '15.00'),
(39, 'mediana', 'especial', 'tradicionalPollo', '10.00'),
(40, 'familiar', 'especial', 'tradicionalPollo', '15.00'),
(41, 'extragrande', 'especial', 'tradicionalPollo', '18.00'),
(42, 'mediana', 'especial', 'personalizada', '10.00'),
(43, 'familiar', 'especial', 'personalizada', '15.00'),
(44, 'extragrande', 'especial', 'personalizada', '18.00'),
(45, 'extragrande', 'especial', 'amangiare', '18.00'),
(46, 'extragrande', 'especial', 'tradicionalHawayana', '18.00'),
(47, 'porcion', 'porcion', 'mixta', '1.50'),
(48, 'porcion', 'porcion', 'pollo', '1.50'),
(49, 'porcion', 'porcion', 'champinones', '1.50'),
(50, 'porcion', 'porcion', 'hawayana', '1.50'),
(51, 'xx', 'porcion', 'hawayana', '1.50'),
(52, 'yy', 'porcion', 'hawayana', '1.50'),
(53, 'zz', 'porcion', 'hawayana', '1.50'),
(54, 'kk', 'porcion', 'hawayana', '1.50');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categories`
--

CREATE TABLE `categories` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(60) NOT NULL,
  `media_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `categories`
--

INSERT INTO `categories` (`id`, `name`, `media_id`) VALUES
(2, 'Pizzas', 2),
(3, 'Bebidas', 4),
(4, 'Ingredientes', 19);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contador`
--

CREATE TABLE `contador` (
  `id` int(11) UNSIGNED NOT NULL,
  `conta` int(10) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `contador`
--

INSERT INTO `contador` (`id`, `conta`, `date`) VALUES
(1, 35, '2018-09-08');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `extra_pizzas`
--

CREATE TABLE `extra_pizzas` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(60) NOT NULL,
  `media_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `extra_pizzas`
--

INSERT INTO `extra_pizzas` (`id`, `name`, `media_id`) VALUES
(2, 'Queso', 37),
(3, 'champinones', 39),
(4, 'Embutidos', 38),
(5, 'Durazno', 27),
(6, 'Pina', 12);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `media`
--

CREATE TABLE `media` (
  `id` int(11) UNSIGNED NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `file_type` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `media`
--

INSERT INTO `media` (`id`, `file_name`, `file_type`) VALUES
(2, 'cat_pizza.jpg', 'image/jpeg'),
(4, 'bebidas.png', 'image/png'),
(5, 'pizza_porcion.png', 'image/png'),
(7, 'pizza_familiar.png', 'image/png'),
(9, 'pizza_extragrande.png', 'image/png'),
(10, 'pizza_mediana.png', 'image/png'),
(12, 'tipo_hawayana.png', 'image/png'),
(13, 'tipo_pollo.png', 'image/png'),
(15, 'tipo_mixta.png', 'image/png'),
(16, 'tipo_vegetariana.png', 'image/png'),
(17, 'pizza_especial.png', 'image/png'),
(18, 'pizza_normal.png', 'image/png'),
(19, 'cat_ingredientes.jpg', 'image/jpeg'),
(20, 'ingr_harina.jpg', 'image/jpeg'),
(21, 'ingr_queso.jpg', 'image/jpeg'),
(22, 'ingr_aceite.jpg', 'image/jpeg'),
(23, 'tipo_carne.png', 'image/png'),
(24, 'tipo_criolla.png', 'image/png'),
(25, 'tipo_napol.png', 'image/png'),
(26, 'tipo_tocino.png', 'image/png'),
(27, 'tipo_tropical.png', 'image/png'),
(28, 'extra_ninguno.png', 'image/png'),
(37, 'extra_cheese.png', 'image/png'),
(38, 'extra_embutidos.png', 'image/png'),
(39, 'extra_champi.png', 'image/png'),
(40, 'forma_servirse.png', 'image/png'),
(41, 'forma_llevar.png', 'image/png'),
(42, 'espec_mangiare.png', 'image/png'),
(43, 'espec_trad_pollo.png', 'image/png'),
(44, 'espec_trad_hawa.png', 'image/png'),
(45, 'espec_personalizar.png', 'image/png'),
(48, 's.jpg', 'image/jpeg'),
(49, 'yo.jpg', 'image/jpeg'),
(50, 'beb_vasoSabores.png', 'image/png'),
(51, 'beb_0.5Sabores.png', 'image/png'),
(52, 'beb_1.5Sabores.png', 'image/png'),
(53, 'beb_3Sabores.png', 'image/png'),
(54, 'beb_vasoNegra.png', 'image/png'),
(55, 'beb_1.5Coca.png', 'image/png'),
(56, 'beb_0.5Coca.png', 'image/png'),
(59, 'beb_1.5Pepsi.png', 'image/png'),
(60, 'beb_3Pepsi.png', 'image/png'),
(61, 'beb_pilsener.png', 'image/png'),
(62, 'bebidas_bud.png', 'image/png'),
(63, 'beb_jugo.png', 'image/png'),
(66, 'beb_0.5Pepsi.png', 'image/png'),
(67, 'beb_3Coca.png', 'image/png'),
(68, 'ingre_quesoesp.png', 'image/png'),
(69, 'ingre_quesono.png', 'image/png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productovender`
--

CREATE TABLE `productovender` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `sale_price` decimal(25,2) NOT NULL,
  `categorie_id` int(11) UNSIGNED NOT NULL,
  `media_id` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `productovender`
--

INSERT INTO `productovender` (`id`, `name`, `sale_price`, `categorie_id`, `media_id`) VALUES
(2, 'Pizza Familiar', '13.00', 1, 1),
(3, 'Pizza Mediana ', '9.00', 1, 1),
(5, 'gaseaosa', '3.00', 1, 1),
(6, 'jamon', '5.00', 1, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `products`
--

CREATE TABLE `products` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `quantity` varchar(50) DEFAULT NULL,
  `unidades` varchar(50) NOT NULL,
  `buy_price` decimal(25,2) DEFAULT NULL,
  `sale_price` decimal(25,2) NOT NULL,
  `categorie_id` int(11) UNSIGNED NOT NULL,
  `media_id` int(11) DEFAULT '0',
  `date` datetime NOT NULL,
  `proveedor_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `products`
--

INSERT INTO `products` (`id`, `name`, `quantity`, `unidades`, `buy_price`, `sale_price`, `categorie_id`, `media_id`, `date`, `proveedor_id`) VALUES
(1, 'Harina', '2', 'costal', '25.98', '32.00', 4, 20, '2018-09-03 10:41:26', 1),
(2, 'Queso', '1', 'bloque', '12.00', '15.00', 4, 21, '2018-09-03 10:47:32', 1),
(3, 'Aceite', '1', 'Cajas', '10.00', '18.00', 4, 22, '2018-09-03 10:47:33', 4),
(4, 'dona', '25', 'gr', '5.00', '6.00', 4, 2, '2018-08-16 15:02:00', 1),
(5, 'ricas2', '25', 'gr', '45.00', '50.00', 3, 9, '2018-08-16 15:12:04', 1),
(7, 'celular', '27', 'gr', '12.00', '14.00', 2, 17, '2018-08-16 15:15:44', 1),
(14, 'aaa', '12', 'gr', '12.00', '45.00', 2, 48, '2018-09-03 16:46:00', 1),
(15, 'gghf', '12', '34', '12.00', '45.00', 2, 49, '2018-09-03 16:46:33', 4),
(16, 'dfdff', '45', '78', '12.00', '56.00', 2, 0, '2018-09-03 16:47:17', 1),
(17, 'sds', '23', 'gr', '12.00', '13.00', 2, 0, '2018-09-03 16:47:42', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `products_add_records`
--

CREATE TABLE `products_add_records` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `last_quantity` varchar(20) DEFAULT NULL,
  `new_quantity` varchar(20) NOT NULL,
  `unidades` varchar(50) NOT NULL,
  `buy_price` decimal(25,2) DEFAULT NULL,
  `gasto` decimal(25,2) NOT NULL,
  `date` datetime NOT NULL,
  `username` varchar(20) NOT NULL,
  `proveedor_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `products_add_records`
--

INSERT INTO `products_add_records` (`id`, `name`, `last_quantity`, `new_quantity`, `unidades`, `buy_price`, `gasto`, `date`, `username`, `proveedor_id`) VALUES
(1, 'Harina', '6', '11', 'costal', '25.98', '129.90', '2018-08-28 17:24:03', 'Admin', 1),
(2, 'Queso', '13', '15', 'bloque', '12.00', '24.00', '2018-08-28 17:24:03', 'Admin', 1),
(3, 'Aceite', '5', '7', 'Cajas', '10.00', '20.00', '2018-08-28 17:24:03', 'Admin', 4),
(4, 'Harina', '11', '7', 'costal', '25.98', '-103.92', '2018-08-28 17:24:13', 'Admin', 1),
(5, 'Queso', '15', '2', 'bloque', '12.00', '-156.00', '2018-08-28 17:24:13', 'Admin', 1),
(6, 'Aceite', '7', '2', 'Cajas', '10.00', '-50.00', '2018-08-28 17:24:13', 'Admin', 4),
(7, 'Harina', '7', '1', 'costal', '25.98', '-155.88', '2018-08-28 17:28:31', 'Admin', 1),
(8, 'Queso', '2', '1', 'bloque', '12.00', '-12.00', '2018-08-28 17:28:31', 'Admin', 1),
(9, 'Harina', '1', '1', 'costal', '25.98', '0.00', '2018-09-03 08:26:34', 'Admin', 1),
(10, 'Harina', '1', '4', 'costal', '25.98', '77.94', '2018-09-03 08:29:02', 'Admin', 1),
(11, 'Harina', '4', '5', 'costal', '25.98', '25.98', '2018-09-03 08:29:06', 'Admin', 1),
(12, 'Queso', '1', '5', 'bloque', '12.00', '48.00', '2018-09-03 08:29:12', 'Admin', 1),
(13, 'Aceite', '2', '3', 'Cajas', '10.00', '10.00', '2018-09-03 08:29:19', 'Admin', 4),
(14, 'Harina', '5', '3', 'costal', '25.98', '-51.96', '2018-09-03 08:29:49', 'Admin', 1),
(15, 'Harina', '3', '1', 'costal', '25.98', '-51.96', '2018-09-03 08:29:54', 'Admin', 1),
(16, 'Queso', '5', '3', 'bloque', '12.00', '-24.00', '2018-09-03 08:30:35', 'Admin', 1),
(17, 'Harina', '1', '4', 'costal', '25.98', '77.94', '2018-09-03 08:33:42', 'Admin', 1),
(18, 'Harina', '4', '5', 'costal', '25.98', '25.98', '2018-09-03 08:33:46', 'Admin', 1),
(19, 'Harina', '5', '6', 'costal', '25.98', '25.98', '2018-09-03 09:12:28', 'Admin', 1),
(20, 'Harina', '6', '7', 'costal', '25.98', '25.98', '2018-09-03 09:15:43', 'Admin', 1),
(21, 'Harina', '7', '2', 'costal', '25.98', '-129.90', '2018-09-03 10:41:26', 'Admin', 1),
(22, 'Queso', '3', '1', 'bloque', '12.00', '-24.00', '2018-09-03 10:47:32', 'Admin', 1),
(23, 'Aceite', '3', '1', 'Cajas', '10.00', '-20.00', '2018-09-03 10:47:33', 'Admin', 4),
(24, 'WWW', '0', '12', 'GR', '23.00', '276.00', '0000-00-00 00:00:00', 'Admin', 1),
(25, 'aaaa', '0', '12', 'gr', '34.00', '408.00', '0000-00-00 00:00:00', 'Admin', 1),
(26, 'sss', '0', '23', 'gr', '12.00', '276.00', '0000-00-00 00:00:00', 'Admin', 1),
(27, 'xxxa', '0', '12', 'cm', '12.00', '144.00', '0000-00-00 00:00:00', 'Admin', 1),
(28, 'erew', '0', '12', '34', '12.00', '144.00', '0000-00-00 00:00:00', 'Admin', 1),
(29, 'aaa', '0', '12', 'gr', '12.00', '144.00', '0000-00-00 00:00:00', 'Admin', 1),
(30, 'gghf', '0', '12', '34', '12.00', '144.00', '0000-00-00 00:00:00', 'Admin', 4),
(31, 'dfdff', '0', '45', '78', '12.00', '540.00', '0000-00-00 00:00:00', 'Admin', 1),
(32, 'sds', '0', '23', 'gr', '12.00', '276.00', '0000-00-00 00:00:00', 'Admin', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedores`
--

CREATE TABLE `proveedores` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(20) NOT NULL,
  `address` varchar(20) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `cellphone` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `proveedores`
--

INSERT INTO `proveedores` (`id`, `name`, `address`, `phone`, `cellphone`) VALUES
(1, 'Firmesa', 'H street and E stree', '3442096', '979191234'),
(4, 'Cuda', 'EEuuu', '0934455559', '098771771');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sales`
--

CREATE TABLE `sales` (
  `id` int(11) UNSIGNED NOT NULL,
  `product_id` int(11) UNSIGNED NOT NULL,
  `qty` int(11) NOT NULL,
  `price` decimal(25,2) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tabla_aperturas_cajas`
--

CREATE TABLE `tabla_aperturas_cajas` (
  `id` int(11) UNSIGNED NOT NULL,
  `dinero_apertura` decimal(25,2) NOT NULL,
  `date` datetime NOT NULL,
  `username` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tabla_aperturas_cajas`
--

INSERT INTO `tabla_aperturas_cajas` (`id`, `dinero_apertura`, `date`, `username`) VALUES
(1, '80.00', '2018-08-16 14:24:03', 'Admin'),
(2, '98.00', '2018-08-17 10:32:58', 'Admin'),
(3, '100.00', '2018-08-17 14:39:49', 'Admin'),
(4, '1.00', '2018-08-20 11:47:36', 'Admin'),
(5, '1.01', '2018-08-20 11:55:28', 'Admin'),
(6, '20.00', '2018-08-20 12:13:39', 'Admin'),
(7, '50.00', '2018-08-20 12:17:27', 'Admin'),
(8, '50.00', '2018-08-20 16:32:46', 'Admin'),
(9, '1.00', '2018-08-20 16:33:34', 'Admin'),
(10, '35.00', '2018-08-21 23:37:42', 'Admin'),
(11, '90.00', '2018-08-28 10:25:23', 'Admin'),
(12, '0.00', '2018-08-28 14:46:39', 'Admin'),
(13, '23.00', '2018-08-28 15:04:31', 'Admin'),
(14, '90.00', '2018-08-30 17:56:41', 'Admin'),
(15, '89.00', '2018-08-30 18:14:31', 'Admin'),
(16, '90.00', '2018-09-03 09:17:31', 'Admin');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tabla_cierres_cajas`
--

CREATE TABLE `tabla_cierres_cajas` (
  `id` int(11) UNSIGNED NOT NULL,
  `dinero_apertura` decimal(25,2) NOT NULL,
  `cobros_en_caja` decimal(25,2) NOT NULL,
  `cobros_con_tarjeta` decimal(25,2) NOT NULL,
  `total_ventas` decimal(25,2) NOT NULL,
  `autoconsumo` decimal(25,2) NOT NULL,
  `ingreso_efectivo_en_caja` decimal(25,2) NOT NULL,
  `retiro_efectivo_en_caja` decimal(25,2) NOT NULL,
  `dinero_a_entregar` decimal(25,2) NOT NULL,
  `dinero_entregado` decimal(25,2) NOT NULL,
  `saldo` decimal(25,2) NOT NULL,
  `date` datetime NOT NULL,
  `username` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tabla_cierres_cajas`
--

INSERT INTO `tabla_cierres_cajas` (`id`, `dinero_apertura`, `cobros_en_caja`, `cobros_con_tarjeta`, `total_ventas`, `autoconsumo`, `ingreso_efectivo_en_caja`, `retiro_efectivo_en_caja`, `dinero_a_entregar`, `dinero_entregado`, `saldo`, `date`, `username`) VALUES
(1, '80.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '80.00', '107.00', '27.00', '2018-08-16 14:24:45', 'Admin'),
(2, '98.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '98.00', '0.00', '-98.00', '2018-08-17 14:35:28', 'Admin'),
(3, '100.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '100.00', '0.00', '-100.00', '2018-08-20 11:45:26', 'Admin'),
(4, '1.00', '0.00', '0.00', '0.00', '0.00', '40.00', '21.81', '19.19', '20.00', '0.81', '2018-08-20 11:50:59', 'Admin'),
(5, '1.01', '0.00', '0.00', '0.00', '0.00', '40.00', '21.81', '19.20', '0.00', '-19.20', '2018-08-20 11:56:16', 'Admin'),
(6, '20.00', '0.00', '0.00', '0.00', '0.00', '20.00', '10.00', '30.00', '0.00', '-30.00', '2018-08-20 12:16:22', 'Admin'),
(7, '50.00', '0.00', '0.00', '0.00', '0.00', '20.00', '10.00', '60.00', '100.00', '40.00', '2018-08-20 16:32:34', 'Admin'),
(8, '50.00', '0.00', '0.00', '0.00', '0.00', '0.00', '10.00', '40.00', '60.00', '20.00', '2018-08-20 16:33:21', 'Admin'),
(9, '1.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '1.00', '100.00', '99.00', '2018-08-21 23:37:18', 'Admin'),
(10, '35.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '35.00', '103.00', '68.00', '2018-08-21 23:38:33', 'Admin'),
(11, '90.00', '0.00', '0.00', '0.00', '0.00', '20.00', '10.00', '100.00', '100.00', '0.00', '2018-08-28 10:25:51', 'Admin'),
(12, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '40.01', '40.01', '2018-08-28 14:46:53', 'Admin'),
(13, '23.00', '0.00', '0.00', '0.00', '0.00', '24.45', '67.89', '-20.44', '500.00', '520.44', '2018-08-28 15:05:20', 'Admin'),
(14, '90.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '90.00', '300.00', '210.00', '2018-08-30 17:56:57', 'Admin'),
(15, '89.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '89.00', '100.00', '11.00', '2018-08-30 18:14:45', 'Admin'),
(16, '90.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '90.00', '100.00', '10.00', '2018-09-03 09:20:19', 'Admin');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tabla_ingresos_retiros_cajas`
--

CREATE TABLE `tabla_ingresos_retiros_cajas` (
  `id` int(11) UNSIGNED NOT NULL,
  `importe` decimal(25,2) NOT NULL,
  `date` datetime NOT NULL,
  `username` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tam_pizzas`
--

CREATE TABLE `tam_pizzas` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(60) NOT NULL,
  `media_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tam_pizzas`
--

INSERT INTO `tam_pizzas` (`id`, `name`, `media_id`) VALUES
(1, 'porcion', 5),
(2, 'mediana', 10),
(3, 'familiar', 7),
(4, 'extragrande', 9);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_esp_pizzas`
--

CREATE TABLE `tipo_esp_pizzas` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(60) NOT NULL,
  `tipo_descrip` varchar(100) NOT NULL,
  `media_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tipo_esp_pizzas`
--

INSERT INTO `tipo_esp_pizzas` (`id`, `name`, `tipo_descrip`, `media_id`) VALUES
(1, 'amangiare', '1/4 Mixta, 1/4 hawayana, 1/4 pollo + champinones, 1/4 tocino + champinones ', 42),
(2, 'tradicionalPollo', '1/2 mixta, 1/2 pollo + champinones', 43),
(3, 'tradicionalHawayana', '1/2 mixta, 1/2 hawayana', 44),
(4, 'personalizada', 'Elige tus propios ingredientes', 45);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_pizzas`
--

CREATE TABLE `tipo_pizzas` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(60) NOT NULL,
  `tipo_descrip` varchar(100) NOT NULL,
  `media_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tipo_pizzas`
--

INSERT INTO `tipo_pizzas` (`id`, `name`, `tipo_descrip`, `media_id`) VALUES
(1, 'mixta', 'Salsa, Queso, Jamon, Salami, Peperoni', 15),
(2, 'hawayana', 'Salsa, Queso, Pina, Jamon', 12),
(3, 'pollo', 'Salsa, Queso, Pollo, Champinones', 13),
(4, 'vegetariana', 'Salsa, Queso, Tomate, Cebolla, Pimientos, Champi', 16),
(5, 'carne', 'Salsa, Queso, Carne, Champi', 23),
(6, 'tocino', 'Salsa, Queso, Tocino, Champi', 26),
(7, 'napolitana', 'Salsa, Queso, Salami, Tomate, Cebolla, Pimiento', 25),
(8, 'criolla', 'Salsa, Queso, Tocino, Choclo, Carne', 24),
(9, 'tropical ', 'Salsa, Queso, Pina, Durazno', 27);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(60) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_level` int(11) NOT NULL,
  `image` varchar(255) DEFAULT 'no_image.jpg',
  `status` int(1) NOT NULL,
  `last_login` datetime DEFAULT NULL,
  `bloqueocaja` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `password`, `user_level`, `image`, `status`, `last_login`, `bloqueocaja`) VALUES
(1, 'Jonathan', 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 1, 'pzg9wa7o1.jpg', 1, '2018-09-08 21:57:02', 0),
(2, 'Special User', 'special', 'ba36b97a41e7faf742ab09bf88405ac04f99599a', 2, 'no_image.jpg', 1, '2017-06-16 07:11:26', 0),
(3, 'Default User', 'user', '12dea96fec20593566ab75692c9949596833adc9', 3, 'no_image.jpg', 1, '2017-06-16 07:11:03', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user_groups`
--

CREATE TABLE `user_groups` (
  `id` int(11) NOT NULL,
  `group_name` varchar(150) NOT NULL,
  `group_level` int(11) NOT NULL,
  `group_status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `user_groups`
--

INSERT INTO `user_groups` (`id`, `group_name`, `group_level`, `group_status`) VALUES
(1, 'Administrador', 1, 1),
(2, 'Vendedor Autorizado', 2, 1),
(3, 'Vendedor', 3, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `venta_bebidas`
--

CREATE TABLE `venta_bebidas` (
  `id` int(11) UNSIGNED NOT NULL,
  `qty` int(11) NOT NULL,
  `tam_bebida` varchar(25) NOT NULL,
  `sabor_bebida` varchar(50) NOT NULL,
  `price` decimal(25,2) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `venta_ingredientes`
--

CREATE TABLE `venta_ingredientes` (
  `id` int(11) UNSIGNED NOT NULL,
  `qty` int(11) NOT NULL,
  `nombre_ingre` varchar(25) NOT NULL,
  `price` decimal(25,2) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
(1, 1, 'mediana', 'normal', 'hawayana', '0', '', '0.00', '2018-08-22 17:15:17'),
(2, 1, 'mediana', 'especial', 'personalizada', '0', '', '0.00', '2018-08-27 21:30:10'),
(3, 2, 'mediana', 'normal', 'pollo', 'llevar', '0', '17.00', '2018-08-27 21:38:01');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `catalogo_bebidas`
--
ALTER TABLE `catalogo_bebidas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `catalogo_extras`
--
ALTER TABLE `catalogo_extras`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `catalogo_ingredientes`
--
ALTER TABLE `catalogo_ingredientes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indices de la tabla `contador`
--
ALTER TABLE `contador`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `extra_pizzas`
--
ALTER TABLE `extra_pizzas`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indices de la tabla `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- Indices de la tabla `productovender`
--
ALTER TABLE `productovender`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`),
  ADD KEY `categorie_id` (`categorie_id`),
  ADD KEY `media_id` (`media_id`);

--
-- Indices de la tabla `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`),
  ADD KEY `categorie_id` (`categorie_id`),
  ADD KEY `media_id` (`media_id`);

--
-- Indices de la tabla `products_add_records`
--
ALTER TABLE `products_add_records`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indices de la tabla `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indices de la tabla `tabla_aperturas_cajas`
--
ALTER TABLE `tabla_aperturas_cajas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tabla_cierres_cajas`
--
ALTER TABLE `tabla_cierres_cajas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tabla_ingresos_retiros_cajas`
--
ALTER TABLE `tabla_ingresos_retiros_cajas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tam_pizzas`
--
ALTER TABLE `tam_pizzas`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indices de la tabla `tipo_esp_pizzas`
--
ALTER TABLE `tipo_esp_pizzas`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indices de la tabla `tipo_pizzas`
--
ALTER TABLE `tipo_pizzas`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `user_level` (`user_level`);

--
-- Indices de la tabla `user_groups`
--
ALTER TABLE `user_groups`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `group_level` (`group_level`);

--
-- Indices de la tabla `venta_bebidas`
--
ALTER TABLE `venta_bebidas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `venta_ingredientes`
--
ALTER TABLE `venta_ingredientes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `venta_pizzas`
--
ALTER TABLE `venta_pizzas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `catalogo_bebidas`
--
ALTER TABLE `catalogo_bebidas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `catalogo_extras`
--
ALTER TABLE `catalogo_extras`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT de la tabla `catalogo_ingredientes`
--
ALTER TABLE `catalogo_ingredientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `contador`
--
ALTER TABLE `contador`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `extra_pizzas`
--
ALTER TABLE `extra_pizzas`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `media`
--
ALTER TABLE `media`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT de la tabla `productovender`
--
ALTER TABLE `productovender`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `products_add_records`
--
ALTER TABLE `products_add_records`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `sales`
--
ALTER TABLE `sales`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tabla_aperturas_cajas`
--
ALTER TABLE `tabla_aperturas_cajas`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `tabla_cierres_cajas`
--
ALTER TABLE `tabla_cierres_cajas`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `tabla_ingresos_retiros_cajas`
--
ALTER TABLE `tabla_ingresos_retiros_cajas`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tam_pizzas`
--
ALTER TABLE `tam_pizzas`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `tipo_esp_pizzas`
--
ALTER TABLE `tipo_esp_pizzas`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `tipo_pizzas`
--
ALTER TABLE `tipo_pizzas`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `user_groups`
--
ALTER TABLE `user_groups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `venta_bebidas`
--
ALTER TABLE `venta_bebidas`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `venta_ingredientes`
--
ALTER TABLE `venta_ingredientes`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `venta_pizzas`
--
ALTER TABLE `venta_pizzas`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `FK_products` FOREIGN KEY (`categorie_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `sales`
--
ALTER TABLE `sales`
  ADD CONSTRAINT `SK` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `FK_user` FOREIGN KEY (`user_level`) REFERENCES `user_groups` (`group_level`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

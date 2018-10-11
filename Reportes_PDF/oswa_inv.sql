-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 11-10-2018 a las 03:58:30
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
-- Estructura de tabla para la tabla `autoconsumo_bebidas`
--

CREATE TABLE `autoconsumo_bebidas` (
  `id` int(11) UNSIGNED NOT NULL,
  `qty` int(11) NOT NULL,
  `tam_bebida` varchar(25) NOT NULL,
  `sabor_bebida` varchar(50) NOT NULL,
  `price` decimal(25,2) NOT NULL,
  `date` datetime NOT NULL,
  `user` varchar(25) NOT NULL,
  `forma_pago` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `autoconsumo_pizzas`
--

CREATE TABLE `autoconsumo_pizzas` (
  `id` int(11) UNSIGNED NOT NULL,
  `qty` int(11) NOT NULL,
  `tam_pizza` varchar(25) NOT NULL,
  `tipo_pizza` varchar(25) NOT NULL,
  `sabor_pizza` varchar(50) NOT NULL,
  `llevar_pizza` varchar(25) NOT NULL,
  `extras` varchar(100) NOT NULL,
  `price` decimal(25,2) NOT NULL,
  `forma_pago` varchar(25) NOT NULL,
  `date` datetime NOT NULL,
  `user` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `autoconsumo_pizzas`
--

INSERT INTO `autoconsumo_pizzas` (`id`, `qty`, `tam_pizza`, `tipo_pizza`, `sabor_pizza`, `llevar_pizza`, `extras`, `price`, `forma_pago`, `date`, `user`) VALUES
(1, 1, 'familiar', 'especial', 'tradicionalPollo', 'llevar', '', '15.00', 'efectivo', '2018-09-16 18:09:50', ''),
(2, 1, 'extragrande', 'normal', 'mixta', 'llevar', '', '15.00', 'efectivo', '2018-09-16 18:09:50', ''),
(3, 1, 'mediana', 'normal', 'hawayana', 'llevar', 'queso,', '8.50', 'tarjeta', '2018-09-16 18:10:15', ''),
(4, 1, 'familiar', 'especial', 'tradicionalHawayana', 'llevar', 'queso,champinones,embutidos,durazno,pina,', '15.00', 'efectivo', '2018-09-16 18:16:07', ''),
(5, 1, 'extragrande', 'especial', 'tradicionalHawayana', 'llevar', '', '18.00', 'efectivo', '2018-09-16 18:31:10', ''),
(6, 1, 'familiar', 'normal', 'pollo', 'llevar', 'champinones,embutidos,durazno,', '13.00', 'efectivo', '2018-09-16 18:50:59', ''),
(7, 1, 'familiar', 'normal', 'hawayana', 'llevar', 'champinones,pina,queso', '13.00', 'efectivo', '2018-09-16 20:31:34', ''),
(8, 1, 'mediana', 'normal', 'pollo', 'servirse', 'champinones,embutidos,pina', '8.50', 'efectivo', '2018-09-16 20:33:13', ''),
(9, 1, 'extragrande', 'normal', 'napolitana', 'llevar', 'champinones,pina,durazno', '15.00', 'efectivo', '2018-09-16 20:35:30', '');

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
(3, '1.5 litro', 'fruit', '1.75', 52),
(4, '3 litro', 'fruit', '2.75', 53),
(5, '1/2 litro', 'coca-cola', '0.75', 56),
(6, '1.5 litro', 'coca-cola', '2.00', 55),
(7, '3 litro', 'coca-cola', '3.00', 67),
(8, '1/2 litro', 'pepsi', '0.60', 66),
(9, '1.5 litro', 'pepsi', '1.80', 59),
(10, '3 litro', 'pepsi', '2.85', 60),
(11, '850 ml', 'pilsener', '1.75', 61),
(12, '850 ml', 'budweiser', '1.50', 62),
(13, 'vaso', 'jugo', '1.75', 63),
(14, 'taza', 'cafe', '0.50', 85),
(15, 'taza', 'agua aromatica', '0.50', 84);

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
(51, 'porcion', 'porcion', 'vegetariana', '1.50');

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
(4, 'Ingredientes', 19),
(5, 'Cajas Pizza', 87);

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
(1, 0, '2018-10-10');

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
(2, 'queso', 37),
(3, 'champinones', 39),
(4, 'embutidos', 38),
(5, 'durazno', 27),
(6, 'pina', 12);

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
(69, 'ingre_quesono.png', 'image/png'),
(70, 'ingr_tocino.jpg', 'image/jpeg'),
(71, 'ing_mortadela.jpg', 'image/jpeg'),
(72, 'ingr_aceite.png', 'image/png'),
(73, 'ingr_carne.jpg', 'image/jpeg'),
(74, 'ingr_champinones.jpg', 'image/jpeg'),
(75, 'ingr_durazno.jpg', 'image/jpeg'),
(76, 'ingr_jamon.PNG', 'image/png'),
(77, 'ingr_levadura.jpg', 'image/jpeg'),
(78, 'ingr_peperoni.jpg', 'image/jpeg'),
(79, 'ingr_piÃ±a.jpg', 'image/jpeg'),
(80, 'ingr_pollo.jpg', 'image/jpeg'),
(81, 'ingr_salami.jpg', 'image/jpeg'),
(82, 'ingr_salsa.jpg', 'image/jpeg'),
(83, 'sabor_mexicana1.png', 'image/png'),
(84, 'taza_aromatica1.png', 'image/png'),
(85, 'taza_cafe1.png', 'image/png'),
(86, 'masas.jpg', 'image/jpeg'),
(87, 'cat_cajaPizza.jpg', 'image/jpeg'),
(88, 'cajaPizza_grande.png', 'image/png'),
(89, 'cajaPizza_mediana.png', 'image/png');

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
  `categorie_id` int(11) UNSIGNED NOT NULL,
  `media_id` int(11) DEFAULT '0',
  `date` datetime NOT NULL,
  `proveedor_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `products`
--

INSERT INTO `products` (`id`, `name`, `quantity`, `unidades`, `buy_price`, `categorie_id`, `media_id`, `date`, `proveedor_id`) VALUES
(1, 'Masas', '3', 'Unidad', '0.00', 2, 86, '2018-09-23 17:15:16', 0),
(2, 'Cajas Grandes', '3', 'Unidad', '0.00', 2, 88, '2018-09-23 17:15:16', 0),
(3, 'Cajas Medianas', '3', 'Unidad', '0.00', 2, 89, '2018-09-23 17:15:16', 0),
(19, 'Harina', '1', 'Kg', '0.70', 4, 20, '2018-09-14 20:20:21', 1),
(20, 'Queso', '11', 'Kg', '4.20', 4, 21, '2018-09-14 20:19:38', 1),
(21, 'JamÃ³n', '13', 'Kg', '5.50', 4, 76, '2018-09-14 20:19:38', 7),
(22, 'Mortadela', '6', 'Kg', '3.12', 4, 71, '2018-09-14 20:19:38', 9),
(23, 'Salami', '9', 'Kg', '5.50', 4, 81, '2018-09-14 20:19:38', 7),
(24, 'Peperoni', '10', 'Kg', '5.50', 4, 78, '2018-09-14 20:19:38', 7),
(25, 'Salsa', '5', 'Balde', '2.00', 4, 82, '2018-09-14 20:19:39', 9),
(26, 'PiÃ±a', '5', 'Unidad', '1.50', 4, 79, '2018-09-14 20:19:39', 10),
(27, 'Durazno', '6', 'latas', '2.60', 4, 75, '2018-09-14 20:19:39', 9),
(28, 'Pollo', '4', 'Unidad', '5.00', 4, 80, '2018-09-14 20:19:39', 12),
(29, 'ChampiÃ±ones', '11', 'Kg', '6.15', 4, 74, '2018-09-14 20:19:39', 4),
(30, 'Carne', '7', 'Kg', '5.60', 4, 73, '2018-09-14 20:19:39', 11),
(31, 'Tocino', '9', 'Kg', '9.50', 4, 70, '2018-09-14 20:19:39', 13),
(32, 'Aceite', '6', 'Litro', '1.39', 4, 72, '2018-09-14 20:18:29', 14),
(33, 'Levadura', '4', 'Kg', '6.50', 4, 77, '2018-09-14 20:20:01', 5);

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
(1, 'Harina', '0', '1', 'Kg', '35.00', '35.00', '0000-00-00 00:00:00', 'Admin', 1),
(2, 'Harina', '0', '1', 'Kg', '0.70', '0.70', '0000-00-00 00:00:00', 'Admin', 1),
(3, 'Queso', '0', '1', 'Kg', '4.20', '4.20', '0000-00-00 00:00:00', 'Admin', 1),
(4, 'JamÃ³n', '0', '1', 'Kg', '5.50', '5.50', '0000-00-00 00:00:00', 'Admin', 1),
(5, 'Mortadela', '0', '1', 'Kg', '3.12', '3.12', '0000-00-00 00:00:00', 'Admin', 1),
(6, 'Salami', '0', '1', 'Kg', '5.50', '5.50', '0000-00-00 00:00:00', 'Admin', 1),
(7, 'Peperoni', '0', '1', 'Kg', '5.50', '5.50', '0000-00-00 00:00:00', 'Admin', 1),
(8, 'Salsa', '0', '1', 'Balde', '2.00', '2.00', '0000-00-00 00:00:00', 'Admin', 1),
(9, 'PiÃ±a', '0', '1', 'Unidad', '1.50', '1.50', '0000-00-00 00:00:00', 'Admin', 1),
(10, 'Durazno', '0', '1', 'latas', '2.60', '2.60', '0000-00-00 00:00:00', 'Admin', 1),
(11, 'Pollo', '0', '1', 'Unidades', '5.00', '5.00', '0000-00-00 00:00:00', 'Admin', 1),
(12, 'ChampiÃ±ones', '0', '1', 'Kg', '6.15', '6.15', '0000-00-00 00:00:00', 'Admin', 1),
(13, 'Carne', '0', '1', 'Kg', '5.60', '5.60', '0000-00-00 00:00:00', 'Admin', 1),
(14, 'Tocino', '0', '1', 'Kg', '9.50', '9.50', '0000-00-00 00:00:00', 'Admin', 1),
(15, 'Aceite', '0', '1', 'litro', '1.38', '1.38', '0000-00-00 00:00:00', 'Admin', 1),
(16, 'Levadura', '0', '1', 'Kg', '6.50', '6.50', '0000-00-00 00:00:00', 'Admin', 1),
(17, 'Harina', '1', '2', 'Kg', '0.70', '0.70', '2018-09-11 18:31:30', 'Admin', 1),
(18, 'Harina', '2', '52', 'Kg', '0.70', '35.00', '2018-09-14 19:41:05', 'Admin', 1),
(19, 'Harina', '52', '1', 'Kg', '0.70', '-35.70', '2018-09-14 19:42:15', 'Admin', 1),
(20, 'Harina', '1', '51', 'Kg', '0.70', '35.00', '2018-09-14 19:42:56', 'Admin', 1),
(21, 'Aceite', '1', '6', 'Litro', '1.39', '6.95', '2018-09-14 20:18:29', 'Admin', 1),
(22, 'Queso', '1', '11', 'Kg', '4.20', '42.00', '2018-09-14 20:19:38', 'Admin', 1),
(23, 'JamÃ³n', '1', '13', 'Kg', '5.50', '66.00', '2018-09-14 20:19:38', 'Admin', 1),
(24, 'Mortadela', '1', '6', 'Kg', '3.12', '15.60', '2018-09-14 20:19:38', 'Admin', 1),
(25, 'Salami', '1', '9', 'Kg', '5.50', '44.00', '2018-09-14 20:19:38', 'Admin', 1),
(26, 'Peperoni', '1', '10', 'Kg', '5.50', '49.50', '2018-09-14 20:19:38', 'Admin', 1),
(27, 'Salsa', '1', '5', 'Balde', '2.00', '8.00', '2018-09-14 20:19:39', 'Admin', 1),
(28, 'PiÃ±a', '1', '5', 'Unidad', '1.50', '6.00', '2018-09-14 20:19:39', 'Admin', 1),
(29, 'Durazno', '1', '6', 'latas', '2.60', '13.00', '2018-09-14 20:19:39', 'Admin', 1),
(30, 'Pollo', '1', '4', 'Unidad', '5.00', '15.00', '2018-09-14 20:19:39', 'Admin', 1),
(31, 'ChampiÃ±ones', '1', '11', 'Kg', '6.15', '61.50', '2018-09-14 20:19:39', 'Admin', 1),
(32, 'Carne', '1', '7', 'Kg', '5.60', '33.60', '2018-09-14 20:19:39', 'Admin', 1),
(33, 'Tocino', '1', '9', 'Kg', '9.50', '76.00', '2018-09-14 20:19:39', 'Admin', 1),
(34, 'Levadura', '1', '4', 'Kg', '6.50', '19.50', '2018-09-14 20:20:01', 'Admin', 1),
(35, 'Harina', '51', '1', 'Kg', '0.70', '-35.00', '2018-09-14 20:20:21', 'Admin', 1),
(36, 'Masas', '0', '1', 'Unidad', '10.00', '10.00', '0000-00-00 00:00:00', 'Admin', 1),
(37, 'dasda', '0', '12', 'Kg', '12.00', '144.00', '0000-00-00 00:00:00', 'Admin', 10),
(38, 'wdwedew', '0', '12', 'gr', '34.00', '408.00', '0000-00-00 00:00:00', 'Admin', 10);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `products_aproximados`
--

CREATE TABLE `products_aproximados` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `quantity` varchar(50) DEFAULT NULL,
  `unidades` varchar(50) NOT NULL,
  `categorie_id` int(11) UNSIGNED NOT NULL,
  `date` datetime NOT NULL,
  `proveedor_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `products_aproximados`
--

INSERT INTO `products_aproximados` (`id`, `name`, `quantity`, `unidades`, `categorie_id`, `date`, `proveedor_id`) VALUES
(1, 'Masas', '0', 'Unidad', 2, '2018-10-10 22:56:26', 0),
(19, 'Harina', '0.00', 'Kg', 4, '2018-10-10 22:56:26', 1),
(20, 'Queso', '0.00', 'Kg', 4, '2018-10-10 22:56:26', 1),
(21, 'JamÃ³n', '0.00', 'Kg', 4, '2018-10-10 22:56:26', 7),
(22, 'Mortadela', '0.00', 'Kg', 4, '2018-10-10 22:56:26', 9),
(23, 'Salami', '0.00', 'Kg', 4, '2018-10-10 22:56:26', 7),
(24, 'Peperoni', '0.00', 'Kg', 4, '2018-10-10 22:56:26', 7),
(25, 'Salsa', '0.00', 'Balde', 4, '2018-10-10 22:56:26', 9),
(26, 'PiÃ±a', '0.00', 'Unidad', 4, '2018-10-10 22:56:26', 10),
(27, 'Durazno', '0.00', 'latas', 4, '2018-10-10 22:56:26', 9),
(28, 'Pollo', '0.00', 'Unidad', 4, '2018-10-10 22:56:26', 12),
(29, 'ChampiÃ±ones', '0.00', 'Kg', 4, '2018-10-10 22:56:26', 4),
(30, 'Carne', '0.00', 'Kg', 4, '2018-10-10 22:56:26', 11),
(31, 'Tocino', '0.00', 'Kg', 4, '2018-10-10 22:56:26', 13),
(32, 'Aceite', '0.00', 'Litro', 4, '2018-10-10 22:56:26', 14),
(33, 'Levadura', '0.00', 'Kg', 4, '2018-10-10 22:56:26', 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedores`
--

CREATE TABLE `proveedores` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(20) NOT NULL,
  `address` varchar(150) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `cellphone` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `proveedores`
--

INSERT INTO `proveedores` (`id`, `name`, `address`, `phone`, `cellphone`) VALUES
(1, 'Royal', 'San Luis SN e Irriti Km 5 via Amaguaña', '022093264', '0979298629'),
(4, 'Green Garden', 'Av. San Juan de Dios Lote 22', '022864172', '0992312300'),
(5, 'Levapan ', 'Av. Maldonado S28-35 Guajalo', '022677010', '-'),
(6, 'Sr Rigoberto', 'La Kenedy', '-', '0996441753'),
(7, 'Sr Fuertes', 'Fajardo, Santa Isabel', '-', '0999709242'),
(9, 'Sr Carlos Vaca', 'Isla Marchena 1022 y Gomez Polanco', '-', '0999709242'),
(10, 'Maria', 'Conocoto', '-', '-'),
(11, 'Carniceria', 'Conocoto', '-', '-'),
(12, 'Srta Flores', 'Conocoto, Pollos', '-', '0999780932'),
(13, 'Casa Guillo', '-', '-', '-'),
(14, 'Industrial Danec', 'Via a Tambillo Km 1 1/2 Av. General Enriquez SN y via Amaguana', '022330301', '0981886798');

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
(1, '100.00', '2018-09-16 14:28:07', 'Admin'),
(2, '12.00', '2018-09-16 14:53:16', 'Admin'),
(3, '20.00', '2018-09-16 17:25:36', 'Admin'),
(4, '50.00', '2018-09-16 17:50:59', 'Admin'),
(5, '20.00', '2018-09-16 17:59:30', 'Admin'),
(6, '20.00', '2018-09-16 18:08:52', 'Admin'),
(7, '12.00', '2018-09-27 10:24:10', 'Admin');

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
(1, '100.00', '45.75', '27.25', '73.00', '0.00', '0.00', '0.00', '145.75', '150.00', '4.25', '2018-09-16 14:53:08', 'Admin'),
(2, '12.00', '11.50', '20.25', '31.75', '0.00', '0.00', '0.00', '23.50', '23.50', '0.00', '2018-09-16 14:55:26', 'Admin'),
(3, '20.00', '13.00', '14.00', '27.00', '0.00', '30.00', '40.00', '23.00', '50.00', '27.00', '2018-09-16 17:48:42', 'Admin'),
(4, '50.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '50.00', '0.00', '-50.00', '2018-09-16 17:58:40', 'Admin'),
(5, '20.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '20.00', '0.00', '-20.00', '2018-09-16 18:07:14', 'Admin'),
(6, '20.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '20.00', '0.00', '-20.00', '2018-09-27 10:24:04', 'Admin');

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

--
-- Volcado de datos para la tabla `tabla_ingresos_retiros_cajas`
--

INSERT INTO `tabla_ingresos_retiros_cajas` (`id`, `importe`, `date`, `username`) VALUES
(1, '78.00', '2018-09-28 17:50:41', 'Admin'),
(2, '-56.00', '2018-09-28 17:50:49', 'Admin'),
(3, '100.00', '2018-09-28 17:51:43', 'Admin'),
(4, '87.00', '2018-09-28 18:43:06', 'Admin'),
(5, '20.00', '2018-10-01 22:10:31', 'Admin'),
(6, '-10.00', '2018-10-01 22:12:05', 'Admin');

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
(9, 'tropical ', 'Salsa, Queso, Pina, Durazno', 27),
(10, 'mexicana', 'Salsa, Queso, Peperoni, Carne, Pimientos, Aji', 83);

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
  `bloqueocaja` tinyint(1) NOT NULL,
  `clave_caja` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `password`, `user_level`, `image`, `status`, `last_login`, `bloqueocaja`, `clave_caja`) VALUES
(1, 'Jonathan', 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 1, 'pzg9wa7o1.jpg', 1, '2018-10-10 22:55:20', 1, 'd8c7468774962290ed594c33e79c2c219b2c2f42'),
(2, 'Special User', 'special', 'ba36b97a41e7faf742ab09bf88405ac04f99599a', 2, 'no_image.jpg', 1, '2017-06-16 07:11:26', 0, ''),
(3, 'Default User', 'user', '12dea96fec20593566ab75692c9949596833adc9', 3, 'no_image.jpg', 1, '2017-06-16 07:11:03', 0, ''),
(4, 'prueba1', 'prueba1', '096459e93f20a2b39ab6c5ddd493e44f58bc3a91', 1, 'no_image.jpg', 1, NULL, 0, '096459e93f20a2b39ab6c5ddd493e44f58bc3a91');

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
  `sabor_bebida` varchar(25) NOT NULL,
  `price` decimal(25,2) NOT NULL,
  `date` datetime NOT NULL,
  `user` varchar(25) NOT NULL,
  `forma_pago` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `venta_bebidas`
--

INSERT INTO `venta_bebidas` (`id`, `qty`, `tam_bebida`, `sabor_bebida`, `price`, `date`, `user`, `forma_pago`) VALUES
(1, 2, '1/2 litro', 'fruit', '1.00', '2018-10-01 23:24:07', 'admin', 'efectivo'),
(2, 1, '3 litro', 'coca-cola', '3.00', '2018-10-01 23:24:07', 'admin', 'efectivo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `venta_general`
--

CREATE TABLE `venta_general` (
  `id` int(11) UNSIGNED NOT NULL,
  `orden` int(11) NOT NULL,
  `price` decimal(25,2) NOT NULL,
  `pagado` decimal(25,2) NOT NULL,
  `vuelto` decimal(25,2) NOT NULL,
  `date` datetime NOT NULL,
  `user` varchar(25) NOT NULL,
  `forma_pago` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `venta_general`
--

INSERT INTO `venta_general` (`id`, `orden`, `price`, `pagado`, `vuelto`, `date`, `user`, `forma_pago`) VALUES
(1, 3, '30.00', '0.00', '0.00', '2018-10-01 23:02:16', 'admin', 'tarjeta'),
(2, 4, '23.50', '25.00', '1.50', '2018-10-01 23:23:45', 'admin', 'efectivo'),
(3, 5, '5.00', '0.00', '0.00', '2018-10-01 23:47:19', 'admin', 'tarjeta'),
(4, 6, '5.00', '0.00', '0.00', '2018-10-02 00:09:09', 'admin', 'tarjeta'),
(5, 7, '21.00', '25.00', '4.00', '2018-10-02 00:15:20', 'admin', 'efectivo'),
(6, 8, '4.00', '0.00', '0.00', '2018-10-02 00:20:20', 'admin', 'tarjeta'),
(7, 9, '26.50', '0.00', '0.00', '2018-10-02 00:39:06', 'admin', 'tarjeta'),
(8, 10, '65.00', '0.00', '0.00', '2018-10-02 00:43:12', 'admin', 'tarjeta'),
(9, 11, '40.00', '40.00', '0.00', '2018-10-02 00:49:40', 'admin', 'efectivo'),
(10, 0, '28.50', '0.00', '0.00', '2018-10-05 00:00:49', 'admin', 'tarjeta'),
(11, 1, '32.50', '0.00', '0.00', '2018-10-05 00:07:23', 'admin', 'tarjeta'),
(12, 0, '11.00', '0.00', '0.00', '2018-10-08 10:33:10', 'admin', 'tarjeta'),
(13, 1, '16.25', '17.00', '0.75', '2018-10-08 13:57:39', 'admin', 'efectivo'),
(14, 2, '10.00', '10.00', '0.00', '2018-10-08 13:58:26', 'admin', 'efectivo'),
(15, 3, '10.00', '10.00', '0.00', '2018-10-08 14:08:40', 'admin', 'efectivo'),
(16, 4, '10.00', '10.00', '0.00', '2018-10-08 17:53:41', 'admin', 'efectivo'),
(17, 5, '2.00', '5.00', '3.00', '2018-10-08 22:05:12', 'admin', 'efectivo'),
(18, 6, '3.75', '4.00', '0.25', '2018-10-08 22:58:45', 'admin', 'efectivo'),
(19, 7, '1.25', '2.00', '0.75', '2018-10-09 00:28:06', 'admin', 'efectivo'),
(20, 8, '1.25', '2.00', '0.75', '2018-10-09 00:38:55', 'admin', 'efectivo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `venta_ingredientes`
--

CREATE TABLE `venta_ingredientes` (
  `id` int(11) UNSIGNED NOT NULL,
  `qty` int(11) NOT NULL,
  `nombre_ingre` varchar(25) NOT NULL,
  `price` decimal(25,2) NOT NULL,
  `date` datetime NOT NULL,
  `user` varchar(25) NOT NULL,
  `forma_pago` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `venta_ingredientes`
--

INSERT INTO `venta_ingredientes` (`id`, `qty`, `nombre_ingre`, `price`, `date`, `user`, `forma_pago`) VALUES
(1, 1, 'quesoNormal', '12.00', '2018-10-01 23:24:08', 'admin', 'efectivo'),
(2, 1, 'embutidos', '7.50', '2018-10-01 23:24:08', 'admin', 'efectivo');

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
  `forma_pago` varchar(25) NOT NULL,
  `date` datetime NOT NULL,
  `user` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `venta_pizzas`
--

INSERT INTO `venta_pizzas` (`id`, `qty`, `tam_pizza`, `tipo_pizza`, `sabor_pizza`, `llevar_pizza`, `extras`, `price`, `forma_pago`, `date`, `user`) VALUES
(1, 2, 'mediana', 'especial', 'personalizada', 'llevar', 'Hawayana,Vegetariana,pina,champinones', '20.00', 'tarjeta', '2018-10-01 23:03:14', 'admin'),
(2, 2, 'porcion', 'porcion', 'mixta', 'servirse', 'queso,pina', '3.00', 'tarjeta', '2018-10-01 23:47:51', 'admin'),
(3, 1, 'porcion', 'porcion', 'mixta', 'servirse', 'queso,queso,queso,queso,pina,pina,pina', '1.50', 'tarjeta', '2018-10-02 00:09:58', 'admin'),
(4, 1, 'mediana', 'especial', 'amangiare', 'llevar', 'queso,queso,queso,pina,pina', '10.00', 'efectivo', '2018-10-02 00:16:13', 'admin'),
(5, 1, 'porcion', 'porcion', 'mixta', 'servirse', 'queso,queso,durazno,durazno,durazno', '1.50', 'tarjeta', '2018-10-02 00:20:44', 'admin'),
(6, 3, 'mediana', 'normal', 'hawayana', 'llevar', '', '25.50', 'tarjeta', '2018-10-02 00:39:29', 'admin'),
(7, 4, 'familiar', 'especial', 'tradicionalPollo', 'llevar', '', '60.00', 'tarjeta', '2018-10-02 00:43:41', 'admin'),
(8, 4, 'mediana', 'especial', 'tradicionalHawayana', 'llevar', '', '40.00', 'efectivo', '2018-10-02 00:51:30', 'admin'),
(9, 3, 'mediana', 'normal', 'mixta', 'llevar', '', '25.50', 'tarjeta', '2018-10-05 00:02:02', 'admin'),
(10, 2, 'familiar', 'normal', 'tropical ', 'llevar', '', '30.00', 'tarjeta', '2018-10-05 00:08:37', 'admin'),
(15, 1, 'mediana', 'especial', 'personalizada', 'servirse', 'Mixta,Carne,Tocino', '10.00', 'efectivo', '2018-10-08 17:54:27', 'admin');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `autoconsumo_bebidas`
--
ALTER TABLE `autoconsumo_bebidas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `autoconsumo_pizzas`
--
ALTER TABLE `autoconsumo_pizzas`
  ADD PRIMARY KEY (`id`);

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
-- Indices de la tabla `products_aproximados`
--
ALTER TABLE `products_aproximados`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`),
  ADD KEY `categorie_id` (`categorie_id`);

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
-- Indices de la tabla `venta_general`
--
ALTER TABLE `venta_general`
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
-- AUTO_INCREMENT de la tabla `autoconsumo_bebidas`
--
ALTER TABLE `autoconsumo_bebidas`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `autoconsumo_pizzas`
--
ALTER TABLE `autoconsumo_pizzas`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `catalogo_bebidas`
--
ALTER TABLE `catalogo_bebidas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

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
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- AUTO_INCREMENT de la tabla `productovender`
--
ALTER TABLE `productovender`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT de la tabla `products_add_records`
--
ALTER TABLE `products_add_records`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT de la tabla `products_aproximados`
--
ALTER TABLE `products_aproximados`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `sales`
--
ALTER TABLE `sales`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tabla_aperturas_cajas`
--
ALTER TABLE `tabla_aperturas_cajas`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `tabla_cierres_cajas`
--
ALTER TABLE `tabla_cierres_cajas`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `tabla_ingresos_retiros_cajas`
--
ALTER TABLE `tabla_ingresos_retiros_cajas`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

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
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `user_groups`
--
ALTER TABLE `user_groups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `venta_bebidas`
--
ALTER TABLE `venta_bebidas`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `venta_general`
--
ALTER TABLE `venta_general`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `venta_ingredientes`
--
ALTER TABLE `venta_ingredientes`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `venta_pizzas`
--
ALTER TABLE `venta_pizzas`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

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

-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 20-08-2018 a las 23:52:32
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
-- Estructura de tabla para la tabla `catalogo_extras`
--

CREATE TABLE `catalogo_extras` (
  `id` int(11) NOT NULL,
  `size` varchar(20) NOT NULL,
  `ingrediente` varchar(20) NOT NULL,
  `precio` decimal(25,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `catalogo_extras`
--

INSERT INTO `catalogo_extras` (`id`, `size`, `ingrediente`, `precio`) VALUES
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
(35, 'mediana', 'especial', 'mangiare', '10.00'),
(36, 'mediana', 'especial', 'tradicional', '10.00'),
(37, 'familiar', 'especial', 'mangiare', '15.00'),
(38, 'familiar', 'especial', 'tradicional', '15.00'),
(39, 'extragrande', 'especial', 'mangiare', '18.00'),
(40, 'extragrande', 'especial', 'tradicional', '18.00'),
(41, 'porcion', 'porcion', 'mixta', '1.50'),
(42, 'porcion', 'porcion', 'pollo', '1.50'),
(43, 'porcion', 'porcion', 'champinones', '1.50'),
(44, 'porcion', 'porcion', 'hawayana', '1.50');

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
(1, 'Ninguno', 28),
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
(41, 'forma_llevar.png', 'image/png');

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
  `proveedor` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `products`
--

INSERT INTO `products` (`id`, `name`, `quantity`, `unidades`, `buy_price`, `sale_price`, `categorie_id`, `media_id`, `date`, `proveedor`) VALUES
(1, 'Harina', '9', 'costal', '25.00', '32.00', 4, 20, '2018-08-17 14:31:58', 'Falimensa'),
(2, 'Queso', '11', 'bloque', '12.00', '15.00', 4, 21, '2018-08-16 15:01:38', 'Machachi'),
(3, 'Aceite', '7', 'Cajas', '10.00', '18.00', 4, 22, '2018-08-16 15:01:51', 'Ales'),
(4, 'dona', '25', 'gr', '5.00', '6.00', 4, 2, '2018-08-16 15:02:00', 'jonathan'),
(5, 'ricas2', '25', 'gr', '45.00', '50.00', 3, 9, '2018-08-16 15:12:04', 'mia'),
(7, 'celular', '27', 'gr', '12.00', '14.00', 2, 17, '2018-08-16 15:15:44', 'jonathan');

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
  `proveedor` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `products_add_records`
--

INSERT INTO `products_add_records` (`id`, `name`, `last_quantity`, `new_quantity`, `unidades`, `buy_price`, `gasto`, `date`, `username`, `proveedor`) VALUES
(1, 'ricas2', '0', '10', 'gr', '45.00', '0.00', '2018-08-16 14:40:47', 'Admin', 'mia'),
(2, '', '', '10', '', '0.00', '0.00', '0000-00-00 00:00:00', 'Admin', ''),
(5, 'Harina', '4', '5', 'costal', '25.00', '0.00', '2018-08-16 15:00:36', 'Admin', 'Falimensa'),
(6, 'Queso', '10', '11', 'bloque', '12.00', '0.00', '2018-08-16 15:01:38', 'Admin', 'Machachi'),
(7, 'Aceite', '6', '7', 'Cajas', '10.00', '0.00', '2018-08-16 15:01:51', 'Admin', 'Ales'),
(8, 'dona', '23', '25', 'gr', '5.00', '0.00', '2018-08-16 15:02:00', 'Admin', 'jonathan'),
(13, 'Harina', '9', '11', 'costal', '25.00', '0.00', '2018-08-16 15:07:17', 'Admin', 'Falimensa'),
(14, 'ricas2', '21', '23', 'gr', '45.00', '90.00', '2018-08-16 15:10:35', 'Admin', 'mia'),
(15, 'ricas2', '23', '24', 'gr', '45.00', '45.00', '2018-08-16 15:11:14', 'Admin', 'mia'),
(16, 'ricas2', '24', '25', 'gr', '45.00', '45.00', '2018-08-16 15:12:04', 'Admin', 'mia'),
(17, 'celular', '0', '', 'gr', '12.00', '36.00', '0000-00-00 00:00:00', 'Admin', 'jonathan'),
(18, 'celular', '0', '23', 'gr', '12.00', '276.00', '0000-00-00 00:00:00', 'Admin', 'jonathan'),
(19, 'celular', '23', '27', 'gr', '12.00', '48.00', '2018-08-16 15:15:44', 'Admin', 'jonathan'),
(20, 'Harina', '11', '4', 'costal', '25.00', '-175.00', '2018-08-16 15:20:59', 'Admin', 'Falimensa'),
(21, 'Harina', '4', '2', 'costal', '25.00', '-50.00', '2018-08-17 09:54:02', 'Admin', 'Falimensa'),
(22, 'Harina', '2', '5', 'costal', '25.00', '75.00', '2018-08-17 09:54:35', 'Admin', 'Falimensa'),
(23, 'Harina', '5', '9', 'costal', '25.00', '100.00', '2018-08-17 14:31:58', 'Admin', 'Falimensa');

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
(5, '1.01', '2018-08-20 11:55:28', 'Admin');

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
(5, '1.01', '0.00', '0.00', '0.00', '0.00', '40.00', '21.81', '19.20', '0.00', '-19.20', '2018-08-20 11:56:16', 'Admin');

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
(1, '40.00', '2018-08-20 11:49:18', 'Admin'),
(2, '-21.81', '2018-08-20 11:49:32', 'Admin');

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
(1, 'Porcion', 5),
(2, 'Mediana', 10),
(3, 'Familiar', 7),
(4, 'Extragrande', 9);

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
(1, 'Mixta', 'Salsa, Queso, Jamon, Salami, Peperoni', 15),
(2, 'Hawayana', 'Salsa, Queso, Pina, Jamon', 12),
(3, 'Pollo', 'Salsa, Queso, Pollo, Champinones', 13),
(4, 'Vegetariana', 'Salsa, Queso, Tomate, Cebolla, Pimientos, Champi', 16),
(5, 'Carne', 'Salsa, Queso, Carne, Champi', 23),
(6, 'Tocino', 'Salsa, Queso, Tocino, Champi', 26),
(7, 'Napolitana', 'Salsa, Queso, Salami, Tomate, Cebolla, Pimiento', 25),
(8, 'Criolla', 'Salsa, Queso, Tocino, Choclo, Carne', 24),
(9, 'Tropical ', 'Salsa, Queso, Pina, Durazno', 27);

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
(1, 'Admin Users', 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 1, 'pzg9wa7o1.jpg', 1, '2018-08-20 10:22:00', 0),
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
(1, 'Admin', 1, 1),
(2, 'Vendedor Autorizado', 2, 1),
(3, 'Vendedor', 3, 1);

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
-- Indices de la tabla `catalogo_extras`
--
ALTER TABLE `catalogo_extras`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `catalogo_pizzas`
--
ALTER TABLE `catalogo_pizzas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

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
-- Indices de la tabla `venta_pizzas`
--
ALTER TABLE `venta_pizzas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `catalogo_extras`
--
ALTER TABLE `catalogo_extras`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT de la tabla `catalogo_pizzas`
--
ALTER TABLE `catalogo_pizzas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT de la tabla `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `extra_pizzas`
--
ALTER TABLE `extra_pizzas`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `media`
--
ALTER TABLE `media`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT de la tabla `productovender`
--
ALTER TABLE `productovender`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `products_add_records`
--
ALTER TABLE `products_add_records`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `sales`
--
ALTER TABLE `sales`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tabla_aperturas_cajas`
--
ALTER TABLE `tabla_aperturas_cajas`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `tabla_cierres_cajas`
--
ALTER TABLE `tabla_cierres_cajas`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `tabla_ingresos_retiros_cajas`
--
ALTER TABLE `tabla_ingresos_retiros_cajas`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tam_pizzas`
--
ALTER TABLE `tam_pizzas`
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
-- AUTO_INCREMENT de la tabla `venta_pizzas`
--
ALTER TABLE `venta_pizzas`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

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

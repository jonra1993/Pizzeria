-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 09-08-2018 a las 14:38:38
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
(3, 'champi', 39),
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
(1, 'Harina', '2', 'costal', '25.00', '32.00', 4, 20, '2018-08-08 17:17:19', 'Falimensa'),
(2, 'Queso', '20', 'bloque', '12.00', '15.00', 4, 21, '2018-08-08 17:19:23', 'Machachi'),
(3, 'Aceite', '3', 'Cajas', '10.00', '18.00', 4, 22, '2018-08-08 17:35:10', 'Ales');

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
(1, '50.00', '2018-08-08 17:04:44', 'Admin');

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
(1, '50.00', '0.00', '0.00', '50.00', '0.00', '0.00', '0.00', '50.00', '0.00', '-50.00', '2018-08-08 17:04:58', 'Admin');

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
(1, 'Admin Users', 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 1, 'pzg9wa7o1.jpg', 1, '2018-08-09 02:17:20', 0),
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
  `id_tam_pizza` int(11) NOT NULL,
  `id_tipo_pizza` int(11) NOT NULL,
  `llevar_pizza` tinyint(1) NOT NULL,
  `extras` int(11) NOT NULL,
  `price` decimal(25,2) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Índices para tablas volcadas
--

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
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `sales`
--
ALTER TABLE `sales`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tabla_aperturas_cajas`
--
ALTER TABLE `tabla_aperturas_cajas`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `tabla_cierres_cajas`
--
ALTER TABLE `tabla_cierres_cajas`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

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

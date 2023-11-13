-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 01-11-2023 a las 22:53:34
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `commerce`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categories`
--

CREATE TABLE `categories` (
  `id_category` int(11) NOT NULL,
  `category_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `categories`
--

INSERT INTO `categories` (`id_category`, `category_name`) VALUES
(1, 'pizzas'),
(2, 'hamburguesas'),
(3, 'Picadas'),
(4, 'gaseosas'),
(5, 'promo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `products`
--

CREATE TABLE `products` (
  `id_product` int(11) NOT NULL,
  `product_name` varchar(50) NOT NULL,
  `price` decimal(7,2) NOT NULL,
  `start_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `id_category` int(11) NOT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `products`
--

INSERT INTO `products` (`id_product`, `product_name`, `price`, `start_date`, `id_category`, `image`) VALUES
(1, 'fugazzeta', '3570.00', '2023-09-27 23:13:05', 1, 'img/fugazzeta_cleanup (2).jpg'),
(2, '4 quesos', '4590.00', '2023-09-27 23:22:11', 1, 'img/pizza-4-quesos (2).jpg'),
(3, 'albahaca', '4080.00', '2023-09-27 23:24:04', 1, 'img/pizza-de-albahaca (2).jpg'),
(4, 'muzzarrella', '3366.00', '2023-09-27 23:25:50', 1, 'img/pizza-muzzarella (2).jpg'),
(5, 'napolitana', '4080.00', '2023-09-27 23:27:19', 1, 'img/pizza-napolitana (2).jpg'),
(6, 'rucula y crudo', '4590.00', '2023-09-27 23:28:41', 1, 'img/pizza-rucula-y-jamon-crudo (2).jpg'),
(7, 'jamon y morron', '4080.00', '2023-09-27 23:29:52', 1, 'img/jamon y morron (2).jpeg'),
(9, 'picada especial para 2', '13260.00', '2023-10-09 22:22:05', 3, 'img/picada_especial.jpg'),
(10, 'picada especial vegana saludable', '14280.00', '2023-10-09 23:24:14', 3, 'img/picada_vegana.jpg'),
(11, 'promo 1', '10200.00', '2023-10-11 21:30:36', 5, 'img/promo1.jpg');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id_category`);

--
-- Indices de la tabla `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id_product`),
  ADD KEY `products_categories` (`id_category`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categories`
--
ALTER TABLE `categories`
  MODIFY `id_category` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `products`
--
ALTER TABLE `products`
  MODIFY `id_product` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_categories` FOREIGN KEY (`id_category`) REFERENCES `categories` (`id_category`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

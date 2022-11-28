-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 25-11-2022 a las 12:12:24
-- Versión del servidor: 10.5.16-MariaDB
-- Versión de PHP: 7.3.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `id19826013_gustavo`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrito`
--

CREATE TABLE `carrito` (
  `idcarrito` int(11) NOT NULL,
  `idcliente` int(11) DEFAULT NULL,
  `idproducto` int(11) DEFAULT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `precio` int(11) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `estado` text DEFAULT NULL,
  `idusuario` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `carrito`
--

INSERT INTO `carrito` (`idcarrito`, `idcliente`, `idproducto`, `cantidad`, `precio`, `fecha`, `estado`, `idusuario`) VALUES
(158, 5, 8, 1, 325000, '2022-11-11', 'Confirmado', NULL),
(159, 5, 9, 1, 1459000, '2022-11-11', 'Confirmado\r\n', NULL),
(160, 5, 8, 1, 325000, '2022-11-11', 'Cancelado', NULL),
(161, 5, 9, 1, 1459000, '2022-11-11', 'Cancelado', NULL),
(162, 5, 8, 1, 325000, '2022-11-11', 'Cancelado', NULL),
(163, 5, 9, 1, 1459000, '2022-11-11', 'Facturado', NULL),
(164, 5, 9, 1, 1459000, '2022-11-11', 'Cancelado', NULL),
(165, 5, 8, 1, 325000, '2022-11-11', 'Anulado', NULL),
(166, 5, 9, 1, 1459000, '2022-11-11', 'Facturado', NULL),
(167, 5, 9, 1, 1459000, '2022-11-11', 'Cancelado', NULL),
(168, 5, 11, 1, 560000, '2022-11-11', 'Pendiente', NULL),
(169, 5, 12, 1, 120000, '2022-11-11', 'Anulado', NULL),
(170, 5, 9, 1, 1459000, '2022-11-11', 'Anulado', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `descripcion`) VALUES
(8, 'RAM KINGSTOM DDR4'),
(9, 'TECLADO REDRAGON'),
(10, 'PLACA MADRE ASUS PRIME'),
(11, 'KIT DIGABITE M3100'),
(12, 'DISCO DURO'),
(13, 'Teclado Corne Keyboard'),
(15, 'Microfonos HyperX'),
(16, 'Placas'),
(17, 'fg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `datos`
--

CREATE TABLE `datos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(10) DEFAULT NULL,
  `apellido` varchar(10) DEFAULT NULL,
  `usuario` varchar(10) DEFAULT NULL,
  `pass` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `datos`
--

INSERT INTO `datos` (`id`, `nombre`, `apellido`, `usuario`, `pass`) VALUES
(1, 'gustavo', 'galeano', 'w', '1'),
(5, 'Jose', 'Benitez', 'q', '1'),
(6, 'ludmila', 'montanes', 'lumi', '123');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `idcat` int(255) DEFAULT NULL,
  `descripcion` varchar(50) DEFAULT NULL,
  `precio` int(255) DEFAULT NULL,
  `img` varchar(50) DEFAULT NULL,
  `resena` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `idcat`, `descripcion`, `precio`, `img`, `resena`) VALUES
(8, 8, 'RAM Kingston Hyperx Beast 8GB 3200Mhz DDR4 RGB', 325000, 'imgart/ram.jpg', 'Dale un toque fenomenal a tu e'),
(9, 10, 'Placa Madre Asus Prime B660-Plus D4 S1700 DDR4', 1459000, 'imgart/asus-prime.jpeg', '*Socket Intel LGA 1700 Listo p'),
(10, 12, 'HDD NB Seagate Barracuda 2TB 5400RPM', 589000, 'imgart/HDD.jpg', 'La solución para tus problemas'),
(11, 13, 'Teclado de dos partes', 560000, 'imgart/teclado03.png', 'Teclado con iluminación RGB, c'),
(12, 14, 'placa asus', 120000, 'imgart/mouse01.jpeg', 'La mejor placa');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(20) DEFAULT NULL,
  `apellido` varchar(20) DEFAULT NULL,
  `usuario` varchar(20) DEFAULT NULL,
  `password` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `apellido`, `usuario`, `password`) VALUES
(1, 'gustavo', 'galeano', 'admin', '1'),
(26, 'Laura', 'Leguizamon', 'cajera', '232'),
(27, 'Eliezer', 'Torres', 'repositor', '34343');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `carrito`
--
ALTER TABLE `carrito`
  ADD PRIMARY KEY (`idcarrito`);

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `datos`
--
ALTER TABLE `datos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `carrito`
--
ALTER TABLE `carrito`
  MODIFY `idcarrito` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=171;

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `datos`
--
ALTER TABLE `datos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 18-08-2021 a las 03:37:18
-- Versión del servidor: 8.0.17
-- Versión de PHP: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tienda_js`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrito`
--

CREATE TABLE `carrito` (
  `usuario` varchar(50) NOT NULL,
  `id_funko` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contacto`
--

CREATE TABLE `contacto` (
  `nombre` varchar(50) NOT NULL,
  `telefono` varchar(15) NOT NULL,
  `correo` varchar(30) NOT NULL,
  `comentarios` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `contacto`
--

INSERT INTO `contacto` (`nombre`, `telefono`, `correo`, `comentarios`) VALUES
('', '', '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `funkos`
--

CREATE TABLE `funkos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `descripcion` varchar(100) NOT NULL,
  `price` float NOT NULL,
  `imagen` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `funkos`
--

INSERT INTO `funkos` (`id`, `nombre`, `descripcion`, `price`, `imagen`) VALUES
(1, 'Wolverine', 'Funko Marvel de Wolverine con fondo', 15.99, '../img/funko_wolverine_1.jpg'),
(2, 'Batman', 'Funko de Batman', 15.99, '../img/funko_batman.jpg'),
(3, 'Superman', 'Funko de Superman', 15.99, '../img/funko_superman.jpg'),
(4, 'Capitán América', 'Funko de Capitán América', 15.99, '../img/funko_capAmerica.jpg'),
(5, 'Venom', 'Funko de Venom', 15.99, '../img/funko_venom.jpg'),
(6, 'Iron Man', 'Funko de Iron Man', 15.99, '../img/funko_ironman.jpg'),
(7, 'Wolverine 2', 'Funko de Wolverine', 15.99, '../img/funko_wolverine.jpg'),
(8, 'Wonder Woman', 'Funko Wonder Woman 1984', 15.99, '../img/funko_wonder-woman.jpeg'),
(9, 'Daenerys Targaryen', 'Funko de Daenerys sobre dragon', 15.99, '../img/funko_daenerys.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sesion`
--

CREATE TABLE `sesion` (
  `nombre` varchar(80) NOT NULL,
  `user` varchar(15) NOT NULL,
  `passw` varchar(15) NOT NULL,
  `dir` varchar(50) NOT NULL,
  `tel` varchar(15) NOT NULL,
  `sex` varchar(1) NOT NULL,
  `mail` varchar(25) NOT NULL,
  `fecha_nac` date NOT NULL,
  `pasatiempo` varchar(20) NOT NULL,
  `ciudad` varchar(30) NOT NULL,
  `file` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `sesion`
--

INSERT INTO `sesion` (`nombre`, `user`, `passw`, `dir`, `tel`, `sex`, `mail`, `fecha_nac`, `pasatiempo`, `ciudad`, `file`) VALUES
('Javier Sanguino', 'javier', '12345', 'mz 1 casa 19', '3226816161', 'M', 'fjse0505@gmail.com', '1997-05-05', 'comer', 'Cucuta', '../img/up_img/funko_wolverine_1.jpg'),
('Sara Beltran', 'sara', '12345', 'mz 1 casa 19', '3126438329', 'F', 'saravabemo@gmail.com', '1997-12-21', 'Dormir', 'Medellin', '../img/up_img/funko_daenerys.jpg');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `carrito`
--
ALTER TABLE `carrito`
  ADD PRIMARY KEY (`usuario`,`id_funko`);

--
-- Indices de la tabla `funkos`
--
ALTER TABLE `funkos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `sesion`
--
ALTER TABLE `sesion`
  ADD PRIMARY KEY (`user`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `funkos`
--
ALTER TABLE `funkos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

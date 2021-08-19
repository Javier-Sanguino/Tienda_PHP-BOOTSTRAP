-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
<<<<<<< HEAD
-- Tiempo de generación: 18-08-2021 a las 03:37:18
=======
-- Tiempo de generación: 18-08-2021 a las 14:33:39
>>>>>>> c2b6d158f96b1c41581e92094007a3ac6181e8fa
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
<<<<<<< HEAD
=======
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellidos` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id`, `nombre`, `apellidos`) VALUES
(1101, 'Burgos', 'Jeronimo'),
(1102, 'Villegas', 'Estefania'),
(1103, 'Fernandez', 'Guillermo'),
(1104, 'Ramirez', 'Eliana'),
(1105, 'Carmona', 'Jose'),
(1106, 'De santis', 'Marcela'),
(1107, 'Franco', 'Daniela'),
(1108, 'Cortes', 'Rafael'),
(1109, 'Berrio', 'Camilo'),
(1110, 'Arias', 'Francisco'),
(1111, 'Merizalde', 'Antonio'),
(1112, 'Restrepo', 'Karen'),
(1113, 'Lemus', 'David'),
(1114, 'Santana', 'Javier'),
(1115, 'Saldarriaga', 'Virginia'),
(1116, 'Posada', 'Sergio'),
(1117, 'Zea ', 'Jorge'),
(1118, 'Diaz ', 'Mariana'),
(1119, 'Giraldo', 'Esteban'),
(1120, 'Idarraga', 'Jorge'),
(1121, 'Simanca', 'Alejandro'),
(1122, 'Pulgarin', 'Angelina'),
(1123, 'Aguirre', 'Brenda'),
(1124, 'Tamayo', 'Gloria'),
(1125, 'Carmona ', 'Andrea'),
(1126, 'Diaz ', 'Lucero'),
(1127, 'Alzate', 'Angela'),
(1128, 'Arango', 'Felipe'),
(1129, 'Garces', 'Elena'),
(1130, 'Uribe', 'Carmen'),
(1131, 'Ospina', 'Daniel'),
(1132, 'Peláez', 'Alberto'),
(1133, 'Perez', 'Elena'),
(1134, 'Carmona', 'Sebastian'),
(1135, 'Cifuentes', 'Oscar'),
(1136, 'Jaramillo', 'Santiago'),
(1137, 'Melano', 'Luis'),
(1138, 'Mendez', 'Tammy'),
(1139, 'Ramirez', 'Tomas'),
(1140, 'Girando', 'Felipe'),
(1141, 'Diez', 'Patricia'),
(1142, 'Sierra', 'Luisa'),
(1143, 'Vallejo', 'Sara'),
(1144, 'Guerrero', 'Alexandra'),
(1145, 'Guerra', 'Lisa'),
(1146, 'Rodríguez ', 'Ana Maria'),
(1147, 'Marulanda', 'Sofia'),
(1148, 'Palacio', 'Paula'),
(1149, 'Bermudez', 'Jesus'),
(1150, 'Toledo', 'Roberta'),
(1151, 'Arango', 'Tatiana'),
(1152, 'Acevedo', 'Melina'),
(1153, 'Cock', 'Cristina'),
(1154, 'Casadiegos', 'Manuela'),
(1155, 'Salamanca', 'Isabel'),
(1156, 'Arango', 'Juan'),
(1157, 'Granda', 'Luisa'),
(1158, 'Arango ', 'Monica'),
(1159, 'Arroyave', 'Federico'),
(1160, 'Lemos', 'Dalia'),
(1161, 'Jaramillo', 'Ana'),
(1162, 'Lema', 'Maria'),
(1163, 'Caro', 'Diana'),
(1164, 'Vergara', 'Amalia'),
(1165, 'Duque', 'Julian'),
(1166, 'Muñoz', 'Maritza'),
(1167, 'Peláez', 'Andrés'),
(1168, 'Sanchez', 'Miguel'),
(1169, 'Cano', 'Carolina'),
(1170, 'Marquez', 'Jessica'),
(1171, 'Rico', 'Samuel'),
(1172, 'Mendez', 'Gustavo'),
(1173, 'Jimenez', 'Karina'),
(1174, 'Osorio', 'Julieth'),
(1175, 'Villamizar', 'Lina'),
(1176, 'Gomez', 'Carlos'),
(1177, 'Gracía', 'Simón'),
(1178, 'Castro', 'Monica'),
(1179, 'Uribe', 'Melisa'),
(1180, 'Florez', 'Alejandra'),
(1181, 'Gutierrez', 'Amalia'),
(1182, 'Medina', 'Raquel'),
(1183, 'Betancur', 'Gonzalo'),
(1184, 'Betancurt', 'Santiago'),
(1185, 'Marquez', 'Isabella'),
(1186, 'Molina', 'Karla'),
(1187, 'Rodriguez', 'Hilda'),
(1188, 'Hincapie', 'Victoria'),
(1189, 'Rojas ', 'Pablo'),
(1190, 'Serna', 'Pamela'),
(1191, 'Zapata', 'Stepania'),
(1192, 'Toro', 'Manuel'),
(1193, 'Henao', 'Barbara'),
(1194, 'Vasquez', 'Leonardo'),
(1195, 'Castrillón', 'Juliana'),
(1196, 'Lopez', 'Dinara'),
(1197, 'Mota', 'Elisa'),
(1198, 'Perez', 'Alicia'),
(1199, 'Posada', 'Carlos'),
(1200, 'Arango', 'Mauricio'),
(1201, 'Hoyos', 'Adriana'),
(1202, 'Suarez', 'Miguel'),
(1203, 'Aristizabal', 'Natalia'),
(1204, 'Dominguez ', 'Camila'),
(1205, 'Ruiz', 'Susana'),
(1206, 'Higuita', 'Cathy'),
(1207, 'Osorio', 'Catalina'),
(1208, 'Gomez', 'Mariana'),
(1209, 'Bustos', 'Jacobo'),
(1210, 'Rodas', 'Gabriel'),
(1211, 'Cano', 'Sandra'),
(1212, 'Diaz ', 'Evelyn'),
(1213, 'Hernandez ', 'Juan'),
(1214, 'Jaramillo', 'David');

-- --------------------------------------------------------

--
>>>>>>> c2b6d158f96b1c41581e92094007a3ac6181e8fa
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
<<<<<<< HEAD
(8, 'Wonder Woman', 'Funko Wonder Woman 1984', 15.99, '../img/funko_wonder-woman.jpeg'),
(9, 'Daenerys Targaryen', 'Funko de Daenerys sobre dragon', 15.99, '../img/funko_daenerys.jpg');
=======
(8, 'Wonder Woman', 'Funko Wonder Woman 1984', 15.99, '../img/funko_wonder-woman.jpeg');
>>>>>>> c2b6d158f96b1c41581e92094007a3ac6181e8fa

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
<<<<<<< HEAD
('Javier Sanguino', 'javier', '12345', 'mz 1 casa 19', '3226816161', 'M', 'fjse0505@gmail.com', '1997-05-05', 'comer', 'Cucuta', '../img/up_img/funko_wolverine_1.jpg'),
('Sara Beltran', 'sara', '12345', 'mz 1 casa 19', '3126438329', 'F', 'saravabemo@gmail.com', '1997-12-21', 'Dormir', 'Medellin', '../img/up_img/funko_daenerys.jpg');
=======
('Javier Sanguino', 'javier', '12345', 'mz 1 casa 19', '3226816161', 'M', 'fjse0505@gmail.com', '1997-05-05', 'comer', 'Cucuta', '../img/up_img/funko_wolverine_1.jpg');
>>>>>>> c2b6d158f96b1c41581e92094007a3ac6181e8fa

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `carrito`
--
ALTER TABLE `carrito`
  ADD PRIMARY KEY (`usuario`,`id_funko`);

--
<<<<<<< HEAD
=======
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`);

--
>>>>>>> c2b6d158f96b1c41581e92094007a3ac6181e8fa
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
<<<<<<< HEAD
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
=======
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
>>>>>>> c2b6d158f96b1c41581e92094007a3ac6181e8fa
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
